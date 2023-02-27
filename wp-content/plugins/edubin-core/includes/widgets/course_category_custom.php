<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Course_Category_Custom extends Widget_Base {

    public function get_name() {
        return 'edubin-course-category-custom-addons';
    }
    
    public function get_title() {
        return __( 'Custom Category', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'Category', 'categories', 'course categories' , 'course Category' ];
    }
    public function get_icon() {
        return 'edubin-icon eicon-posts-carousel';
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
            'section_image',
            [
                'label' => __( 'Content', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'cat_layout',
            [
                'label' => __( 'Style', 'lmsmart-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Style 1', 'lmsmart-core'),
                    '2' => esc_html__('Style 2', 'lmsmart-core'),
                ],
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __( 'Image/Icon', 'edubin-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image', 
                'label' => __( 'Image Size', 'edubin-core' ),
                'default' => 'large',
            ]
        );

        $this->add_control(
            'course_cat_name',
            [
                'label'   => __( 'Course Category', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'placeholder' => __('Technology','edubin-core'),
                'default' => 'Technology',
            ]
        );
        $this->add_control(
            'total_course',
            [
                'label'   => __( 'Total Course', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'placeholder' => __('15','edubin-core'),
                'default' => '15',
            ]
        );
        $this->add_control(
            'total_course_text',
            [
                'label'   => __( 'Courses', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'placeholder' => __('Courses','edubin-core'),
                'default' => '',
            ]
        );

        $this->add_control(
            'cat_link',
            [
                'label' => __( 'Category Link', 'edubin-core' ),
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
            'show_hide_course_cat',
            [
                'label' => __( 'Total Courses', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'hover_effect',
            [
                'label' => __( 'Hover Effect', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_section_style',
                [
                    'label' => __( 'Style', 'edubin-core' ),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-course-category .single-items' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
           
            $this->add_responsive_control(
            'image_fixed_height',
            [
                'label' => __( 'Height', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 900,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-category .single-items .items-image' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-course-category .single-items .items-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'space_between',
            [
                'label' => __( 'Space Between', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 900,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-category .single-items .items-cont .course-cat' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

       $this->add_responsive_control(
            'space_top',
            [
                'label' => __( 'Content Position', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px', 'em', 'vw' ],
                'range' => [
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-category .single-items .items-cont' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'lp_catogories_bg_color',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .edubin-course-category .single-items .items-image::before',
            ]
        );
    $this->end_controls_section();

    $this->start_controls_section(
        'title_style_section',
            [
                'label' => __( 'Title', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                            'label' => __( 'Category Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-course-category .single-items .items-cont .course-cat' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'title_typography',
                            'label' => __( 'Category Typography', 'edubin-core' ),
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                            ],
                            'selector' => '{{WRAPPER}} .edubin-course-category .single-items .items-cont .course-cat',
                        ]
                    );

                $this->end_controls_tab();

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
                            '{{WRAPPER}} .edubin-course-category .single-items .items-cont .course-cat:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();

    $this->end_controls_section();

    $this->start_controls_section(
        'total_style_section',
            [
                'label' => __( 'Total Course', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

      $this->add_control(
            'total_courses_color',
            [
                'label' => __( 'Total Courses Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'separator'=>'before',
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-category .single-items .items-cont .total-course' => 'color: {{VALUE}}',
                ],
            ]
        );      
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'total_courses_typography',
                'label' => __( 'Total Courses Typography', 'edubin-core' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-course-category .single-items .items-cont .total-course',
            ]
        );
    $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        if ( empty( $settings['image']['url'] ) ) {
            return;
        }

        $this->add_render_attribute( 'wrapper', 'class', 'elementor-image' );

        $this->add_render_attribute('title_link', 'class', 'cat-item_title-link');
        if (!empty($settings['cat_link']['url'])) {
            $this->add_link_attributes('title_link', $settings['cat_link']);
        }

        $this->add_render_attribute('cat_img', [
            'class' => 'cat-item_image',
            'src' => isset($settings['image']['url']) ? esc_url($settings['image']['url']) : '',
            'alt' => Control_Media::get_image_alt( $settings['image'] ),
        ]);

        $show_hide_course_cat = $settings['show_hide_course_cat']; 
        $course_cat_name = $settings['course_cat_name'];
        $total_course = $settings['total_course'];
        $cat_link = $settings['cat_link'];
        ?>
    <?php if ($settings['cat_layout'] == '1'): ?>
            <div class="edubin-course-category <?php echo ($settings['hover_effect']) ? 'cat-hover-effect' : '' ; ?>">
                <div class="single-items text-center">
                  <?php if(!empty($cat_link['url'])) : ?>
                        <a href="<?php echo esc_url($cat_link['url']); ?>">
                    <?php endif; ?>

                    <div class="items-image">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
                    </div>

                    <?php if(!empty($cat_link['url'])) : ?>
                        </a>
                    <?php endif; ?>

                    <div class="items-cont">

                        <?php if(!empty($cat_link['url'])) : ?>
                        <a href="<?php echo esc_url($cat_link['url']); ?>">
                         <?php endif; ?>

                        <h5 class="course-cat"><?php echo esc_html($course_cat_name); ?></h5>
                       
                        <?php if(!empty($cat_link['url'])) : ?>
                        </a>
                        <?php endif; ?>

                        <?php if ($show_hide_course_cat): ?>  
                            <?php if ($settings['total_course_text']) { ?>
                                <p class="total-course"><?php echo esc_attr( $total_course ); ?> <?php echo esc_html($settings['total_course_text']); ?></p>
                            <?php } else { ?>
                                <p class="total-course"><?php echo esc_attr( $total_course ); ?><?php esc_html_e(' Courses', 'edubin-core') ; ?></p>
                           <?php } ?> 
             
                        <?php endif; ?>
                    </div>
                </div> 
            </div>
    <?php elseif ($settings['cat_layout'] == '2'): ?> 
        <div class="tpc-cat-item">
            <div class="single-items-1">
               <?php  echo '<a ', $this->get_render_attribute_string('title_link'), '>'; ?>
                     <div class="cat-icon-wrap">
                         <img <?php echo $this->get_render_attribute_string('cat_img'); ?> />
                     </div>
                    <span class="cat_name"><?php echo  $settings['course_cat_name']; ?></span>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php
    }

}

