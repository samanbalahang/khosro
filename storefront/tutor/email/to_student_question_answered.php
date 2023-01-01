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

				<div class="tutor-user-info">
					<p style="color: #41454f; margin-bottom: 10px">
						<?php _e( 'Here is the answer- {answer}', 'tutor-pro' ); ?>
					</p>
					<div class="tutor-user-info-wrap">
						<?php if ( isset( $_GET['edit'] ) && 'after_question_answered' === $_GET['edit'] ) : ?>
							<img class="tutor-email-avatar" src="<?php echo esc_url( get_avatar_url( wp_get_current_user()->ID ) ); ?>" alt="author" width="50" height="50">
						<?php else: ?>
							{instructor_avatar}
						<?php endif; ?>
						<div class="answer-block">
							<div class="answer-heading">
								<span>{answer_by}</span>
								<span>{answer_date}</span>
							</div>
							<p class="answer-content">{question}</p>
						</div>
					</div>
				</div>

				<div data-source="email-before-button" class="tutor-email-before-button tutor-h-center email-mb-30">{before_button}</div>

				<div class="tutor-email-buttons tutor-h-center">
					<a target="_blank" class="tutor-email-button" href="{course_url}"><?php echo __( 'Reply Q&amp;A', 'tutor-pro' ); ?></a>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
