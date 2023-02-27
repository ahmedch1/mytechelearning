<?php

/**
 * Template for displaying courses
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.5.8
 */

get_header();

$course_filter = (bool) tutor_utils()->get_option('course_archive_filter', false);
$supported_filters = tutor_utils()->get_option('supported_course_filters', array());

$defaults = edubin_generate_defaults();
$tutor_course_archive_style = get_theme_mod( 'tutor_course_archive_style', $defaults['tutor_course_archive_style']);

if ( $course_filter && count($supported_filters) ) {
?>
	<div class="tutor-course-filter-wrapper e-c-layout-<?php echo esc_attr( $tutor_course_archive_style ); ?>">
		<div class="tutor-course-filter-container">
			<?php tutor_load_template('course-filter.filters'); ?>
		</div>
		<div>
			<div class="<?php tutor_container_classes(); ?> tutor-course-filter-loop-container" data-column_per_row="<?php echo tutor_utils()->get_option( 'courses_col_per_row', 4 ); ?>">
				<?php tutor_load_template('archive-course-init'); ?>
			</div><!-- .wrap -->
		</div>
	</div>
<?php
} else {
	?>
		<div class="<?php tutor_container_classes(); ?>">
			<?php tutor_load_template('archive-course-init'); ?>
		</div>
	<?php
}
get_footer(); ?>