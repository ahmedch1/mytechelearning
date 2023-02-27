<?php 
        $settings   = $this->get_settings_for_display();
        if (class_exists('Sensei_Main')) : // Check sensei lms active

 ?>    

<div class="col-lg-12">
    <div class="edubin-course edubin-course-list">
        <div class="row tpc_g_30">
            <div class="col-md-4">
                
                        <div class="course__media">

                        <?php 
                        $intro_video = get_post_meta( get_the_ID(), 'edubin_sensei_video', 1 ); 

                        if(!empty( $intro_video) && $settings['intor_video_image']) : ?>

                        <div class="intro-video-sidebar">
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

                     </div><!--   // course__media -->

            </div>
            <div class="col-md-8">
             <div class="course-content">

                <?php
                  the_title(sprintf('<h4 class="course__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>');
                
                ?>
                <?php if ( $settings['show_excerpt_list'] == 'yes' ): ?>
                 <?php the_excerpt(); ?>
                <?php endif; ?>

              <?php if ( $settings['show_author_avator'] || $settings['show_author_name'] ): ?>
                    <div class="author__name">
                      <?php if ($settings['show_author_avator'] ): ?>
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?> 
                      <?php endif; ?>

                    <?php if ( $settings['show_author_name'] ): ?>
                        <?php the_author() ?> 
                     <?php endif; ?>
                    </div>
              <?php endif; ?>
                      
                <div class="course-bottom">

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

                    </div>

                </div>
            </div>
        </div> <!--  row  -->
    </div> <!-- single course -->
</div>

<?php endif; ?>