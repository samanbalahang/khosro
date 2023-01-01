<?php
/**
 * Frontend course builder
 *
 * @since v2.0.7
 *
 * @package Tutor\CourseBuilder
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use TUTOR\Input;

$course_id = Input::get( 'course_ID', 0, Input::TYPE_INT );
global $post;
if ( ! $course_id || tutor()->course_post_type != get_post_type( $post ) ) {
	$args = array(
		'headline'    => __( 'Permission Denied', 'tutor-pro' ),
		'message'     => __( 'You don\'t have the right to edit this course', 'tutor-pro' ),
		'description' => __( 'Please make sure you are logged in to correct account', 'tutor-pro' ),
		'button'      => array(
			'url'  => get_permalink( $course_id ),
			'text' => __( 'View Course', 'tutor-pro' ),
		),
	);

	tutor_load_template( 'permission-denied', $args );
	return;
}


$can_publish_course = (bool) tutor_utils()->get_option( 'instructor_can_publish_course' ) || current_user_can( 'administrator' );

$course_slug      = $post->post_name;
$course_permalink = get_the_permalink();
?>

<?php
if ( ! tutor_utils()->is_instructor( get_current_user_id(), true ) || ! tutor_utils()->can_user_edit_course( get_current_user_id(), $course_id ) ) {
	$args = array(
		'headline'    => __( 'Permission Denied', 'tutor-pro' ),
		'message'     => __( 'You don\'t have the right to edit this course', 'tutor-pro' ),
		'description' => __( 'Please make sure you are logged in to correct account', 'tutor-pro' ),
		'button'      => array(
			'url'  => get_permalink( $course_id ),
			'text' => __( 'View Course', 'tutor-pro' ),
		),
	);

	tutor_load_template( 'permission-denied', $args );
	return;
}
?>

<?php do_action( 'tutor/dashboard_course_builder_before' ); ?>
<form action="" id="tutor-frontend-course-builder" method="post" enctype="multipart/form-data">
	<?php
		wp_nonce_field( tutor()->nonce_action, tutor()->nonce );
	if ( $post->post_status === 'draft' ) {
		?>
		<input name="original_publish" type="hidden" id="original_publish" value="Publish">
	<?php } ?>


	<!-- Sticky header with course action buttons -->
	<header class="tutor-dashboard-builder-header tutor-mb-32">
		<div class="tutor-container-fluid">
			<div class="tutor-row tutor-align-center">
				<div class="tutor-col-auto">
					<div class="tutor-dashboard-builder-header-left">
						<div class="tutor-dashboard-builder-logo">
							<?php $tutor_course_builder_logo_src = apply_filters( 'tutor_course_builder_logo_src', tutor()->url . 'assets/images/tutor-logo.png' ); ?>
							<img src="<?php echo esc_url( $tutor_course_builder_logo_src ); ?>" alt="">
						</div>
					</div>
				</div>
				
				<div class="tutor-col tutor-mt-12 tutor-mb-12">
					<div class="tutor-dashboard-builder-header-right tutor-d-flex tutor-align-center tutor-justify-end">
						<?php if ( 'draft' === $post->post_status || 'auto-draft' === $post->post_status ) : ?>
							<a href="#" id="tutor-course-save-draft" class="tutor-btn tutor-btn-ghost tutor-btn-md tutor-mr-20" name="course_submit_btn" value="save_course_as_draft">
								<i class="tutor-icon-save-line tutor-mr-8" area-hidden="true"></i>
								<?php _e( 'Save as Draft', 'tutor-pro' ); ?>
							</a>
						<?php endif; ?>

						<a class="tutor-btn tutor-btn-secondary tutor-btn-md" href="<?php echo esc_url( get_the_permalink( $course_id ) ); ?>" target="_blank">
							<?php _e( 'Preview', 'tutor-pro' ); ?>
						</a>

						<?php if ( $can_publish_course ) : ?>
							<button class="tutor-btn tutor-btn-primary tutor-btn-md tutor-ml-20 tutor-static-loader" type="submit" name="course_submit_btn" value="publish_course">
								<?php _e( 'Publish', 'tutor-pro' ); ?>
							</button>
						<?php else : ?>
							<button class="tutor-btn tutor-btn-primary tutor-btn-md tutor-ml-20" type="submit" name="course_submit_btn" value="submit_for_review" title="<?php _e( 'Submit for Review', 'tutor-pro' ); ?>">
								<?php _e( 'Submit', 'tutor-pro' ); ?>
							</button>
						<?php endif; ?>

						<a href="<?php echo tutor_utils()->tutor_dashboard_url(); ?>" class="tutor-iconic-btn tutor-iconic-btn-md tutor-ml-12" title="<?php _e( 'Exit', 'tutor-pro' ); ?>"><i class="tutor-icon-times" area-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Course builder body -->
	<div class="tutor-container">
		<div class="tutor-row">
			<div class="tutor-col-12 tutor-col-lg-8 tutor-mb-32 tutor-pr-32">
				<input type="hidden" value="tutor_add_course_builder" name="tutor_action" />
				<input type="hidden" name="course_ID" id="course_ID" value="<?php echo get_the_ID(); ?>">
				<input type="hidden" name="post_ID" id="post_ID" value="<?php echo get_the_ID(); ?>">

				<!--since 1.8.0 alert message -->
				<?php
				$user_id = get_current_user_id();
				$expires = get_user_meta( $user_id, 'tutor_frontend_course_message_expires', true );
				$message = get_user_meta( $user_id, 'tutor_frontend_course_action_message', true );

				if ( $message && $expires && $expires > time() ) {
					$show_modal = $message['show_modal'];
					$message    = $message['message'];

					if ( ! $show_modal ) {
						?>
						<div class="tutor-alert tutor-alert-info">
							<?php echo $message; ?>
						</div>
					<?php } else { ?>
						<!-- @todo: move to toast -->
						<div id="modal-course-save-feedback" class="tutor-modal tutor-is-active">
							<span class="tutor-modal-overlay"></span>
							<div class="tutor-modal-window tutor-modal-window-md">
								<div class="tutor-modal-content tutor-modal-content-white">
									<button class="tutor-iconic-btn tutor-modal-close-o" data-tutor-modal-close>
										<span class="tutor-icon-times" area-hidden="true"></span>
									</button>

									<div class="tutor-modal-body tutor-text-center">
										<div class="tutor-py-48">
											<img class="tutor-d-inline-block" src="<?php echo tutor()->url; ?>assets/images/icon-cup.svg" />
											<div class="tutor-fs-3 tutor-fw-medium tutor-color-black tutor-mb-12"><?php _e( 'Thank You!', 'tutor-pro' ); ?></div>
											<div class="tutor-fs-6 tutor-color-muted"><?php echo $message; ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script>
							const alertBox = document.getElementById('modal-course-save-feedback');
							setTimeout(() => {
								if (alertBox) alertBox.classList.remove('tutor-is-active');
							}, 5000)
						</script>
						<?php
					}
				}

				if ( $message || $expires ) {
					delete_user_meta( $user_id, 'tutor_frontend_course_message_expires' );
					delete_user_meta( $user_id, 'tutor_frontend_course_action_message' );
				}
				?>
				<!--alert message end -->
				<?php do_action( 'tutor/dashboard_course_builder_form_field_before' ); ?>

				<div class="tutor-course-builder-section tutor-course-builder-info">
					<div class="tutor-course-builder-section-title">
						<span class="tutor-fs-5 tutor-fw-bold tutor-color-secondary">
							<i class="color-text-brand tutor-icon-angle-up tutor-fs-5" area-hidden="true"></i>
							<span><?php esc_html_e( 'Course Info', 'tutor-pro' ); ?></span>
						</span>
					</div>
					<!--.tutor-course-builder-section-title-->
					<div class="tutor-course-builder-section-content">
						<div class="tutor-mb-32">
							<label class="tutor-course-field-label tutor-fs-6 tutor-color-black"><?php _e( 'Course Title', 'tutor-pro' ); ?></label>
							<div id="tutor-course-create-title-tooltip-wrapper" class="tooltip-wrap tutor-d-block">
								<span class="tooltip-txt tooltip-right tutor-mt-12">
									<?php _e( '255', 'tutor-pro' ); ?>
								</span>
								<input id="tutor-course-create-title" type="text" name="title" class="tutor-form-control" value="<?php echo get_the_title(); ?>" placeholder="<?php _e( 'ex. Learn Photoshop CS6 from scratch', 'tutor-pro' ); ?>" maxlength="255">
							</div>
						</div>
						<div class="tutor-mb-32">
							<label class="tutor-course-field-label tutor-fs-6 tutor-color-black"><?php _e( 'Course Slug', 'tutor-pro' ); ?></label>
							<div id="tutor-course-create-slug-tooltip-wrapper" class="tooltip-wrap tutor-d-block">
								<span class="tooltip-txt tooltip-right tutor-mt-12">
									<?php _e( '255', 'tutor-pro' ); ?>
								</span>
								<input id="tutor-course-slug" type="text" name="post_name" class="tutor-form-control" placeholder="<?php _e( 'Please enter the course page slug here', 'tutor-pro' ); ?>" value="<?php echo esc_html( $course_slug ); ?>" maxlength="255">
								<div class="tutor-fs-7 tutor-has-icon tutor-color-muted tutor-mt-12">
									<?php esc_html_e( 'Permalink: ', 'tutor-pro' ); ?>
									<a href="<?php echo esc_url( $course_permalink ); ?>" target="_blank">
										<?php echo esc_url( $course_permalink ); ?>
									</a>
								</div>
							</div>
						</div>

						<div class="tutor-mb-32">
							<label class="tutor-course-field-label tutor-fs-6 tutor-color-black"><?php _e( 'About Course', 'tutor-pro' ); ?></label>
							<div class="tutor-mb-16">
								<?php
								$editor_settings = array(
									'media_buttons' => false,
									'quicktags'     => false,
									'editor_height' => 150,
									'textarea_name' => 'content',
									'statusbar'     => false,
								);
								wp_editor( $post->post_content, 'course_description', $editor_settings );
								?>
							</div>
						</div>

						<?php do_action( 'tutor/frontend_course_edit/after/description', $post ); ?>

						<div class="tutor-frontend-builder-item-scope">
							<div class="tutor-form-group">
								<label class="tutor-form-label tutor-fs-6">
									<?php _e( 'Choose a category', 'tutor-pro' ); ?>
								</label>
								<div class="tutor-form-field-course-categories">
									<?php
									// echo tutor_course_categories_checkbox($course_id);
									echo tutor_course_categories_dropdown( $course_id, array( 'classes' => 'tutor_select2' ) );
									?>
								</div>
							</div>
						</div>

						<?php do_action( 'tutor/frontend_course_edit/after/category', $post ); ?>

						<?php
						$monetize_by = tutils()->get_option( 'monetize_by' );
						if ( $monetize_by === 'wc' || $monetize_by === 'edd' ) {
							$course_price             = tutor_utils()->get_raw_course_price( get_the_ID() );
							$currency_symbol          = tutor_utils()->currency_symbol();
							$_tutor_course_price_type = tutils()->price_type();
							?>
							<div class="tutor-course-price-wrapper tutor-mb-32 tutor-row tutor-align-center">
								<div class="tutor-mb-20">
									<div class="tutor-course-field-label tutor-fs-6 tutor-mb-3"><?php _e('Course Price', 'tutor'); ?></div>
									<div class="tutor-d-flex tutor-mt-20 tutor-course-price-toggle">
										<div class="tutor-form-check tutor-align-center">
											<input type="radio" id="tutor_input_price_free" class="tutor-form-check-input tutor-flex-shrink-0" name="tutor_course_price_type" value="free" <?php $_tutor_course_price_type ? checked($_tutor_course_price_type, 'free') : checked('true', 'true'); ?> />
											<label for="tutor_input_price_free" class="tutor-fs-6">
												<?php _e('Free', 'tutor'); ?>
											</label>
										</div>
										<div class="tutor-form-check tutor-align-center">
											<input type="radio" id="tutor_input_price_paid" class="tutor-form-check-input tutor-flex-shrink-0" name="tutor_course_price_type" value="paid" <?php checked($_tutor_course_price_type, 'paid'); ?> />
											<label for="tutor_input_price_paid" class="tutor-fs-6">
												<?php _e('Paid', 'tutor'); ?>
											</label>
										</div>
									</div>
								</div>
								<div class="tutor-mb-12">
									<div class="tutor-course-price-row tutor-row <?php echo $_tutor_course_price_type === 'paid' ? 'is-paid tutor-mb-20': null ?>">
										<div class="tutor-col-6 tutor-col-sm-6 tutor-col-lg-4 tutor-course-price-row-regular">
											<div class="tutor-form-label">Regular Price</div>
											<div class="tutor-form-check tutor-align-center tutor-d-flex">
												<label for="tutor_price_paid" class="tutor-amount-field">
													<div class="tutor-input-group">
														<span class="tutor-input-group-addon">
															<?php echo $currency_symbol; ?>
														</span>
														<input type="number" class="tutor-form-number-verify tutor-form-control" name="course_price" value="<?php echo $course_price->regular_price; ?>" placeholder="<?php _e('Set course price', 'tutor'); ?>" step="any" min="0" pattern="^\d*(\.\d{0,2})?$">
													</div>
												</label>
											</div>
										</div>
										<div class="tutor-col-6 tutor-col-sm-6 tutor-col-lg-6 tutor-course-price-paid">
											<div class="tutor-form-label">Discounted Price</div>
											<div class="tutor-form-check tutor-align-center tutor-d-flex">
												<label class="tutor-amount-field">
													<div class="tutor-input-group">
														<span class="tutor-input-group-addon">
															<?php echo $currency_symbol; ?>
														</span>
														<input type="number" class="tutor-form-number-verify tutor-form-control" name="course_sale_price" value="<?php echo $course_price->sale_price; ?>" placeholder="<?php _e('Set course sale price', 'tutor'); ?>" step="any" min="0" pattern="^\d*(\.\d{0,2})?$">
													</div>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>

						<div class="tutor-mb-32">
							<label class="tutor-course-field-label tutor-fs-6"><?php _e( 'Course Thumbnail', 'tutor-pro' ); ?></label>
							<div class="tutor-mb-16">
								<?php
								tutor_load_template_from_custom_path(
									tutor()->path . '/views/fragments/thumbnail-uploader.php',
									array(
										'media_id'    => get_post_thumbnail_id( $course_id ),
										'input_name'  => 'tutor_course_thumbnail_id',
										'placeholder' => tutor()->url . '/assets/images/thumbnail-placeholder.svg',
										'borderless'  => true,
										'background'  => '#E3E6EB',
										'border'      => '#E3E6EB',
									),
									false
								);
								?>
							</div>
						</div>
						<?php do_action( 'tutor/frontend_course_edit/after/thumbnail', $post ); ?>
					</div>
				</div>

				<?php do_action( 'tutor/dashboard_course_builder_form_field_after', $post ); ?>

			</div>

			<!-- Course builder tips right sidebar -->
			<div class="tutor-col-12 tutor-col-lg-4 tutor-mb-32 tutor-pl-40">
				<div class="tutor-course-builder-upload-tips">
					<h3 class="tutor-fs-5 tutor-fw-medium tutor-color-secondary tutor-mb-20">
						<?php _e( 'Course Upload Tips', 'tutor-pro' ); ?>
					</h3>
					<ul>
						<li class="tutor-mb-20"><?php _e( 'Set the Course Price option or make it free.', 'tutor-pro' ); ?></li>
						<li class="tutor-mb-20"><?php _e( 'Standard size for the course thumbnail is 700x430.', 'tutor-pro' ); ?></li>
						<li class="tutor-mb-20"><?php _e( 'Video section controls the course overview video.', 'tutor-pro' ); ?></li>
						<li class="tutor-mb-20"><?php _e( 'Course Builder is where you create & organize a course.', 'tutor-pro' ); ?></li>
						<li class="tutor-mb-20"><?php _e( 'Add Topics in the Course Builder section to create lessons, quizzes, and assignments.', 'tutor-pro' ); ?></li>
						<li class="tutor-mb-20"><?php _e( 'Prerequisites refers to the fundamental courses to complete before taking this particular course.', 'tutor-pro' ); ?></li>
						<li class="tutor-mb-20"><?php _e( 'Information from the Additional Data section shows up on the course single page.', 'tutor-pro' ); ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</form>
<?php do_action( 'tutor/dashboard_course_builder_after' ); ?>
