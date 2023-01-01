<?php

/**
 * Display loop thumbnail
 *
 * @package Tutor\Templates
 * @subpackage CourseLoopPart
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.4.3
 */

$tutor_course_img = get_tutor_course_thumbnail_src();
$placeholder_img  = tutor()->url . 'assets/images/placeholder.svg';
?>
<div class="tutor-course-thumbnail">
	<a href="<?php the_permalink(); ?>" class="tutor-d-block">
		<div class="tutor-ratio tutor-ratio-16x9">
			<img class="tutor-card-image-top" src="<?php echo empty( esc_url( $tutor_course_img ) ) ? esc_url( $placeholder_img ) : esc_url( $tutor_course_img ); ?>" alt="<?php the_title(); ?>" loading="lazy">
		</div>
	</a>
</div>
