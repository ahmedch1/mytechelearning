<?php
/**
 * Events Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Events_Area extends Widget_Base {

	public function get_name() {
        return 'eCademy_Events_Area';
    }

	public function get_title() {
        return __( 'Events Area', 'ecademy-toolkit' );
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
				'label' => __( 'Events Area', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'top_title',
            [
                'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('COACHING PROGRAM', 'ecademy-toolkit'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('My Upcoming Events', 'ecademy-toolkit'),
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                    'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                    'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                    'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                    'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                    'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                ],
                'default' => 'h2',
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
				'default' => 2,
			]
        );

        $this->add_control(
            'button_text',
            [
                'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
                'type' 		=> Controls_Manager::TEXT,
                'default' 	=> __('Buy Ticket', 'ecademy-toolkit'),
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__( 'Button Icon', 'ecademy-toolkit' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'options' => ecademy_flaticons(),
            ]
        );

        $this->add_control(
			'img',
			[
				'label' => __( 'Section Image', 'ecademy-toolkit' ),
				'type' => Controls_Manager::MEDIA,
			]
        );

        $this->add_control(
			'shape_img',
			[
				'label' => __( 'Shape Image', 'ecademy-toolkit' ),
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
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coaching-events-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .coaching-events-content .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Section Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coaching-events-content h2, .coaching-events-content h3, .coaching-events-content h4, .coaching-events-content h5, .coaching-events-content h5, .coaching-events-content h6, .coaching-events-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .coaching-events-content h2, .coaching-events-content h3, .coaching-events-content h4, .coaching-events-content h5, .coaching-events-content h5, .coaching-events-content h6, .coaching-events-content h1',
                ]
            );

            $this->add_control(
                'event_title_color',
                [
                    'label' => esc_html__( 'Event Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-coaching-events-box h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_title_typography',
                    'label' => __( 'Event Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-coaching-events-box h3',
                ]
            );

            $this->add_control(
                'event_top_title_color',
                [
                    'label' => esc_html__( 'Location Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-coaching-events-box .location' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_top_title_typography',
                    'label' => __( 'Location Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-coaching-events-box .location',
                ]
            );

            $this->add_control(
                'date_bg',
                [
                    'label' => esc_html__( 'Date Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-coaching-events-box .date' => 'background-color: {{VALUE}}',
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

        $event_array = new \WP_Query( array('posts_per_page' => $settings['count'], 'post_type' => 'tp_event', 'order' => $settings['order']) );

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        ?>
        <div class="events-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="coaching-events-content">
                            <?php if( $settings['top_title'] != '' ): ?>
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <?php endif; ?>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                            <?php
                            while($event_array->have_posts()): $event_array->the_post();
                            $idd = get_the_ID();
                            ?>
                                <div class="single-coaching-events-box">
                                    <span class="location"><i class='bx bx-map'></i><?php echo esc_html( get_field( 'event_location' ) ); ?></span>
                                    <h3 class="inter-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                    <?php if($settings['button_text']): ?>
                                        <a href="<?php the_permalink(); ?>" class="default-btn"><i class="<?php echo esc_attr($settings['button_icon']); ?>"></i> <?php echo esc_html($settings['button_text']); ?><span></span></a>
                                    <?php endif; ?>

                                    <?php
                                    $date_start = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
                                    $date_string = date_i18n( get_option( 'date_format' ), $date_start ); 
                                    
                                    $month = explode(' ', trim($date_string ))[0];
                                    $date = explode(' ', trim($date_string ))[1];
                                    $date = str_replace(",","",$date);
                                    ?>

                                    <div class="date">
                                        <div class="div">
                                            <?php echo esc_html($date); ?>
                                            <span><?php echo esc_html($month); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <?php if($settings['img']['url']): ?>
                            <div class="coaching-events-image">
                                <img src="<?php echo esc_url($settings['img']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <?php if($settings['shape_img']['url']): ?>
                <div class="c-shape5">
                    <img src="<?php echo esc_url($settings['shape_img']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                </div>
            <?php endif; ?>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Events_Area );