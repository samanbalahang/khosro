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

				<div class="tutor-email-cardblock" style="margin-bottom:30px">
					<div class="tutor-cardblock-heading">Course Instructor</div>
					<div class="tutor-cardblock-wrapper">
						<img src="{instructor_avatar}" alt="author" width="50" height="50" style="border-radius: 50%;margin-right: 12px">
						<div class="tutor-cardblock-content">
							<p style="font-size:16px;font-weight:500;color:#212327">{instructor_username}</p>
							<p style="font-size:15px;font-weight:400">{instructor_description}</p>
						</div>
					</div>
				</div>

				<div data-source="email-before-button" class="tutor-email-before-button tutor-h-center email-mb-30">{before_button}</div>

				<div class="tutor-email-buttons-flex tutor-h-center">
					<a target="_blank" class="tutor-email-button" href="{course_url}" data-source="email-btn-url">
						<img src="<?php echo TUTOR_EMAIL()->url . 'assets/images/star.png'; ?>" alt="star">
						<span><?php echo __( 'Rate This Course', 'tutor-pro' ); ?></span>
					</a>
					<?php
						if(isset($course_id)):
					?>
							<a target="_blank" class="tutor-email-button-bordered" href="<?php echo $certificate_url?>" data-source="email-btn-url">
								<span><?php echo __( 'Download Certificate', 'tutor-pro' ); ?></span>
							</a>
					<?php
						endif;
					?>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
