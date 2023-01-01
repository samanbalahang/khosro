<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop');
// get_header( 'base' );
?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content_sam');
?>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>
	<header class="single-product-header">
		<?php
		echo
		$product->get_categories(
			', ',
			'<span class="posted_in">'
				. _n(
					'',
					'',
					sizeof(get_the_terms($post->ID, 'product_cat')),
					'woocommerce'
				) . ' ',
			'</span><span class="d-inline-block mx-1"> > </span><span>' . get_the_title() . ' </span>'
		);

		?>
		<h1>
			<?php
			echo get_the_title();
			?>
		</h1>
	</header>
	<?php wc_get_template_part('content', 'single-product'); ?>

<?php endwhile; // end of the loop. 
?>
</section>

<section id="download" class="mt-3 product-blue-download">
	<header class="text-center">
		<i class="fas fa-download"></i>
		بخش دانلود
	</header>
	<div class="card">
		<div class="card-body">
			<div class="w-100">
				<div class="custom-price-show-btn">
					<div class="product-page-custom-price-label">
						<p>
							قیمت:
						</p>
					</div>
					<div class="product-page-custom-price">
						<?php
						$product = wc_get_product(get_the_ID());
						$product->get_regular_price();
						$product->get_sale_price();
						echo $product->get_price();

						?>
					</div>
				</div>
				<div class="d-flex align-items-center">
					<a href="#" class="product-direct-download">
						<div class="d-flex justify-contenr-start align-items-stretch direct-download-link">
							<div class="arreow down d-flex align-items-center">
								<i class="fas fa-arrow-alt-circle-down"></i>
							</div>
							<div class="link">
								دانلود با لینک مستقیم
							</div>
						</div>
					</a>
					<p class="lighter-text mx-3 my-0">
						تعداد: <input type="number" class="custome-pruduct-number" min="1" max="1" value="1">
					</p>
				</div>
			</div>
			<div class="d-flex justify-content-between">
				<a href="#" class="light-hover-btn">گزارش خرابی لینک</a>
				<a href="#" class="light-hover-btn">راهنمای دانلود</a>
			</div>
		</div>
	</div>
</section>
<section id="passwordSection" class="password-section">
	<header>
		<p>
			رمز تمامی فایل ها : password
		</p>
		<button class="copycode" id="copycode">
			کپی کنید
		</button>
	</header>
	<footer>
		<p>
			رمز را می توانید کپی کنید ، به کوچک بودن و فاصله حروف در هنگام تایپ دقت کنید.
		</p>
	</footer>
</section>
<section id="socialSection" class="social-section">
	<p>
		اشتراک گذاری در شبکه های اجتماعی
	</p>
	<div class="d-flex justify-content-between col-3 social-icons">
		<i class="fab fa-telegram-plane"></i>
		<i class="fab fa-google-plus-g"></i>
		<i class="fab fa-twitter"></i>
		<i class="fab fa-whatsapp"></i>
		<i class="fab fa-facebook-f"></i>
	</div>
</section>
<section id="suggest" class="suggest">
	<div class="card">
		<div class="card-header">
			<p>
				مطالب پیشنهادی
			</p>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-6 p-0">
						<?php
						$args = array(
							'orderby' => 'rand',
							'posts_per_page' => '3'
						);
						$the_query = new WP_Query($args);
						// output the random post
						?>
						<ul>
							<?php
							$theNow = date("Y-m-d");
							$start_datetime = new DateTime($theNow);
							// var_dump($start_datetime);


							while ($the_query->have_posts()) : $the_query->the_post();
								echo '<li class="light-hover-li">';
								the_title();
								echo "<br> <span class='lighter-text'>";
								$stimes = get_post_timestamp();
								$dtime = date('m/d/Y', $stimes);
								$times = strtotime($dtime);
								$datetime_2 = date('Y-m-d', $times);
								$diff = $start_datetime->diff(new DateTime($datetime_2));
								echo $diff->days . "روز پیش";
								echo '</span></li>';
							endwhile;
							?>
						</ul>
						<?php
						// Reset Post Data
						wp_reset_postdata();
						?>
					</div>
					<div class="col-12 col-md-6 p-0">
						<?php
						$args = array(
							'orderby' => 'rand',
							'posts_per_page' => '3'
						);
						$the_query = new WP_Query($args);
						// output the random post
						?>
						<ul>
							<?php
							$theNow = date("Y-m-d");
							$start_datetime = new DateTime($theNow);
							// var_dump($start_datetime);


							while ($the_query->have_posts()) : $the_query->the_post();
								echo '<li class="light-hover-li">';
								the_title();
								echo "<br> <span class='lighter-text'>";
								$stimes = get_post_timestamp();
								$dtime = date('m/d/Y', $stimes);
								$times = strtotime($dtime);
								$datetime_2 = date('Y-m-d', $times);
								$diff = $start_datetime->diff(new DateTime($datetime_2));
								echo $diff->days . "روز پیش";
								echo '</span></li>';
							endwhile;
							?>
						</ul>
						<?php
						// Reset Post Data
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>


		</div>
	</div>
</section>
<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content_sam');
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 * 	do_action( 'woocommerce_sidebar' );
 */

?>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
