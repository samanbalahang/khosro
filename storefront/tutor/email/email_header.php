<?php

$tutor_logo  = tutor()->url . 'assets/images/tutor-logo.png';
$logo        = apply_filters( 'tutor_email_logo_src', $tutor_logo );
$logo_height = get_tutor_option( 'email_logo_height', 30 );
?>
<div class="tutor-email-header">
	<table width="100%" style="font-size: 16px;">
		<tr>
			<td>
				<a class="tutor-email-logo" target="_blank" href="{site_url}">
					<img src="<?php echo esc_url( $logo ); ?>" alt="logo" height="<?php esc_attr_e( $logo_height ); ?>" data-source="email-title-logo" />
				</a>
			</td>
			<td align="right" class="email-heading-right">{testing_email_notice}</td>
		</tr>
	</table>
</div>
