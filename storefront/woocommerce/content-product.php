<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'custom-shop-page', $product ); ?>>
	<div class="shop-list card">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	
	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	echo woocommerce_get_product_thumbnail("Full");
	// do_action( 'woocommerce_before_shop_loop_item_title' );
	echo "
	<div class='card-body'>
	<div class='breadcrumbs'>
		<p>
			محصولات
			<i class='fas fa-caret-left'></i>
			" .
			get_the_terms($post->ID, 'product_cat')[0]->name
			. "
			<i class='fas fa-caret-left'></i>
			" .
			get_the_title()
			. "
		</p>
	</div>";
	?>
	
	
	<?php
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );




	?>
	<hr>
	<p class="excerpt-prograph">
	<?php
 		echo get_the_excerpt();
	?>
	</p>
		</div><!-- card-body -->
		<div class="card-footer text-muted d-flex justify-content-end p-0 mt-auto shop-page">
			<div class="bg-semi-dark">
			<?php
				/**
				 * Hook: woocommerce_after_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
				echo "</div><!--<div class='bg-semi-dark left-cart-footer'>-->";
				/**
				 * Hook: woocommerce_after_shop_loop_item.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				// do_action( 'woocommerce_after_shop_loop_item' );
				echo "</a>";
			?>
		</div><!-- card-footer -->
		
	</div><!-- card -->
</li>
