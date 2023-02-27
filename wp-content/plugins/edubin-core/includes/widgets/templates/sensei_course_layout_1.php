<?php

    $settings   = $this->get_settings_for_display();

    $course              = get_post( get_the_ID() );
    $lesson_count        = Sensei()->course->course_lesson_count( get_the_ID() );

    /** == get the price check if it is free or not == */
    $price_data = get_post_meta(get_the_ID(), '_course_woocommerce_product', true);

    $value_of_course = '';
    if($price_data == '-'){
        $value_of_course = 'Free';
    }elseif($price_data){
        $value_of_course = '';
    }else{
        $value_of_course = 'Free';
    }

?>

   <div class="edubin-course layout__<?php echo esc_attr($settings['course_style']); ?>">
      <div class="course__container">

         <div class="course__media">

            <?php 
            $intro_video = get_post_meta( get_the_ID(), 'edubin_sensei_video', 1 ); 

            if(!empty( $intro_video) && $settings['intor_video_image']) : ?>

            <div class="intro-video-sidebar tpc_mb_0">
                <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), $settings['image_size'])); ?>)"> <a href="<?php echo esc_url( $intro_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
                </div>
            </div><!--   // End Intro video -->

            <?php elseif ( has_post_thumbnail() ):?>

                  <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail($settings['image_size']); ?>
                  </a><!--   // End image -->

            <?php elseif(!empty($settings['custom_placeholder_image']['url'])) : ?>

                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($settings['custom_placeholder_image']['url']); ?>" alt="<?php echo $settings['custom_placeholder_image']['alt']; ?>">
                </a><!--   // End placeholder image -->

            <?php else : ?>

                <?php $placholder_img = plugins_url('/edubin-core/assets/img/course-ph.png'); ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($placholder_img); ?>" alt="<?php the_title(); ?>">
                </a><!--   // Fallback placeholder image -->

            <?php endif; ?>

         <?php if ( $settings['show_cat'] ):?>
            <div class="course__categories ">
            <?php echo get_the_term_list(get_the_ID(), 'course-category'); ?>
            </div>
         <?php endif; ?>

         </div>

         <div class="course__content">
            <div class="course__content--info">
               <h4 class="course__title"> <a href="<?php the_permalink(); ?>" class="course__title-link"> <?php the_title(); ?> </a></h4>

               <?php if ( $settings['show_author_avator'] || $settings['show_author_name'] ): ?>
                <div class="author__name">
                  <?php if ( $settings['show_author_avator'] ): ?>
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?> 
                  <?php endif; ?>

                <?php if ( $settings['show_author_name'] ): ?>
                    <?php the_author() ?> 
                 <?php endif; ?>
                </div>
               <?php endif; ?>

            <?php if ( $settings['show_excerpt'] ): ?>
                <p class="course__excerpt">
                    <?php echo wp_kses_post( get_the_excerpt() ); ?>
                </p> 
            <?php endif; ?>

            </div><!--   // course__content--info -->
            
        <?php if ( $settings['show_lesson'] || $settings['show_price'] || $settings['show_icon_or_button'] || $settings['see_more_btn']):?>
            <div class="course__border"></div>

            <div class="course__content--meta">

                <?php if ( $settings['show_lesson'] ):?>
                        <span class="course-lessons">
                             <i class="flaticon-book-1"></i> <?php echo esc_attr($lesson_count ); ?> 
                        </span> 
                <?php endif; ?>

               <?php if( $price_data == '-' && $settings['show_price'] ): ?>
                  <div class="price"> <span class="price"><?php echo esc_html($value_of_course); ?></span></div>
               <?php elseif( $settings['show_icon_or_button'] ) : ?>
                  <div class="price"> <a href="<?php the_permalink(); ?>"><span class="price"><i class="flaticon-next-1"></i></span></a></div>
               <?php elseif( $settings['see_more_btn'] ) :  ?>
                  <div class="price"> <span class="price see__more"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $settings['text_see_more'] ); ?></a></span></div>
               <?php endif; ?>

            </div><!--   // End course__content--meta -->
        <?php endif; ?>

         </div> <!--   // End course__content -->
      </div><!--   // End course__container -->
   </div><!--   // End edubin-course layout__ -->
