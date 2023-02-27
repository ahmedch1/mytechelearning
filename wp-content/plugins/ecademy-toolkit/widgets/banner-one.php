<?php
/**
 * Banner Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Banner extends Widget_Base {

	public function get_name() {
        return 'eCademy_Banner_One';
    }

	public function get_title() {
        return esc_html__( 'Banner One', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Banner_Area',
			[
				'label' => esc_html__( 'Banner Controls', 'ecademy-toolkit' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'plugin_type',
                [
                    'label' 	=> esc_html__( 'Select Your Activate Plugin', 'ecademy-toolkit' ),
                    'type' 		=> Controls_Manager::SELECT,
                    'options' 	=> [
                        'lp'         => esc_html__( 'LearnPress', 'ecademy-toolkit' ),
                        'tutor'      => esc_html__( 'Tutor LMS', 'ecademy-toolkit' ),
                        'ld'         => esc_html__( 'LearnDash', 'ecademy-toolkit' ),
                    ],
                    'default' => 'lp',
                ]
            );

			$this->add_control(
				'bg_image',
				[
					'label' => esc_html__( 'Section Background Image', 'ecademy-toolkit' ),
					'type'	 => Controls_Manager::MEDIA,
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('The world’s leading distance-learning provider', 'ecademy-toolkit'),
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
					'default' 	=> __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.', 'ecademy-toolkit'),
				]
			);

			$this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Join For Free', 'ecademy-toolkit'),
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

            $this->add_control(
                'card_type',
                [
                    'label' 	=> esc_html__( 'Select Your Banner Card Type', 'ecademy-toolkit' ),
                    'type' 		=> Controls_Manager::SELECT,
                    'options' 	=> [
                        '1'         => esc_html__( 'Courses', 'ecademy-toolkit' ),
                        '2'      => esc_html__( 'Cards', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'first_course',
                [
                    'label' 		=> esc_html__( 'Banner First Course', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_course_as_list(),
                    'condition' => [
                        'plugin_type' => 'lp',
                        'card_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'second_course',
                [
                    'label' 		=> esc_html__( 'Banner Second Course', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_course_as_list(),
                    'condition' => [
                        'plugin_type' => 'lp',
                        'card_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'first_tutor_course',
                [
                    'label' 		=> esc_html__( 'Banner First Course', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_tutor_course_as_list(),
                    'condition' => [
                        'plugin_type' => 'tutor',
                        'card_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'second_tutor_course',
                [
                    'label' 		=> esc_html__( 'Banner Second Course', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_tutor_course_as_list(),
                    'condition' => [
                        'plugin_type' => 'tutor',
                        'card_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'first_ld_course',
                [
                    'label' 		=> esc_html__( 'Banner First Course', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_ld_course_as_list(),
                    'condition' => [
                        'plugin_type' => 'ld',
                        'card_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'second_ld_course',
                [
                    'label' 		=> esc_html__( 'Banner Second Course', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_ld_course_as_list(),
                    'condition' => [
                        'plugin_type' => 'ld',
                        'card_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'free_text',
                [
                    'label' 		=> esc_html__( 'Free Course Text', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::TEXT,
                    'label_block' 	=> true,
                    'condition' => [
                        'plugin_type' => 'tutor',
                        'card_type' => '1',
                    ]
                ]
            );

            $this->add_control(
				'card_one_title',
				[
					'label' 	=> esc_html__( 'Card One Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
                    'condition' => [
                        'card_type' => '2',
                    ]
				]
            );
            $this->add_control(
				'card_one_content',
				[
					'label' 	=> esc_html__( 'Card One Content', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXTAREA,
                    'condition' => [
                        'card_type' => '2',
                    ]
				]
            );
            $this->add_control(
				'card_one_img',
				[
					'label' 	=> esc_html__( 'Card One Image', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::MEDIA,
                    'condition' => [
                        'card_type' => '2',
                    ]
				]
            );
            $this->add_control(
				'card_one_link',
				[
					'label' 	=> esc_html__( 'Card One Link', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
                    'condition' => [
                        'card_type' => '2',
                    ]
				]
            );

            $this->add_control(
				'card_two_title',
				[
					'label' 	=> esc_html__( 'Card Two Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
                    'condition' => [
                        'card_type' => '2',
                    ]
				]
            );
            $this->add_control(
				'card_two_content',
				[
					'label' 	=> esc_html__( 'Card Two Content', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXTAREA,
                    'condition' => [
                        'card_type' => '2',
                    ]
				]
            );
            $this->add_control(
				'card_two_img',
				[
					'label' 	=> esc_html__( 'Card Two Image', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::MEDIA,
                    'condition' => [
                        'card_type' => '2',
                    ]
				]
            );
            
            $this->add_control(
				'card_two_link',
				[
					'label' 	=> esc_html__( 'Card Two Link', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
                    'condition' => [
                        'card_type' => '2',
                    ]
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

            $this->add_control(
				'lessons_title',
				[
					'label' 	=> esc_html__( 'Lessons Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Lessons', 'ecademy-toolkit'),
                    'condition' => [
                        'plugin_type' => ['lp', 'tutor'],
                    ]
				]
            );

            $this->add_control(
				'students_title',
				[
					'label' 	=> esc_html__( 'Students Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Students', 'ecademy-toolkit'),
                    'condition' => [
                        'plugin_type' => ['lp', 'tutor'],
                    ]
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
						'{{WRAPPER}} .main-banner-content h1, .main-banner-content h2, .main-banner-content h3, .main-banner-content h4, .main-banner-content h5, .main-banner-content h6' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .main-banner-content h1, .main-banner-content h2, .main-banner-content h3, .main-banner-content h4, .main-banner-content h5, .main-banner-content h6',
                ]
            );

			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .main-banner-content p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .main-banner-content p',
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

        $ld_enroll_btn = !empty($ecademy_opt['ld_enroll_title']) ? $ecademy_opt['ld_enroll_title'] : '';
        $ld_free_title = !empty($ecademy_opt['ld_free_title']) ? $ecademy_opt['ld_free_title'] : '';

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

        if( $settings['plugin_type'] == 'lp' ){
            if ( !ecademy_plugin_active( 'learnpress/learnpress.php' ) ) {
                if( is_user_logged_in() ):
                    ?>
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            <?php echo esc_html__( 'Please Install and activated LearnPress plugin', 'ecademy-toolkit' ); ?>
                        </div>
                    </div>
                    <?php
                endif;
                return;
            }
        }elseif( $settings['plugin_type'] == 'tutor' ) {
            if ( !ecademy_plugin_active( 'tutor/tutor.php' ) ) {
                if( is_user_logged_in() ):
                    ?>
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            <?php echo esc_html__( 'Please Install and activated Tutor LMS plugin', 'ecademy-toolkit' ); ?>
                        </div>
                    </div>
                    <?php
                endif;
                return;
            }
        }elseif( $settings['plugin_type'] == 'ld' ) {
            if ( !ecademy_plugin_active( 'sfwd-lms/sfwd_lms.php' ) ) {
                if( is_user_logged_in() ):
                    ?>
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            <?php echo esc_html__( 'Please Install and activated LearnDash plugin', 'ecademy-toolkit' ); ?>
                        </div>
                    </div>
                    <?php
                endif;
                return;
            }
        }

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

        if ( is_user_logged_in() ):
            $button_text = $settings['user_button_text'];
        else:
            $button_text = $settings['button_text'];
        endif;

        if( $settings['plugin_type'] == 'lp' ): ?>
            <div class="main-banner" style="background-image:url(<?php echo esc_url( $settings['bg_image']['url'] ); ?>);">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="main-banner-content">
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>>
                                    <?php echo wp_kses_post( $settings['title'] ); ?>
                                </<?php echo esc_attr( $settings['title_tag'] ); ?>>

                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo esc_html( $settings['content'] ); ?></p>

                                <?php if( $button_text != '' ): ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="main-banner-courses-list">
                                <div class="row">
                                    <?php if( $settings['card_type'] == '1' ): ?>
                                        <?php if( $settings['first_course'] != '' ): ?>
                                            <div class="col-lg-6 col-md-6">
                                                <?php
                                                $args = array(
                                                    'p'                 => $settings['first_course'],
                                                    'post_type'         => 'lp_course',
                                                    'meta_key'          => '_thumbnail_id',
                                                );
                                                $post_array = new \WP_Query( $args );
                                                ?>
                                                <?php while($post_array->have_posts()): $post_array->the_post();
                                                $course         = \LP_Global::course();
                                                ?>
                                                    <div class="single-courses-box">
                                                        <div class="courses-image">
                                                            <a href="<?php the_permalink(); ?>" class="d-block image">
                                                                <?php if( $is_lazyloader == true ): ?>
                                                                    <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php else: ?>
                                                                    <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php endif; ?>
                                                            </a>

                                                            <?php echo $course->get_course_price_html(); ?>
                                                        </div>
                                                        <div class="courses-content">
                                                            <div class="course-author d-flex align-items-center">
                                                                <?php ecademy_lp_the_loop_instructor(); ?>
                                                            </div>
                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <p><?php the_excerpt(); ?></p>

                                                            <ul class="courses-box-footer d-flex justify-content-between align-items-center">
                                                                <?php if(ecademy_lp_the_loop_lessons()): ?>
                                                                    <li>
                                                                        <i class='flaticon-agenda'></i>
                                                                        <?php echo ecademy_lp_the_loop_lessons(); ?> <?php echo esc_html( $settings['lessons_title'] ); ?>
                                                                    </li>
                                                                <?php endif; ?>

                                                                <?php if(ecademy_lp_the_loop_students()): ?>
                                                                    <li>
                                                                        <i class='flaticon-people'></i>
                                                                        <?php echo ecademy_lp_the_loop_students(); ?> <?php echo esc_html( $settings['students_title'] ); ?>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_query(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if( $settings['second_course'] != '' ): ?>
                                            <div class="col-lg-6 col-md-6">
                                                <?php
                                                $args = array(
                                                    'p'                 => $settings['second_course'],
                                                    'post_type'         => 'lp_course',
                                                );
                                                $post_array = new \WP_Query( $args );
                                                while($post_array->have_posts()): $post_array->the_post(); $course         = \LP_Global::course(); ?>
                                                    <div class="single-courses-box">
                                                        <div class="courses-image">
                                                            <a href="<?php the_permalink(); ?>" class="d-block image">
                                                                <?php if( $is_lazyloader == true ): ?>
                                                                    <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php else: ?>
                                                                    <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php endif; ?>
                                                            </a>

                                                            <?php echo $course->get_course_price_html(); ?>

                                                        </div>
                                                        <div class="courses-content">
                                                            <div class="course-author d-flex align-items-center">
                                                                <?php ecademy_lp_the_loop_instructor(); ?>
                                                            </div>
                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <p><?php the_excerpt(); ?></p>

                                                            <ul class="courses-box-footer d-flex justify-content-between align-items-center">
                                                                <?php if(ecademy_lp_the_loop_lessons()): ?>
                                                                    <li>
                                                                        <i class='flaticon-agenda'></i>
                                                                        <?php echo ecademy_lp_the_loop_lessons(); ?> <?php echo esc_html( $settings['lessons_title'] ); ?>
                                                                    </li>
                                                                <?php endif; ?>

                                                                <?php if(ecademy_lp_the_loop_students()): ?>
                                                                    <li>
                                                                        <i class='flaticon-people'></i>
                                                                        <?php echo ecademy_lp_the_loop_students(); ?> <?php echo esc_html( $settings['students_title'] ); ?>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_query(); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-courses-box">
                                                <div class="courses-image">
                                                    <a href="<?php echo esc_url($settings['card_one_link']); ?>" class="d-block image">
                                                        <?php if($settings['card_one_img']['url']): ?>
                                                            <?php if( $is_lazyloader == true ): ?>
                                                                <img sm-src="<?php echo esc_url($settings['card_one_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_one_title']); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url($settings['card_one_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_one_title']); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="courses-content">
                                                    <h3><a href="<?php echo esc_url($settings['card_one_link']); ?>"><?php echo esc_html($settings['card_one_title']); ?></a></h3>
                                                    <p><?php echo wp_kses_post($settings['card_one_content']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-courses-box">
                                                <div class="courses-image">
                                                    <a href="<?php echo esc_url($settings['card_two_link']); ?>" class="d-block image">
                                                        <?php if($settings['card_two_img']['url']): ?>
                                                            <?php if( $is_lazyloader == true ): ?>
                                                                <img sm-src="<?php echo esc_url($settings['card_two_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_two_title']); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url($settings['card_two_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_two_title']); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="courses-content">
                                                    <h3><a href="<?php echo esc_url($settings['card_two_link']); ?>"><?php echo esc_html($settings['card_two_title']); ?></a></h3>
                                                    <p><?php echo wp_kses_post($settings['card_two_content']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if( $settings['shape1']['url'] != '' ): ?>
                                    <div class="banner-shape1" data-speed="0.06" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape2']['url'] != '' ): ?>
                                    <div class="banner-shape2" data-speed="0.06" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape3']['url'] != '' ): ?>
                                    <div class="banner-shape3" data-speed="0.06" data-revert="true">
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
                </div>
            </div>
            <?php
        elseif( $settings['plugin_type'] == 'tutor' ): ?>
            <div class="main-banner" style="background-image:url(<?php echo esc_url( $settings['bg_image']['url'] ); ?>);">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="main-banner-content">
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>>
                                    <?php echo wp_kses_post( $settings['title'] ); ?>
                                </<?php echo esc_attr( $settings['title_tag'] ); ?>>

                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo esc_html( $settings['content'] ); ?></p>

                                <?php if( $button_text != '' ): ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="main-banner-courses-list">
                                <div class="row">
                                    <?php if( $settings['card_type'] == '1' ): ?>
                                        <?php if( $settings['first_tutor_course'] != '' ): ?>
                                            <div class="col-lg-6 col-md-6">
                                                <?php
                                                $args = array(
                                                    'p'                 => $settings['first_tutor_course'],
                                                    'post_type'         => 'courses',
                                                );
                                                $post_array = new \WP_Query( $args );

                                                ?>
                                                <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                                                    <div class="single-courses-box">
                                                        <div class="courses-image">
                                                            <a href="<?php the_permalink(); ?>" class="d-block image">
                                                                <?php if( $is_lazyloader == true ): ?>
                                                                    <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php else: ?>
                                                                    <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php endif; ?>
                                                            </a>
                                                            <?php
                                                                $course_id = get_the_ID();
                                                                $price_html = '<div class="price"> '.esc_html($settings['free_text']).'</div>';
                                                                if (tutor_utils()->is_course_purchasable()) {
                                                                    $product_id = tutor_utils()->get_course_product_id($course_id);
                                                                    $product    = wc_get_product( $product_id );

                                                                    if ( $product ) {
                                                                        $price_html = '<div class="price"> '.$product->get_price_html().' </div>';
                                                                    }
                                                                }

                                                                echo $price_html;
                                                            ?>

                                                        </div>
                                                        <div class="courses-content">
                                                            <div class="course-author d-flex align-items-center">
                                                                <?php
                                                                global $post, $authordata;
                                                                $user_id = get_current_user_id();
                                                                $user = get_user_by('ID', $user_id);
                                                                $profile_url = tutor_utils()->profile_url($authordata->ID);
                                                                ?>
                                                                <img src="<?php echo get_avatar_url($user_id, array('size' => 150)); ?>" />
                                                                <span><a href="<?php echo $profile_url; ?>"><?php echo get_the_author(); ?></a></span>
                                                            </div>
                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <p><?php the_excerpt(); ?></p>

                                                            <ul class="courses-box-footer d-flex justify-content-between align-items-center">
                                                                <li>
                                                                <?php
                                                                $course_id          = get_the_ID();
                                                                $tutor_lesson_count = tutor_utils()->get_lesson_count_by_course($course_id);
                                                                ?>
                                                                    <i class='flaticon-agenda'></i>
                                                                        <?php echo $tutor_lesson_count; ?> <?php echo esc_html( $settings['lessons_title'] ); ?>
                                                                </li>

                                                                <li>
                                                                    <i class='flaticon-people'></i>
                                                                    <?php echo (int) tutor_utils()->count_enrolled_users_by_course(); ?>
                                                                    <?php echo esc_html( $settings['students_title'] ); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_query(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if( $settings['second_tutor_course'] != '' ): ?>
                                            <div class="col-lg-6 col-md-6">
                                                <?php
                                                $args = array(
                                                    'p'                 => $settings['second_tutor_course'],
                                                    'post_type'         => 'courses',
                                                );
                                                $post_array = new \WP_Query( $args );

                                                ?>
                                                <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                                                    <div class="single-courses-box">
                                                        <div class="courses-image">
                                                            <a href="<?php the_permalink(); ?>" class="d-block image">
                                                                <?php if( $is_lazyloader == true ): ?>
                                                                    <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php else: ?>
                                                                    <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php endif; ?>
                                                            </a>

                                                            <?php
                                                                $course_id = get_the_ID();
                                                                $price_html = '<div class="price"> '.esc_html($settings['free_text']).'</div>';
                                                                if (tutor_utils()->is_course_purchasable()) {
                                                                    $product_id = tutor_utils()->get_course_product_id($course_id);
                                                                    $product    = wc_get_product( $product_id );

                                                                    if ( $product ) {
                                                                        $price_html = '<div class="price"> '.$product->get_price_html().' </div>';
                                                                    }
                                                                }

                                                                echo $price_html;
                                                            ?>

                                                        </div>
                                                        <div class="courses-content">
                                                            <div class="course-author d-flex align-items-center">
                                                                <?php
                                                                global $post, $authordata;
                                                                $user_id = get_current_user_id();
                                                                $user = get_user_by('ID', $user_id);
                                                                $profile_url = tutor_utils()->profile_url($authordata->ID);
                                                                ?>
                                                                <img src="<?php echo get_avatar_url($user_id, array('size' => 150)); ?>" />
                                                                <span><a href="<?php echo $profile_url; ?>"><?php echo get_the_author(); ?></a></span>
                                                            </div>
                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <p><?php the_excerpt(); ?></p>

                                                            <ul class="courses-box-footer d-flex justify-content-between align-items-center">
                                                                <li>
                                                                <?php
                                                                $course_id          = get_the_ID();
                                                                $tutor_lesson_count = tutor_utils()->get_lesson_count_by_course($course_id);
                                                                ?>
                                                                    <i class='flaticon-agenda'></i>
                                                                        <?php echo $tutor_lesson_count; ?> <?php echo esc_html( $settings['lessons_title'] ); ?>
                                                                </li>

                                                                <li>
                                                                    <i class='flaticon-people'></i>
                                                                    <?php echo (int) tutor_utils()->count_enrolled_users_by_course(); ?>
                                                                    <?php echo esc_html( $settings['students_title'] ); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_query(); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-courses-box">
                                                <div class="courses-image">
                                                    <a href="<?php echo esc_url($settings['card_one_link']); ?>" class="d-block image">
                                                        <?php if($settings['card_one_img']['url']): ?>
                                                            <?php if( $is_lazyloader == true ): ?>
                                                                <img sm-src="<?php echo esc_url($settings['card_one_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_one_title']); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url($settings['card_one_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_one_title']); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="courses-content">
                                                    <h3><a href="<?php echo esc_url($settings['card_one_link']); ?>"><?php echo esc_html($settings['card_one_title']); ?></a></h3>
                                                    <p><?php echo wp_kses_post($settings['card_one_content']); ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-courses-box">
                                                <div class="courses-image">
                                                    <a href="<?php echo esc_url($settings['card_two_link']); ?>" class="d-block image">
                                                        <?php if($settings['card_one_img']['url']): ?>
                                                            <?php if( $is_lazyloader == true ): ?>
                                                                <img sm-src="<?php echo esc_url($settings['card_two_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_two_title']); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url($settings['card_two_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_two_title']); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="courses-content">
                                                    <h3><a href="<?php echo esc_url($settings['card_two_link']); ?>"><?php echo esc_html($settings['card_two_title']); ?></a></h3>
                                                    <p><?php echo wp_kses_post($settings['card_two_content']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if( $settings['shape1']['url'] != '' ): ?>
                                    <div class="banner-shape1" data-speed="0.06" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape2']['url'] != '' ): ?>
                                    <div class="banner-shape2" data-speed="0.06" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape3']['url'] != '' ): ?>
                                    <div class="banner-shape3" data-speed="0.06" data-revert="true">
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
                </div>
            </div>
            <?php
        elseif( $settings['plugin_type'] == 'ld' ): ?>
            <div class="main-banner" style="background-image:url(<?php echo esc_url( $settings['bg_image']['url'] ); ?>);">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="main-banner-content">
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>>
                                    <?php echo wp_kses_post( $settings['title'] ); ?>
                                </<?php echo esc_attr( $settings['title_tag'] ); ?>>

                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo esc_html( $settings['content'] ); ?></p>

                                <?php if( $button_text != '' ): ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="main-banner-courses-list">
                                <div class="row">
                                    <?php if( $settings['card_type'] == '1' ): ?>
                                        <?php if( $settings['first_ld_course'] != '' ): ?>
                                            <div class="col-lg-6 col-md-6">
                                                <?php
                                                $args = array(
                                                    'p'                 => $settings['first_ld_course'],
                                                    'post_type'         => 'sfwd-courses',
                                                );
                                                $post_array = new \WP_Query( $args );

                                                ?>
                                                <?php while($post_array->have_posts()): $post_array->the_post();
                                                    global $post; $post_id = $post->ID;
                                                    $course_id = $post_id;
                                                    $user_id   = get_current_user_id();
                                                    $current_id = $post->ID;

                                                    $options = get_option('sfwd_cpt_options');

                                                    $currency = null;

                                                    if ( ! is_null( $options ) ) {
                                                        if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
                                                            $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];

                                                    }

                                                    if( is_null( $currency ) )
                                                        $currency = 'USD';

                                                    $course_options = get_post_meta($post_id, "_sfwd-courses", true);


                                                    $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : esc_html( $ld_free_title );

                                                    $has_access   = sfwd_lms_has_access( $course_id, $user_id );
                                                    $is_completed = learndash_course_completed( $user_id, $course_id );

                                                    if( $price == '' )
                                                        $price .= esc_html( $ld_free_title );

                                                    if ( is_numeric( $price ) ) {
                                                        if ( $currency == "USD" )
                                                            $price = '$' . $price;
                                                        else
                                                            $price .= ' ' . $currency;
                                                    }

                                                    $class       = '';
                                                    $ribbon_text = '';

                                                    if ( $has_access && ! $is_completed ) {
                                                        $class = 'ld_course_grid_price ribbon-enrolled';
                                                        $ribbon_text = esc_html__( 'Enrolled', 'ecademy' );
                                                        $ld_enroll_btn = !empty($ecademy_opt['ld_enrolled_title']) ? $ecademy_opt['ld_enrolled_title'] : '';
                                                    } elseif ( $has_access && $is_completed ) {
                                                        $class = 'ld_course_grid_price';
                                                        $ribbon_text = esc_html__( 'Completed', 'ecademy' );
                                                        $ld_enroll_btn = !empty($ecademy_opt['ld_enrolled_title']) ? $ecademy_opt['ld_enrolled_title'] : '';
                                                    } else {
                                                        $class = ! empty( $course_options['sfwd-courses_course_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
                                                        $ribbon_text = $price;
                                                    }
                                                ?>
                                                    <div class="single-courses-box">
                                                        <div class="courses-image">
                                                            <a href="<?php the_permalink(); ?>" class="d-block image">
                                                                <?php if( $is_lazyloader == true ): ?>
                                                                    <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php else: ?>
                                                                    <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php endif; ?>
                                                            </a>

                                                            <div class="price shadow"><?php echo esc_html($ribbon_text); ?></div>

                                                        </div>
                                                        <div class="courses-content">
                                                            <div class="course-author d-flex align-items-center">
                                                                <?php
                                                                    global $post;
                                                                    $a_id   =   $post->post_author;
                                                                    $user       = get_the_author_meta('ID');
                                                                    $user_image = get_avatar_url($user, ['size' => '51']);
                                                                ?>
                                                                <img src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php the_author_meta( 'display_name', $a_id );  ?>">
                                                                <span><?php the_author_meta( 'display_name', $a_id );  ?></span>
                                                            </div>

                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <?php
                                                            $excerpt = explode(' ', get_the_excerpt(), 17);
                                                            array_pop($excerpt);
                                                            $excerpt = implode(" ",$excerpt)."...";
                                                            ?>
                                                            <p><?php echo esc_html($excerpt); ?></p>
                                                            <a class="ld-enroll-btn" href="<?php the_permalink(); ?>"><?php echo esc_attr($ld_enroll_btn); ?></a>

                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_query(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if( $settings['second_ld_course'] != '' ): ?>
                                            <div class="col-lg-6 col-md-6">
                                                <?php
                                                $args = array(
                                                    'p'                 => $settings['second_ld_course'],
                                                    'post_type'         => 'sfwd-courses',
                                                );
                                                $post_array = new \WP_Query( $args );

                                                ?>
                                                <?php while($post_array->have_posts()): $post_array->the_post();
                                                global $post; $post_id = $post->ID;
                                                $course_id = $post_id;
                                                $user_id   = get_current_user_id();
                                                $current_id = $post->ID;

                                                $options = get_option('sfwd_cpt_options');

                                                $currency = null;

                                                if ( ! is_null( $options ) ) {
                                                    if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
                                                        $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];

                                                }

                                                if( is_null( $currency ) )
                                                    $currency = 'USD';

                                                $course_options = get_post_meta($post_id, "_sfwd-courses", true);


                                                $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : esc_html( $ld_free_title );

                                                $has_access   = sfwd_lms_has_access( $course_id, $user_id );
                                                $is_completed = learndash_course_completed( $user_id, $course_id );

                                                if( $price == '' )
                                                    $price .= esc_html( $ld_free_title );

                                                if ( is_numeric( $price ) ) {
                                                    if ( $currency == "USD" )
                                                        $price = '$' . $price;
                                                    else
                                                        $price .= ' ' . $currency;
                                                }

                                                $class       = '';
                                                $ribbon_text = '';

                                                if ( $has_access && ! $is_completed ) {
                                                    $class = 'ld_course_grid_price ribbon-enrolled';
                                                    $ribbon_text = esc_html__( 'Enrolled', 'ecademy' );
                                                    $ld_enroll_btn = !empty($ecademy_opt['ld_enrolled_title']) ? $ecademy_opt['ld_enrolled_title'] : '';
                                                } elseif ( $has_access && $is_completed ) {
                                                    $class = 'ld_course_grid_price';
                                                    $ribbon_text = esc_html__( 'Completed', 'ecademy' );
                                                } else {
                                                    $class = ! empty( $course_options['sfwd-courses_course_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
                                                    $ribbon_text = $price;
                                                } ?>
                                                    <div class="single-courses-box">
                                                        <div class="courses-image">
                                                            <a href="<?php the_permalink(); ?>" class="d-block image">
                                                                <?php if( $is_lazyloader == true ): ?>
                                                                    <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php else: ?>
                                                                    <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                                                <?php endif; ?>
                                                            </a>

                                                            <div class="price shadow"><?php echo esc_html($ribbon_text); ?></div>

                                                        </div>
                                                        <div class="courses-content">
                                                            <div class="course-author d-flex align-items-center">
                                                                <?php
                                                                    global $post;
                                                                    $a_id   =   $post->post_author;
                                                                    $user       = get_the_author_meta('ID');
                                                                    $user_image = get_avatar_url($user, ['size' => '51']);
                                                                ?>
                                                                <img src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php the_author_meta( 'display_name', $a_id );  ?>">
                                                                <span><?php the_author_meta( 'display_name', $a_id );  ?></span>
                                                            </div>

                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <?php
                                                            $excerpt = explode(' ', get_the_excerpt(), 17);
                                                            array_pop($excerpt);
                                                            $excerpt = implode(" ",$excerpt)."...";
                                                            ?>
                                                            <p><?php echo esc_html($excerpt); ?></p>
                                                            <a class="ld-enroll-btn" href="<?php the_permalink(); ?>"><?php echo esc_attr($ld_enroll_btn); ?></a>

                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_query(); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-courses-box">
                                                <div class="courses-image">
                                                    <a href="<?php echo esc_url($settings['card_one_link']); ?>" class="d-block image">
                                                        <?php if($settings['card_one_img']['url']): ?>
                                                            <?php if( $is_lazyloader == true ): ?>
                                                                <img sm-src="<?php echo esc_url($settings['card_one_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_one_title']); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url($settings['card_one_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_one_title']); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="courses-content">
                                                    <h3><a href="<?php echo esc_url($settings['card_one_link']); ?>"><?php echo esc_html($settings['card_one_title']); ?></a></h3>
                                                    <p><?php echo wp_kses_post($settings['card_one_content']); ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-courses-box">
                                                <div class="courses-image">
                                                    <a href="<?php echo esc_url($settings['card_two_link']); ?>" class="d-block image">
                                                        <?php if($settings['card_one_img']['url']): ?>
                                                            <?php if( $is_lazyloader == true ): ?>
                                                                <img sm-src="<?php echo esc_url($settings['card_two_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_two_title']); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url($settings['card_two_img']['url']); ?>" alt="<?php echo esc_attr($settings['card_two_title']); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="courses-content">
                                                    <h3><a href="<?php echo esc_url($settings['card_two_link']); ?>"><?php echo esc_html($settings['card_two_title']); ?></a></h3>
                                                    <p><?php echo wp_kses_post($settings['card_two_content']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if( $settings['shape1']['url'] != '' ): ?>
                                    <div class="banner-shape1" data-speed="0.06" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape2']['url'] != '' ): ?>
                                    <div class="banner-shape2" data-speed="0.06" data-revert="true">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['shape3']['url'] != '' ): ?>
                                    <div class="banner-shape3" data-speed="0.06" data-revert="true">
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
                </div>
            </div>
            <?php
        endif;
	}
}

Plugin::instance()->widgets_manager->register( new eCademy_Banner );