<?php
/**
 * The template for displaying all single posts
 */

get_header(); 

   $post_id = edubin_get_id();

    global $post; $post_id = $post->ID;

    $course_id = $post_id;
    $user_id   = get_current_user_id();

    if(function_exists('edubinGetPostViewsCustom')){ edubinSetPostViewsCustom(get_the_ID()); }

    // Customizer option
    $defaults = edubin_generate_defaults();

    $lp_intro_video_position = get_theme_mod( 'lp_intro_video_position', $defaults['lp_intro_video_position']); 
    $lp_related_course_position = get_theme_mod( 'lp_related_course_position', $defaults['lp_related_course_position']); 
    $lp_single_enroll_btn = get_theme_mod( 'lp_single_enroll_btn', $defaults['lp_single_enroll_btn']); 
    $lp_single_social_shear = get_theme_mod( 'lp_single_social_shear', $defaults['lp_single_social_shear']); 

?>
    <?php  get_template_part( 'learnpress/tpl-part/single/single', 'header');  ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container">

                <?php while ( have_posts() ) : the_post();

                        global $post; $post_id = $post->ID;
                        $course_id = $post_id;

                        learn_press_get_template( 'content-single-course' ); 

                     endwhile; // End of the loop. ?>

                
                    <div class="course-bottom-wrap">
                        <?php
                        if ($lp_single_enroll_btn) {
                            learn_press_get_template( 'single-course/buttons' ); 
                        }
                        ?>
                        <?php if ($lp_single_social_shear) { ?>
                            
                            <div class="entry-post-share">
                                <div class="post-share style-01">
                                    <div class="share-label">
                                        <?php esc_html_e( 'Share this course', 'edubin' ); ?>
                                    </div>
                                    <div class="share-media">
                                        <span class="share-icon fas fa-share-alt"></span>

                                        <div class="share-list">
                                            <?php edubin_get_sharing_list(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                         <?php } ?>

                        </div>
                        
                <?php if ($lp_related_course_position == 'content') { ?>

                <div class="related-post-wrap related_course">
                    <?php edubin_lp_related_course_content(); ?>
                </div>

                <?php } ?>

            </div> <!-- container -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();