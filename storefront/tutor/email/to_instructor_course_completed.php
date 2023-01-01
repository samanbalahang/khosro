<?php
/**
 * @package TUTOR_LMS_PRO/EmailTemplates
 *
 * @since 2.0
 */
$tutor_heading_background = sprintf( 'style="background: url(%s) top right no-repeat;"', TUTOR_EMAIL()->url . 'assets/images/heading.png' );
$email_banner_background  = false == get_tutor_option( 'email_disable_banner' ) ? $tutor_heading_background : '';
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
	<?php require TUTOR_EMAIL()->path . 'views/email_styles.php'; ?>
</head>

<body>
	<div class="tutor-email-body">
		<div class="tutor-email-wrapper" style="background-color: #fff;">


			<?php require TUTOR_PRO()->path . 'templates/email/email_header.php'; ?>
			<div class="tutor-email-content" <?php echo isset( $email_banner_background ) ? $email_banner_background : ''; ?>>
				<?php require TUTOR_PRO()->path . 'templates/email/email_heading_content.php'; ?>

				<div class="tutor-user-panel">
					<div class="tutor-inline-block user-panel-label"><?php echo esc_attr( 'Student info' ); ?></div>
					<div class="tutor-user-panel-wrap tutor-inline-block">
						<img class="tutor-email-avatar" src="<?php echo esc_url( get_avatar_url( wp_get_current_user()->ID ) ); ?>" alt="author" width="40" height="40">
						<div class="info-block">
							<p>{student_name}</p>
							<p>{student_email}</p>
						</div>
					</div>
				</div>

				<hr class="email-hr-separator">

				<div data-source="email-before-button" class="tutor-email-before-button tutor-h-center email-mb-30">{before_button}</div>


				<div class="tutor-email-buttons tutor-h-center">
					<a target="_blank" class="tutor-email-button" href="{student_report_url}" data-source="email-btn-url">
						<img src="<?php echo TUTOR_EMAIL()->url . 'assets/images/star.png'; ?>" alt="star">
						<span><?php echo __( 'See Student Report', 'tutor-pro' ); ?></span>
					</a>
				</div>

			</div>
			<?php require TUTOR_PRO()->path . 'templates/email/email_footer.php'; ?>
		</div>
	</div>
</body>
</html>
