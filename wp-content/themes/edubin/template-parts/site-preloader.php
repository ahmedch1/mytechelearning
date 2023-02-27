<?php
/**
 * Template part for displaying posts
 * @package Edubin
 * Version: 1.0.0
 */

    $defaults = edubin_generate_defaults();
    $preloader_show = get_theme_mod('preloader_show', $defaults['preloader_show']); 
    $preloader_styles = get_theme_mod('preloader_styles', $defaults['preloader_styles']); 
    
?>
<?php
     // Preloader
  if( $preloader_styles == 'image_preloader' && $preloader_show == true): ?>

    <div class="edubin_image_preloader"></div>

  <?php elseif( $preloader_styles == 'preloader_1' && $preloader_show == true): ?>

    <div class="preloader">
      <div class="loader rubix-cube">
        <div class="layer layer-1"></div>
        <div class="layer layer-2"></div>
        <div class="layer layer-3 color-1"></div>
        <div class="layer layer-4"></div>
        <div class="layer layer-5"></div>
        <div class="layer layer-6"></div>
        <div class="layer layer-7"></div>
        <div class="layer layer-8"></div>
      </div>
    </div>

  <?php elseif( $preloader_styles == 'preloader_2' && $preloader_show == true): ?>

     <div id="preloader_two">
        <div class="preloader_two">
            <span></span>
            <span></span>
        </div>
    </div>

  <?php endif; ?>