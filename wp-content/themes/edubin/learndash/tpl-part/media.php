   <?php 
   $post_id = edubin_get_id();

    global $post; $post_id = $post->ID;

    $course_id = $post_id;
    $user_id   = get_current_user_id();

    $defaults = edubin_generate_defaults();
    $ld_intor_video_image = get_theme_mod( 'ld_intor_video_image', $defaults['ld_intor_video_image']);
    $ld_custom_placeholder_image = get_theme_mod( 'ld_custom_placeholder_image', $defaults['ld_custom_placeholder_image']);

    $embed_code = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true );

    $ld_intro_video = get_post_meta( get_the_ID(), 'edubin_ld_video', 1 ); 
    
    $placholder_img = plugins_url('/edubin-core/assets/img/course-ph.png'); 

        if(!empty( $embed_code ) && $ld_intor_video_image ) : ?>

        <div class="intro-video-sidebar tpc_mb_0">
            <div class="intro-video" style="background-image:url(<?php if( has_post_thumbnail() ) : echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); elseif( $ld_custom_placeholder_image ) :  echo esc_url( $ld_custom_placeholder_image ); else: echo esc_url( $placholder_img ); endif; ?>)"> 

                <?php if ($ld_intro_video): ?>
                    <a href="<?php echo esc_url( $ld_intro_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
                <?php endif ?>

            </div>
        </div><!--   // End Intro video -->

        <?php
        elseif(!empty( $ld_intro_video) && $ld_intor_video_image ) : ?>

        <div class="intro-video-sidebar tpc_mb_0">
            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'medium_large')); ?>)"> 
                
                <?php if ($ld_intro_video): ?>
                    <a href="<?php echo esc_url( $ld_intro_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
                <?php endif ?>

            </div>
        </div><!--   // End Intro video metabox-->

        <?php elseif ( has_post_thumbnail() ):?>

              <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium_large'); ?>
              </a><!--   // End image -->

        <?php elseif(!empty( $ld_custom_placeholder_image )) : ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url( $ld_custom_placeholder_image ); ?>" alt="<?php the_title(); ?>">
            </a><!--   // End placeholder image -->

        <?php else : ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url( $placholder_img ); ?>" alt="<?php the_title(); ?>">
            </a><!--   // Fallback placeholder image -->

        <?php endif; ?>