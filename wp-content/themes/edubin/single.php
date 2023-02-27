<?php
/**
 * The template for displaying all single posts
 * @package Edubin
 * Version: 1.0.0
 */

get_header(); 
    $defaults = edubin_generate_defaults();
    $blog_single_sidebar = get_theme_mod( 'blog_single_sidebar', $defaults['blog_single_sidebar']  );
    
    $blog_single_sidebar_sticky = get_theme_mod( 'blog_single_sidebar_sticky', $defaults['blog_single_sidebar_sticky']  );
    $sidebar_sticky_on_off = ( $blog_single_sidebar_sticky ? 'do_sticky' : '');

    $blog_single_sidebar_width = get_theme_mod( 'blog_single_sidebar_width', $defaults['blog_single_sidebar_width']  );
    $blog_single_sidebar_gap = get_theme_mod( 'blog_single_sidebar_gap', $defaults['blog_single_sidebar_gap']  );


    $content_area_col = ( $blog_single_sidebar_width == '4' ? '8' : '9');

?>
    <?php if( class_exists('Sensei_Main' ) && !function_exists('tutor') && !class_exists('LearnPress') && is_single() && is_singular( 'course' )) : // check if sensei lms active ?>
        <?php  get_template_part( 'sensei/tpl-part/single/single'); ?>
    <?php else: ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="container">

                    <div class="row tpc_g_<?php echo esc_attr($blog_single_sidebar_gap); ?>">
                        <?php if ('sidebarleft' == $blog_single_sidebar): ?>
                            <div class="col-md-<?php echo esc_attr($blog_single_sidebar_width); ?>">
                               <div class="sidebar-wrap <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">
                                    <?php get_sidebar(); ?>
                                </div> 
                            </div> 
                        <?php endif; ?>

                        <?php if ('sidebarnone' == $blog_single_sidebar): ?>
                            <div class="col-md-12">
                        <?php else: ?>
                            <div class="<?php if (is_active_sidebar( 'sidebar-1' )):  echo 'col-md-'.$content_area_col.' content-wrapper'; else: echo 'col-md-12 content-wrapper'; endif;?>">
                        <?php endif; ?>

                            <?php
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                     
                                    get_template_part( 'template-parts/post/single');
              
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                    
                                endwhile; // End of the loop.
                            ?>
                        
                        </div>

                        <?php if ('sidebarright' == $blog_single_sidebar): ?>
                            <div class="col-md-<?php echo esc_attr( $blog_single_sidebar_width ); ?>">
                               <div class="sidebar-wrap <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">
                                    <?php get_sidebar(); ?>
                                </div> 
                            </div> 

                        <?php elseif('sidebarnone' == $blog_single_sidebar): ?>

                        <?php else : ?>
                            <div class="col-md-<?php echo esc_attr($blog_single_sidebar_width); ?>">
                               <div class="sidebar-wrap <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">
                                    <?php get_sidebar(); ?>
                                </div> 
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    <?php endif; // End if check sensei lms active ?>

<?php get_footer();