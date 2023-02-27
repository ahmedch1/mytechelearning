<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Course_Instractor extends Widget_Base {

    public function get_name() {
        return 'edubin-course-instructor-addons';
    }
    
    public function get_title() {
        return __( 'Course Instructor', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'Course Instructor', 'Course Teacher', 'Course Tutor'];
    }
    public function get_icon() {
        return 'edubin-icon eicon-person';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [
            // 'slick',
            'edubin-widgets-scripts',
        ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'course_instructor_section',
            [
                'label' => __( 'Courses', 'edubin-core' ),
            ]
        );

        $this->add_control(
            'instructor_name',
            [
                'label'   => __( 'Name', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'placeholder' => __('Hellen Mark','edubin-core'),
                'default' => 'Hellen Mark',
            ]
        );

        $this->add_control(
            'instructor_expert',
            [
                'label'   => __( 'Skill', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'placeholder' => __('Java Expert','edubin-core'),
                'default' => 'Java Expert',
            ]
        );

        $this->add_control(
            'total_course',
            [
                'label'   => __( 'Total Course', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'placeholder' => __('10 Courses','edubin-core'),
                'default' => '10 Courses',
            ]
        );

        $this->add_control(
            'instructor_image',
            [
                'label' => __( 'Image', 'edubin-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Profile Link', 'edubin-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'edubin-core' ),
                'default' => [
                    'url' => '#',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'cat_link',
            [
                'label' => __( 'Expert Category Link', 'edubin-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'edubin-core' ),
                'default' => [
                    'url' => '#',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();

        // Course body style
        $this->start_controls_section(
            'course_style_section',
            [
                'label' => __( 'Style', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs('body_box_tabs');

                $this->start_controls_tab(
                    'body_box_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'box_shadow',
                        'selector' => '{{WRAPPER}} .instructor-1 .instructor-1-single',
                    ]
                );

                $this->end_controls_tab(); // Normal Tab end

                $this->start_controls_tab(
                    'body_box_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [   'label' => __( 'Box Shadow Hover', 'edubin-core' ),
                        'name' => 'box_shadow_hover',
                        'selector' => '{{WRAPPER}} .instructor-1 .instructor-1-single:hover',
                    ]
                );

                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();
            
         $this->add_control(
            'course_bg_color',
            [
                'label' => __( 'Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .instructor-1 .instructor-1-single' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'body_padding',
            [
                'label' => __( 'Padding', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .instructor-1 .instructor-1-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Style name tab section
        $this->start_controls_section(
            'course_instructor_name_style_section',
            [
                'label' => __( 'Name', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs('title_style_tabs');

                $this->start_controls_tab(
                    'title_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'title_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'',
                            'selectors' => [
                                '{{WRAPPER}} .instructor-1 .instructor-1-single .cont a h5' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'title_typography',
                            'label' => __( 'Typography', 'edubin-core' ),
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                            ],
                            'selector' => '{{WRAPPER}} .instructor-1 .instructor-1-single .cont a h5',
                        ]
                    );

                    $this->add_control(
                        'name_space',
                        [
                            'label'     => __('Name Space', 'edubin-core'),
                            'type'      => Controls_Manager::SLIDER,
                            'range'     => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 60,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .instructor-1 .instructor-1-single .cont a h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal Tab end

                $this->start_controls_tab(
                    'title_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );
                $this->add_control(
                    'title_hover_color',
                    [
                        'label' => __( 'Color', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'',
                        'selectors' => [
                            '{{WRAPPER}} .instructor-1 .instructor-1-single .cont a:hover h5 ' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style Category tab section
        $this->start_controls_section(
            'course_instructor_category_style_section',
            [
                'label' => __( 'Category', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs('categorye_style_tabs');

                $this->start_controls_tab(
                    'category_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'category_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'',
                            'selectors' => [
                                '{{WRAPPER}} .instructor-1 .instructor-1-single .cont p' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'category_typography',
                            'label' => __( 'Typography', 'edubin-core' ),
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                            ],
                            'selector' => '{{WRAPPER}} .instructor-1 .instructor-1-single .cont p',
                        ]
                    );

                    $this->add_control(
                        'category_padding',
                        [
                            'label'     => __('Category Space', 'edubin-core'),
                            'type'      => Controls_Manager::SLIDER,
                            'range'     => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 60,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .instructor-1 .instructor-1-single .cont p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab(); // Normal Tab end

                $this->start_controls_tab(
                    'category_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );
                $this->add_control(
                    'category_hover_color',
                    [
                        'label' => __( 'Color', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'',
                        'selectors' => [
                            '{{WRAPPER}} .instructor-1 .instructor-1-single .cont a:hover p ' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style name tab section
        $this->start_controls_section(
            'course_total_course_style_section',
            [
                'label' => __( 'Total Course', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color',
            [
                'label' => __( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .instructor-1 .instructor-1-single .cont span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'total_course_typography',
                'label' => __( 'Typography', 'edubin-core' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .instructor-1 .instructor-1-single .cont span',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .instructor-1 .instructor-1-single .cont span i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $link =  $settings['link']['url'];
        $cat_link =  $settings['cat_link']['url'];
        // Button style
        $this->add_render_attribute( 'edubin_carousel_btn_style', [ 'class' => 'instructor-1' ] );

       
        ?>
        <div <?php echo $this->get_render_attribute_string( 'edubin_carousel_btn_style' ); ?>>
            <div class="instructor-1-single">

                <div class="thum">
                     <?php if(!empty($link)) : ?>
                    <a href="<?php echo esc_url($link); ?>">
                     <?php endif; ?>
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'instructor_image' ); ?>
                    <?php if(!empty($link)) : ?>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="cont">
                    <?php if(!empty($link)) : ?>
                    <a href="<?php echo esc_url($link); ?>">
                    <?php endif; ?>
                        <h5><?php echo $settings['instructor_name']; ?></h5>
                    <?php if(!empty($link)) : ?>
                    </a>
                    <?php endif; ?>
                    <?php if(!empty($cat_link)) : ?>
                    <a href="<?php echo esc_url($cat_link); ?>">
                    <?php endif; ?>
                        <p><?php echo $settings['instructor_expert']; ?></p>
                    <?php if(!empty($cat_link)) : ?>
                    </a>
                    <?php endif; ?>
                    <span><i class="fas fa-book"></i><?php echo $settings['total_course']; ?></span>
                </div>
            </div>
        </div>


       
<?php 
     }

}

