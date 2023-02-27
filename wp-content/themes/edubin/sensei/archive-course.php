<?php
/**
 * The template for displaying sensei lms archive pages
 * @package Edubin
 * Version: 1.0.0
 */

get_header(); 

$defaults = edubin_generate_defaults();
// Customizer option
$sensei_course_archive_style = get_theme_mod( 'sensei_course_archive_style', $defaults['sensei_course_archive_style']); 
$sensei_course_archive_clm = get_theme_mod( 'sensei_course_archive_clm', $defaults['sensei_course_archive_clm'] ); 
$sensei_course_per_page = get_theme_mod( 'sensei_course_per_page', $defaults['sensei_course_per_page'] ); 

?>
<div class="container">
    <div id="primary" class="content-area edubin-sensei">
        <main id="main" class="site-main" role="main">
            <div class="edubin-ld-course-list-items row tpc_g_30"> 

                <?php 
                    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                    $posts_query = new WP_Query(
                    array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'posts_per_page' => $sensei_course_per_page,
                    'paged' => $paged
                    ) ); 
                ?>


                    <?php if ( $posts_query->have_posts() ) { ?>

                    <?php while ( $posts_query->have_posts() ) {
                    $posts_query->the_post(); ?>

                    <?php     
                        if ( $sensei_course_archive_style == '6' ) :        
                          get_template_part( 'sensei/tpl-part/layout', '6'); 
                       elseif ( $sensei_course_archive_style == '5' ) :        
                          get_template_part( 'sensei/tpl-part/layout', '5'); 
                       elseif ( $sensei_course_archive_style == '4' ) :        
                          get_template_part( 'sensei/tpl-part/layout', '4'); 
                       elseif ( $sensei_course_archive_style == '3' ) :
                          get_template_part( 'sensei/tpl-part/layout', '3'); 
                       elseif ( $sensei_course_archive_style == '2' ) :
                          get_template_part( 'sensei/tpl-part/layout', '2');
                       else :       
                          get_template_part( 'sensei/tpl-part/layout', '1');        
                       endif; //End course style

                     ?>

                    <?php } ?>


                    <?php
                    // Pagination code goes here

                    $total_pages = $posts_query->max_num_pages;
                    if ( $total_pages > 1) {
                        $current_page = max(1, get_query_var("paged")); ?>

                        <nav class="navigation pagination" role="navigation" aria-label="Posts">
                            <div class="nav-links">
                            <?php echo paginate_links([
                                "base" => get_pagenum_link(1) . "%_%",
                                "format" => "page/%#%",
                                "current" => $current_page,
                                "total" => $total_pages,
                                'prev_text' => '<i class="flaticon-back" aria-hidden="true"></i>',
                                'next_text' => '<i class="flaticon-next" aria-hidden="true"></i>',
                            ]); ?>
                            </div>
                        </nav>

                    <?php
                    }
                    wp_reset_postdata();
                    } else { ?>

                    <?php  get_template_part( 'template-parts/post/content', 'none' ); ?>

                    <?php } ?>

            </div><!-- .row -->

        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php get_footer();

