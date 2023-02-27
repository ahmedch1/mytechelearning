<?php

    $settings   = $this->get_settings_for_display();
    
    $ld_course_image_size = $settings['image_size'];
    $ld_intor_video_image = $settings['intor_video_image'];
    $ld_custom_placeholder_image = $settings['custom_placeholder_image']['url'];

    $ld_intro_video = get_post_meta( get_the_ID(), 'edubin_ld_video', 1 ); 

    $placholder_img = plugins_url('/edubin-core/assets/img/course-ph.png');
    
    if(!empty( $ld_intro_video) && $ld_intor_video_image) : ?>

        <div class="intro-video-sidebar tpc_mb_0">
            <div class="intro-video" style="background-image:url(<?php if( has_post_thumbnail() ) : echo esc_url(get_the_post_thumbnail_url(get_the_ID(), $ld_course_image_size)); elseif($ld_custom_placeholder_image) :  echo esc_url($ld_custom_placeholder_image); else: echo esc_url($placholder_img); endif; ?>)"> <a href="<?php echo esc_url( $ld_intro_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
            </div>
        </div><!--   // End Intro video -->

    <?php elseif ( has_post_thumbnail() ):?>

          <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail($ld_course_image_size); ?>
          </a><!--   // End image -->

    <?php elseif(!empty($ld_custom_placeholder_image)) : ?>

        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($ld_custom_placeholder_image); ?>" alt="<?php the_title(); ?>">
        </a><!--   // End placeholder image -->

    <?php else : ?>

        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($placholder_img); ?>" alt="<?php the_title(); ?>">
        </a><!--   // Fallback placeholder image -->

    <?php endif; ?>