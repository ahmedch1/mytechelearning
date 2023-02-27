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
                if ( has_post_thumbnail() ):?>

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
            <div class="course__categories">
            <?php echo get_the_term_list(get_the_ID(), 'course-category'); ?>
            </div><!--   //Category -->
         <?php endif; ?>

            <!-- $price_data == '-' && -->
           <?php if( $settings['show_price'] ): ?>
             <div class="price__2"> <span><?php echo esc_html($value_of_course); ?></span></div>
           <?php endif; ?>
           

            <div class="course__content--meta layout__5">

               <?php if ( $settings['show_author_avator'] || $settings['show_author_name'] ): ?>
                <div class="course__meta-top">
                    <div class="author__name tpc_d_i_block">
                      <?php if ( $settings['show_author_avator'] ): ?>
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                      <?php endif; ?>

                    <?php if ( $settings['show_author_name'] ): ?>
                        <?php the_author() ?>
                     <?php endif; ?>
                    </div>
                </div>
               <?php endif; ?>

            </div>
        </div> <!--   // End course__media -->

         <div class="course__content">

            <div class="course__content--info">
               <h4 class="course__title"> <a href="<?php the_permalink(); ?>" class="course__title-link"> <?php the_title(); ?> </a></h4>

            <?php if ( $settings['show_excerpt'] ): ?>
                <p class="course__excerpt">
                    <?php echo wp_kses_post( get_the_excerpt() ); ?>
                </p>
            <?php endif; ?>

            </div>

         </div><!--   // End course__content -->

      </div><!--   // End course__container -->
   </div><!--   // End edubin-course layout__ -->
