<?php
/**
 * Courses Filter Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Courses_Filter extends Widget_Base {

	public function get_name() {
        return 'CoursesFilter';
    }

	public function get_title() {
        return esc_html__( 'LearnPress Courses Filter', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tabs';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'course_section',
			[
				'label' => esc_html__( 'LearnPress Courses Filter', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'cat_name', [
                'label' => esc_html__( 'Select Category', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => ecademy_toolkit_get_courses_cat_list(),
            ]
        );

        $repeater->add_control(
			'count',
			[
				'label' => __( 'Course Per Tab', 'ecademy-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
        );

        $this->add_control(
            'course_cat',
            [
                'label' => esc_html__('Add filter nav item', 'ecademy-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_control(
            'all_title',
            [
                'label' => esc_html__( 'All Button Text', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('All', 'ecademy-toolkit'),
            ]
        );

        $this->add_control(
			'count',
			[
				'label' => esc_html__( 'All Courses Per Tab', 'ecademy-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Courses Filter Order By', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'DESC'      => esc_html__( 'DESC', 'ecademy-toolkit' ),
					'ASC'       => esc_html__( 'ASC', 'ecademy-toolkit' ),
				],
				'default' => 'DESC',
            ]
        );


        $this->add_control(
            'shape',
            [
                'label' => esc_html__( 'Shape Image One', 'ecademy-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'nav_item_color',
                [
                    'label' => esc_html__( 'Nav Item Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .shorting-menu .filter' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'nav_item_size',
                [
                    'label' => esc_html__( 'Nav Item Font Size', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 40,
                            'step' => 1,
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .shorting-menu .filter' => 'font-size: {{SIZE}}px;',
                    ],
                ]
            );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

        if( $settings != '' ) {
            $all = $settings['all_title'];
        }else {
            $all = 'All';
        }

        $cat_item = $settings['course_cat'];

        $ecademy_courses_categories = get_terms('course_category');


        $args_options = [];
        foreach ($cat_item as $key => $cat):
            if( !$cat['cat_name'] == '' ) {
                $args_options[] = get_term_by('slug', $cat['cat_name'], 'course_category')->term_id;
            }
        endforeach;

        $course_array = new \WP_Query( array('posts_per_page' => $settings['count'], 'post_type' => 'lp_course', 'order' => $settings['order'], 'tax_query' => array( array( 'taxonomy' => 'course_category', 'terms' => $args_options, ) ),'meta_key' => '_thumbnail_id' ) );
        ?>

            <div class="container">
                <div class="shorting-menu">
                    <button class="filter active all" data-filter=".all"><?php echo esc_attr($all); ?></button>
                    <?php
                    foreach ($cat_item as $key => $cat):
                        if( !$cat['cat_name'] == '' ) {
                            $term = get_term_by('slug', $cat['cat_name'], 'course_category');
                            ?>
                            <button class="filter" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($cat['cat_name']); ?></button>
                            <?php
                        }
                    endforeach;
                    ?>
                </div>

                <div class="shorting">
                    <div class="row">
                        <?php
                        while($course_array->have_posts()): $course_array->the_post();
                        $idd = get_the_ID();
                        $terms = wp_get_post_terms(get_the_ID(), 'course_category');

                        $output = array();
                        if ($terms) {
                            foreach ($terms as $term) {
                                $output[] = $term->slug ;
                                $id[] = $term->term_id ;
                            }
                        }
                        $course         = \LP_Global::course();
                        ?>
                            <div class="col-lg-4 col-md-6 mix all">
                                <div class="single-courses-item-box">
                                    <div class="courses-image">
                                        <a href="<?php the_permalink(); ?>" class="d-block image">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php the_post_thumbnail_url('ecademy_courses_gallery_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                            <?php else: ?>
                                                <img src="<?php the_post_thumbnail_url('ecademy_courses_gallery_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                            <?php endif; ?>
                                        </a>
                                        <?php echo $course->get_course_price_html(); ?>
                                    </div>

                                    <div class="courses-content">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="rating">
                                            <?php ecademy_course_ratings(); ?>
                                            <div class="rating-total">
                                                (<?php ecademy_course_ratings_count(); ?> <?php esc_html_e('rating', 'ecademy-toolkit'); ?>)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>

                        <?php foreach ($cat_item as $key => $cat):
                            if( !$cat['cat_name'] == '' ) {
                                $args_options = get_term_by('slug', $cat['cat_name'], 'course_category')->term_id;
                            }

                            $course_array = new \WP_Query( array('posts_per_page' => $cat['count'], 'post_type' => 'lp_course', 'order' => $settings['order'], 'tax_query' => array( array( 'taxonomy' => 'course_category', 'terms' => $args_options, ) ),'meta_key' => '_thumbnail_id' ) );
                            ?>

                            <?php
                            while($course_array->have_posts()): $course_array->the_post();
                            $idd = get_the_ID();
                            $terms = wp_get_post_terms(get_the_ID(), 'course_category');

                            $term = get_term(  $args_options, 'course_category' );
                            $slug = $term->slug;

                            $output = array();
                            if ($terms) {
                                foreach ($terms as $term) {
                                    $output[] = $term->slug ;
                                    $id[] = $term->term_id ;
                                }
                            }
                            $course         = \LP_Global::course();
                            ?>
                                <div class="col-lg-4 col-md-6 mix <?php echo $slug; ?>">
                                    <div class="single-courses-item-box">
                                        <div class="courses-image">
                                            <a href="<?php the_permalink(); ?>" class="d-block image">
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php the_post_thumbnail_url('ecademy_courses_gallery_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                <?php else: ?>
                                                    <img src="<?php the_post_thumbnail_url('ecademy_courses_gallery_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                <?php endif; ?>
                                            </a>
                                            <?php echo $course->get_course_price_html(); ?>
                                        </div>

                                        <div class="courses-content">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="rating">
                                                <?php ecademy_course_ratings(); ?>
                                                <div class="rating-total">
                                                    (<?php ecademy_course_ratings_count(); ?> <?php esc_html_e('rating', 'ecademy-toolkit'); ?>)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_query(); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?php if( $settings['shape']['url'] != '' ): ?>
                <div class="shape16">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url($settings['shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url($settings['shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Courses_Filter );