<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Course_Category extends Widget_Base {

    public function get_name() {
        return 'edubin-course-category-addons';
    }
    
    public function get_title() {
        return __( 'Category (LearnPress)', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'LearnPress', 'Category LearnPress', 'learnpress category', 'learn press', 'categories' ];
    }
    public function get_icon() {
        return 'edubin-icon eicon-handle';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [
            'slick',
            'edubin-widgets-scripts',
        ];
    }

    protected function register_controls() {

        $cat = array('');
        $terms = get_terms( array(
            'post_type' => 'lp_course',
            'taxonomy' => 'course_category',
            'hide_empty' => false,
            'fields'   => 'id=>name'
        ) );

        foreach ($terms as $key => $value) {
            $cat[$key] = $value;
        }
    
        $this->start_controls_section(
            'section_image',
            [
                'label' => __( 'Image', 'edubin-core' ),
            ]
        );

        $this->add_control(
            'lp_course_category_id',
            [
                'label'       => __( 'Course Category ID', 'edubin-core' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => '',
                'options' => $cat,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Background Image', 'edubin-core' ),
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

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'lp_catogories_bg_color',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .edubin-course-category .single-items .items-image::before',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'title_section_style',
                [
                    'label' => __( 'Style', 'edubin-core' ),
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
                'label' => __( 'Top Space', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-category .single-items .items-cont' => 'top: {{SIZE}}{{UNIT}};',
                ],
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

        $settings = $this->get_settings();

        if ( empty( $settings['image']['url'] ) ) {
            return;
        }

        $this->add_render_attribute( 'wrapper', 'class', 'elementor-image' );

        $show_hide_course_cat = $settings['show_hide_course_cat'];
        $category = get_term($settings['lp_course_category_id']);

        if($settings['lp_course_category_id']):
            $args = array(
                'post_type' => 'lp_course',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'course_category',
                        'field' => 'slug',
                        'terms' => array($category->name),
                    ),
                ),
                'posts_per_page' => -1,
            );
                $loop = new \WP_Query( $args );
                $course_count = count($loop->posts);
                $lesson_count = 0;
                $term_link = get_term_link( $category);
            ?>
            <div class="edubin-course-category">
                <div class="single-items text-center">
                    <div class="items-image">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
                    </div>
                    <div class="items-cont">
                        <?php if(!empty($term_link)) : ?>
                        <a href="<?php echo esc_url($term_link); ?>">
                         <?php endif ?>
                            <h5 class="course-cat"><?php echo esc_html($category->name); ?></h5>
                        <?php if(!empty($term_link)) : ?>
                        </a>
                        <?php endif ?>
                        <?php if ($show_hide_course_cat): ?>   
                            <p class="total-course"><?php esc_html_e($course_count.' Courses', 'edubin-core') ; ?></p>
                        <?php endif ?>
                    </div>
                </div> 
            </div>
        <?php endif; 
    }

}

