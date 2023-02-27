<?php
/**
 * Template part for displaying posts
 * @package Edubin
 * Version: 1.0.0
 */

    $defaults = edubin_generate_defaults();
    $blog_author_show = get_theme_mod( 'blog_author_show', $defaults['blog_author_show']);
    $blog_date_show = get_theme_mod( 'blog_date_show', $defaults['blog_date_show']);
    $blog_category_show = get_theme_mod( 'blog_category_show', $defaults['blog_category_show']);
    $blog_comment_show = get_theme_mod( 'blog_comment_show', $defaults['blog_comment_show']);
    $blog_view_show = get_theme_mod( 'blog_view_show', $defaults['blog_view_show']);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrapper">
        <div class='post-formats-wrapper'>
           <?php the_post_thumbnail(); ?>
        </div>

        <div class="entry-content">

            <?php
            if ( has_post_format( 'link' ) && edubin_meta( 'edubin_url' ) && edubin_meta( 'edubin_text' ) ) {
                $url  = edubin_meta( 'edubin_url' );
                $text = edubin_meta( 'edubin_text' );
                if ( $url && $text ) { ?>
                    <header class="entry-header">
                        <h3 class="entry-title">
                            <a class="link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $text ); ?></a>
                        </h3>
                    </header>

                    <?php
                }
                ?>
                <div class="entry-summary">
                    <?php
                    the_excerpt();
                    ?>
                </div><!-- .entry-summary -->
                <div class="blog-btn edubin-main-btn">
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'edubin' ); ?></a>
                </div>
            <?php } elseif ( has_post_format( 'quote' ) && edubin_meta( 'edubin_quote' ) && edubin_meta( 'edubin_author_url' ) ) {
                $quote      = edubin_meta( 'edubin_quote' );
                $author     = edubin_meta( 'edubin_author' );
                $author_url = edubin_meta( 'edubin_author_url' );
                if ( $author_url ) {
                    $author = ' <a href=' . esc_url( $author_url ) . '>' . $author . '</a>';
                }
                if ( $quote && $author ) {
                    ?>
                    <header class="entry-header">
                        <div class="box-header box-quote">
                            <blockquote><?php echo esc_html( $quote ); ?><cite><?php echo esc_html( $author ); ?></cite>
                            </blockquote>
                        </div>
                    </header>
                    <?php
                }
            } elseif ( has_post_format( 'video' ) ) { ?>
                <header class="entry-header">
                    <div class="entry-contain">
                        <?php edubin_entry_meta(); ?>
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </div>
                </header>
                <!-- .entry-header -->
                <div class="entry-summary">
                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-summary -->
                <div class="blog-btn edubin-main-btn">
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'edubin' ); ?></a>
                </div>
            <?php } elseif ( has_post_format( 'audio' ) ) {
                ?>
                <header class="entry-header">
                    <div class="entry-contain">
                        <?php edubin_entry_meta(); ?>
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </div>
                </header>
                <div class="entry-summary">
                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-summary -->
                <div class="blog-btn edubin-main-btn">
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'edubin' ); ?></a>
                </div>
                <?php
            } else {
                ?>
                <header class="entry-header">
                    <div class="entry-contain">
                        <?php edubin_entry_meta(); ?>
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </div>
                </header>
                <!-- .entry-header -->
                <div class="entry-summary">
                    <?php
                    the_excerpt();
                    ?>
                </div><!-- .entry-summary -->
                <div class="blog-btn edubin-main-btn">
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'edubin' ); ?></a>
                </div>
            <?php }; ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

