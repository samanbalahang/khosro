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

				<table class="tutor-email-datatable">
					<tr>
						<td class="label"><?php echo __( 'Student Name:', 'tutor-pro' ); ?></td>
						<td><strong>{student_name}</strong></td>
					</tr>
					<tr>
						<td class="label"><?php echo __( 'Course Name:', 'tutor-pro' ); ?></td>
						<td><strong>{course_name}</strong></td>
					</tr>
					<tr>
						<td class="label"><?php echo __( 'Assignment Name:', 'tutor-pro' ); ?></td>
						<td><strong>{assignment_name}</strong></td>
					</tr>
				</table>

				<hr style="margin:20px 0;">

				<div data-source="email-before-button" class="tutor-email-before-button tutor-h-center email-mb-30">{before_button}</div>

				<div class="tutor-email-buttons tutor-h-center">
					<a href="{review_link}" class="tutor-email-button"><?php echo __( 'Review Assignment', 'tutor-pro' ); ?></a>
				</div>

			</div>
			<?php require TUTOR_PRO()->path . 'templates/email/email_footer.php'; ?>
		</div>
	</div>
</body>
</html>