<?php
/**
 * Displays header site branding
 *
 * @package Edubin
 * Version: 1.0.0
 */
$defaults = edubin_generate_defaults();
$mobile_logo = get_theme_mod( 'mobile_logo', $defaults['mobile_logo'] );
$header_variations = get_theme_mod( 'header_variations', $defaults['header_variations'] );

?>

<?php if (!empty($mobile_logo)) : ?>
  <div class="site-branding d-inline-block">
    <!-- Mobile device logo -->
   <?php if (!empty($mobile_logo)) : ?>
         <div class="custom-logo <?php if($mobile_logo) : echo esc_attr('mobile-logo-active'); endif; ?> edubin-mobile-logo">
           <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url($mobile_logo); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
        </div>
    <?php endif; ?>

    <!-- Main Logo -->
    <?php if(the_custom_logo()):?>
        <div class="custom-logo">
            <?php the_custom_logo(); ?>
        </div>
    <?php  elseif ( is_front_page() ) : ?>

        <?php if (!has_custom_logo()): ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

            <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview()) :
            ?>
            <p class="site-description"><?php echo wp_kses_data($description); ?></p>
            <?php endif;  ?>
        <?php endif; ?>
    <?php else : ?>
        <?php if (!has_custom_logo()): ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php 

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview()) :
        ?>
            <p class="site-description"><?php echo wp_kses_data($description); ?></p>
        <?php endif;  endif;  ?>

    <?php endif;  ?>

</div><!-- .site-branding -->  

<?php else : ?> <!--  without mobile logo  -->

<div class="site-branding d-inline-block">
    <!-- Main Logo -->
	<?php if(the_custom_logo()):?>
        <div class="custom-logo">
            <?php the_custom_logo(); ?>
        </div>
	<?php  elseif ( is_front_page() ) : ?>

        <?php if (!has_custom_logo()): ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

            <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview()) :
            ?>
            <p class="site-description"><?php echo wp_kses_data($description); ?></p>
            <?php endif;  ?>
        <?php endif; ?>
    <?php else : ?>
        <?php if (!has_custom_logo()): ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php 

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview()) :
        ?>
            <p class="site-description"><?php echo wp_kses_data($description); ?></p>
        <?php endif;  endif;  ?>

    <?php endif;  ?>

</div><!-- .site-branding -->
<?php endif; ?>