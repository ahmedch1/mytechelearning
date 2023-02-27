<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Pricing_table extends Widget_Base {

	public function get_name() {
		return 'ecademy-pricing-table';
	}

	public function get_title() {
		return __( 'Pricing Table', 'ecademy-hero' );
	}

	public function get_icon() {
		return ' eicon-price-list';
	}

	public function get_categories() {
		return [ 'ecademy-elements' ];
	}

    protected function register_controls() {
        $this->start_controls_section(
			'eCademy_Pricing',
			[
				'label' => esc_html__( 'Pricing Table', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $repeater = new Repeater();
            $repeater->add_control(
                'image', [
                    'label' => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => '200 HOUR TTC'
                ]
            );
            $repeater->add_control(
                'price', [
                    'label' => esc_html__( 'Price', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '$499.99',
                ]
            );
            $repeater->add_control(
                'bottom_title', [
                    'label' => esc_html__( 'Bottom Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Yoga Alliance Certified',
                ]
            );
            $repeater->add_control(
                'contents', [
                    'label' => esc_html__( 'List items', 'ecademy-toolkit' ),
                    'description' => esc_html__( 'Wrap up every list item with li tag (<li>Item Name</li>).', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default' =>'<li>Examine traditional yoga asanas</li>
                                <li>Learn meditation and philosophy</li>
                                <li>Connect energetics and anatomy</li>
                                <li>Practice teaching for confidence</li>
                                <li>Become a Yoga Alliance RYT200</li>',
                ]
            );
            $repeater->add_control(
                'btn_label', [
                    'label' => esc_html__( 'Button label', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Book Now',
                    'label_block' => true
                ]
            );
            $repeater->add_control(
                'btn_url', [
                    'label' => esc_html__( 'Button URL', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::URL,
                    'default' => [
                        'url' => '#',
                        'is_external' => '',
                    ],
                    'show_external' => true,
                ]
            );
            $this->add_control(
                'tables',
                [
                    'label' => esc_html__( 'Pricing Tables', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'title_field' => '{{{ title }}}',
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
                'shape1',
                [
                    'label'		=> esc_html__('Shape Image One', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

			$this->add_control(
                'shape2',
                [
                    'label'		=> esc_html__('Shape Image Two', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
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
						'{{WRAPPER}} .single-pricing-box .pricing-header h3' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-pricing-box .pricing-header h3',
                ]
            );

			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing-box .pricing-features ul li' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-pricing-box .pricing-features ul li',
                ]
            );

            $this->add_control(
				'price_color',
				[
					'label' => esc_html__( 'Price Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing-box .price' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'price_typography',
                    'label' => __( 'Price Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-pricing-box .price',
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

		?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['tables'] as $table ): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-pricing-box">
                                <div class="pricing-header">
                                    <?php if( $table['image']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $table['image']['url']); ?>" alt="<?php echo esc_attr( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $table['image']['url']); ?>" alt="<?php echo esc_attr( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <h3><?php echo esc_html( $table['title'] ); ?></h3>
                                </div>

                                <div class="pricing-features">
                                    <ul>
                                        <?php echo wp_kses_post( $table['contents'] ) ?>
                                    </ul>
                                </div>

                                <div class="price">
                                    <?php echo esc_html( $table['price'] ); ?>
                                    <span><?php echo esc_html( $table['bottom_title'] ); ?></span>
                                </div>

                                <?php if( $table['btn_label'] != '' ): ?>
                                    <a href="<?php echo esc_url( $table['btn_url']['url'] ); ?>" class="default-btn"><?php echo esc_html( $table['btn_label'] ); ?><span></span></a>
                                <?php endif; ?>

                                <?php if( $settings['shape1']['url'] != '' ): ?>
                                    <div class="pricing-shape1">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php  echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php  echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape2']['url'] != '' ): ?>
                                    <div class="pricing-shape2">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php  echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php  echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
	}
}
Plugin::instance()->widgets_manager->register( new Pricing_table );