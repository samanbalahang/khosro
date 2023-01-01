<?php
/**
 * @package TUTOR_LMS_PRO/EmailTemplates
 * @since 2.0
 */

use function WPML\FP\Strings\replace;

?>

<div style="
		background: #ffffff;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.05);
		border-radius: 10px;
		max-width: 600px;
		margin: 0 auto;
		font-family: 'SF Pro Display', sans-serif;
		font-style: normal;
		font-weight: 400;
		font-size: 13px;
		line-height: 138%;
	">
	<div style="border-bottom: 1px solid #e0e2ea; padding: 20px 50px">
		<img src="{logo}" alt="" style="width: 107.39px;" data-source="email-title-logo">
	</div>
	<div class="tutor-email-content" <?php echo isset( $email_banner_background ) ? $email_banner_background : ''; ?>>
		<div style="margin-bottom: 50px">
			<h6 data-source="email-heading" style="
					overflow-wrap: break-word;
					font-weight: 500;
					font-size: 20px;
					line-height: 140%;
					color: #212327;
				">
				Q&A message
			</h6>
		</div>
		<div style="color: #212327; font-weight: 400; font-size: 16px; line-height: 162%">

		<p><?php _e( '{student_username},', 'tutor-pro' ); ?></p>

			<div data-source="email-additional-message">
				<p>
					<?php _e( '<strong>{username}</strong> just submitted answers for <strong>{quiz_name}</strong> in course <strong>{site_url}</strong> at <strong>{submission_time}</strong>. You can review it from: <strong>{quiz_review_url}</strong>.', 'tutor-pro' ); ?>
				</p>
			</div>
		</div>

	</div>
	<!-- /.template-body -->
</div>
