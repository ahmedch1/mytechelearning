<?php
/**
* Template Name: Page With Sidebar
*/

get_header(); 

	$post_id = edubin_get_id();
	$prefix = '_edubin_';
	$defaults = edubin_generate_defaults();

	$sidebar_align = get_post_meta($post_id, $prefix . 'sidebar_align', true);
	$sidebar_width = get_post_meta($post_id, $prefix . 'sidebar_width', true);
	$sidebar_side_gap = get_post_meta($post_id, $prefix . 'sidebar_side_gap', true);

    $sidebar_sticky =  get_post_meta($post_id, $prefix . 'sidebar_sticky', true);
    $sidebar_sticky_on_off = ( $sidebar_sticky == 'enable' ? 'do_sticky' : '');

	$content_area_col = ( $sidebar_width == '4' ? '8' : '9');

?>
<div class="container">
	<div class="row tpc_g_<?php echo esc_attr($sidebar_side_gap); ?>">

		<?php if ( $sidebar_align == 'left' ) : ?>

	        <div class="col-md-<?php echo esc_attr( $sidebar_width); ?>">
	        	<div class="sidebar-wrap <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">
	            	<?php get_sidebar(); ?>
	        	</div> 
	        </div> 

		<?php endif ?>

		<div class="col-md-<?php echo esc_attr($content_area_col); ?>">
		    <?php
		        while ( have_posts() ) : the_post();

		            get_template_part( 'template-parts/page/content', 'page' );

		            // If comments are open or we have at least one comment, load up the comment template.
		            if ( comments_open() || get_comments_number() ) :
		                comments_template();
		            endif;

		        endwhile; // End of the loop.
		    ?>
		</div>

		<?php if ( $sidebar_align == 'right' ) : ?>

	        <div class="col-md-<?php echo esc_attr( $sidebar_width); ?> <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">
	        	<div class="sidebar-wrap <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">
	            	<?php get_sidebar(); ?>
	        	</div> 
	        </div> 

		<?php endif ?>

	</div>
</div>
<?php get_footer();
