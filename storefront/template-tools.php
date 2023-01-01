<?php
/**
 * The template for displaying custom Home width pages.
 *
 * Template Name: Tools Home
 *
 * @package storefront
 */

 defined( 'ABSPATH' ) || exit;

 get_header( 'shop' );
 
 /**
  * Hook: woocommerce_before_main_content.
  *
  * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
  * @hooked woocommerce_breadcrumb - 20
  * @hooked WC_Structured_Data::generate_website_data() - 30
  */
 do_action( 'woocommerce_before_main_content_khos' );

 ?>
 
 <header class="woocommerce-products-header">
	 <div class="header-bg-light">
	 <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		 <h1 class="woocommerce-products-header__title page-title"><?= get_the_title(); ?></h1>
	 <?php endif; ?>
 
	 <?php
	 /**
	  * Hook: woocommerce_archive_description.
	  *
	  * @hooked woocommerce_taxonomy_archive_description - 10
	  * @hooked woocommerce_product_archive_description - 10
	  */
	 do_action( 'woocommerce_archive_description' );
	 ?>
 
 <?php

 if ( woocommerce_product_loop() ) {
 
	 /**
	  * Hook: woocommerce_before_shop_loop.
	  *
	  * @hooked woocommerce_output_all_notices - 10
	  * @hooked woocommerce_result_count - 20
	  * @hooked woocommerce_catalog_ordering - 30
	  */
	 do_action( 'woocommerce_before_shop_loop' );
	 woocommerce_product_loop_start();
	 ?>
	<div class="container-fluid">
		<div class="row">

	
	 <?php

	 do_action( 'woocommerce_shop_loop_cat_sam');
	 ?>
	</div>
	</div>
	 <?php
	 woocommerce_product_loop_end();
 
	 /**
	  * Hook: woocommerce_after_shop_loop.
	  *
	  * @hooked woocommerce_pagination - 10
	  */
	 do_action( 'woocommerce_pagination-sam' );
 } else {
	 /**
	  * Hook: woocommerce_no_products_found.
	  *
	  * @hooked wc_no_products_found - 10
	  */
	 do_action( 'woocommerce_no_products_found' );
 }
 
 /**
  * Hook: woocommerce_after_main_content.
  *
  * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
  */
 do_action( 'woocommerce_after_main_content_sam' );
 
 /**
  * Hook: woocommerce_sidebar.
  *
  * @hooked woocommerce_get_sidebar - 10
  * do_action( 'woocommerce_sidebar' );
  */
 
 
 get_footer( 'shop' );
 