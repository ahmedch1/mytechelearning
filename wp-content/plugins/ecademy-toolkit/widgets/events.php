<?php
/**
 * Events Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Events extends Widget_Base {

	public function get_name() {
        return 'eCademy_Events';
    }

	public function get_title() {
        return __( 'Events', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-toggle';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'course_section',
			[
				'label' => __( 'Events', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'style',
            [
                'label' => __( 'Style', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'1'      => __( 'Style One', 'ecademy-toolkit' ),
					'2'       => __( 'Style Two', 'ecademy-toolkit' ),
					'3'       => __( 'Style Three', 'ecademy-toolkit' ),
					'4'       => __( 'Style Four', 'ecademy-toolkit' ),
				],
				'default' => '1',
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'cat_name', [
                'label' => __( 'Select Category', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => ecademy_toolkit_get_events_cat_list(),
            ]
        );
        $this->add_control(
            'tp_event_category',
            [
                'label' => esc_html__('Add filter item', 'ecademy-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_control(
            'all_text',
            [
                'label'     => __( 'All Text', 'ecademy-toolkit' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => 'ALL',
                'condition' => [
                    'style' => '1',
                ]
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Events Order By', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'DESC'      => __( 'DESC', 'ecademy-toolkit' ),
					'ASC'       => __( 'ASC', 'ecademy-toolkit' ),
				],
				'default' => 'DESC',
            ]
        );

        $this->add_control(
			'count',
			[
				'label' => __( 'Count', 'ecademy-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 9,
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
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-events-box .content h3 a, .single-events-box-item h3 a, .events-box .content h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-events-box .content h3, .single-events-box-item h3, .events-box .content h3',
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Location Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-events-box .content .location, .single-events-box-item .location, .events-box .content .location' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Location Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-events-box .content .location, .single-events-box-item .location,  .events-box .content .location',
                ]
            );

            $this->add_control(
                'date_bg',
                [
                    'label' => esc_html__( 'Date Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-events-box-item .image .date, .single-events-box .image .date' => 'background-color: {{VALUE}}',
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

        $cat_item = $settings['tp_event_category'];

        $ecademy_event_categories = get_terms('tp_event_category');

        $args_options = [];
        foreach ($cat_item as $key => $cat):
            if( !$cat['cat_name'] == '' ) {
                $args_options[] = get_term_by('slug', $cat['cat_name'], 'tp_event_category')->term_id;
            }
        endforeach;

        $event_array = new \WP_Query( array('posts_per_page' => $settings['count'], 'post_type' => 'tp_event', 'order' => $settings['order'], 'tax_query' => array( array( 'taxonomy' => 'tp_event_category', 'terms' => $args_options, ) ) ) );
        ?>

        <?php
        if( $settings['style'] == '1' ):
            if( $settings['all_text'] != '' ) {
                $all = $settings['all_text'];
            }else {
                $all = 'All';
            }
        ?>
            <div class="events-area pt-100 pb-70">
                <div class="container">
                    <div class="shorting-menu shorting-menu-style-two">
                        <button class="filter active" data-filter="all"><?php echo esc_attr($all); ?></button>
                        <?php
                        foreach ( $cat_item as $key => $cat ):
                            if( !$cat['cat_name'] == '' ) {
                                $term = get_term_by('slug', $cat['cat_name'], 'tp_event_category');
                                ?>
                                <button class="filter" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($cat['cat_name']); ?></button>
                                <?php
                            }
                        endforeach;
                        ?>
                    </div>

                    <div class="shorting" id="MixItUpD91DCD">
                        <div class="row">
                            <?php
                                while($event_array->have_posts()): $event_array->the_post();
                                $idd = get_the_ID();
                                $terms = wp_get_post_terms(get_the_ID(), 'tp_event_category');

                                $output = array();
                                if ($terms) {
                                    foreach ($terms as $term) {
                                        $output[] = $term->slug ;
                                        $id[] = $term->term_id ;
                                    }
                                }
                                ?>
                                <div class="col-lg-4 col-sm-6 col-md-6 mix <?php echo join( ' ', $output ); ?>">
                                    <div class="single-events-box">
                                        <div class="image">
                                            <a href="<?php the_permalink(); ?>" class="d-block">
                                                <?php the_post_thumbnail( 'ecademy_default_thumb' ); ?>
                                            </a>
                                            <?php
                                            $date_start = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
                                            $date_string = date_i18n( get_option( 'date_format' ), $date_start ); ?>
                                            <span class="date"><?php echo esc_html( $date_string ); ?></span>
                                        </div>

                                        <div class="content">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <span class="location"><i class="bx bx-map"></i><?php echo esc_html( get_field( 'event_location' ) ); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $settings['style'] == '2' ): ?>
            <div class="container">
                <div class="row">
                    <?php
                    while($event_array->have_posts()): $event_array->the_post();
                        $idd = get_the_ID();
                        $terms = wp_get_post_terms(get_the_ID(), 'tp_event_category');

                        $output = array();
                        if ($terms) {
                            foreach ($terms as $term) {
                                $output[] = $term->slug ;
                                $id[] = $term->term_id ;
                            }
                        }
                        ?>
                        <div class="col-lg-4 col-sm-6 col-md-6">
                            <div class="single-events-box">
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>" class="d-block">
                                        <?php the_post_thumbnail( 'ecademy_default_thumb' ); ?>
                                    </a>
                                    <?php
                                    $date_start = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
                                    $date_string = date_i18n( get_option( 'date_format' ), $date_start ); ?>
                                    <span class="date"><?php echo esc_html( $date_string ); ?></span>
                                </div>

                                <div class="content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <span class="location"><i class="bx bx-map"></i><?php echo esc_html( get_field( 'event_location' ) ); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $settings['style'] == '3' ): ?>
            <div class="container">
                <div class="row">
                    <?php
                    while($event_array->have_posts()): $event_array->the_post();
                        $idd = get_the_ID();
                        $terms = wp_get_post_terms(get_the_ID(), 'tp_event_category');

                        $output = array();
                        if ($terms) {
                            foreach ($terms as $term) {
                                $output[] = $term->slug ;
                                $id[] = $term->term_id ;
                            }
                        }
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-events-box-item">
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>" class="d-block">
                                        <?php the_post_thumbnail( 'ecademy_default_thumb' ); ?>
                                    </a>
                                    <?php

                                    $date_start = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
                                    $date_string = date_i18n( get_option( 'date_format' ), $date_start ); ?>
                                    <span class="date"><?php echo esc_html( $date_string ); ?></span>
                                </div>

                                <div class="content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <span class="location"><i class="bx bx-map"></i><?php echo esc_html( get_field( 'event_location' ) ); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $settings['style'] == '4' ): ?>
            <div class="container">
                <div class="row">
                    <?php
                        $i = 1;
                    while($event_array->have_posts()): $event_array->the_post();
                        $idd = get_the_ID();
                        $terms = wp_get_post_terms(get_the_ID(), 'tp_event_category');

                        $output = array();
                        if ($terms) {
                            foreach ($terms as $term) {
                                $output[] = $term->slug ;
                                $id[] = $term->term_id ;
                            }
                        }
                        ?>
                        <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="events-box">
                                <div class="row m-0">
                                    <div class="col-lg-4 col-md-5 p-0">
                                        <div class="image" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
                                            <?php the_post_thumbnail( 'ecademy_default_thumb' ); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-7 p-0">
                                        <div class="content">
                                            <div class="date">
                                                <?php if( $i < 5 ): ?>
                                                    <?php if( $is_lazyloader == true ): ?>
                                                        <img sm-src="<?php echo get_template_directory_uri() ?>/assets/img/rectangle<?php echo $i ?>.png" alt="<?php the_title(); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/rectangle<?php echo $i ?>.png" alt="<?php the_title(); ?>">
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if( $is_lazyloader == true ): ?>
                                                        <img sm-src="<?php echo get_template_directory_uri() ?>/assets/img/rectangle<?php echo rand(1,4); ?>.png" alt="<?php the_title(); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/rectangle<?php echo rand(1,4); ?>.png" alt="<?php the_title(); ?>">
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php
                                                $date_start = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
                                                $date_string = date_i18n( get_option( 'date_format' ), $date_start ); ?>
                                                <span class="date"><?php echo esc_html( $date_string ); ?></span>
                                            </div>
                                            <h3 class="font-weight-black"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p><?php the_excerpt(); ?></p>
                                            <span class="location"><i class="bx bx-map"></i><?php echo esc_html( get_field( 'event_location' ) ); ?></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php ++$i; endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Events );