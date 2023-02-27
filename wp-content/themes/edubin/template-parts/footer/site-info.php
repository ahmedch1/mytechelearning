<?php
/**
 * Displays footer site info
 *
 * @package Edubin
 * Version: 1.0.0
 */
    $defaults = edubin_generate_defaults();
	$copyright_text = get_theme_mod( 'copyright_text', $defaults['copyright_text']);
?>

<div class="site-info">
    <?php if ( ! empty( $copyright_text ) ) : ?>
         <p><?php echo wp_kses_data( $copyright_text ); ?></p> 
    <?php endif; ?>
</div><!-- .site-info -->
