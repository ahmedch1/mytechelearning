<?php
/**
 * Admin View: Drip items
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$course_id = LP_Request::get_int( 'course-id' );

if ( ! $course = learn_press_get_course( $course_id ) ) {
	_e( 'Invalid course', 'ecademy-toolkit' );

	return;
}

$list_table = new LP_Drip_Items_List_Table( $course_id );
$drip_type  = get_post_meta( $course_id, '_lp_content_drip_drip_type', true );
$types      = lp_content_drip_types();
?>

<div class="wrap" id="learn-press-content-drip">
	<h2><?php esc_html_e( 'Drip items', 'ecademy-toolkit' ); ?></h2>

	<?php _e( 'Course:', 'ecademy-toolkit' ); ?>
	<a href="<?php echo $course->get_permalink(); ?>" target="_blank"><?php echo $course->get_title(); ?></a>
	(<a href="<?php echo $course->get_edit_link(); ?>"
	    target="_blank"><?php _e( 'Edit', 'ecademy-toolkit' ); ?></a>)

	<?php echo __( '- Drip type: ', 'ecademy-toolkit' ) . '<strong>' . substr( $types[ $drip_type ], 3 ) . '</strong>' ?>

	<form method="post">
		<?php $list_table->display(); ?>
	</form>
</div>
