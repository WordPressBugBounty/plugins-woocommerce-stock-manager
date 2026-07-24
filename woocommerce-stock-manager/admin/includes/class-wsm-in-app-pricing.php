<?php
/**
 * Class for in app pricing page.
 *
 * @package   woocommerce-stock-manager/admin/includes/
 * @version   1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Class for pricing page.
 */
class WSM_In_App_Pricing {
	/**
	 * Instance of this class.
	 *
	 * @var      object
	 */
	protected static $instance = null;
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
	 * Initialize the class.
	 */
	private function __construct() {
		if ( ( empty( $_GET['page'] ) ) || ( 'stock-manager-pricing' !== sanitize_text_field( wp_unslash( $_GET['page'] ) ) ) ) {// phpcs:ignore
			return;
		}
		$this->display_pricing_page();
	}

	/**
	 * Display pricing page HTML.
	 */
	public function display_pricing_page() {
		?>
		<div id="wsm_in_app_pricing">
			<!-- Discount Banner -->
			<section class="bg-indigo-600 text-white text-center py-0.5 px-4">
				<p class="text-xl sm:text-xl font-bold leading-none">
					<?php echo esc_html( _x( '🎉 25% Off on Smart Manager Pro (Auto-applied at checkout)!', 'discount banner', 'woocommerce-stock-manager' ) ); ?>
				</p>
			</section>

			<!-- Hero Section -->
			<section class="max-w-3xl mx-auto mt-8 text-center px-4">
				<h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
					<?php echo esc_html( _x( 'Cut store management work from hours to minutes', 'hero heading', 'woocommerce-stock-manager' ) ); ?>
				</h1>
				<p class="mt-3 text-lg text-gray-600 max-w-4xl mx-auto">
					<?php echo esc_html( _x( 'Save hours on store management with bulk editing, advanced search, automation, and powerful WooCommerce productivity tools.', 'hero description', 'woocommerce-stock-manager' ) ); ?>
				</p>
			</section>

			<!-- Testimonial -->
			<section class="max-w-4xl pt-2 mx-auto mb-10">
				<div class="flex items-center justify-center gap-4">
					<img src="<?php echo esc_url( 'https://www.storeapps.org/wp-content/uploads/2026/05/david-shotscope.jpg' ); ?>" alt="<?php echo esc_attr( _x( 'David Hunter ShotScope', 'image alt', 'woocommerce-stock-manager' ) ); ?>" class="w-16 h-16 rounded-full object-cover flex-shrink-0" />
					<p class="text-lg text-gray-500 italic">
						<?php
						echo wp_kses_post(
							_x(
								'"With Smart Manager\'s Bulk Edit, Export, and Custom Views, we <strong>save more than 10 hours every month</strong> on stock and price updates alone. The time saved helps us focus on driving marketing campaigns throughout the golf season."',
								'testimonial quote',
								'woocommerce-stock-manager'
							)
						);
						?>
						<span class="mx-4 text-gray-600"><?php echo esc_html( _x( '– David Hunter, CEO, Shot Scope', 'testimonial author', 'woocommerce-stock-manager' ) ); ?></span>
					</p>
				</div>
			</section>

			<!-- Pricing Tabs + Cards Section -->
			<div id="sm_price_column_container" class="mt-12 mx-auto lg:max-w-3xl px-4">

				<!-- Pill Tab Switcher -->
				<div class="flex justify-center mb-8">
					<div class="inline-flex items-center gap-1 bg-gray-100 border border-gray-200 rounded-full p-1 shadow-sm">
						<!-- Annual Tab -->
						<button
							id="wsm-tab-annual"
							class="cursor-pointer px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 focus:outline-none bg-indigo-600 text-white shadow"
							onclick="wsmSwitchPricingTab('annual')"
						>
							<?php echo esc_html( _x( 'Annual', 'pricing tab', 'woocommerce-stock-manager' ) ); ?>
						</button>

						<!-- Lifetime Tab -->
						<button
							id="wsm-tab-lifetime"
							class="cursor-pointer inline-flex items-center gap-2 px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 focus:outline-none text-gray-500 hover:text-gray-700"
							onclick="wsmSwitchPricingTab('lifetime')"
						>
							<?php echo esc_html( _x( 'Lifetime', 'pricing tab', 'woocommerce-stock-manager' ) ); ?>
							<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-amber-400 text-amber-900" style="font-size:11px;">
								<?php echo esc_html( _x( 'One-time', 'pricing tab badge', 'woocommerce-stock-manager' ) ); ?>
							</span>
						</button>
					</div>
				</div>

				<!-- Annual Cards -->
				<div id="wsm-panel-annual" class="grid gap-4 lg:grid-cols-2 lg:gap-8 items-end">
					<!-- 1 Site Annual -->
					<div class="bg-white rounded-xl border border-gray-200 p-5 text-center shadow-lg">
						<h3 class="text-xl font-medium text-gray-500 m-0"><?php echo esc_html( _x( '1 Site', 'pricing card', 'woocommerce-stock-manager' ) ); ?></h3>
						<div class="flex items-baseline justify-center gap-2 mt-5">
							<span class="text-2xl text-gray-400 line-through"><?php echo esc_html( _x( '$199', 'pricing', 'woocommerce-stock-manager' ) ); ?></span>
							<span class="text-4xl font-bold text-gray-700">
								<?php echo esc_html( ( defined( 'SA_WSM_OFFER_VISIBLE' ) && SA_WSM_OFFER_VISIBLE === true ) ? _x( '$79', 'pricing', 'woocommerce-stock-manager' ) : _x( '$149', 'pricing', 'woocommerce-stock-manager' ) ); ?>
							</span>
						</div>
						<p class="text-base text-gray-500 mt-1"><?php echo esc_html( _x( 'Billed annually', 'pricing', 'woocommerce-stock-manager' ) ); ?></p>
						<a href="<?php echo esc_url( 'https://www.storeapps.org/?buy-now=18694&qty=1' . ( ( defined( 'SA_WSM_OFFER_VISIBLE' ) && SA_WSM_OFFER_VISIBLE === true ) ? '' : '&coupon=sm-25off' ) . '&page=722&with-cart=1&utm_source=wsm&utm_medium=in_app_pricing&utm_campaign=single_annual' ); ?>" class="block mt-5 w-full px-4 py-3 text-white font-medium text-base bg-indigo-600 rounded-lg no-underline hover:bg-indigo-500">
							<?php echo esc_html( _x( 'Buy Now →', 'pricing cta', 'woocommerce-stock-manager' ) ); ?>
						</a>
					</div>

					<!-- 5 Sites Annual - Best Seller -->
					<div class="relative">
						<div class="absolute -top-3 left-0 right-0 text-center z-10">
							<span class="inline-flex px-3 py-1 text-xs font-semibold text-white uppercase bg-indigo-600 rounded-full">
								<?php echo esc_html( _x( 'Best Seller', 'pricing badge', 'woocommerce-stock-manager' ) ); ?>
							</span>
						</div>
						<div class="bg-indigo-50 rounded-xl border-2 border-indigo-600 p-5 text-center shadow-lg">
							<h3 class="text-xl font-medium text-gray-500 m-0"><?php echo esc_html( _x( '5 Sites', 'pricing card', 'woocommerce-stock-manager' ) ); ?></h3>
							<div class="flex items-baseline justify-center gap-2 mt-5">
								<span class="text-2xl text-gray-400 line-through"><?php echo esc_html( _x( '$249', 'pricing', 'woocommerce-stock-manager' ) ); ?></span>
								<span class="text-4xl font-bold text-gray-700">
									<?php echo esc_html( ( defined( 'SA_WSM_OFFER_VISIBLE' ) && SA_WSM_OFFER_VISIBLE === true ) ? _x( '$99', 'pricing', 'woocommerce-stock-manager' ) : _x( '$187', 'pricing', 'woocommerce-stock-manager' ) ); ?>
								</span>
							</div>
							<p class="text-base text-gray-500 mt-1"><?php echo esc_html( _x( 'Billed annually', 'pricing', 'woocommerce-stock-manager' ) ); ?></p>
							<a href="<?php echo esc_url( 'https://www.storeapps.org/?buy-now=18693&qty=1' . ( ( defined( 'SA_WSM_OFFER_VISIBLE' ) && SA_WSM_OFFER_VISIBLE === true ) ? '' : '&coupon=sm-25off' ) . '&page=722&with-cart=1&utm_source=wsm&utm_medium=in_app_pricing&utm_campaign=multi_annual' ); ?>" class="block mt-5 w-full px-4 py-3 text-white font-medium text-base bg-indigo-600 rounded-lg no-underline hover:bg-indigo-500">
								<?php echo esc_html( _x( 'Buy Now →', 'pricing cta', 'woocommerce-stock-manager' ) ); ?>
							</a>
						</div>
					</div>
				</div>

				<!-- Lifetime Cards -->
				<div id="wsm-panel-lifetime" class="grid gap-4 lg:grid-cols-2 lg:gap-8 items-end" style="display:none!important">
					<!-- 1 Site Lifetime -->
					<div class="bg-white rounded-xl border border-gray-200 p-5 text-center shadow-lg">
						<h3 class="text-xl font-medium text-gray-500 m-0"><?php echo esc_html( _x( '1 Site', 'pricing card', 'woocommerce-stock-manager' ) ); ?></h3>
						<div class="flex items-baseline justify-center gap-2 mt-5">
							<span class="text-2xl text-gray-400 line-through"><?php echo esc_html( _x( '$549', 'pricing', 'woocommerce-stock-manager' ) ); ?></span>
							<span class="text-4xl font-bold text-gray-700"><?php echo esc_html( _x( '$412', 'pricing', 'woocommerce-stock-manager' ) ); ?></span>
						</div>
						<p class="text-base text-gray-500 mt-1"><?php echo esc_html( _x( 'Pay once, use forever', 'pricing', 'woocommerce-stock-manager' ) ); ?></p>
						<a href="<?php echo esc_url( 'https://www.storeapps.org/?buy-now=86835&qty=1' . ( ( defined( 'SA_WSM_OFFER_VISIBLE' ) && SA_WSM_OFFER_VISIBLE === true ) ? '' : '&coupon=sm-25off-l' ) . '&page=722&with-cart=1&utm_source=wsm&utm_medium=in_app_pricing&utm_campaign=single_lifetime' ); ?>" class="block mt-5 w-full px-4 py-3 text-white font-medium text-base bg-indigo-600 rounded-lg no-underline hover:bg-indigo-500">
							<?php echo esc_html( _x( 'Buy Now →', 'pricing cta', 'woocommerce-stock-manager' ) ); ?>
						</a>
					</div>

					<!-- 5 Sites Lifetime -->
					<div class="relative">
						<div class="bg-white rounded-xl border border-gray-200 p-5 text-center shadow-lg">
							<h3 class="text-xl font-medium text-gray-500 m-0"><?php echo esc_html( _x( '5 Sites', 'pricing card', 'woocommerce-stock-manager' ) ); ?></h3>
							<div class="flex items-baseline justify-center gap-2 mt-5">
								<span class="text-2xl text-gray-400 line-through"><?php echo esc_html( _x( '$599', 'pricing', 'woocommerce-stock-manager' ) ); ?></span>
								<span class="text-4xl font-bold text-gray-700"><?php echo esc_html( _x( '$449', 'pricing', 'woocommerce-stock-manager' ) ); ?></span>
							</div>
							<p class="text-base text-gray-500 mt-1"><?php echo esc_html( _x( 'Pay once, use forever', 'pricing', 'woocommerce-stock-manager' ) ); ?></p>
							<a href="<?php echo esc_url( 'https://www.storeapps.org/?buy-now=86836&qty=1' . ( ( defined( 'SA_WSM_OFFER_VISIBLE' ) && SA_WSM_OFFER_VISIBLE === true ) ? '' : '&coupon=sm-25off-l' ) . '&page=722&with-cart=1&utm_source=wsm&utm_medium=in_app_pricing&utm_campaign=multi_lifetime' ); ?>" class="block mt-5 w-full px-4 py-3 text-white font-medium text-base bg-indigo-600 rounded-lg no-underline hover:bg-indigo-500">
								<?php echo esc_html( _x( 'Buy Now →', 'pricing cta', 'woocommerce-stock-manager' ) ); ?>
							</a>
						</div>
					</div>
				</div>

				<script>
				function wsmSwitchPricingTab(tab) {
					var tabs    = ['annual', 'lifetime'];
					var active  = {btn:'bg-indigo-600 text-white shadow', inactive:'text-gray-500 hover:text-gray-700'};

					tabs.forEach(function(t) {
						var btn   = document.getElementById('wsm-tab-' + t);
						var panel = document.getElementById('wsm-panel-' + t);
						if (!btn || !panel) return;

						if (t === tab) {
							btn.className   = btn.className.replace('text-gray-500 hover:text-gray-700', '').trim() + ' bg-indigo-600 text-white shadow';
							panel.style.cssText = '';
						} else {
							btn.className   = btn.className.replace('bg-indigo-600 text-white shadow', '').trim() + ' text-gray-500 hover:text-gray-700';
							panel.style.cssText = 'display:none!important';
						}
					});
				}
				</script>

			</div>

			<!-- Credibility Boosters -->
			<section class="lg:max-w-3xl mx-auto mt-6 px-4">
				<div class="flex flex-col sm:flex-row items-center justify-around gap-4 border border-gray-200 rounded-xl bg-white shadow-sm px-6 py-4">
					<!-- Paying Stores -->
					<div class="flex items-center gap-3">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"></path>
						</svg>

						<div>
							<p class="text-xl font-extrabold text-gray-900 leading-tight m-0"><?php echo esc_html( _x( '15,000+', 'credibility booster', 'woocommerce-stock-manager' ) ); ?></p>
							<p class="text-sm text-gray-500 m-0"><?php echo esc_html( _x( 'Active Stores', 'credibility booster', 'woocommerce-stock-manager' ) ); ?></p>
						</div>
					</div>

					<div class="hidden sm:block w-px h-10 bg-gray-200"></div>

					<!-- Reviews -->
					<div class="flex items-center gap-3">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
						</svg>
						<div>
							<p class="text-xl font-extrabold text-gray-900 leading-tight m-0"><?php echo esc_html( _x( '4.4', 'credibility booster', 'woocommerce-stock-manager' ) ); ?></p>
							<p class="text-sm text-gray-500 m-0"><?php echo esc_html( _x( '280+ Reviews', 'credibility booster', 'woocommerce-stock-manager' ) ); ?></p>
						</div>
					</div>

					<div class="hidden sm:block w-px h-10 bg-gray-200"></div>
					<!-- Years in Business -->
					<div class="flex items-center gap-3">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
						</svg>
						<div>
							<p class="text-xl font-extrabold text-gray-900 leading-tight m-0"><?php echo esc_html( _x( '15 Years', 'credibility booster', 'woocommerce-stock-manager' ) ); ?></p>
							<p class="text-sm text-gray-500 m-0"><?php echo esc_html( _x( 'In Business', 'credibility booster', 'woocommerce-stock-manager' ) ); ?></p>
						</div>
					</div>
				</div>
			</section>

			<!-- Feature Comparison Section -->
			<section class="mt-12 sm:mt-16 lg:mt-16">
				<div class="mt-8 max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
					<div class="lg:text-center">
						<p class="text-base font-semibold leading-6 tracking-wide text-indigo-600 uppercase"><?php echo esc_html( _x( 'Stock Manager’s Future is Uncertain – Switch to Smart Manager Pro', 'section subheading', 'woocommerce-stock-manager' ) ); ?></p>
						<h2 class="mt-2 text-3xl font-extrabold leading-8 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
							<?php echo esc_html( _x( 'All Stock Manager features + Bulk Edits, Delete, Duplicate...', 'Subheading: feature list', 'woocommerce-stock-manager' ) ); ?>
						</h2>
						<p class="max-w-3xl mt-4 text-xl leading-7 text-gray-500 lg:mx-auto">
							<?php
							/* Translators: Message about upgrading to Smart Manager Pro */
							echo wp_kses_post(
								_x(
									'With growing demand for bulk editing and complete store management, we’re considering shutting down the Stock Manager plugin. <strong>Upgrade to Smart Manager Pro plugin</strong> now for all-in-one store control, boost productivity and save your time.',
									'Paragraph: upgrade explanation with strong tag',
									'woocommerce-stock-manager'
								)
							);
							?>
						</p>
					</div>
					<div class="text-center pt-2 mx-auto lg:pt-2 max-w-4xl">
						<div class="py-2 align-center sm:px-6 lg:px-8">
							<div class="overflow-hidden border border-gray-200 rounded">
								<table class="bg-gray-50 md:min-w-full divide-y divide-gray-200">
									<thead>
										<tr>
											<th class="px-3 py-3 xl:px-4 text-center"><?php echo esc_html( _x( 'FEATURES', 'table header', 'woocommerce-stock-manager' ) ); ?></th>
											<th class="px-3 py-3 xl:px-4 text-center border-l border-gray-200"><?php echo esc_html( _x( 'STOCK MANAGER', 'table header', 'woocommerce-stock-manager' ) ); ?></th>
											<th class="px-3 py-3 xl:px-4 text-center border-l border-gray-200"><?php echo esc_html( _x( 'SMART MANAGER PRO', 'table header', 'woocommerce-stock-manager' ) ); ?></th>
										</tr>
									</thead>
									<tbody class="bg-gray-50 leading-5 text-gray-700 divide-y divide-gray-200">
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Supported Post Types', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'Products (Stock)', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo wp_kses_post( _x( 'Products (Stock), Orders, Coupons, Pages, Media, Users, SEO plugins, WooCommerce Subscriptions, Bookings, Memberships, Product Add-ons, Brands... <strong>all WordPress custom post types and their custom fields</strong>.', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( '10+ Supported Languages', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo wp_kses_post( _x( 'Chinese, Dutch, French, German, Italian, Japanese, Russian, Spanish…', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Interface', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'Table', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'Excel-like spreadsheet', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Import & Export Products', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'Only stock specific columns', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'All product related columns - including custom fields', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Inline (Direct) Editing', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Show/Hide Admin Columns', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Product Stock Log (Product History)', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Simple Search', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Bulk Edit/Batch Update', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Undo Inline and Bulk Edits', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Schedule Bulk Edits', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Advanced Search Filters', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Saved Searches and Saved Bulk Edits', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'AI-Powered Advanced Search for Products', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Delete', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong> <?php echo esc_html( _x( 'Products, Orders, Coupons and Other Post Types', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Export', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong> <?php echo esc_html( _x( 'Products, Orders, Coupons and Other Post Types', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Scheduled CSV Exports for WooCommerce Orders', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Duplicate', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong> <?php echo esc_html( _x( 'Products, Orders, Coupons and Other Post Types', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Create Column Sets/Custom Views', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Print PDF Invoices', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Print Packing Slips for Orders In Bulk', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Log for Any Post Type', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'User-Role/User-Based Dashboard Restrictions', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'View Customer Lifetime Value (LTV)', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><strong><?php echo esc_html( _x( 'Manage Custom Taxonomies', 'feature row', 'woocommerce-stock-manager' ) ); ?></strong></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Rename Admin Column Headers', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Auto-generate product SKUs', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Manage Unattached Media', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'WPML compatibility', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">—</td>
											<td class="px-3 py-4 xl:px-6 text-green-500 border-l border-gray-200">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 m-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
											</td>
										</tr>
										<tr>
											<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Support', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'WordPress Forum', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'Email, Phone, Video Calls', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
										</tr>
										<tr>
											<td class="px-3 py-8 font-medium xl:px-6"><?php echo esc_html( _x( 'Pricing', 'feature row', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( 'Free', 'feature value', 'woocommerce-stock-manager' ) ); ?></td>
											<td class="px-3 py-4 xl:px-6 border-l border-gray-200">
												<a href="#sm_price_column_container" class="px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline no-underline"><?php echo esc_html( _x( 'Buy Smart Manager Pro', 'buy button', 'woocommerce-stock-manager' ) ); ?> &rarr;</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Three Testimonials Section -->
			<section class="mt-8 mx-auto lg:max-w-5xl lg:grid lg:grid-cols-3 lg:gap-5 px-4">
				<div class="border rounded-lg px-4 pt-2 pb-4 mt-4 lg:mt-0">
					<p class="mt-0 mb-0 text-xl font-semibold text-gray-700 leading-tight"><?php echo esc_html( _x( '"Smart Manager is a life-saver!"', 'testimonial title', 'woocommerce-stock-manager' ) ); ?></p>
					<p class="mt-2 text-sm"><?php echo wp_kses_post( _x( 'The plugin has saved me HOURS (maybe even days) of work! It <strong>makes tedious tasks really simple and quick</strong>. The support team is fantastic too. Totally worth purchasing the premium version.', 'testimonial content', 'woocommerce-stock-manager' ) ); ?></p>
					<div class="flex items-center mt-2 text-sm text-gray-800">
						<img src="<?php echo esc_url( 'https://www.storeapps.org/wp-content/uploads/2019/04/bbcreamgirl.png' ); ?>" alt="<?php echo esc_attr( _x( 'The BBCream Girl', 'testimonial author', 'woocommerce-stock-manager' ) ); ?>" class="w-8 h-8 mr-3 rounded-full" />
						<span><?php echo esc_html( _x( 'The BBCream Girl', 'testimonial author', 'woocommerce-stock-manager' ) ); ?></span>
					</div>
				</div>
				<div class="border rounded-lg px-4 pt-2 pb-4 mt-4 lg:mt-0">
					<p class="mt-0 mb-0 text-xl font-semibold text-gray-700 leading-tight"><?php echo esc_html( _x( '"Scaled 500+ products with bulk editing"', 'testimonial title', 'woocommerce-stock-manager' ) ); ?></p>
					<p class="mt-2 text-sm"><?php echo esc_html( _x( 'Smart Manager plugin lets me add and update entire product lines in minutes. Managing such a rapidly expanding catalog would be impossible with the traditional WooCommerce product editor.', 'testimonial content', 'woocommerce-stock-manager' ) ); ?></p>
					<div class="flex items-center mt-2 text-sm text-gray-800">
						<img src="<?php echo esc_url( 'https://www.storeapps.org/wp-content/uploads/2025/01/nicolai-grut.jpg' ); ?>" alt="<?php echo esc_attr( _x( 'Nicolai Grut', 'testimonial author', 'woocommerce-stock-manager' ) ); ?>" class="w-8 h-8 mr-3 rounded-full" />
						<span><?php echo esc_html( _x( 'Nicolai Grut', 'testimonial author', 'woocommerce-stock-manager' ) ); ?></span>
					</div>
				</div>
				<div class="border rounded-lg px-4 pt-2 pb-4 mt-4 lg:mt-0">
					<p class="mt-0 mb-0 text-xl font-semibold text-gray-700 leading-tight"><?php echo esc_html( _x( '"20 or 30 times quicker store management"', 'testimonial title', 'woocommerce-stock-manager' ) ); ?></p>
					<p class="mt-2 text-sm"><?php echo esc_html( _x( 'I\'ve got over 200 products and dreaded managing them one by one. Smart Manager Pro plugin lets me do this so much quicker, probably 20 or 30 times quicker. It is an absolutely invaluable tool.', 'testimonial content', 'woocommerce-stock-manager' ) ); ?></p>
					<div class="flex items-center mt-2 text-sm text-gray-800">
						<img src="<?php echo esc_url( 'https://www.storeapps.org/wp-content/uploads/2019/04/bryan-batcher.jpeg' ); ?>" alt="<?php echo esc_attr( _x( 'Brian Batcher', 'testimonial author', 'woocommerce-stock-manager' ) ); ?>" class="w-8 h-8 mr-3 rounded-full" />
						<span><?php echo esc_html( _x( 'Brian Batcher', 'testimonial author', 'woocommerce-stock-manager' ) ); ?></span>
					</div>
				</div>
			</section>

			<!-- Time Comparison Section -->
			<section class="mt-12 max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
				<div class="lg:text-center">
					<p class="text-base font-semibold leading-6 tracking-wide text-indigo-600 uppercase"><?php echo esc_html( _x( 'Scale your output, not your hours', 'section subheading', 'woocommerce-stock-manager' ) ); ?></p>
					<h2 class="mt-2 text-3xl font-extrabold leading-8 tracking-tight text-gray-900 sm:text-4xl sm:leading-10"><?php echo esc_html( _x( 'Accomplish 60 hours of work in 6 minutes', 'section heading', 'woocommerce-stock-manager' ) ); ?></h2>
					<p class="max-w-3xl mt-4 text-xl leading-7 text-gray-500 lg:mx-auto"><?php echo wp_kses_post( _x( 'Stop opening each product to edit price, stock, category, description, and other data. <strong>Switch to Smart Manager Pro and spend your time wisely.</strong> Say goodbye to frustration, stress, and calculation errors that keep piling up.', 'section description', 'woocommerce-stock-manager' ) ); ?></p>
				</div>
				<div class="text-center pt-2 mx-auto lg:pt-2 max-w-4xl">
					<div class="py-2 align-center sm:px-6 lg:px-8">
						<div class="overflow-hidden border border-gray-200 rounded">
							<table class="bg-gray-50 md:min-w-full divide-y divide-gray-200">
								<thead>
									<tr>
										<th class="text-base border-gray-200"><?php echo esc_html( _x( 'Mundane store tasks', 'table header', 'woocommerce-stock-manager' ) ); ?></th>
										<th class="text-base border-l border-gray-200 p-1"><?php echo esc_html( _x( 'Without using Smart Manager Pro', 'table header', 'woocommerce-stock-manager' ) ); ?></th>
										<th class="text-base border-l border-gray-200 px-3 py-3 xl:px-4 text-center"><?php echo esc_html( _x( 'Using Smart Manager Pro', 'table header', 'woocommerce-stock-manager' ) ); ?></th>
									</tr>
								</thead>
								<tbody class="bg-gray-50 leading-5 text-gray-700 divide-y divide-gray-200">
									<tr>
										<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Add one new product or edit details', 'task row', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '3 mins', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '30 seconds (Inline edit)', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
									</tr>
									<tr>
										<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Open and edit 1000s of products one-by-one', 'task row', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '3 hours – 30 hours', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '2 mins (Bulk edit)', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
									</tr>
									<tr>
										<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Search any record to make edits', 'task row', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '3 mins', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '1 min (Search & Edit)', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
									</tr>
									<tr>
										<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Create 1000s of duplicates', 'task row', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '3 hours – 30 hours', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '2 mins (Duplicate)', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
									</tr>
									<tr>
										<td class="px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Search and delete products', 'task row', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '3 mins', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html( _x( '1 min (Search & Delete)', 'time value', 'woocommerce-stock-manager' ) ); ?></td>
									</tr>
									<tr>
										<td class="text-base px-3 py-4 xl:px-6"><?php echo esc_html( _x( 'Time spent', 'summary row', 'woocommerce-stock-manager' ) ); ?></td>
										<td class="text-base px-3 py-4 xl:px-6 border-l border-gray-200"><strong><?php echo esc_html( _x( '≈ 6 hours – 60 hours', 'time value', 'woocommerce-stock-manager' ) ); ?></strong></td>
										<td class="text-base px-3 py-4 xl:px-6 border-l border-gray-200"><strong><?php echo esc_html( _x( '≈ 6 minutes', 'time value', 'woocommerce-stock-manager' ) ); ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="space-y-2">
					<p class="mt-8 max-w-xl mx-auto text-lg text-gray-600"><?php echo wp_kses_post( _x( 'Most tools support only one or a handful of post types. Smart Manager gives you <strong>total control</strong> over Products, Orders, Users, Subscriptions, and 100+ WordPress and WooCommerce post types from one place.', 'benefit text', 'woocommerce-stock-manager' ) ); ?></p>
					<p class="mt-4 max-w-xl mx-auto text-lg text-gray-600"><?php echo wp_kses_post( _x( 'Stop paying for a stack of disconnected plugins and the operational cost of switching between them. Invest in Smart Manager Pro that <strong>pays for itself in hours saved</strong>.', 'benefit text', 'woocommerce-stock-manager' ) ); ?></p>
					<p class="max-w-xl mx-auto text-lg text-gray-600">
						<a href="#sm_price_column_container" class="mt-4 flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline no-underline"><?php echo esc_html( _x( 'Upgrade to Smart Manager Pro', 'cta button', 'woocommerce-stock-manager' ) ); ?> &rarr;</a>
					</p>
				</div>
			</section>

			<!-- Confidence Section -->
			<section class="max-w-screen-xl px-4 pt-12 pb-16 mx-auto sm:pt-16 sm:pb-20 sm:px-6 lg:pt-12 lg:pb-28 lg:px-8">
				<h2 class="text-3xl font-extrabold leading-9 text-gray-900"><?php echo esc_html( _x( 'Buy with confidence – you\'re in good hands', 'confidence heading', 'woocommerce-stock-manager' ) ); ?></h2>
				<div class="pt-10 mt-6 border-t-2 border-gray-100">
					<dl class="md:grid md:grid-cols-2 md:gap-8">
						<div>
							<dt class="text-lg font-medium leading-6 text-gray-900"><?php echo esc_html( _x( 'You\'re buying from the best!', 'subheading reputation', 'woocommerce-stock-manager' ) ); ?></dt>
							<dd class="mt-2 text-base leading-6 text-gray-500">
								<p class="text-base"><?php echo esc_html( _x( 'Rest assured that you will be well taken care of when you buy from StoreApps.', 'reputation message', 'woocommerce-stock-manager' ) ); ?></p>
								<ul class="mt-2 list-disc">
									<li><?php echo esc_html( _x( 'Top selling plugins for marketing and store management', 'reputation bullet', 'woocommerce-stock-manager' ) ); ?></li>
									<li><strong><?php echo esc_html( _x( 'Official WooCommerce', 'reputation bullet bold part', 'woocommerce-stock-manager' ) ); ?></strong> <?php echo esc_html( _x( 'and GoDaddy partner', 'reputation bullet', 'woocommerce-stock-manager' ) ); ?></li>
									<li><?php echo esc_html( _x( 'Founded in 2011, one of the early Woo third party developers', 'reputation bullet', 'woocommerce-stock-manager' ) ); ?></li>
									<li><strong><?php echo esc_html( _x( '45k+ paid stores,', 'reputation bullet bold part', 'woocommerce-stock-manager' ) ); ?></strong> <?php echo esc_html( _x( '300k+ users, millions of downloads', 'reputation bullet', 'woocommerce-stock-manager' ) ); ?></li>
									<li><?php echo esc_html( _x( 'Consistent 5 star review ratings', 'reputation bullet', 'woocommerce-stock-manager' ) ); ?></li>
									<li><?php echo esc_html( _x( 'WordPress', 'reputation bullet', 'woocommerce-stock-manager' ) ); ?> <strong><?php echo esc_html( _x( 'community contributor', 'reputation bullet bold part', 'woocommerce-stock-manager' ) ); ?></strong>, <?php echo esc_html( _x( 'sponsor, speaker.', 'reputation bullet', 'woocommerce-stock-manager' ) ); ?></li>
								</ul>
								<p><img src="<?php echo esc_url( 'https://www.storeapps.org/wp-content/uploads/2018/11/trust-badge-guaranteed-safe-checkout-300-grey.png' ); ?>" alt="<?php echo esc_attr( _x( 'Guaranteed Safe Checkout', 'image alt', 'woocommerce-stock-manager' ) ); ?>" width="300" height="96" class="mt-6" /></p>
							</dd>
						</div>
						<div class="relative mt-12 md:mt-0">
							<dt class="text-lg font-medium leading-6 text-gray-900"><?php echo esc_html( _x( 'Friendly support from top quality developers', 'support heading', 'woocommerce-stock-manager' ) ); ?></dt>
							<dd class="mt-2 text-base leading-6 text-gray-500">
								<p class="text-base"><?php echo esc_html( _x( 'Our plugins are easy to use. We also have ample documentation. But whenever you need further assistance, you will get support from the same people who develop these plugins! We make sure you succeed!', 'support description', 'woocommerce-stock-manager' ) ); ?></p>
								<p><img src="<?php echo esc_url( 'https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-1024x402.png' ); ?>" alt="<?php echo esc_attr( _x( 'StoreApps team is on your side', 'image alt', 'woocommerce-stock-manager' ) ); ?>" width="980" height="385" srcset="<?php echo esc_attr( 'https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-1024x402.png 1024w, https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-450x177.png 450w, https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-300x118.png 300w, https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-768x301.png 768w, https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful.png 1491w' ); ?>" sizes="(max-width: 980px) 100vw, 980px" class="mt-6 lg:absolute lg:bottom-0" /></p>
							</dd>
						</div>
					</dl>
				</div>
			</section>
		</div>
		<?php
	}
}
WSM_In_App_Pricing::get_instance();
