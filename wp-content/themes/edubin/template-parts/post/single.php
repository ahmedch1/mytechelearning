<?php
/**
 * Template part for displaying posts
 * @package Edubin
 * Version: 1.0.0
 */
    $post_id = edubin_get_id();
    $prefix = '_edubin_';
    $defaults = edubin_generate_defaults();
    $page_header_enable = get_post_meta($post_id, $prefix . 'page_header_enable', true);

    $header_variations = get_theme_mod( 'header_variations', $defaults['header_variations'] );
    $blog_single_author_show = get_theme_mod( 'blog_single_author_show', $defaults['blog_single_author_show']);
    $blog_single_date_show = get_theme_mod( 'blog_single_date_show', $defaults['blog_single_date_show']);
    $blog_single_category_show = get_theme_mod( 'blog_single_category_show', $defaults['blog_single_category_show']);
    $blog_single_comment_show = get_theme_mod( 'blog_single_comment_show', $defaults['blog_single_comment_show']);
    $blog_single_view_show = get_theme_mod( 'blog_single_view_show', $defaults['blog_single_view_show']);
    
    // Post views
    if(function_exists('edubinGetPostViews')){ edubinSetPostViews(get_the_ID()); }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
		<?php endif; ?>

		<div class="entry-content">
            <header class="entry-header">
                <div class="entry-contain">
                <?php if ($blog_single_author_show || $blog_single_date_show || $blog_single_category_show || $blog_single_comment_show || $blog_single_view_show == true) : ?>
                    <ul class="entry-meta list-inline">

                        <?php if ($blog_single_author_show == true):  ?>
                            <?php if ( 'post' === get_post_type() ): edubin_posted_author(); endif; ?>
                         <?php endif; ?>

                        <?php if ($blog_single_date_show == true):  ?>
                            <?php edubin_posted_date();  ?>
                         <?php endif; ?>

                        <?php if( $blog_single_comment_show == true): ?>
                            <li class="meta-comment list-inline-item">
                                <?php $cmt_link = get_comments_link(); 
                                      $num_comments = get_comments_number();
                                        if ( $num_comments == 0 ) {
                                            $comments = esc_html__( 'No Comments', 'edubin' );
                                        } elseif ( $num_comments > 1 ) {
                                            $comments = $num_comments . esc_html__( ' Comments', 'edubin' );
                                        } else {
                                            $comments = esc_html__('1 Comment', 'edubin' );
                                        }
                                ?>  
                                <i class="flaticon-chat-1"></i>
                                <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $comments );?></a>
                            </li>
                        <?php endif; ?>
                        
                        <?php if( has_category() && $blog_single_category_show == true):
                                echo '<li class="meta-categories list-inline-item"><i class="flaticon-folder-1"></i>';
                                    the_category( ',' );
                                echo '</li>';
                        endif; ?>

                        <?php if ($blog_single_view_show == true):  ?>
                            <?php if(function_exists('edubinGetPostViews')){ ?>
                            <?php echo '<li class="post-views list-inline-item"><i class="flaticon-binoculars"></i>'; ?>
                            <span><?php echo esc_attr(edubinGetPostViews(get_the_ID())); ?> <?php esc_html_e( 'Views', 'edubin' ); ?></span>
                               <?php echo '</li>';?>
                           <?php } ?>
                         <?php endif; ?>
                         
                    </ul>
                <?php endif; ?>
                <?php if (!is_singular()) { ?>
                    <?php the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2>' ); ?>
                <?php } ?>
                <?php if ($page_header_enable == !'enable') { ?>
                  <?php the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2>' ); ?>
                <?php } ?>
                </div>
            </header>
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'edubin' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'edubin' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			?>
            <?php
                if ( is_single() ) {
                    edubin_entry_footer();
                }
            ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->

<?php
   
    get_template_part( 'template-parts/post/related');

 ?>
