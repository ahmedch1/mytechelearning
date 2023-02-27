<?php
/**
 * Template part for displaying page content in page.php
 * @package Edubin
 * Version: 1.0.0
 */
  $defaults = edubin_generate_defaults();
  $pages_featured_image = get_theme_mod('pages_featured_image', $defaults['pages_featured_image'] );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-inner-wrap">
    	<?php if ( has_post_thumbnail()  && $pages_featured_image) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
		<?php endif; ?>
        <div class="entry-content">
            <?php
                the_content();
    
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edubin' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
