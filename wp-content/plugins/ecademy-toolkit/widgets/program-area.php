<?php
/**
 * Program Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Program_Area extends Widget_Base {

	public function get_name() {
        return 'ProgramArea';
    }

	public function get_title() {
        return esc_html__( 'Program Area', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-custom';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Program_Area_controls',
			[
				'label' => esc_html__( 'Program Area Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'section_background',
                    'label' => esc_html__( 'Background', 'ecademy-toolkit' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .program-area',
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Choose Your Program Below to See How We Can Help', 'ecademy-toolkit'),
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

            $this->add_control(
                'shape1',
                [
                    'label' => esc_html__( 'Shape Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'user_button_text',
                [
                    'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
                    'type' 		=> Controls_Manager::TEXT,
                    'default' 	=> esc_html__('Profile', 'ecademy-toolkit'),
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
            $repeater = new Repeater();
            $repeater->add_control(
                'shape_image', [
                    'label'     => esc_html__( 'Shape Image', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'     => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Certification Courses', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'content', [
                    'label'     => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Lorem ipsum dolor sit amet ut, adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ecademy-toolkit'),
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
            $repeater->add_control(
                'link_text', [
                    'label'     => esc_html__( 'Link Text', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Read More', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'link_type', [
                    'label'     => esc_html__( 'Link Type', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'     => esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2'     => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );
            $repeater->add_control(
                'link_to_page', [
                    'label'     => esc_html__( 'Link Page', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );
            $repeater->add_control(
                'ex_link', [
                    'label'     => esc_html__( 'External Page', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );
            $this->add_control(
                'card_item',
                [
                    'label' => esc_html__('Card Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'style',
			[
				'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'card_bg_color',
				[
					'label' => esc_html__( 'Card Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-program-box' => 'background-color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => esc_html__( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .program-section-title h1, .program-section-title h2, .program-section-title h3, .program-section-title h4, .program-section-title h5, .program-section-title h6',
                ]
            );

            $this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .program-section-title h1, .program-section-title h2, .program-section-title h3, .program-section-title h4, .program-section-title h5, .program-section-title h6' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => esc_html__( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .program-section-title p',
                ]
            );

            $this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .program-section-title p' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'card_title_typography',
                    'label' => esc_html__( 'Card Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-program-box h3',
                ]
            );

            $this->add_control(
				'card_title_color',
				[
					'label' => esc_html__( 'Card Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-program-box h3' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'card_content_typography',
                    'label' => esc_html__( 'Card Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-program-box p',
                ]
            );

            $this->add_control(
				'card_content_color',
				[
					'label' => esc_html__( 'Card Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-program-box p' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'link_typography',
                    'label' => esc_html__( 'Link Text Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-program-box .link-btn',
                ]
            );

            $this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Link Text Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-program-box .link-btn' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'link_hover_color',
				[
					'label' => esc_html__( 'Link Text Hover Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-program-box .link-btn:hover' => 'color: {{VALUE}}',
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

        ?>
        <div class="program-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="program-section-title">
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                            <?php
                            if ( is_user_logged_in() ):
                                $button_text = $settings['user_button_text'];
                            else:
                                $button_text = $settings['button_text'];
                            endif;
                            if( $button_text ):
                                // Button Icon
                                if( $settings['button_icon'] != '' ):
                                    $icon = $settings['button_icon'];
                                else:
                                    $icon = 'flaticon-user';
                                endif;

                                // Get Button Link
                                if($settings['link_type'] == 1){
                                    $link = get_page_link( $settings['link_to_page'] );
                                } else {
                                    $link = $settings['ex_link'];
                                }
                            ?>
                                <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="program-list">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <?php $i = 1; foreach( $settings['card_item'] as $item ):

                                        // Get Button Link
                                        if( $item['link_type'] == 1 ){
                                            $link = get_page_link( $item['link_to_page'] );
                                        } else {
                                            $link = $item['ex_link'];
                                        }

                                        // Icon
                                        $icon =$item['default_icon'];
                                        if( $i == 1 || $i == 2 || $i == 5 || $i == 7 || $i == 9 || $i == 11 || $i == 13 || $i == 15 || $i == 17 ):
                                            ?>
                                            <div class="single-program-box">
                                                <?php if( $item['shape_image']['url'] != '' ): ?>
                                                    <div class="shape">
                                                        <?php if( $is_lazyloader == true ): ?>
                                                            <img sm-src="<?php echo esc_url( $item['shape_image']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit'); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo esc_url( $item['shape_image']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit'); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if( $icon != '' ): ?>
                                                    <div class="icon">
                                                        <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                                    </div>
                                                <?php endif;?>
                                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                                <p><?php echo esc_html( $item['content'] ); ?></p>
                                                <?php if( $link != '' ): ?>
                                                    <a href="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                        endif;
                                    $i++;
                                    endforeach;
                                    ?>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <?php $i = 1; foreach( $settings['card_item'] as $item ):

                                        // Get Button Link
                                        if( $item['link_type'] == 1 ){
                                            $link = get_page_link( $item['link_to_page'] );
                                        } else {
                                            $link = $item['ex_link'];
                                        }

                                        // Icon
                                        if( $i != 1 && $i != 2 && $i != 5 && $i != 7 && $i != 9 && $i != 11 && $i != 13 && $i != 15 && $i != 17 ):
                                            ?>
                                            <div class="single-program-box mb-20">
                                                <?php if( $item['shape_image']['url'] != '' ): ?>
                                                    <div class="shape">
                                                        <?php if( $is_lazyloader == true ): ?>
                                                            <img sm-src="<?php echo esc_url( $item['shape_image']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit'); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo esc_url( $item['shape_image']['url'] ); ?>" alt="<?php echo esc_attr_e('Shape Image', 'ecademy-toolkit'); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if( $icon != '' ): ?>
                                                    <div class="icon">
                                                        <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                                    </div>
                                                <?php endif;?>
                                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                                <p><?php echo esc_html( $item['content'] ); ?></p>
                                                <?php if( $link != '' ): ?>
                                                    <a href="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                        endif;
                                    $i++;
                                    endforeach;
                                    ?>
                                </div>
                            </div>

                            <?php if( $settings['shape1']['url'] != '' ): ?>
                                <div class="program-circle-shape">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_urL( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_urL( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Program_Area );