<?php
/**
 * Experience Area  Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_ExperienceArea  extends Widget_Base {

	public function get_name() {
        return 'ExperienceArea ';
    }

	public function get_title() {
        return esc_html__( 'Experience Area ', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-skill-bar';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_ExperienceArea ',
			[
				'label' => esc_html__( 'eCademy Experience Area ', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'style',
                [
                    'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => esc_html__( 'Style One', 'ecademy-toolkit' ),
                        '2'         => esc_html__( 'Style Two', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Join our World Famous Yoga Teacher Training Course... Online!', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('200hr, 300hr & 500hr Certified Online Yoga courses', 'ecademy-toolkit'),
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
                'content',
                [
                    'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('eCademy training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes virtually by sitting in your comfort zone. Our flexible learning initiatives will help you to learn better and quicker than the traditional ways of learning skills.', 'ecademy-toolkit'),
                ]
            );
            $repeater = new Repeater();
            $repeater->add_control(
                'title', [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Receive a Yoga Alliance Certificate', 'ecademy-toolkit' ),
                ]
            );
            $repeater->add_control(
                'default_icon', [
                    'label' => esc_html__( 'Select Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                ]
            );
            $this->add_control(
                'lists',
                [
                    'label' => esc_html__('List Items', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
				'video_link',
				[
					'label' 	=> esc_html__( 'Video Button Link', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('https://www.youtube.com/watch?v=PWvPbGWVRrU', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => '1',
                    ]
				]
            );

            $this->add_control(
				'video_title',
				[
					'label' 	=> esc_html__( 'Image Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('15 Years of Experience', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Get Started Now', 'ecademy-toolkit'),
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
                'link_type',
                [
                    'label' 		=> esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' => [
                        '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' 		=> esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'ex_link',
                [
                    'label'		=> esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_images',
			[
				'label' => esc_html__( 'Images', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'fimage',
                [
                    'label' => esc_html__( 'Experience Area  Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'simage_bg_color',
                [
                    'label' => esc_html__( 'Image Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .experience-image::before, .experience-image .title' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'shape1',
                [
                    'label' => esc_html__( 'Shape Image One', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'shape2',
                [
                    'label' => esc_html__( 'Shape Image Two', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'shape3',
                [
                    'label' => esc_html__( 'Shape Image Three', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
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
                        '{{WRAPPER}} .experience-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .experience-content .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .experience-content h2, .experience-content h3, .experience-content h4, .experience-content h5, .experience-content h5, .experience-content h6, .experience-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .experience-content h2, .experience-content h3, .experience-content h4, .experience-content h5, .experience-content h5, .experience-content h6, .experience-content h1',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .experience-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .experience-content p',
                ]
            );

            $this->add_control(
                'list_color',
                [
                    'label' => esc_html__( 'List Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .experience-content .features-list li' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'list_typography',
                    'label' => __( 'List Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .experience-content .features-list li',
                ]

            );

            $this->add_control(
                'main_bg_color',
                [
                    'label' => esc_html__( 'Main Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .experience-image .video-btn, .experience-content .features-list li i, .experience-content .features-list li i::after' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'main_hover_bg_color',
                [
                    'label' => esc_html__( 'Main Hover Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .experience-content .features-list li:hover i, .experience-image .video-btn:hover {{VALUE}}',
                        '{{WRAPPER}} .experience-content .features-list li:hover i' => 'color: {{VALUE}}',
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

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }

        // Button Icon
        if( $settings['button_icon'] != '' ):
            $btn_icon = $settings['button_icon'];
        else:
            $btn_icon = 'flaticon-user';
        endif;
        ?>
        <?php if( $settings['style'] == '1' ): ?>
            <div class="experience-area ptb-100 extra-padding">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="experience-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                <ul class="features-list">
                                    <?php foreach( $settings['lists'] as $item ):
                                        // Icon
                                        $icon = $item['default_icon'];
                                        ?>
                                        <li><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $item['title'] ); ?></li>
                                    <?php endforeach; ?>
                                </ul>

                                <?php if( $settings['button_text'] != '' ): ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $btn_icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <?php if( $settings['fimage']['url'] != '' ): ?>
                                <div class="experience-image">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                                    <?php endif; ?>

                                    <?php if( $settings['video_link'] != '' ): ?>
                                        <a href="<?php echo esc_url( $settings['video_link'] ); ?>" class="video-btn popup-youtube"><i class="flaticon-play"></i></a>
                                    <?php endif; ?>
                                    <?php if( $settings['video_title'] != '' ): ?>
                                        <span class="title"><?php echo esc_html( $settings['video_title'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif( $settings['style'] == '2' ): ?>
            <div class="experience-area ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="experience-content">
                                <?php if( $settings['shape1']['url'] != '' ): ?>
                                    <div class="shape">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit') ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit') ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                <ul class="features-list">
                                    <?php foreach( $settings['lists'] as $item ):
                                        // Icon
                                        $icon = $item['default_icon'];
                                        ?>
                                        <li><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $item['title'] ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if( $settings['button_text'] != '' ): ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $btn_icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <?php if( $settings['fimage']['url'] != '' ): ?>
                                <div class="experience-img">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                                    <?php endif; ?>

                                    <?php if( $settings['video_title'] != '' ): ?>
                                        <span class="title"><?php echo esc_html( $settings['video_title'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if( $settings['shape2']['url'] != '' ): ?>
                    <div class="experience-shape1">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit') ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit') ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if( $settings['shape3']['url'] != '' ): ?>
                    <div class="experience-shape2">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit') ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit') ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_ExperienceArea  );