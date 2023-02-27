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
                

                <?php if ($lp_related_course_position == 'content') { ?>

                <div class="related-post-wrap related_course">
                    <?php edubin_lp_related_course_content(); ?>
                </div>

                <?php } ?>

            </div> <!-- container -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();