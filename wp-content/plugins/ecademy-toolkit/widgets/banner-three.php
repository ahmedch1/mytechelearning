<?php
/**
 * Banner Three Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Banner_Three extends Widget_Base {

	public function get_name() {
        return 'eCademy_Banner_Three';
    }

	public function get_title() {
        return esc_html__( 'Banner Three', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Banner_Three_Area',
			[
				'label' => esc_html__( 'Banner Controls', 'ecademy-toolkit' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Build Skills With Experts Any Time, Anywhere', 'ecademy-toolkit'),
				]
			);

			$this->add_control(
                'title_tag',
                [
                    'label' 	=> esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                    'type' 		=> Controls_Manager::SELECT,
                    'options' 	=> [
                        'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                    ],
                    'default' => 'h1',
                ]
            );

			$this->add_control(
				'content',
				[
					'label' 	=> esc_html__( 'Content', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ecademy-toolkit'),
				]
            );

            $this->add_control(
				'search_placeholder',
				[
					'label' 	=> esc_html__( 'Courses Search Placeholder Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('What do you want to learn?', 'ecademy-toolkit'),
				]
            );

			$this->add_control(
				'search_button_text',
				[
					'label' 	=> esc_html__( 'Search Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Search Now', 'ecademy-toolkit'),
				]
            );

            $this->add_control(
				'link_title',
				[
					'label' 	=> esc_html__( 'Links Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Popular:', 'ecademy-toolkit'),
				]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'plugin_type', [
                    'label' => __( 'Select Your Activate Plugin', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' 	=> [
                        'lp'         => esc_html__( 'LearnPress', 'ecademy-toolkit' ),
                        'tutor'      => esc_html__( 'Tutor LMS', 'ecademy-toolkit' ),
                        'ld'      => esc_html__( 'LearnDash', 'ecademy-toolkit' ),
                    ],
                    'default' => 'lp',
                ]
            );
            $repeater->add_control(
                'link_title', [
                    'label' => __( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Development', 'ecademy-toolkit' ),
                ]
            );
            $repeater->add_control(
                'link_type', [
                    'label' => esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'  => esc_html__( 'Link To Category', 'ecademy-toolkit' ),
                        '2' => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );
            $repeater->add_control(
                'link_to_page', [
                    'label' => esc_html__( 'Button Link Courses Cat', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_courses_cat_list(),
                    'condition' => [
                        'link_type' => '1',
                        'plugin_type' => 'lp',
                    ]
                ]
            );
            $repeater->add_control(
                'tutor_link_to_page', [
                    'label' => esc_html__( 'Button Link Courses Cat', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_tutor_courses_cat_list(),
                    'condition' => [
                        'link_type' => '1',
                        'plugin_type' => 'tutor',
                    ]
                ]
            );
            $repeater->add_control(
                'ld_link_to_page', [
                    'label' => esc_html__( 'Button Link Courses Cat', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_ld_courses_cat_list(),
                    'condition' => [
                        'link_type' => '1',
                        'plugin_type' => 'ld',
                    ]
                ]
            );
            $repeater->add_control(
                'ex_link', [
                    'label'=>esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            $this->add_control(
                'links',
                [
                    'label' => __( 'Add Link', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
                'fimage',
                [
                    'label'		=> esc_html__('Feature Image', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
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

			$this->add_control(
                'shape3',
                [
                    'label'		=> esc_html__('Shape Image Three', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );

            $repeater2 = new Repeater();
            $repeater2->add_control(
                'title', [
                    'label'     => __( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('10,000 Online Courses', 'ecademy-toolkit'),
                ]
            );
            $repeater2->add_control(
                'default_icon', [
                    'label' => esc_html__( 'Select Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                ]
            );
            $repeater2->add_control(
                'content', [
                    'label'     => __( 'Content', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Lorem ipsum dolor sit amet consectets.', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'list_items',
                [
                    'label' => esc_html__('Card Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater2->get_controls(),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'banner_style',
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
						'{{WRAPPER}} .banner-wrapper-content h1, .banner-wrapper-content h2, .banner-wrapper-content h3, .banner-wrapper-content h4, .banner-wrapper-content h5, .banner-wrapper-content h6' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .banner-wrapper-content h1, .banner-wrapper-content h2, .banner-wrapper-content h3, .banner-wrapper-content h4, .banner-wrapper-content h5, .banner-wrapper-content h6',
                ]
            );

			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-wrapper-content p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .banner-wrapper-content p',
                ]
            );
			$this->add_control(
				'caed_title_color',
				[
					'label' => esc_html__( 'Card Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-banner-box h3' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'card_title_typography',
                    'label' => __( 'Card Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-banner-box h3',
                ]
            );

            $this->add_control(
				'caed_content_color',
				[
					'label' => esc_html__( 'Card Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-banner-box p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'card_content_typography',
                    'label' => __( 'Card Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-banner-box p',
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

        <div class="banner-wrapper-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-wrapper-content">
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>>
								<?php echo wp_kses_post( $settings['title'] ); ?>
							</<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo esc_html( $settings['content'] ); ?></p>

                            <?php if( $settings['search_button_text'] != '' || $settings['search_placeholder'] != '' ): ?>
                                <form method="get" action="<?php echo site_url( '/' ); ?>">
                                    <label><i class="flaticon-search"></i></label>
                                    <input type="text" value="" name="s" class="input-search" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>">

                                    <?php
                                    if ( ecademy_plugin_active( 'learnpress/learnpress.php' ) ) {
                                        $value  = 'lp_course';
                                    }
                                    if ( ecademy_plugin_active( 'sfwd-lms/sfwd_lms.php' ) ) {
                                        $value  = 'sfwd-courses';
                                    }
                                    if ( ecademy_plugin_active( 'tutor/tutor.php' ) ) {
                                        $value  = 'courses';
                                    }
                                    ?>
									<input type="hidden" value="course" name="ref" />
									<input type="hidden" name="post_type" value="<?php echo esc_attr($value); ?>">
                                    <?php if( $settings['search_button_text'] ): ?>
                                        <button type="submit"><?php echo $settings['search_button_text']; ?></button>
                                    <?php endif; ?>
                                </form>
                            <?php endif; ?>

                            <ul class="popular-search-list">

                                <li><span><?php echo esc_html( $settings['link_title'] ); ?></span></li>
                                <?php foreach( $settings['links'] as $link ): ?>
                                    <?php
                                    if($link['link_type'] == 1 ):
                                            // Cat ID
                                        if( $link['plugin_type'] == 'lp' ):
                                            $id = get_term_by( 'name', $link['link_to_page'], 'course_category' );
                                        elseif( $link['plugin_type'] == 'tutor' ):
                                            $id = get_term_by( 'name', $link['tutor_link_to_page'], 'course-category' );
                                        elseif( $link['plugin_type'] == 'ld' ):
                                            $id = get_term_by( 'name', $link['ld_link_to_page'], 'ld_course_category' );
                                        endif;

                                        // Cat Link
                                        $title_link = get_category_link($id->term_id);
                                    else:
                                        $title_link = $link['ex_link'];
                                    endif;
                                    ?>
                                    <li><a href="<?php echo esc_url( $title_link ); ?>"><?php echo esc_html( $link['link_title'] ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="banner-wrapper-image">
                            <?php if( $settings['fimage']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if( $settings['shape1']['url'] != '' ): ?>
								<div class="banner-shape8" data-speed="0.06" data-revert="true">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
								</div>
							<?php endif; ?>

                            <?php if( $settings['shape2']['url'] != '' ): ?>
								<div class="banner-shape9" data-speed="0.06" data-revert="true">
                                    <?php if( $is_lazyloader == true ): ?>
									    <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
									    <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
								</div>
							<?php endif; ?>

                            <?php if( $settings['shape3']['url'] != '' ): ?>
								<div class="banner-shape10" data-speed="0.06" data-revert="true">
                                    <?php if( $is_lazyloader == true ): ?>
									    <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
									    <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
								</div>
							<?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="banner-inner-area">
                    <div class="row">
                        <?php foreach( $settings['list_items'] as $item ):
                            // Icon
                            $icon =$item['default_icon'];
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="single-banner-box">
                                    <div class="icon">
                                        <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                    </div>
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <p><?php echo esc_html( $item['content'] ); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="divider"></div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Banner_Three );