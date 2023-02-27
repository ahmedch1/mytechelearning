   <?php 
 
    $defaults = edubin_generate_defaults();
    $event_intor_video_image = get_theme_mod( 'event_intor_video_image', $defaults['event_intor_video_image']);
    $event_custom_placeholder_image = get_theme_mod( 'event_custom_placeholder_image', $defaults['event_custom_placeholder_image']);

    $edubin_tribe_events_video = get_post_meta( get_the_ID(), 'edubin_tribe_events_video', 1 ); 

    $placholder_img = plugins_url('/edubin-core/assets/img/course-ph.png'); 

       if(!empty( $edubin_tribe_events_video) && $event_intor_video_image ) : ?>

        <div class="intro-video-sidebar tpc_mb_0">
            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'medium_large')); ?>)"> 
                
                <?php if ( $edubin_tribe_events_video ): ?>
                    <a href="<?php echo esc_url( $edubin_tribe_events_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
                <?php endif ?>

            </div>
        </div><!--   // End Intro video metabox-->

        <?php elseif ( has_post_thumbnail() ):?>

              <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium_large'); ?>
              </a><!--   // End image -->

        <?php elseif(!empty( $event_custom_placeholder_image )) : ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url( $event_custom_placeholder_image ); ?>" alt="<?php the_title(); ?>">
            </a><!--   // End placeholder image -->

        <?php else : ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url( $placholder_img ); ?>" alt="<?php the_title(); ?>">
            </a><!--   // Fallback placeholder image -->

        <?php endif; ?>