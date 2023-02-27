
<?php
/**
 * The template for displaying search results pages
 * @package Edubin
 * Version: 1.0.0
 */
get_header(); 

    $defaults = edubin_generate_defaults();
    $blog_sidebar = get_theme_mod( 'blog_sidebar', $defaults['blog_sidebar']  );
    $blog_sidebar_width = get_theme_mod( 'blog_sidebar_width', $defaults['blog_sidebar_width']  );
    $blog_sidebar_gap = get_theme_mod( 'blog_sidebar_gap', $defaults['blog_sidebar_gap']  );
    $blog_single_sidebar = get_theme_mod( 'blog_single_sidebar', $defaults['blog_single_sidebar']  );

    $content_area_col = ( $blog_sidebar_width == '4' ? '8' : '9');

?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row tpc_g_<?php echo esc_attr($blog_sidebar_gap); ?>">
                <?php if ('sidebarleft' == $blog_single_sidebar): ?>
                    <div class="col-md-<?php echo esc_attr($blog_sidebar_width); ?>">
                        <?php get_sidebar(); ?>
                    </div> 
                <?php endif; ?>

                <?php if ('sidebarnone' == $blog_single_sidebar): ?>
                    <div class="col-md-12">
                <?php else: ?>
                    <div class="<?php if (is_active_sidebar( 'sidebar-1' )):  echo 'col-md-'.$content_area_col.' content-wrapper'; else: echo 'col-md-12 content-wrapper'; endif;?>">
                <?php endif; ?>

                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part( 'template-parts/post/content');  
                                endwhile; // End of the loop.
                                
                                the_posts_pagination( array(
                                    'prev_text' => '<i class="flaticon-back" aria-hidden="true"></i>',
                                    'next_text' => '<i class="flaticon-next" aria-hidden="true"></i>',
                                 ) );

                                ?>
                        <?php else : ?>
                        <div class="wrong-search-wrapper text-center">
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'edubin' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ('sidebarright' == $blog_single_sidebar): ?>
                    <div class="col-md-<?php echo esc_attr($blog_sidebar_width); ?>">
                        <?php get_sidebar(); ?>
                    </div> 

                <?php elseif('sidebarnone' == $blog_single_sidebar): ?>

                <?php else : ?>
                    <div class="col-md-<?php echo esc_attr($blog_sidebar_width); ?>">
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();