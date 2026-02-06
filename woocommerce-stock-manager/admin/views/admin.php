<?php
/**
 * Admin page to mount Stock Manager.
 *
 * @package  woocommerce-stock-manager/admin/views
 * @version  2.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<?php class_exists( 'Stock_Manager_Admin' ) && is_callable( array( 'Stock_Manager_Admin', 'add_admin_notices' ) ) && Stock_Manager_Admin::add_admin_notices(); ?>
	<div id="woocommerce-stock-manager-app"></div>  
</div>
<?php
