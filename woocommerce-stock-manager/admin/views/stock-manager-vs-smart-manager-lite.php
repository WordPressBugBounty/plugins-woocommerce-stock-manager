<?php
/**
 * Template for Stock Manager vs Smart Manager Lite comparison page.
 *
 * @package Smart_Manager
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="wrap">
	<div id="wsm_in_app_pricing" class="relative" style="position: relative;">
		<section class="bg-indigo-600 text-white text-center py-0.5 px-4 relative" style="position: relative;">
			<p class="text-xl sm:text-xl font-bold leading-none"><?php echo esc_html_x( 'Stock Manager vs Smart Manager Lite', 'stock manager comparison page title', 'woocommerce-stock-manager' ); ?></p>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=stock-manager' ) ); ?>" class="absolute top-1/2 right-4 -translate-y-1/2 text-white hover:text-gray-200 text-2xl font-bold leading-none no-underline z-50 cursor-pointer" style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); color: #ffffff; font-size: 24px; line-height: 1; text-decoration: none;" title="<?php echo esc_attr_x( 'Close', 'close comparison page title', 'woocommerce-stock-manager' ); ?>">&times;</a>
		</section>
		<section class="mt-12">
			<div class="mt-8 max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
				<div class="lg:text-center">
					<h1 class="mt-2 text-3xl font-extrabold leading-8 tracking-tight text-gray-900 sm:text-4xl sm:leading-10"><?php echo esc_html_x( 'Why WooCommerce Stores Choose Smart Manager Lite', 'stock manager comparison main heading', 'woocommerce-stock-manager' ); ?></h1>
					<p class="max-w-3xl mt-4 text-xl leading-7 text-gray-500 lg:mx-auto"><?php echo esc_html_x( 'See how our Smart Manager Lite plugin goes beyond basic stock management and helps you manage your WooCommerce store more efficiently.', 'stock manager comparison subtitle', 'woocommerce-stock-manager' ); ?></p>
				</div>
				<div class="text-center pt-2 mx-auto lg:pt-2 max-w-4xl">
					<div class="py-2 align-center sm:px-6 lg:px-8">
						<div class="overflow-hidden border border-gray-200 rounded">
						<table class="bg-gray-50 md:min-w-full divide-y divide-gray-200">
							<thead>
								<tr>
									<th class="py-4 border-l border-gray-200"><?php echo esc_html_x( 'Features', 'comparison table header', 'woocommerce-stock-manager' ); ?></th>
									<th class="py-4 border-l border-gray-200"><?php echo esc_html_x( 'STOCK MANAGER (FREE)', 'comparison table header', 'woocommerce-stock-manager' ); ?></th>
									<th class="py-4 border-l border-gray-200 px-3 py-3 xl:px-4 text-center"><?php echo esc_html_x( 'SMART MANAGER LITE (FREE)', 'comparison table header', 'woocommerce-stock-manager' ); ?></th>
								</tr>
							</thead>

							<tbody class="bg-gray-50 leading-5 text-gray-700 divide-y divide-gray-200">

								<tr>
									<td class="px-3 py-4 xl:px-6 font-semibold"><?php echo esc_html_x( 'Interface', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Table', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Excel-like spreadsheet', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6 font-semibold"><?php echo esc_html_x( 'Best suited for', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Stock management', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Store management', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>
								
								<tr>
									<td class="px-3 py-4 xl:px-6 font-semibold"><?php echo esc_html_x( '5-star reviews', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">90</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">230+</td>
								</tr>
								<tr>
									<td class="px-3 py-4 xl:px-6 font-semibold"><?php echo esc_html_x( 'Years in market', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">10</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">15</td>
								</tr>

								<tr>
									<td class="text-base px-3 py-4 xl:px-6 font-semibold bg-gray-100" colspan="3"><?php echo esc_html_x( 'Editable Post Types', 'comparison table category header', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Products & Variations', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Orders', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Coupons', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'WordPress Posts', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="text-base px-3 py-4 xl:px-6 font-semibold bg-gray-100" colspan="3"><?php echo esc_html_x( 'Product Edit & Management', 'comparison table category header', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Import Products', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Only stock-specific columns', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'All product columns, including custom fields', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Export Products', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Stock-related data', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Full product export or filtered export', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Inline (Direct) Editing', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Product Stock Log (Product History)', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Show / Hide Admin Columns', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Product Fields Supported', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( '12', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">50+</td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Custom Product Fields', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Add New Products', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Delete Products', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes (Move to Trash)', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Add Featured Images & Descriptions', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Edit Categories, Tags & Attributes', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="text-base px-3 py-4 xl:px-6 font-semibold bg-gray-100" colspan="3"><?php echo esc_html_x( 'Search & Filtering', 'comparison table category header', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Simple Search', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes (Pre-defined)', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Advanced Search (AND, <, >, =, <=, >=, contains...)', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Date & Attribute Filters', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="text-base px-3 py-4 xl:px-6 font-semibold bg-gray-100" colspan="3"><?php echo esc_html_x( 'Order, Coupon & Post Management', 'comparison table category header', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Management Features', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Inline Edit, Delete, Export & Advanced Search Filters', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Order Automation', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Status emails & transactional order notes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="text-base px-3 py-4 xl:px-6 font-semibold bg-gray-100" colspan="3"><?php echo esc_html_x( 'Compatibility & Support', 'comparison table category header', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Sync Stock Log from Stock Manager', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'WPML Compatibility', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200">-</td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Yes', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Languages', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'English', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Chinese, Dutch, French, German, Italian, Japanese, Russian, Spanish and more', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-4 xl:px-6"><?php echo esc_html_x( 'Help', 'comparison table feature', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'WordPress Forum', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
									<td class="px-3 py-4 xl:px-6 border-l border-gray-200"><?php echo esc_html_x( 'Email, Phone, Video Calls, WordPress Forum & Socials', 'comparison table feature value', 'woocommerce-stock-manager' ); ?></td>
								</tr>

								<tr>
									<td class="px-3 py-8 font-medium xl:px-6"></td>

									<td class="px-3 py-4 xl:px-6 border-l border-gray-200 text-center">
										
										<a href="<?php echo esc_url( admin_url( 'admin.php?page=stock-manager' ) ); ?>" class="text-base font-medium leading-6 underline">
											<?php echo esc_html_x( 'Back to Stock Manager', 'comparison table button', 'woocommerce-stock-manager' ); ?>
										</a>
									</td>

									<td class="px-3 py-4 xl:px-6 border-l border-gray-200 text-center">
										<a href="<?php echo esc_url( $iframe_url ); ?>" target="_blank" class="thickbox open-plugin-details-modal px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline no-underline"  aria-label ="<?php echo esc_attr( sprintf( 'More information about Smart Manager' ) ); ?>">
											<?php echo esc_html_x( 'Download Smart Manager Lite', 'comparison table button', 'woocommerce-stock-manager' ); ?>
										</a>
									</td>
								</tr>
							</tbody>
						</table>  
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="mt-8 mx-auto lg:max-w-5xl lg:grid lg:grid-cols-3 lg:gap-5">
			<div class="border rounded-lg px-4 pt-2 pb-4 mt-4 lg:mt-0">
				<p class="mt-0 mb-0 text-xl font-semibold text-gray-700 leading-tight"><?php echo esc_html_x( '"Does the job of 10 plugins"', 'testimonial title', 'woocommerce-stock-manager' ); ?></p>
				<p class="mt-2 text-sm"><?php echo esc_html_x( "I've been using another alternative, but it makes the site slower and needs 10 different plugins to do what Smart Manager does with one plugin. It's fast, lightweight, and lets me manage products, orders, and coupons without slowing down my site.", 'testimonial quote', 'woocommerce-stock-manager' ); ?></p>
				<div class="flex items-center mt-2 text-sm text-gray-800"><img src="https://www.storeapps.org/wp-content/uploads/2022/09/nuno-palha.jpeg" alt="<?php echo esc_attr_x( 'Nuno Palha', 'testimonial author name', 'woocommerce-stock-manager' ); ?>" class="w-8 h-8 mr-3 rounded-full"><span><?php echo esc_html_x( 'Nuno Palha', 'testimonial author name', 'woocommerce-stock-manager' ); ?></span></div>
			</div>
			<div class="border rounded-lg px-4 pt-2 pb-4 mt-4 lg:mt-0">
				<p class="mt-0 mb-0 text-xl font-semibold text-gray-700 leading-tight"><?php echo esc_html_x( '"Indispensable tool"', 'testimonial title', 'woocommerce-stock-manager' ); ?></p>
				<p class="mt-2 text-sm"><?php echo esc_html_x( 'Smart Manager exceeded my expectations. Whether I’m searching for specific products, categories, or attributes, the advanced search and filtering options make managing products faster, more accurate, and incredibly efficient.', 'testimonial quote', 'woocommerce-stock-manager' ); ?></p>
				<div class="flex items-center mt-2 text-sm text-gray-800"><img src="https://www.storeapps.org/wp-content/uploads/2024/04/mio-creativ-smart-manager-review.jpeg" alt="<?php echo esc_attr_x( 'Mio Creative', 'testimonial author name', 'woocommerce-stock-manager' ); ?>" class="w-8 h-8 mr-3 rounded-full"><span><?php echo esc_html_x( 'Mio Creative', 'testimonial author name', 'woocommerce-stock-manager' ); ?></span></div>
			</div>
			<div class="border rounded-lg px-4 pt-2 pb-4 mt-4 lg:mt-0">
				<p class="mt-0 mb-0 text-xl font-semibold text-gray-700 leading-tight"><?php echo esc_html_x( '"Smooth editing experience"', 'testimonial title', 'woocommerce-stock-manager' ); ?></p>
				<p class="mt-2 text-sm"><?php echo esc_html_x( 'Wow, I’ve been looking for something like this for a long time! The lite version is such an improvement to the product editing process. Instead of waiting for dozens of pages to load to update stock and pricing, it’s all right there on one page.', 'testimonial quote', 'woocommerce-stock-manager' ); ?></p>
				<div class="flex items-center mt-2 text-sm text-gray-800"><img src="https://www.storeapps.org/wp-content/uploads/2026/07/eckstein-smart-manager-review.png" alt="<?php echo esc_attr_x( 'Eckstein', 'testimonial author name', 'woocommerce-stock-manager' ); ?>" class="w-8 h-8 mr-3 rounded-full"><span><?php echo esc_html_x( 'Eckstein', 'testimonial author name', 'woocommerce-stock-manager' ); ?></span></div>
			</div>
		</section>
		<section class="mt-12 max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
			<div class="space-y-2">
				<p class="mt-8 max-w-xl mx-auto text-lg text-gray-600"><?php echo esc_html_x( 'Choose Stock Manager if you only need quick updates to basic product stock numbers and prices.', 'comparison callout text', 'woocommerce-stock-manager' ); ?></p>
				<p class="mt-4 max-w-xl mx-auto text-lg text-gray-600"><?php echo esc_html_x( 'Download Smart Manager if you want to speed up daily operations by managing orders, coupons, posts, and products all in one super-fast, reliable dashboard.', 'comparison callout text', 'woocommerce-stock-manager' ); ?></p>
				<p class="max-w-xl mx-auto text-lg text-gray-600"><a href="<?php echo esc_url( $iframe_url ); ?>" target="_blank" class="thickbox open-plugin-details-modal mt-4 flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline no-underline"  aria-label ="<?php echo esc_attr( sprintf( 'More information about Smart Manager' ) ); ?>"><?php echo esc_html_x( 'Download Smart Manager Lite →', 'comparison callout button', 'woocommerce-stock-manager' ); ?></a></p>
			</div>
		</section>
		<section class="max-w-screen-xl px-4 pt-12 pb-16 mx-auto sm:pt-16 sm:pb-20 sm:px-6 lg:pt-12 lg:pb-28 lg:px-8">
			<h2 class="text-3xl font-extrabold leading-9 text-gray-900"><?php echo esc_html_x( "Buy with confidence – you're in good hands", 'guarantee section heading', 'woocommerce-stock-manager' ); ?></h2>
			<div class="pt-10 mt-6 border-t-2 border-gray-100">
				<dl class="md:grid md:grid-cols-2 md:gap-8">
					<div>
						<dt class="text-lg font-medium leading-6 text-gray-900"><?php echo esc_html_x( "You're buying from the best!", 'guarantee title', 'woocommerce-stock-manager' ); ?></dt>
						<dd class="mt-2 text-base leading-6 text-gray-500">
							<p class="text-base"><?php echo esc_html_x( 'Rest assured that you will be well taken care of when you buy from StoreApps.', 'guarantee description', 'woocommerce-stock-manager' ); ?></p>
							<ul class="mt-2 list-disc">
								<li><?php echo esc_html_x( 'Top selling plugins for marketing and store management', 'guarantee bullet point', 'woocommerce-stock-manager' ); ?></li>
								<li><?php echo wp_kses_post( _x( '<strong>Official WooCommerce</strong> and GoDaddy partner', 'guarantee bullet point', 'woocommerce-stock-manager' ) ); ?></li>
								<li><?php echo esc_html_x( 'Founded in 2011, one of the early Woo third party developers', 'guarantee bullet point', 'woocommerce-stock-manager' ); ?></li>
								<li><?php echo wp_kses_post( _x( '<strong>45k+ paid stores,</strong> 300k+ users, millions of downloads', 'guarantee bullet point', 'woocommerce-stock-manager' ) ); ?></li>
								<li><?php echo esc_html_x( 'Consistent 5 star review ratings', 'guarantee bullet point', 'woocommerce-stock-manager' ); ?></li>
								<li><?php echo wp_kses_post( _x( 'WordPress <strong>community contributor</strong>, sponsor, speaker.', 'guarantee bullet point', 'woocommerce-stock-manager' ) ); ?></li>
							</ul>
							<p><img src="https://www.storeapps.org/wp-content/uploads/2018/11/trust-badge-guaranteed-safe-checkout-300-grey.png" alt="<?php echo esc_attr_x( 'Guaranteed Safe Checkout', 'trust badge alt text', 'woocommerce-stock-manager' ); ?>" width="300" height="96" class="mt-6"></p>
						</dd>
					</div>
					<div class="relative mt-12 md:mt-0">
						<dt class="text-lg font-medium leading-6 text-gray-900"><?php echo esc_html_x( 'Friendly support from top quality developers', 'support section title', 'woocommerce-stock-manager' ); ?></dt>
						<dd class="mt-2 text-base leading-6 text-gray-500">
							<p class="text-base"><?php echo esc_html_x( 'Our plugins are easy to use. We also have ample documentation. But whenever you need further assistance, you will get support from the same people who develop these plugins! We make sure you succeed!', 'support section description', 'woocommerce-stock-manager' ); ?></p>
							<p><img src="https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-1024x402.png" alt="<?php echo esc_attr_x( 'StoreApps team is on your side', 'support section image alt text', 'woocommerce-stock-manager' ); ?>" width="980" height="385" srcset="
								https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-1024x402.png 1024w,
								https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-450x177.png   450w,
								https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-300x118.png   300w,
								https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful-768x301.png   768w,
								https://www.storeapps.org/wp-content/uploads/2018/01/storeapps-team-support-options-chat-helpful.png          1491w
								" sizes="(max-width: 980px) 100vw, 980px" class="mt-6 lg:absolute lg:bottom-0"></p>
						</dd>
					</div>
				</dl>
			</div>
		</section>
	</div>
</div>
