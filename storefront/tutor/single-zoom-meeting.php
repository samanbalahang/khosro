<?php
/**
 * Template for displaying single live meeting page
 *
 * @since v.1.7.1
 *
 * @author Themeum
 * @link https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.7.1
 */

get_tutor_header();

global $post;
$currentPost  = $post;
$zoom_meeting = tutor_zoom_meeting_data( $post->ID );
$meeting_data = $zoom_meeting->data;
$browser_url  = "https://us04web.zoom.us/wc/join/{$meeting_data['id']}?wpk={$meeting_data['encrypted_password']}";
$browser_text = __( 'Join in Browser', 'tutor-pro' );

if ( get_current_user_id() == $post->post_author ) {
	$browser_url  = $meeting_data['start_url'];
	$browser_text = __( 'Start Meeting', 'tutor-pro' );
}

$enable_spotlight_mode = tutor_utils()->get_option( 'enable_spotlight_mode' );

$show_error = apply_filters( 'tutor_zoom/single/content', null );

// Get the ID of this content and the corresponding course.
$course_content_id = get_the_ID();
$course_id         = tutor_utils()->get_course_id_by( 'lesson', $course_content_id );
?>

<?php ob_start(); ?>
	<?php
	tutor_load_template(
		'single.common.header',
		array(
			'course_id'        => $course_id,
			'mark_as_complete' => ! $zoom_meeting->is_expired,
		)
	);
	?>
	
	<!--zoom content-->
	<?php if ( $show_error ) : ?>
		<?php echo $show_error; ?>
	<?php else : ?>
		<div class="tutor-zoom-meeting-content">
			<?php if ( $zoom_meeting->is_expired ) { ?>
				<div class="tutor-zoom-meeting-expired-msg-wrap">
					<h2 class="meeting-title"><?php echo esc_html( $post->post_title ); ?></h2>
					<div class="msg-expired-section">
						<img src="<?php echo esc_url( TUTOR_ZOOM()->url . 'assets/images/zoom-icon-expired.png' ); ?>" alt="" />
						<div>
							<h3 class="tutor-mb-9"><?php esc_html_e( 'The video conference has expired', 'tutor-pro' ); ?></h3>
							<p><?php esc_html_e( 'Please contact your instructor for further information', 'tutor-pro' ); ?></p>
						</div>
					</div>
					<div class="meeting-details-section">
						<p><?php echo wp_kses_post( $post->post_content ); ?></p>
						<div>
							<div>
								<span><?php esc_html_e( 'Meeting Date', 'tutor-pro' ); ?>:</span>
								<p><?php echo esc_html( $zoom_meeting->start_date ); ?></p>
							</div>
							<div>
								<span><?php esc_html_e( 'Host Email', 'tutor-pro' ); ?>:</span>
								<p><?php echo esc_html( $meeting_data['host_email'] ); ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php
			} else {
				?>
				<div class="zoom-meeting-countdown-wrap">
					<p><?php esc_html_e( 'Meeting Starts in', 'tutor-pro' ); ?></p>
					<div class="tutor-zoom-meeting-countdown" data-timer="<?php echo esc_attr( $zoom_meeting->countdown_date ); ?>" data-timezone="<?php echo esc_attr( $zoom_meeting->timezone ); ?>"></div>
					<div class="tutor-zoom-join-button-wrap">
						<a href="<?php echo esc_url( $browser_url ); ?>" target="_blank" class="tutor-btn tutor-d-block"><?php echo esc_html( $browser_text ); ?></a>
						<a href="<?php echo esc_url( $meeting_data['join_url'] ); ?>" target="_blank" class="tutor-btn tutor-is-outline tutor-d-block"><?php esc_html_e( 'Join in Zoom App', 'tutor-pro' ); ?></a>
					</div>
				</div>
				<div class="zoom-meeting-content-wrap">
					<h2 class="meeting-title"><?php echo esc_html( $post->post_title ); ?></h2>
					<p class="meeting-summary"><?php echo esc_html( $post->post_content ); ?></p>
					<div class="meeting-details tutor-mt-32">
						<div>
							<span><?php esc_html_e( 'Meeting Date', 'tutor-pro' ); ?></span>
							<p><?php echo esc_html( $zoom_meeting->start_date ); ?></p>
						</div>
						<div>
							<span><?php esc_html_e( 'Meeting ID', 'tutor-pro' ); ?></span>
							<p><?php echo esc_html( $meeting_data['id'] ); ?></p>
						</div>
						<div>
							<span><?php esc_html_e( 'Password', 'tutor-pro' ); ?></span>
							<p><?php echo esc_html( $meeting_data['password'] ); ?></p>
						</div>
						<div>
							<span><?php esc_html_e( 'Host Email', 'tutor-pro' ); ?></span>
							<p><?php echo esc_html( $meeting_data['host_email'] ); ?></p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	<?php endif; ?>
<?php
	$html_content = ob_get_clean();
	tutor_load_template_from_custom_path(
		tutor()->path . '/templates/single-content-loader.php',
		array(
			'context'      => 'zoom',
			'html_content' => $html_content,
		),
		false
	);
