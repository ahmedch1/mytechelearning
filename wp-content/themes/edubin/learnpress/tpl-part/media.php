   <?php 

    $defaults = edubin_generate_defaults();
    $lp_intor_video_image = get_theme_mod( 'lp_intor_video_image', $defaults['lp_intor_video_image']);
    $lp_custom_placeholder_image = get_theme_mod( 'lp_custom_placeholder_image', $defaults['lp_custom_placeholder_image']);

    $lp_intro_video = get_post_meta( get_the_ID(), 'edubin_lp_video', 1 ); 

    $placholder_img = plugins_url('/edubin-core/assets/img/course-ph.png'); 

        if(!empty( $lp_intro_video) && $lp_intor_video_image) : ?>

        <div class="intro-video-sidebar tpc_mb_0">
            <div class="intro-video" style="background-image:url(<?php if( has_post_thumbnail() ) : echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); elseif($lp_custom_placeholder_image) :  echo esc_url($lp_custom_placeholder_image); else: echo esc_url($placholder_img); endif; ?>)"> <a href="<?php echo esc_url( $lp_intro_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
            </div>
        </div><!--   // End Intro video -->

        <?php elseif ( has_post_thumbnail() ):?>

              <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium_large'); ?>
              </a><!--   // End image -->

        <?php elseif(!empty($lp_custom_placeholder_image)) : ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($lp_custom_placeholder_image); ?>" alt="<?php the_title(); ?>">
            </a><!--   // End placeholder image -->

        <?php else : ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($placholder_img); ?>" alt="<?php the_title(); ?>">
            </a><!--   // Fallback placeholder image -->

        <?php endif; ?>