<?php
/**
 * @package TUTOR_LMS_PRO/EmailTemplates
 *
 * @since 2.0
 */
$tutor_heading_background = sprintf( 'style="background: url(%s) top right no-repeat;"', TUTOR_EMAIL()->url . 'assets/images/heading.png' );
$email_banner_background  = false == get_tutor_option( 'email_disable_banner' ) ? $tutor_heading_background : '';
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
						<td>Your score:</td>
						<td><strong>{earned_marks}</strong> out of <strong>{total_marks}</strong> {attempt_result} </td>
					</tr>
				</table>

				<div class="tutor-email-buttons">
					<a target="_blank" class="tutor-email-button" href="{attempt_url}"><?php echo __( 'See Quiz Details', 'tutor-pro' ); ?></a>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
