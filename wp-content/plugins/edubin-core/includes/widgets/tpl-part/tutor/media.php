   <?php 

    $settings   = $this->get_settings_for_display();
    
    $tutor_course_image_size = $settings['image_size'];
    $tutor_intor_video_image = $settings['intor_video_image'];
    $tutor_custom_placeholder_image = $settings['custom_placeholder_image']['url'];

    $placholder_img = plugins_url('/edubin-core/assets/img/course-ph.png'); 

    $video = tutor_utils()->get_video();
    $videoSource    = tutor_utils()->avalue_dot( 'source', $video );

    if ($video["source_youtube"] && $videoSource == 'youtube') {
        $tutor_intro_video =    $video["source_youtube"];
    }
    elseif($video["source_vimeo"] && $videoSource == 'vimeo'){
        $tutor_intro_video =    $video["source_vimeo"];
    }
    // elseif($video["source_external_url"] && $videoSource == 'external_url'){
    //     $tutor_intro_video =    $video["source_external_url"];
    // }
    // elseif($video["source_video_id"] && $videoSource == 'html5'){
    //  $tutor_intro_video =    $video["source_video_id"];
    // }
    // elseif($video["source_embedded"] && $videoSource == 'embedded'){
    //  $tutor_intro_video =    $video["source_embedded"];
    // }
    else{
        $tutor_intro_video =    '';
    }

        if(!empty( $tutor_intro_video) && $tutor_intor_video_image) : ?>

        <div class="intro-video-sidebar tpc_mb_0">
            <div class="intro-video" style="background-image:url(<?php if( has_post_thumbnail() ) : echo esc_url(get_the_post_thumbnail_url(get_the_ID(), $tutor_course_image_size)); elseif($tutor_custom_placeholder_image) :  echo esc_url($tutor_custom_placeholder_image); else: echo esc_url($placholder_img); endif; ?>)"> <a href="<?php echo esc_url( $tutor_intro_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
            </div>
        </div><!--   // End Intro video -->

        <?php elseif ( has_post_thumbnail() ):?>

              <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail($tutor_course_image_size); ?>
              </a><!--   // End image -->

        <?php elseif(!empty($tutor_custom_placeholder_image)) : ?>

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($tutor_custom_placeholder_image); ?>" alt="<?php the_title(); ?>">
            </a><!--   // End placeholder image -->

        <?php else : ?>

            <?php $placholder_img = plugins_url('/edubin-core/assets/img/course-ph.png'); ?>
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url($placholder_img); ?>" alt="<?php the_title(); ?>">
            </a><!--   // Fallback placeholder image -->

        <?php endif; ?>