<?php
	$filter_object = new \TUTOR\Course_Filter();

	$filter_prices = array(
		'free' => __( 'Free', 'tutor' ),
		'paid' => __( 'Paid', 'tutor' ),
	);

	$course_levels     = tutor_utils()->course_levels();
	$supported_filters = tutor_utils()->get_option( 'supported_course_filters', array() );
	$supported_filters = array_keys( $supported_filters );
	$reset_link		   = remove_query_arg( $supported_filters, get_pagenum_link() );
?>
<form class="tutor-course-filter-form tutor-form">
	<div class="tutor-mb-16 tutor-d-block tutor-d-lg-none tutor-text-right">
		<a href="#" class="tutor-iconic-btn tutor-mr-n8" tutor-hide-course-filter><span class="tutor-icon-times" area-hidden="true"></span></a>
	</div>

	<?php do_action( 'tutor_course_filter/before' ); ?>
	
	<?php if ( in_array( 'search', $supported_filters ) ) : ?>
		<div class="tutor-widget tutor-widget-search">
			<div class="tutor-form-wrap">
				<span class="tutor-icon-search tutor-form-icon" area-hidden="true"></span>
				<input type="Search" class="tutor-form-control" name="keyword" placeholder="<?php esc_attr_e( 'Search...', 'tutor' ); ?>"/>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( in_array( 'category', $supported_filters ) ) : ?>
		<div class="tutor-widget tutor-widget-course-categories tutor-mt-48">
			<h3 class="tutor-widget-title">
				<?php esc_html_e( 'Category', 'tutor' ); ?>
			</h3>

			<div class="tutor-widget-content">
				<ul class="tutor-list">
					<?php $filter_object->render_terms( 'category' ); ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( in_array( 'tag', $supported_filters ) ) : ?>
		<div class="tutor-widget tutor-widget-course-tags tutor-mt-48">
			<h3 class="tutor-widget-title">
				<?php esc_html_e( 'Tag', 'tutor' ); ?>
			</h3>

			<div class="tutor-widget-content">
				<ul class="tutor-list">
					<?php $filter_object->render_terms( 'tag' ); ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( in_array( 'difficulty_level', $supported_filters ) ) : ?>
		<div class="tutor-widget tutor-widget-course-levels tutor-mt-48">
			<h3 class="tutor-widget-title">
				<?php esc_html_e( 'Level', 'tutor' ); ?>
			</h3>

			<div class="tutor-widget-content">
				<ul class="tutor-list">
				<?php
					$key = '';
					foreach ( $course_levels as  $value => $title ) :
					if ( $key == 'all_levels' ) {
						continue;
					}
				?>
					<li class="tutor-list-item">
						<label>
							<input type="checkbox" class="tutor-form-check-input" id="<?php echo esc_html( $value ); ?>" name="tutor-course-filter-level" value="<?php echo esc_html( $value ); ?>"/>
							<?php esc_html_e( $title ); ?>
						</label>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<?php
		$is_membership = get_tutor_option( 'monetize_by' ) == 'pmpro' && tutor_utils()->has_pmpro();
		if ( ! $is_membership && in_array( 'price_type', $supported_filters ) ) :
	?>
	<div class="tutor-widget tutor-widget-course-price tutor-mt-48">
		<h3 class="tutor-widget-title">
			<?php _e( 'Price', 'tutor' ); ?>
		</h3>

		<div class="tutor-widget-content">
			<ul class="tutor-list">
			<?php foreach ( $filter_prices as $value => $title ) : ?>
				<div class="tutor-list-item">
					<label>
						<input type="checkbox" class="tutor-form-check-input" id="<?php echo esc_html( $value ); ?>" name="tutor-course-filter-price" value="<?php echo esc_html( $value ); ?>"/>
						<?php esc_html_e( $title ); ?>
					</label>
				</div>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php endif; ?>

	<div class="tutor-widget tutor-widget-course-filter tutor-mt-32">
		<div class="tutor-widget-content">
			<a href="#" class="tutor-btn tutor-btn-outline-primary tutor-btn-sm" onclick="window.location.replace('<?php echo $reset_link; ?>')" action-tutor-clear-filter>
				<i class="tutor-icon-times tutor-mr-8"></i> <?php esc_html_e( 'Clear All Filters', 'tutor' ); ?>
			</a>
		</div>
	</div>
	<?php do_action( 'tutor_course_filter/after' ); ?>
</form>