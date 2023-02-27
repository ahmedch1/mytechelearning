    <?php 
      $intro_video = get_post_meta( get_the_ID(), 'edubin_sensei_video', 1 ); 
    ?>

    <div class="intro-video-sidebar full__preview">
        <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'large')); ?>)"> <a href="<?php echo esc_url( $intro_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
        </div>
    </div><!--   // End video or image -->