<?php

/**
 * A single course loop
 *
 * @since v.1.0.0
 * @author envytheme
 * @url https://envytheme.com
 *
 * @package eCademy/Templates
 * @version 1.4.3
 */
global $ecademy_opt;

$lessons_title  = !empty($ecademy_opt['lessons_title']) ? $ecademy_opt['lessons_title'] : 'Lessons';
$students_title = !empty($ecademy_opt['students_title']) ? $ecademy_opt['students_title'] : 'Students';

$course_id          = get_the_ID();
$tutor_lesson_count = tutor_utils()->get_lesson_count_by_course($course_id);

do_action('tutor_course/loop/before_content');
?>
    <div class="courses-image">
        <a href="<?php the_permalink(); ?>" class="d-block image">
        <?php the_post_thumbnail(); ?>
        </a>

        <?php
        $course_id = get_the_ID();
        $price_html = '<div class="price shadow"><span class="new-price"> '.esc_html__('Free', 'ellen').'</span></div>';
        if (tutor_utils()->is_course_purchasable()) {
            $product_id = tutor_utils()->get_course_product_id($course_id);
            $product    = wc_get_product( $product_id );
            if ( $product ) {
                $price_html = '<div class="price shadow"> '.$product->get_price_html().' </div>';
            }
        }
        echo $price_html;
        ?>

    </div>
    <div class="courses-content">
        <div class="course-author d-flex align-items-center">
            <?php
            $course_rating = tutor_utils()->get_course_rating();
            tutor_utils()->star_rating_generator($course_rating->rating_avg);
            ?>
            <span class="tutor-rating-count">
                <?php
                if ($course_rating->rating_avg > 0) {
                    echo wp_kses(apply_filters('tutor_course_rating_average', $course_rating->rating_avg), 'ellenallowedhtml');
                    echo wp_kses('<span class="total">(' . apply_filters('tutor_course_rating_count', $course_rating->rating_count) . ')</span>', 'ellenallowedhtml');
                }
                ?>
            </span>
        </div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
        <ul class="courses-box-footer d-flex justify-content-between align-items-center">
            <li>
                <i class="flaticon-agenda"></i> <?php echo $tutor_lesson_count; ?> <?php echo esc_html( $lessons_title ); ?></li>
            <li>
                <i class="flaticon-people"></i> <?php echo (int) tutor_utils()->count_enrolled_users_by_course(); ?>  <?php echo esc_html( $students_title ); ?>
            </li>
        </ul>
    </div>

<?php
do_action('tutor_course/loop/after_content');