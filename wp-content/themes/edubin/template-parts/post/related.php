
<?php
	/**
	 * Blog single page posts navigation
	 */

post_author();
?>

<?php

	/**
	 * Blog single page posts navigation
	 */

	$defaults = edubin_generate_defaults();
	$blog_nav_show = get_theme_mod('blog_nav_show', $defaults['blog_nav_show']);
	$blog_related_show = get_theme_mod('blog_related_show', $defaults['blog_related_show']);

	if ( $blog_nav_show ) {
		nav_page_links(); 
	}

	/**
	 * Blog single page related posts
	 */

	if ( $blog_related_show ) { ?>
		
	<div class="related-post-wrap ">
		<?php edubin_related_posts(); ?>
	</div>

<?php
	}
?>