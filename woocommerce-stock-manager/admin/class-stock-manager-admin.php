<?php
/**
 * Main class for Stock Manager.
 *
 * @package  woocommerce-stock-manager/admin/
 * @version  3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class for Stock Manager Admin.
 */
class Stock_Manager_Admin {

	/**
	 * Instance of this class.
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Current page name.
	 *
	 * @var string
	 */
	public $page = '';

	/**
	 * Product ID.
	 *
	 * @var int
	 */
	public $product_id = 0;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a settings page and menu.
	 */
	private function __construct() {

		// Set page.
		$this->page = ( ! empty( $_GET['page'] ) ) ? wc_clean( wp_unslash( $_GET['page'] ) ) : ''; // phpcs:ignore

		// For stock log history page.
		$this->product_id = ( ! empty( $_GET['product-history'] ) ) ? wc_clean( wp_unslash( $_GET['product-history'] ) ) : 0; // phpcs:ignore

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		include_once 'includes/class-wsm-stock.php';

		// Add direct link on product list and individual product page.
		add_filter( 'post_row_actions', array( $this, 'add_stock_log_link_to_product_list' ), 10, 2 );
		add_action( 'add_meta_boxes', array( $this, 'add_stock_log_link_to_individual_product' ) );

		// To update footer text on WSM screens.
		add_filter( 'admin_footer_text', array( $this, 'wsm_footer_text' ), 99999 );
		add_filter( 'update_footer', array( $this, 'wsm_update_footer_text' ), 99999 );
		// Go Pro icon css.
		add_action( 'admin_footer', array( &$this, 'go_pro_submenu_icon_css' ), 10 );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Get stock class
	 *
	 * @return WSM_Stock
	 */
	public function stock() {
		return WSM_Stock::get_instance();
	}

	/**
	 * Register and enqueue admin-specific CSS.
	 */
	public function enqueue_admin_styles() {
		if ( ( 'stock-manager' === $this->page || 'stock-manager-import-export' === $this->page || 'stock-manager-log' === $this->page ) ) {
			wp_enqueue_style( 'woocommerce-stock-manager-admin-styles', plugins_url( 'assets/css/admin.css', __FILE__ ), array(), WSM_PLUGIN_VERSION );

			$old_styles = get_option( 'woocommerce_stock_old_styles', 'no' );
			if ( ! empty( $old_styles ) && 'ok' === $old_styles ) {
				wp_enqueue_style( 'woocommerce-stock-manager-old-styles', plugins_url( 'assets/css/old.css', __FILE__ ), array(), WSM_PLUGIN_VERSION );
			}
		}
	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 */
	public function enqueue_admin_scripts() {
		if ( ( 'stock-manager' === $this->page || 'stock-manager-import-export' === $this->page ) ) {
			$low_stock_threshold = get_option( 'woocommerce_notify_low_stock_amount', 5 );
			$low_stock_threshold = ( ! empty( $low_stock_threshold ) ) ? $low_stock_threshold : 5;

			wp_enqueue_style( 'woocommerce-stock-manager-admin-script-react', plugins_url( 'assets/build/index.css', __FILE__ ), array(), WSM_PLUGIN_VERSION );
			wp_enqueue_script( 'woocommerce-stock-manager-admin-script-react', plugins_url( 'assets/build/index.js', __FILE__ ), array( 'wp-polyfill', 'wp-i18n', 'wp-url' ), WSM_PLUGIN_VERSION, true );
			wp_localize_script(
				'woocommerce-stock-manager-admin-script-react',
				'WooCommerceStockManagerPreloadedState',
				array(
					'app'                  => array(
						'textDomain'        => 'woocommerce-stock-manager',
						'root'              => esc_url_raw( rest_url() ),
						'adminUrl'          => admin_url(),
						'nonce'             => wp_create_nonce( 'wp_rest' ),
						'perPage'           => apply_filters( 'woocommerce_stock_manager_per_page', 50 ),
						'lowStockThreshold' => $low_stock_threshold,
					),
					'product-categories'   => array_reduce(
						get_terms(
							array(
								'taxonomy'   => 'product_cat',
								'hide_empty' => false,
							)
						),
						function( $carry, $item ) {
							$carry[ $item->term_id ] = html_entity_decode( $item->name );
							return $carry;
						},
						array()
					),
					'product-types'        => wc_get_product_types(),
					'stock-status-options' => wc_get_product_stock_status_options(),
					'shipping-classes'     => array_merge(
						array( '' => __( 'No shipping class', 'woocommerce-stock-manager' ) ),
						array_reduce(
							get_terms(
								array(
									'taxonomy'   => 'product_shipping_class',
									'hide_empty' => false,
								)
							),
							function( $carry, $item ) {
								$carry[ $item->slug ] = $item->name;
								return $carry;
							},
							array()
						)
					),
					'tax-classes'          => wc_get_product_tax_class_options(),
					'tax-statuses'         => array(
						'taxable'  => __( 'Taxable', 'woocommerce-stock-manager' ),
						'shipping' => __( 'Shipping only', 'woocommerce-stock-manager' ),
						'none'     => _x( 'None', 'Tax status', 'woocommerce-stock-manager' ),
					),
					'backorders-options'   => array(
						'no'     => __( 'No', 'woocommerce-stock-manager' ),
						'notify' => __( 'Notify', 'woocommerce-stock-manager' ),
						'yes'    => __( 'Yes', 'woocommerce-stock-manager' ),
					),
				)
			);

			if ( function_exists( 'wp_set_script_translations' ) ) {
				wp_set_script_translations( 'woocommerce-stock-manager-admin-script-react', 'stock-manager', STOCKDIR . 'languages' );
			}
		}

		// Klawoo subscribe.
		$wsm_dismiss_admin_notice = get_option( 'wsm_dismiss_subscribe_admin_notice', false );
		if ( empty( $wsm_dismiss_admin_notice ) ) {
			$is_wsm_admin = is_wsm_admin_page();
			if ( $is_wsm_admin ) {
				$params = array(
					'ajax_nonce' => wp_create_nonce( 'wsm_update' ),
				);
				wp_localize_script( 'woocommerce-stock-manager-admin-script-w', 'ajax_object', $params );
				wp_enqueue_script( 'woocommerce-stock-manager-admin-script-w', plugins_url( 'assets/js/subscribe.js', __FILE__ ), array( 'jquery' ), WSM_PLUGIN_VERSION, true );

			}
		}
	}

	/**
	 * Function to show "Stock log" box on admin product page
	 */
	public function add_stock_log_link_to_individual_product() {
		add_meta_box(
			'post_log_link',
			__( 'Stock Manager', 'woocommerce-stock-manager' ),
			function ( $post = null ) {
				if ( ( ! $post instanceof WP_Post ) || empty( $post->ID ) ) {
					return;
				}
				echo '<a href="' . esc_url( admin_url() . 'admin.php?page=stock-manager-log&product-history=' . $post->ID ) . '" rel="permalink">' . esc_html_x( 'Stock log', 'product meta box', 'woocommerce-stock-manager' ) . '</a>';
			},
			'product',
			'side'
		);
	}

	/**
	 * Function to show "Stock log" link in admin products list
	 *
	 * @param array   $actions Array of actions.
	 * @param WP_Post $post Post object.
	 * @return array $actions Updated array of actions.
	 */
	public function add_stock_log_link_to_product_list( $actions = array(), $post = null ) {
		if ( empty( $post ) ) {
			return $actions;
		}
		if ( ( empty( $post->post_type ) ) || ( ( ! empty( $post->post_type ) ) && ( 'product' !== $post->post_type ) ) || ( empty( $post->ID ) ) ) {
			return $actions;
		}

		$actions['stock_log'] = '<a href="' . esc_url( admin_url() . 'admin.php?page=stock-manager-log&product-history=' . $post->ID ) . '" rel="permalink">'
			. esc_html_x( 'Stock log', 'product list', 'woocommerce-stock-manager' ) . '</a>';

		return $actions;
	}

	/**
	 * Function to get menu position for Stock Manager.
	 *
	 * @param double $start     Starting position.
	 * @param double $increment Increment by.
	 *
	 * @return double Final menu position.
	 */
	public function get_free_menu_position( $start, $increment = 0.0001 ) {
		foreach ( $GLOBALS['menu'] as $key => $menu ) {
			$menus_positions[] = $key;
		}

		if ( ! in_array( $start, $menus_positions, true ) ) {
			return $start;
		}

		/* the position is already reserved find the closet one */
		while ( in_array( $start, $menus_positions, true ) ) {
			$start += $increment;
		}

		return $start;
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 */
	public function add_plugin_admin_menu() {

		$value = 'manage_woocommerce';

		$manage = apply_filters( 'stock_manager_manage', $value );

		$position = (string) $this->get_free_menu_position( 58.00001 );

		$hook = add_menu_page(
			__( 'Stock Manager', 'woocommerce-stock-manager' ),
			__( 'Stock Manager', 'woocommerce-stock-manager' ),
			$manage,
			'stock-manager',
			array( $this, 'display_plugin_admin_page' ),
			'dashicons-book-alt',
			$position
		);

		// Show screen option for React App.
		add_action(
			'load-' . $hook,
			function() {
				add_filter(
					'screen_options_show_screen',
					function () {
						return true;
					}
				);
			}
		);

		add_submenu_page(
			'stock-manager',
			__( 'Import/Export', 'woocommerce-stock-manager' ),
			__( 'Import/Export', 'woocommerce-stock-manager' ),
			$manage,
			'stock-manager-import-export',
			array( $this, 'display_import_export_page' )
		);
		add_submenu_page(
			'stock-manager',
			__( 'Stock log', 'woocommerce-stock-manager' ),
			__( 'Stock log', 'woocommerce-stock-manager' ),
			$manage,
			'stock-manager-log',
			array( $this, 'display_log_page' )
		);
		add_submenu_page(
			'stock-manager',
			__( '<span class="wsm_pricing_icon"> 🔥 </span> Go Pro', 'woocommerce-stock-manager' ),
			__( '<span class="wsm_pricing_icon"> 🔥 </span> Go Pro', 'woocommerce-stock-manager' ),
			'manage_options',
			'stock-manager-pricing',
			array( $this, 'display_pricing_page' )
		);
		add_submenu_page(
			'stock-manager',
			__( 'StoreApps Plugins', 'woocommerce-stock-manager' ),
			__( 'StoreApps Plugins', 'woocommerce-stock-manager' ),
			$manage,
			'stock-manager-storeapps-plugins',
			array( $this, 'display_sa_marketplace_page' )
		);
	}

	/**
	 * Render the admin page for this plugin.
	 */
	public function display_plugin_admin_page() {
		include_once 'views/admin.php';
	}

	/**
	 * Render the import export page for this plugin.
	 */
	public function display_import_export_page() {
		include_once 'views/import-export.php';
	}

	/**
	 * Render the StoreApps Marketplace page.
	 */
	public function display_sa_marketplace_page() {
		include_once STOCKDIR . 'sa-includes/class-wsm-storeapps-marketplace.php';
		WSM_StoreApps_Marketplace::init();
	}

	/**
	 * Render the setting page for this plugin.
	 */
	public function display_log_page() {
		if ( ! empty( $this->product_id ) ) { // If found, we are on stock log history page.
			include_once 'views/log-history.php';
		} else {
			include_once 'views/log.php';
		}
	}

	/**
	 * Function to show notice in the admin.
	 */
	public function wsm_add_subscribe_notice() {
		$wsm_dismiss_admin_notice = get_option( 'wsm_dismiss_subscribe_admin_notice', false );

		if ( empty( $wsm_dismiss_admin_notice ) ) {
			?>
			<style type="text/css" class="wsm-subscribe">
				#wsm_promo_msg {
					display: block !important;
					background-color: #f2f6fc;
					border-left-color: #5850ec;
				}
				#wsm_promo_msg table {
					width: 100%;
					padding-bottom: 0.25em;
				}
				#wsm_dashicon {
					padding: 0.5em;
					width: 3%;
				}
				#wsm_promo_msg_content {
					padding: 0.5em;
				}
				#wsm_promo_msg .dashicons.dashicons-awards {
					font-size: 5em;
					color: #b08d57;
					margin-left: -0.2em;
					margin-bottom: 0.65em;
				}
				.wsm_headline {
					padding: 0.5em 0;
					font-size: 1.4em;
				}
				form.wsm_klawoo_subscribe {
					padding: 0.5em 0;
					margin-block-end: 0 !important;
					font-size: 1.1em;
				}
				form.wsm_klawoo_subscribe #email {
					width: 14em;
					height: 1.75em;
				}
				form.wsm_klawoo_subscribe #wsm_gdpr_agree {
					margin-left: 0.5em;
					vertical-align: sub;
				}
				form.wsm_klawoo_subscribe .wsm_gdpr_label {
					margin-right: 0.5em;
				}
				form.wsm_klawoo_subscribe #wsm_submit {
					font-size: 1.3em;
					line-height: 0em;
					margin-top: 0;
					font-weight: bold;
					background: #5850ec;
					border-color: #5850ec;
				}
				.wsm_success {
					font-size: 1.5em;
					font-weight: bold;
				}
			</style>
			<div id="wsm_promo_msg" class="updated fade">
				<table>
					<tbody> 
						<tr>
							<td id="wsm_dashicon"> 
								<span class="dashicons dashicons-awards"></span>
							</td> 
							<td id="wsm_promo_msg_content">
								<div class="wsm_headline">Get latest hacks & tips to better manage your store using Stock Manager for WooCommerce!</div>
								<form name="wsm_klawoo_subscribe" class="wsm_klawoo_subscribe" action="#" method="POST" accept-charset="utf-8">									
									<input type="email" class="regular-text ltr" name="email" id="email" placeholder="Your email address" required="required" />
									<input type="checkbox" name="wsm_gdpr_agree" id="wsm_gdpr_agree" value="1" required="required" />
									<label for="wsm_gdpr_agree" class="wsm_gdpr_label">I have read and agreed to your <a href="https://www.storeapps.org/privacy-policy/?utm_source=wsm&utm_medium=in_app_subscribe&utm_campaign=in_app_subscribe" target="_blank">Privacy Policy</a>.</label>
									<input type="hidden" name="list" value="3pFQTnTsH763gAKTuvOGhPzA"/>
									<?php wp_nonce_field( 'sa-wsm-subscribe', 'sa_wsm_sub_nonce' ); ?>
									<input type="submit" name="submit" id="wsm_submit" class="button button-primary" value="Subscribe" />
								</form>
							</td>
							</tr>
					</tbody> 
				</table> 
			</div>
			<?php
		}
	}

	/**
	 * Function to ask to review the plugin in footer
	 *
	 * @param  string $wsm_rating_text Text in footer (left).
	 * @return string $wsm_rating_text
	 */
	public function wsm_footer_text( $wsm_rating_text ) {

		$is_wsm_admin = is_wsm_admin_page();
		if ( $is_wsm_admin ) {
			/* translators: %1$s & %2$s: Opening & closing strong tag. %3$s: link to Stock Manager for WooCommerce on WordPress.org */
			$wsm_rating_text = sprintf( __( 'If you are liking %1$sStock Manager for WooCommerce%2$s, please rate us %3$s. A huge thanks from StoreApps in advance!', 'woocommerce-stock-manager' ), '<strong>', '</strong>', '<a target="_blank" href="' . esc_url( 'https://wordpress.org/support/plugin/woocommerce-stock-manager/reviews/?filter=5' ) . '" style="color: #5850EC;">5-star</a>' );
		}

		return $wsm_rating_text;

	}

	/**
	 * Function to show installed version of the plugin
	 *
	 * @param  string $wsm_text Text in footer (right).
	 * @return string $wsm_text
	 */
	public function wsm_update_footer_text( $wsm_text ) {

		$is_wsm_admin = is_wsm_admin_page();
		if ( $is_wsm_admin ) {
			$wsm_text = 'Installed Version: ' . WSM_PLUGIN_VERSION;
			?>
			<style type="text/css">
				#wpfooter {
					position: unset;
				}
				#wpfooter #footer-upgrade {
					color: #5850EC;
				}
			</style>
			<?php
		}

		return $wsm_text;

	}

	/**
	 * Render the pricing page.
	 */
	public function display_pricing_page() {
		if ( ! file_exists( __DIR__ . '/includes/class-wsm-in-app-pricing.php' ) ) {
			return;
		}
		include_once __DIR__ . '/includes/class-wsm-in-app-pricing.php';
	}

	/**
	 * Get the display name of the current user or a fallback value.
	 *
	 * @param string $fallback The fallback value to use if the user's display name is not set. Default is 'there'.
	 * @return string|false The display name of the current user or false if user not exist.
	 */
	public static function get_current_user_display_name( $fallback = 'there' ) {
		if ( ( empty( $fallback ) ) ) {
			$fallback = _x( 'there', 'default display name', 'woocommerce-stock-manager' );
		}
		$current_user = wp_get_current_user();
		if ( ! $current_user->exists() ) {
			return false;
		}
		return ( ( ! empty( $current_user->display_name ) ) ) ? $current_user->display_name : $fallback;
	}

	/**
	 * Function to handle admin notices.
	 */
	public static function add_admin_notices() {
		if ( '1' === get_option( 'sa_wsm_dismiss_in_app_pricing_notice' ) ) {
			return;
		}
		$current_user_display_name = self::get_current_user_display_name();
		if ( ( empty( $_GET['page'] ) ) || ( ! in_array( sanitize_text_field( wp_unslash( $_GET['page'] ) ), array( 'stock-manager', 'stock-manager-import-export', 'stock-manager-log' ), true ) ) || ( empty( $current_user_display_name ) ) ) { // phpcs:ignore
			return;
		}
		?>
		<style type="text/css">
			.wsm_in_app_pricing_notice {
				width: 50%;
				background-color: rgb(204 251 241 / 82%) !important;
				margin-top: 1em !important;
				margin-bottom: 1em !important;
				padding: 1em;
				box-shadow: 0 0 7px 0 rgba(0, 0, 0, .2);
				font-size: 1.1em;
				margin: 0 auto;
				text-align: center;
				border-bottom-right-radius: 0.25rem;
				border-bottom-left-radius: 0.25rem;
				border-top: 4px solid #508991 !important;
			}
			.wsm_main_headline {
				font-size: 1.7em;
				color: rgb(55 65 81);
				opacity: 0.9;
			}
			.wsm_main_headline .dashicons.dashicons-awards {
				font-size: 3em;
				color: #508991;
				width: unset;
				line-height: 3rem;
				margin-right: 0.1em;
			}
			.wsm_sub_headline {
				font-size: 1.2em;
				color: rgb(55 65 81);
				line-height: 1.3em;
				opacity: 0.8;
			}
		</style>
		<div class="wsm_in_app_pricing_notice">
			<div class="wsm_container">
				<div class="wsm_main_headline">
					<span class="dashicons dashicons-awards"></span>
					<span>
						<?php
						echo wp_kses_post(
							sprintf(// translators: %s: discount string.
								_x( 'Our best-seller Smart Manager Pro – up to <strong style="font-size:1.75rem;">%s</strong>', 'upgrade notice', 'woocommerce-stock-manager' ),
								esc_html( '60% off!' )
							)
						);
						?>
					</span>
				</div>
				<div class="wsm_sub_headline" style="margin: 0.75rem 0 0 .5em !important;">
					<?php
					echo wp_kses_post(
						sprintf(// translators: %s: pricing page link.
							_x( 'Get <strong>all Stock Manager features + Bulk Edit</strong> + more. %s.', 'upgrade notice', 'woocommerce-stock-manager' ),
							'<a style="color: rgb(55 65 81);" href="' . esc_url( admin_url( 'admin.php?page=stock-manager-pricing' ) ) . '" target="_blank">' .
							esc_html_x( 'Click here', 'upgrade notice', 'woocommerce-stock-manager' ) . '</a>'
						)
					);
					?>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Function to add Css for GO Pro sub menu icon
	 */
	public function go_pro_submenu_icon_css() {
		?>
		<style type="text/css">
			@keyframes beat {
				to { transform: scale(1.1); }
			}
			.wsm_pricing_icon {
				animation: beat .25s infinite alternate;
				transform-origin: center;
				color: #ea7b00;
				display: inline-block;
				font-size: 1.5em;
			}
		</style>
		<?php
	}
}//end class
