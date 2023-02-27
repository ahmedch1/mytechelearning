 <?php

$settings   = $this->get_settings_for_display();

global $post;
$post_id = $post->ID;

$course_id = $post_id;
$user_id   = get_current_user_id();

$cg_short_description = get_post_meta($post->ID, '_learndash_course_grid_short_description', true);
$enable_video         = get_post_meta($post->ID, '_learndash_course_grid_enable_video_preview', true);
$embed_code           = get_post_meta($post->ID, '_learndash_course_grid_video_embed_code', true);
$button_text          = $settings['button_text'];

// Retrive oembed HTML if URL provided
if (preg_match('/^http/', $embed_code)) {
    $embed_code = wp_oembed_get($embed_code, array('height' => 600, 'width' => 400));
}

if (isset($shortcode_atts['course_id'])) {
    $button_link = learndash_get_step_permalink(get_the_ID(), $shortcode_atts['course_id']);
} else {
    $button_link = get_permalink();
}

$button_link = apply_filters('learndash_course_grid_custom_button_link', $button_link, $post_id);

$button_text = isset($button_text) && !empty($button_text) ? $button_text : __('See more', 'edubin-core');

$button_text = apply_filters('learndash_course_grid_custom_button_text', $button_text, $post_id);

$options = get_option('sfwd_cpt_options');


/**
 * Currency symbol filter hook
 *
 * @param string $currency Currency symbol
 * @param int    $course_id
 */
$currency = apply_filters('learndash_course_grid_currency', $currency, $course_id);

$course_options           = get_post_meta($post_id, "_sfwd-courses", true);
$legacy_short_description = isset($course_options['sfwd-courses_course_short_description']) ? $course_options['sfwd-courses_course_short_description'] : '';
// For LD >= 3.0
if (function_exists('learndash_get_course_price')) {
    $price_args = learndash_get_course_price($course_id);
    $price      = $price_args['price'];
    $price_type = $price_args['type'];
} else {
    if ($settings['free_custom_text']) {

        $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : $settings['free_custom_text'];
    } else {
        $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : __('Free', 'edubin-core');
    }
    $price_type = $course_options && isset($course_options['sfwd-courses_course_price_type']) ? $course_options['sfwd-courses_course_price_type'] : '';
}

if (!empty($cg_short_description)) {
    $short_description = $cg_short_description;
} elseif (!empty($legacy_short_description)) {
    $short_description = $legacy_short_description;
} else {
    $short_description = '';
}

/**
 * Filter: individual grid class
 *
 * @param int   $course_id Course ID
 * @param array $course_options Course options
 * @var string
 */
$grid_class = apply_filters('learndash_course_grid_class', '', $course_id, $course_options);

$has_access   = sfwd_lms_has_access($course_id, $user_id);
$is_completed = learndash_course_completed($user_id, $course_id);

$price_text = '';

if (is_numeric($price) && !empty($price)) {
    $price_format = apply_filters('learndash_course_grid_price_text_format', '{currency}{price}');

    $price_text = str_replace(array('{currency}', '{price}'), array($currency, $price), $price_format);
} elseif (is_string($price) && !empty($price)) {
    $price_text = $price;
} elseif (empty($price)) {

    if ($settings['free_custom_text']) {
        $price_text = $settings['free_custom_text'];
    } else {
        $price_text = esc_html__('Free', 'edubin-core');

    }
}

$class        = 'ld_course_grid_price';
$course_class = '';
$ribbon_text  = get_post_meta($post->ID, '_learndash_course_grid_custom_ribbon_text', true);
$ribbon_text  = isset($ribbon_text) && !empty($ribbon_text) ? $ribbon_text : '';

if ($has_access && !$is_completed && $price_type != 'open' && empty($ribbon_text)) {
    $class .= ' ribbon-enrolled';
    $course_class .= ' learndash-available learndash-incomplete ';

    if ($settings['enrolled_custom_text']) {
        $ribbon_text = $settings['enrolled_custom_text'];
    } else {
        $ribbon_text = esc_html__('Enrolled', 'edubin-core');
    }
} elseif ($has_access && $is_completed && $price_type != 'open' && empty($ribbon_text)) {
    $class .= '';
    $course_class .= ' learndash-available learndash-complete';

    if ($settings['completed_custom_text']) {
        $ribbon_text = $settings['completed_custom_text'];
    } else {
        $ribbon_text = esc_html__('Completed', 'edubin-core');
    }

} elseif ($price_type == 'open' && empty($ribbon_text)) {
    if (is_user_logged_in() && !$is_completed) {
        $class .= ' ribbon-enrolled';
        $course_class .= ' learndash-available learndash-incomplete';

        if ($settings['enrolled_custom_text']) {
            $ribbon_text = $settings['enrolled_custom_text'];
        } else {
            $ribbon_text = esc_html__('Enrolled', 'edubin-core');
        }
    } elseif (is_user_logged_in() && $is_completed) {
        $class .= '';
        $course_class .= ' learndash-available learndash-complete';

        if ($settings['enrolled_custom_text']) {
            $ribbon_text = $settings['enrolled_custom_text'];
        } else {
            $ribbon_text = esc_html__('Completed', 'edubin-core');
        }

    } else {
        $course_class .= ' learndash-available';
        $class .= ' ribbon-enrolled';
        $ribbon_text = '';
    }
} elseif ($price_type == 'closed' && empty($price)) {
    $class .= ' ribbon-enrolled';
    $course_class .= ' learndash-available';

    if ($is_completed) {
        $course_class .= ' learndash-complete';
    } else {
        $course_class .= ' learndash-incomplete';
    }

    if (is_numeric($price)) {
        $ribbon_text = $price_text;
    } else {
        $ribbon_text = '';
    }
} else {
    if (empty($ribbon_text)) {

        $class .= !empty($course_options['sfwd-courses_course_price']) ? ' price_' . $currency : ' free';

        $course_class .= ' learndash-not-available learndash-incomplete';
        $ribbon_text = $price_text;
    } else {
        $class .= ' custom';
        $course_class .= ' learndash-not-available learndash-incomplete';
    }
}

/**
 * Filter: individual course ribbon text
 *
 * @param string $ribbon_text Returned ribbon text
 * @param int    $course_id   Course ID
 * @param string $price_type  Course price type
 */
$ribbon_text = apply_filters('learndash_course_grid_ribbon_text', $ribbon_text, $course_id, $price_type);

if ('' == $ribbon_text) {
    $class = '';
}

/**
 * Filter: individual course ribbon class names
 *
 * @param string $class          Returned class names
 * @param int    $course_id      Course ID
 * @param array  $course_options Course's options
 * @var string
 */
$class = apply_filters('learndash_course_grid_ribbon_class', $class, $course_id, $course_options);

/**
 * Filter: individual course container class names
 *
 * @param string $course_class   Returned class names
 * @param int    $course_id      Course ID
 * @param array  $course_options Course's options
 * @var string
 */
$course_class = apply_filters('learndash_course_grid_course_class', $course_class, $course_id, $course_options);

$thumb_size = isset($shortcode_atts['thumb_size']) && !empty($shortcode_atts['thumb_size']) ? $shortcode_atts['thumb_size'] : 'course-thumb'; ?>


     <div class="edubin-course">
        <div class="course__container">

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


          <div class="course__content">
            <div class="course__content--info">

              <h4 class="course__title">
                <a href="<?php the_permalink(); ?>" class="course__title-link">
                  <?php the_title(); ?>
                </a>
              </h4>

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
            </div>
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

        </div>
      </div>