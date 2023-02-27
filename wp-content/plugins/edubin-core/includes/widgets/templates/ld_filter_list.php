
<div class="col-lg-12">
  <div class="edubin-course edubin-course-list">
    <div class="row tpc_g_30">
      <div class="col-md-4">

          <?php if ( has_post_thumbnail() ):?>
            <div class="course__media">
                <a class="course__media-link" href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail($settings['image_size']);?>
                </a>
               <?php if ( $settings['show_cat'] == 'yes' ): ?>
                <div class="course__categories ">
                  <?php echo get_the_term_list(get_the_ID(), 'ld_course_category'); ?>
                </div>
               <?php endif; ?>
            </div>
          <?php endif; ?>

        </div>
        <div class="col-md-8">
         <div class="course-content">

            <?php
              the_title(sprintf('<h4 class="course__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>');
            
            ?>
            <?php if ($cg_short_description): ?>
               <p><?php echo $cg_short_description;?></p>
                <?php else : ?>
              <?php the_excerpt();?>
               <?php endif ?>
            <div class="course-bottom">

              <?php if ($settings['show_instructor_img'] == 'yes' || $settings['show_instructor_name'] == 'yes' ): ?>
                    <div class="author__name">
                      <?php if ( $settings['show_instructor_img'] == 'yes' ): ?>
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                      <?php endif; ?>

                    <?php if ( $settings['show_instructor_name'] ): ?>
                        <?php the_author() ?>
                     <?php endif; ?>
                    </div>
              <?php endif; ?>

                <div class="course__content--meta"> 
              <?php if($settings['show_lesson'] == 'yes') : ?>  
                <?php  
                $lesson  = learndash_get_course_steps( get_the_ID(), array('sfwd-lessons') );
                $lesson = $lesson ? count($lesson) : 0;
                $lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin-core') : esc_html__('Lessons', 'edubin-core'); ?>
                    <span class="course-lessons"><i class="flaticon-play-button"></i>  
                        <?php echo esc_html($lesson); ?>
                        <?php if ($settings['show_lesson_text']): ?>
                            <?php echo esc_html($lesson_text); ?>
                        <?php endif; ?>
                    </span>
                <?php endif; ?>
            
                <?php if($settings['show_topic'] == 'yes') : ?>  
                    <?php  
                    $topic  = learndash_get_course_steps( get_the_ID(), array('sfwd-topic') );
                    $topic = $topic ? count($topic) : 0;
                    $topic_text = ('1' == $topic) ? esc_html__('Topic', 'edubin-core') : esc_html__('Topics', 'edubin-core'); ?>
                        <span class="course-topic"><i class="flaticon-open-book"></i>  
                            <?php echo esc_html($topic); ?>
                            <?php if ($settings['show_topic_text']): ?>
                                <?php echo esc_html($topic_text); ?>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>

                    <?php if($settings['show_views'] == 'yes') : ?>  
                        <span class="course-views"><i class="flaticon-binoculars"></i> <?php echo edubinGetPostViews(get_the_ID()); ?></span>
                    <?php endif; ?>

                    <?php if($settings['show_comments'] == 'yes') : ?>  
                        <span class="course-comments"><i class="flaticon-chat-1"></i><a href="<?php get_comments_link();?>"> <?php echo get_comments_number(); ?></a></span>
                    <?php endif; ?>
                    
              <?php if ( $settings['show_price'] ): ?>
                <div class="price">
                   <?php echo wp_kses_post($ribbon_text); ?>
                  </div>
                <?php endif ?>
                </div>
                </div>
                <!--  End course bottom -->
              </div>
            </div>
          </div> <!--  row  -->
        </div> <!-- single course -->
      </div>