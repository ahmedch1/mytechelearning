<?php
/**
 * Features Boxes Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Features_Boxes extends Widget_Base {

	public function get_name() {
        return 'eCademy_Features_Boxe';
    }

	public function get_title() {
        return esc_html__( 'Feature Boxes', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-star-o';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'ecademy_features_boxes_controls',
			[
				'label' => esc_html__( 'Features Boxes Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'card_style',
                [
                    'label' => esc_html__( 'Card Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'              => esc_html__( 'Style One', 'ecademy-toolkit' ),
                        '2'              => esc_html__( 'Style Two', 'ecademy-toolkit' ),
                        '3'              => esc_html__( 'Style Three', 'ecademy-toolkit' ),
                        '4'              => esc_html__( 'Style Four(with image)', 'ecademy-toolkit' ),
                        '5'              => esc_html__( 'Style Five(with image)', 'ecademy-toolkit' ),
                        '6'              => esc_html__( 'Style Six', 'ecademy-toolkit' ),
                        '7'              => esc_html__( 'Style Seven', 'ecademy-toolkit' ),
                        '8'              => esc_html__( 'Style Eight(with image){Link will not work in this style}', 'ecademy-toolkit' ),
                        '9'              => esc_html__( 'Style Nine', 'ecademy-toolkit' ),
                        '10'             => esc_html__( 'Style Ten', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => esc_html__( 'Choose Columns', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => esc_html__( '1', 'ecademy-toolkit' ),
                        '2'   => esc_html__( '2', 'ecademy-toolkit' ),
                        '3'   => esc_html__( '3', 'ecademy-toolkit' ),
                        '4'   => esc_html__( '4', 'ecademy-toolkit' ),
                        'default'   => esc_html__( 'Default', 'ecademy-toolkit' ),
                    ],
                    'default' => 'default',
                ]
            );

            $this->add_control(
                'icon_bg',
                [
                    'label' => esc_html__( 'Icon Background Shape Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'card_style' => '3',
                    ]
                ]
            );

            $this->add_control(
                'top',
                [
                    'label' => __( 'Padding Top', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -40,
                            'max' => 100,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 40,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .single-box-item' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'card_style' => '3',
                    ]
                ]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'single_card_style', [
                    'label' => esc_html__( 'Card Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'              => esc_html__( 'With Icon', 'ecademy-toolkit' ),
                        '2'              => esc_html__( 'With Image', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $repeater->add_control(
                'image', [
                    'label'     => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                    'description' => esc_html__( 'Please make sure to select Card Style: Style Four/Five/Eight', 'ecademy-toolkit'),
                    'condition' => [
                        'single_card_style' => '2',
                    ]
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'     => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Learn the latest skills', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'content', [
                    'label'     => __( 'Content', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Lorem ipsum dolor sit amet, consecteur adipiscing elit, sed do eiusmod tempor.', 'ecademy-toolkit'),
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
                    'label'     => __( 'Link Text', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Start Now!', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'link_type', [
                    'label'     => __( 'Link Type', 'ecademy-toolkit' ),
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
                    'label'     => __( 'Link Page', 'ecademy-toolkit' ),
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
                    'label'     => __( 'External Page', 'ecademy-toolkit' ),
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

            $this->add_control(
                'link_tab_type',
                [
                    'label' => esc_html__( 'Link Type', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '_blank'              => esc_html__( 'Opens the linked document in a new window or tab', 'ecademy-toolkit' ),
                        '_self'              => esc_html__( '	Opens the linked document in the same frame as it was clicked', 'ecademy-toolkit' ),
                        '_parent'              => esc_html__( 'Opens the linked document in the parent frame', 'ecademy-toolkit' ),
                        '_top'              => esc_html__( 'Opens the linked document in the full body of the window', 'ecademy-toolkit' ),
                    ],
                    'default' => '_self',
                ]
            );

            $this->add_control(
                'bottom_title',
                [
                    'label' => __( 'Bottom Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('If you want more?', 'ecademy-toolkit'),
                    'condition' => [
                        'card_style' => '4',
                    ]
                ]
            );
            $this->add_control(
                'bottom_link_title',
                [
                    'label' => __( 'Bottom Link Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('View More Courses', 'ecademy-toolkit'),
                    'condition' => [
                        'card_style' => '4',
                    ]
                ]
            );

            $this->add_control(
                'link_type',
                [
                    'label' 		=> esc_html__( 'Link Type', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' => [
                        '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                    'condition' => [
                        'card_style' => '4',
                    ]
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' 		=> esc_html__( 'Link Page', 'ecademy-toolkit' ),
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
                    'label'		=> esc_html__('External Link', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'features_boxes_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'card_bg_color',
				[
					'label' => __( 'Card Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-features-box, {{WRAPPER}} .single-box-item, {{WRAPPER}} .single-training-box, {{WRAPPER}} .single-lifestyle-box:hover, {{WRAPPER}} .single-health-services-box, {{WRAPPER}} .features-box' => 'background-color: {{VALUE}}',
					],
				]
            );

            $this->add_control(
				'main_color',
				[
					'label' => __( 'Main Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-lifestyle-box .icon, {{WRAPPER}} .single-health-services-box .icon, {{WRAPPER}} .features-box .link-btn' => 'color: {{VALUE}}',
						'{{WRAPPER}} .single-lifestyle-box, {{WRAPPER}} .single-health-services-box .icon' => 'border-color: {{VALUE}}',
						'{{WRAPPER}} .single-health-services-box:hover .icon' => 'background-color: {{VALUE}}',
					],
                    'condition' => [
                        'card_style' => ['6', '7'],
                    ]
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-features-box h3, {{WRAPPER}} .single-box-item h3, {{WRAPPER}} .single-training-box h3, {{WRAPPER}} .single-lifestyle-box h3, {{WRAPPER}} .single-health-services-box h3, {{WRAPPER}} .single-featured-box .content h3, {{WRAPPER}} .features-box h3',
                ]
            );

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-features-box h3, {{WRAPPER}} .single-box-item h3, {{WRAPPER}} .single-training-box h3, {{WRAPPER}} .single-lifestyle-box h3, {{WRAPPER}} .single-health-services-box h3, {{WRAPPER}} .single-featured-box .content h3, {{WRAPPER}} .features-box h3' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-features-box p, {{WRAPPER}} .single-box-item p, {{WRAPPER}} .single-training-box p, {{WRAPPER}} .single-lifestyle-box p, {{WRAPPER}} .single-health-services-box p, {{WRAPPER}} .single-featured-box .content p, {{WRAPPER}} .features-box p',
                ]
            );

            $this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-features-box p, {{WRAPPER}} .single-box-item p, {{WRAPPER}} .single-training-box p, {{WRAPPER}} .single-lifestyle-box p, {{WRAPPER}} .single-health-services-box p, {{WRAPPER}} .single-featured-box .content p, {{WRAPPER}} .features-box p' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'link_typography',
                    'label' => __( 'Link Text Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-features-box .link-btn, {{WRAPPER}} .single-box-item .link-btn, {{WRAPPER}} .single-training-box .link-btn, {{WRAPPER}} .features-box .link-btn',
                ]
            );

            $this->add_control(
				'link_color',
				[
					'label' => __( 'Link Text Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-features-box .link-btn, {{WRAPPER}} .single-box-item .link-btn, {{WRAPPER}} .single-training-box .link-btn,.single-lifestyle-box .link-btn, {{WRAPPER}} .features-box .link-btn' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'link_hover_color',
				[
					'label' => __( 'Link Text Hover Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-features-box .link-btn:hover, {{WRAPPER}} .single-box-item .link-btn:hover, {{WRAPPER}} .single-training-box .link-btn:hover, {{WRAPPER}} .single-lifestyle-box .link-btn:hover, {{WRAPPER}} .features-box .link-btn:hover' => 'color: {{VALUE}}',
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

        // Card Columns
        $columns = $settings['columns'];
        if ($columns == '1') {
            $column = 'col-lg-12 col-sm-6 col-md-6';
        }elseif ($columns == '2') {
            $column = 'col-lg-6 col-sm-6 col-md-6';
        }elseif ($columns == '3') {
            $column = 'col-lg-4 col-sm-6 col-md-6';
        }elseif ($columns == '4') {
            $column = 'col-lg-3 col-sm-6 col-md-6';
        }

		?>
        <?php if( $settings['card_style'] == '1' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-3 col-sm-6 col-md-6';
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }

                        // Icon
                        $icon = $item['default_icon'];
                        ?>
                        <div class="<?php echo esc_attr($column); ?>">
                            <div class="single-features-box">
                                <div class="icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '2' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-sm-6 col-md-6';
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['card_item'] as $item ):

                    // Get Button Link
                    if( $item['link_type'] == 1 ){
                        $link = get_page_link( $item['link_to_page'] );
                    } else {
                        $link = $item['ex_link'];
                    }

                    // Icon
                    $icon =$item['default_icon'];
                    ?>
                        <div class="<?php echo esc_attr($column); ?>">
                            <div class="single-features-box without-padding">
                                <div class="icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '3' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-sm-6 col-md-6';
            }
            ?>
            <div class="boxes-area bg-f5f7fa">
                <div class="container">
                    <div class="row">
                        <?php foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }

                        // Icon
                        $icon = $item['default_icon'];
                        ?>
                            <div class="<?php echo esc_attr($column); ?>col-lg-4 col-sm-6 col-md-6">
                                <div class="single-box-item">
                                    <div class="icon">
                                        <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                        <?php if(  $settings['icon_bg']['url'] != '' ): ?>
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['icon_bg']['url'] ); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['icon_bg']['url'] ); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '4' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-sm-6 col-md-6';
            }

            // Get Button Link
            if($settings['link_type'] == 1){
                $link = get_page_link( $settings['link_to_page'] );
            } else {
                $link = $settings['ex_link'];
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }

                        if( $item['single_card_style'] == '2' ):
                            $img = $item['image']['url'];
                        else:
                            $img = '';
                        endif;
                        ?>
                        <div class="<?php echo esc_attr($column); ?> ">
                            <div class="single-box-item">
                                <?php if( $img != '' ): ?>
                                    <div class="image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if( $settings['bottom_title'] != '' || $settings['bottom_link_title'] != '' ): ?>
                    <div class="boxes-info">
                        <p><?php echo esc_html( $settings['bottom_title'] ); ?>​ <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $settings['bottom_link_title'] ); ?></a></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $settings['card_style'] == '5' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-sm-6 col-md-6';
            }

            // Get Button Link
            if($settings['link_type'] == 1){
                $link = get_page_link( $settings['link_to_page'] );
            } else {
                $link = $settings['ex_link'];
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }

                        if( $item['single_card_style'] == '2' ):
                            $img = $item['image']['url'];
                        else:
                            $img = '';
                        endif;
                        ?>
                        <div class="<?php echo esc_attr($column); ?> ">
                            <div class="single-training-box">
                                <?php if( $img != '' ): ?>
                                    <div class="image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '6' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-md-6 col-sm-6';
            }
             ?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }

                        // Icon
                        $icon =$item['default_icon'];
                        ?>
                        <div class="<?php echo esc_attr($column); ?>">
                            <div class="single-lifestyle-box">
                                <div class="icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '7' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-md-6 col-sm-6';
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }

                        // Icon
                        $icon = $item['default_icon'];
                        ?>
                        <div class="<?php echo esc_attr($column); ?>">
                            <div class="single-health-services-box">
                                <div class="icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>
                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '8' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-md-6 col-sm-12';
            }
            ?>
            <div class="featured-area">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <?php foreach( $settings['card_item'] as $item ):
                            if( $item['single_card_style'] == '2' ):
                                $img = $item['image']['url'];
                            else:
                                $img = '';
                            endif;
                            // Icon
                            $icon = $item['default_icon'];
                            ?>
                            <div class="<?php echo esc_attr($column); ?>">
                                <div class="single-featured-box">
                                    <?php if($img): ?>
                                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                    <?php endif; ?>

                                    <div class="content">
                                        <i class="icon <?php echo esc_attr( $icon ); ?>"></i>
                                        <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                        <p><?php echo wp_kses_post( $item['content'] ); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '9' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-sm-6 col-md-6';
            }
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }

                        // Icon
                        $icon = $item['default_icon'];
                        ?>
                        <div class="<?php echo esc_attr($column); ?>">
                            <div class="features-box">
                                <div class="icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>

                                <div class="back-icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '10' ):
            $columns = $settings['columns'];
            if ($columns == 'default') {
                $column = 'col-lg-4 col-sm-6 col-md-6';
            }
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <?php $i=1; foreach( $settings['card_item'] as $item ):

                        // Get Button Link
                        if( $item['link_type'] == 1 ){
                            $link = get_page_link( $item['link_to_page'] );
                        } else {
                            $link = $item['ex_link'];
                        }
                        if( $i == 2 || $i == 5 || $i == 8):
                            $box_class = 'single-features-box without-bg active';
                        else:
                            $box_class = 'single-features-box without-bg';
                        endif;

                        // Icon
                        $icon = $item['default_icon'];
                        ?>
                        <div class="<?php echo esc_attr($column); ?>">
                            <div class="<?php echo esc_attr($box_class); ?>">
                                <div class="icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                                <h3 class="inter-font font-weight-bold"><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                                <?php if( $link != '' ): ?>
                                    <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                                <?php endif; ?>

                                <div class="back-icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Features_Boxes );