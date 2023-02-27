<?php
/**
 * Template for displaying single course
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

// Prepare the nav items
$course_nav_item = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), get_the_ID() );

tutor_utils()->tutor_custom_header();
do_action('tutor_course/single/before/wrap');

$defaults = edubin_generate_defaults();
$tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
$tutor_related_course_position = get_theme_mod( 'tutor_related_course_position', $defaults['tutor_related_course_position']);

$tutor_single_sidebar_sticky = get_theme_mod( 'tutor_single_sidebar_sticky', $defaults['tutor_single_sidebar_sticky']  );
$sidebar_sticky_on_off = ( $tutor_single_sidebar_sticky ? 'do_sticky' : '');

?>
<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap'); ?>>
    <div class="tutor-course-details-page tutor-container single_layout__<?php echo esc_attr( $tutor_single_page_layout ); ?>">
        <?php //(isset($is_enrolled) && $is_enrolled) ? tutor_course_enrolled_lead_info() : tutor_course_lead_info(); ?>
        <div class="tutor-course-details-page-main">
            <div class="tutor-course-details-page-main-left">
              
                <?php do_action('tutor_course/single/before/inner-wrap'); ?>
                <div class="tutor-course-details-tab tutor-mt-32">
                    <div class="tutor-is-sticky">
                        <?php tutor_load_template( 'single.course.enrolled.nav', array('course_nav_item' => $course_nav_item ) ); ?>
                    </div>
                    <div class="tutor-tab tutor-pt-24">
                        <?php foreach( $course_nav_item as $key => $subpage ) : ?>
                            <div id="tutor-course-details-tab-<?php echo $key; ?>" class="tutor-tab-item<?php echo $key == 'info' ? ' is-active' : ''; ?>">
                                <?php
                                    do_action( 'tutor_course/single/tab/'.$key.'/before' );
                                    
                                    $method = $subpage['method'];
                                    if ( is_string($method) ) {
                                        $method();
                                    } else {
                                        $_object = $method[0];
                                        $_method = $method[1];
                                        $_object->$_method(get_the_ID());
                                    }

                                    do_action( 'tutor_course/single/tab/'.$key.'/after' );
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php do_action('tutor_course/single/after/inner-wrap'); ?>
            </div>
            <!-- end of /.tutor-course-details-page-main-left -->
            <div class="tutor-course-details-page-main-right">
                
                <?php get_template_part( 'tutor/tpl-part/single/single', 'sidebar');  ?>
                 
            </div>
            <!-- end of /.tutor-course-details-page-main-right -->
        </div>
        <!-- end of /.tutor-course-details-page-main -->

        <?php if ($tutor_related_course_position == 'content') { ?>

        <div class="related-post-wrap related_course">
            <?php edubin_tutor_related_course_content(); ?>
        </div>

        <?php } ?>
        
    </div>
</div>

<?php do_action('tutor_course/single/after/wrap'); ?>

<?php
tutor_utils()->tutor_custom_footer();
