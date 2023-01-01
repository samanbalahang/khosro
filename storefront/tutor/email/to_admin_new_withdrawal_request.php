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
						<td class="label"><?php echo __( 'Instructor Name:', 'tutor-pro' ); ?></td>
						<td><strong>{instructor_username}</strong></td>
					</tr>
					<tr>
						<td class="label"><?php echo __( 'Email Address:', 'tutor-pro' ); ?></td>
						<td><strong>{instructor_email}</strong></td>
					</tr>
					<tr>
						<td class="label"><?php echo __( 'Withdraw Amount:', 'tutor-pro' ); ?></td>
						<td><strong>{withdraw_amount}</strong></td>
					</tr>
				</table>

				<div class="tutor-email-buttons">
					<a href="{approved_url}" data-source="email-btn-url" class="tutor-email-button-bordered"><?php echo __( 'Mark as Approved', 'tutor-pro' ); ?></a>
					<a href="{rejected_url}" data-source="email-btn-url" class="tutor-email-button"><?php echo __( 'Reject', 'tutor-pro' ); ?></a>
				</div>
			</div>
			<?php require TUTOR_PRO()->path . 'templates/email/email_footer.php'; ?>
		</div>
	</div>
</body>
</html>
