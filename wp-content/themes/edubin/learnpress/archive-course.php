<?php
/**
 * The template for displaying archive pages
 * @package Edubin
 * Version: 1.0.0
 */

get_header(); 

$defaults = edubin_generate_defaults();
$blog_sidebar = get_theme_mod( 'blog_sidebar', $defaults['blog_sidebar']  );
$blog_sidebar_width = get_theme_mod( 'blog_sidebar_width', $defaults['blog_sidebar_width']  );
$content_area_col = ( $blog_sidebar_width == '4' ? '8' : '9');

$post_par_page     = LP_Settings::get_option( 'archive_course_limit', 8 );

?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row tpc_g_30">

				<?php 
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$posts_query = new WP_Query(
					array(
					'post_type' => 'lp_course',
					'post_status' => 'publish',
					'posts_per_page' => $post_par_page,
					'paged' => $paged
					) ); 
				?>


					<?php if ( $posts_query->have_posts() ) { ?>

					<?php while ( $posts_query->have_posts() ) {
					$posts_query->the_post(); ?>

					<?php     
						get_template_part( 'learnpress/content-course-grid'); 
					 ?>

					<?php } ?>


					<?php
					// Pagination code goes here

					$total_pages = $posts_query->max_num_pages;
					if ($total_pages > 1) {
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
        </div>  <!-- .container -->
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
