<?php
/**
 * Template part for displaying a message that posts cannot be found
 * @package Edubin
 * Version: 1.0.0
 */

?>

<section class="no-results not-found text-center">
    <div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'edubin' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'edubin' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
    </div><!-- .page-content -->
</section>