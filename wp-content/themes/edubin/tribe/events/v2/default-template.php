<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header(); 

$defaults = edubin_generate_defaults();
// Customizer option
$edubin_archive_events_layout = get_theme_mod( 'edubin_archive_events_layout', $defaults['edubin_archive_events_layout']); 
$events_course_per_page = get_theme_mod( 'events_course_per_page', $defaults['events_course_per_page']); 

?>
<?php if ( $edubin_archive_events_layout == 'layout_2' && is_post_type_archive( 'tribe_events' ) ): ?>
    
<div class="container">
    <div id="primary" class="content-area edubin-learndash">
        <main id="main" class="site-main" role="main">
            <div class="edubin-ld-course-list-items row tpc_g_30"> 

                <?php 
                    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                    $posts_query = new WP_Query(
                    array(
                    'post_type' => 'tribe_events',
                    'post_status' => 'publish',
                    'posts_per_page' => $events_course_per_page,
                    'paged' => $paged
                    ) ); 
                ?>

                    <?php if ( $posts_query->have_posts() ) { ?>

                    <?php while ( $posts_query->have_posts() ) {
                    $posts_query->the_post(); ?>

                    <?php     
                         get_template_part( 'tribe/tpl-part/layout', '1');   

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

                    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>

                    <?php } ?>

            </div><!-- .row -->

        </main><!-- #main -->
    </div><!-- #primary -->
</div>

<?php 
    else :
        // Get default plugin template
        echo tribe( Template_Bootstrap::class )->get_view_html();

    endif;
?> 
<?php get_footer();

