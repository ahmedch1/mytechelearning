<?php
/**
 * Instant Courses Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Instant_Courses_Area extends Widget_Base {

	public function get_name() {
        return 'Instant_Courses_Area';
    }

	public function get_title() {
        return esc_html__( 'Instant Courses Area', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-single-post';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Instant_Courses_Area',
			[
				'label' => esc_html__( 'eCademy Instant Courses Area', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'style',
                [
                    'label' => __( 'Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => __( 'Style One', 'ecademy-toolkit' ),
                        '2'         => __( 'Style Two', 'ecademy-toolkit' ),
                        '3'         => __( 'Style Three', 'ecademy-toolkit' ),
                        '4'         => __( 'Style Four(about shape-image: Only work shape image one)', 'ecademy-toolkit' ),
                        '5'         => __( 'Style Five(about shape-image: Only work shape image one)', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Get Instant Access to the Free', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Self Development Course', 'ecademy-toolkit'),
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
                    'default' => esc_html__('With the open university you can study whenever and wherever you choose. We have students in over 128 countries, and a global reputation as a pioneer in the field of flexible learning. Our flexible teaching also means, if you travel often or need to relocate, you can continue to study wherever you go.', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'image',
                [
                    'label' => esc_html__( 'Section Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
				'user_button_text',
				[
					'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Profile', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Start For Free', 'ecademy-toolkit'),
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
			'section_shape_images',
			[
				'label' => esc_html__( 'Shape Images', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'shape_image1',
                [
                    'label' => esc_html__( 'Shape Image One', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'shape_image2',
                [
                    'label' => esc_html__( 'Shape Image Two', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_image3',
                [
                    'label' => esc_html__( 'Shape Image Three', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '1',
                    ]
                ]
            );

            $this->add_control(
                'shape_image4',
                [
                    'label' => esc_html__( 'Shape Image Three', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '3',
                    ]
                ]
            );

            $this->add_control(
                'shape_image5',
                [
                    'label' => esc_html__( 'Shape Image Four', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '3',
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
                'section_bg_color',
                [
                    'label' => esc_html__( 'Section Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .view-all-courses-area.bg-fef8ef' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .get-instant-courses-content .sub-title, .view-all-courses-content .sub-title, .view-all-courses-content-style-two .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .get-instant-courses-content .sub-title, .view-all-courses-content .sub-title, .view-all-courses-content-style-two .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .get-instant-courses-content h2, .get-instant-courses-content h3, .get-instant-courses-content h4, .get-instant-courses-content h5, .get-instant-courses-content h5, .get-instant-courses-content h6, .get-instant-courses-content h1, .view-all-courses-content h2, .view-all-courses-content h3, .view-all-courses-content h4, .view-all-courses-content h5, .view-all-courses-content h5, .view-all-courses-content h6, .view-all-courses-content h1, .view-all-courses-content-style-two h2, .view-all-courses-content-style-two h3, .view-all-courses-content-style-two h4, .view-all-courses-content-style-two h5, .view-all-courses-content-style-two h5, .view-all-courses-content-style-two h6, .view-all-courses-content-style-two h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .get-instant-courses-content h2, .get-instant-courses-content h3, .get-instant-courses-content h4, .get-instant-courses-content h5, .get-instant-courses-content h5, .get-instant-courses-content h6, .get-instant-courses-content h1, .view-all-courses-content h2, .view-all-courses-content h3, .view-all-courses-content h4, .view-all-courses-content h5, .view-all-courses-content h5, .view-all-courses-content h6, .view-all-courses-content h1, .view-all-courses-content-style-two h2, .view-all-courses-content-style-two h3, .view-all-courses-content-style-two h4, .view-all-courses-content-style-two h5, .view-all-courses-content-style-two h5, .view-all-courses-content-style-two h6, .view-all-courses-content-style-two h1',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .get-instant-courses-content p, .view-all-courses-content p, .view-all-courses-content-style-two p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .get-instant-courses-content p, .view-all-courses-content p, .view-all-courses-content-style-two p',
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

        if ( is_user_logged_in() ):
            $button_text = $settings['user_button_text'];
        else:
            $button_text = $settings['button_text'];
        endif;
        ?>
        <?php if( $settings['style'] == '1' ): ?>
            <div class="get-instant-courses-area">
                <div class="container">
                    <div class="get-instant-courses-inner-area">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <div class="get-instant-courses-content">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                    <?php if( $button_text != '' ):
                                        // Button Icon
                                        if( $settings['button_icon'] != '' ):
                                            $icon = $settings['button_icon'];
                                        else:
                                            $icon = 'flaticon-user';
                                        endif;
                                    ?>
                                        <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="get-instant-courses-image">
                                    <?php if( $settings['image']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if( $settings['shape_image1']['url'] != '' ): ?>
                                        <div class="shape7" data-speed="0.02" data-revert="true">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if( $settings['shape_image2']['url'] != '' ): ?>
                                        <div class="shape6" data-speed="0.02" data-revert="true">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php if( $settings['shape_image3']['url'] != '' ): ?>
                            <div class="shape5" data-speed="0.02" data-revert="true">
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php elseif( $settings['style'] == '2' ): ?>
            <div class="view-all-courses-area bg-fef8ef">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="view-all-courses-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php if( $button_text != '' ):
                                    // Button Icon
                                    if( $settings['button_icon'] != '' ):
                                        $icon = $settings['button_icon'];
                                    else:
                                        $icon = 'flaticon-agenda';
                                    endif;
                                ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="view-all-courses-image">
                                <?php if( $settings['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if( $settings['shape_image1']['url'] != '' ): ?>
                    <div class="shape1" data-speed="0.01" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( $settings['shape_image2']['url'] != '' ): ?>
                    <div class="shape9" data-speed="0.01" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $settings['style'] == '3' ): ?>
            <div class="view-all-courses-area-two ptb-70 bg-fef8ef">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="view-all-courses-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php if( $button_text != '' ):
                                    // Button Icon
                                    if( $settings['button_icon'] != '' ):
                                        $icon = $settings['button_icon'];
                                    else:
                                        $icon = 'flaticon-agenda';
                                    endif;
                                ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="view-all-courses-image">
                                <?php if( $settings['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if( $settings['shape_image1']['url'] != '' ): ?>
                                    <div class="shape11" data-speed="0.01" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape_image2']['url'] != '' ): ?>
                                    <div class="shape12" data-speed="0.01" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if( $settings['shape_image4']['url'] != '' ): ?>
                    <div class="shape1" data-speed="0.01" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( $settings['shape_image5']['url'] != '' ): ?>
                    <div class="shape9" data-speed="0.01" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $settings['style'] == '4' ): ?>
            <div class="get-instant-courses-area-two bg-f9fbff">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="get-instant-courses-content-style-two">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php if( $button_text != '' ):
                                    // Button Icon
                                    if( $settings['button_icon'] != '' ):
                                        $icon = $settings['button_icon'];
                                    else:
                                        $icon = 'flaticon-agenda';
                                    endif;
                                ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-12">
                            <div class="get-instant-courses-image-style-two">
                                <?php if( $settings['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if( $settings['shape_image1']['url'] != '' ): ?>
                    <div class="bulb">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $settings['style'] == '5' ): ?>
            <div class="view-all-courses-area-three bg-fff8f8">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="view-all-courses-image-style-two">
                                <?php if( $settings['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="view-all-courses-content-style-two">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php if( $button_text != '' ):
                                    // Button Icon
                                    if( $settings['button_icon'] != '' ):
                                        $icon = $settings['button_icon'];
                                    else:
                                        $icon = 'flaticon-agenda';
                                    endif;
                                ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if( $settings['shape_image1']['url'] != '' ): ?>
                    <div class="bulb">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Instant_Courses_Area );