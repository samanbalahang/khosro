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
				<div class="tutor-email-from">
					<p style="color: #5B616F;font-size:16px;margin-bottom: 15px;">Regards, </p>
					<p style="color: #212327;font-size:16px;">{site_name} </p>
					<p style="color: #5B616F;font-size:16px;">{site_url} </p>
				</div>
			</div><!-- .tutor-email-content -->
		</div>
	</div>
</body>
</html>
