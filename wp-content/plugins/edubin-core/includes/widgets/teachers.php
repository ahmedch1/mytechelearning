<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Teachers extends Widget_Base {

    public function get_name() {
        return 'edubin-teacher-addons';
    }
    
    public function get_title() {
        return __( 'Teacher', 'edubin-core' );
    }
   public function get_keywords() {
        return [ 'Teacher', 'team', 'members'];
    }
    public function get_icon() {
        return 'edubin-icon eicon-person';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [
            'edubin-widgets-scripts',
        ];
    }

    protected function register_controls() {


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Teacher Content', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'posts_column',
            [
                'label' => __('Items Column', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '12' => __('1 Column', 'edubin-core'),
                    '6' => __('2 Column', 'edubin-core'),
                    '4' => __('3 Column', 'edubin-core'),
                    '3' => __('4 Column', 'edubin-core'),
                    '2' => __('6 Column', 'edubin-core'),
                ]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
         'teacher_image',
         [
          'label' => esc_html__( 'Teacher Image', 'edubin-core' ),
          'type'  => Controls_Manager::MEDIA,
          'default' => [
           'url' => Utils::get_placeholder_image_src(),
               ],
           ]
        );
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'teacher_imagesize',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'teacher_name',
            [
              'label' => esc_html__( 'Name', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'label_block' => true,
              'default' => esc_html__( 'Jonathan Bean', 'edubin-core' ),
          ]
      );

        $repeater->add_control(
            'teacher_degree',
            [
              'label' => esc_html__( 'Designation', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'label_block' => true,
              'default' => esc_html__( 'Math Teacher', 'edubin-core' ),
          ]
      );

        $repeater->add_control(
            'teacher_email',
            [
              'label' => esc_html__( 'Email', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'label_block' => true,
              'default' => '',
          ]
      );

        $repeater->add_control(
            'teacher_details_link',
            [
                'label' => __( 'Teacher details page link', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'fb_link',
            [
                'label' => __( 'Facebook', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'twitter_link',
            [
                'label' => __( 'Twitter', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'linkedin_link',
            [
                'label' => __( 'Linkedin', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'youtube_link',
            [
                'label' => __( 'Youtube', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'instagram_link',
            [
                'label' => __( 'Instagram', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );  

        $repeater->add_control(
            'skype_link',
            [
                'label' => __( 'Skype', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'vk_link',
            [
                'label' => __( 'VK', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'github_link',
            [
                'label' => __( 'Github', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $repeater->add_control(
            'bitbucket_link',
            [
                'label' => __( 'Bitbucket', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $repeater->add_control(
            'whatsapp_link',
            [
                'label' => __( 'Whatsapp', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'tumblr_link',
            [
                'label' => __( 'Tumblr', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'stack_overflow_link',
            [
                'label' => __( 'Stack Overflow', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'soundcloud_link',
            [
                'label' => __( 'Soundcloud', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'slack_link',
            [
                'label' => __( 'Slack', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $repeater->add_control(
            'dribbble_link',
            [
                'label' => __( 'Dribbble', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $repeater->add_control(
            'behance_link',
            [
                'label' => __( 'Behance', 'edubin-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

     
        $this->add_control(
            'teacher_options',
            [
              'label'       => esc_html__( 'Add Teacher', 'edubin-core' ),
              'type'        => Controls_Manager::REPEATER,
              'show_label'  => true,
              'default'     => [
                  [
                    'teacher_image' => '',
                    'teacher_name'       => esc_html__( 'Teacher 1', 'edubin-core' ),
                    'teacher_degree' => esc_html__( 'Teacher', 'edubin-core' ),
                ],
                [
                    'teacher_image' => '',
                    'teacher_name'       => esc_html__( 'Teacher 2', 'edubin-core' ),
                    'teacher_degree' => esc_html__( 'Teacher', 'edubin-core' ),
                ],
                [
                    'teacher_image' => '',
                    'teacher_name'       => esc_html__( 'Teacher 3', 'edubin-core' ),
                    'teacher_degree' => esc_html__( 'Teacher', 'edubin-core' ),
                ],
                [
                    'teacher_image' => '',
                    'teacher_name'       => esc_html__( 'Teacher 4', 'edubin-core' ),
                    'teacher_degree' => esc_html__( 'Teacher', 'edubin-core' ),
                ]
            ],
            'fields'  => $repeater->get_controls(),
            'title_field' => '{{{teacher_name}}}',
        ]
    );



        $this->end_controls_section();

        // Star style tab
        $this->start_controls_section(
            'teacher_name_style',
            [
                'label' => esc_html__( 'Name', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tabs_title_style' );

        $this->start_controls_tab(
            'tab_title_normal',
            [
                'label' => __( 'Normal', 'edubin-core' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .teacher-content .teacher-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();      

        $this->start_controls_tab(
            'tab_title_hover',
            [
                'label' => __( 'Hover', 'edubin-core' ),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label'     => __( 'Title Hover Color', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .teacher-content a:hover .teacher-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .edubin-single-teacher .teacher-content .teacher-name',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'teacher_degree_style',
            [
                'label' => esc_html__( 'Degree', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Degree_color',
            [
                'label'     => __( 'Degree', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .teacher-content .teacher-degree' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'Degree_typography',
                'selector' => '{{WRAPPER}} .edubin-single-teacher .teacher-content .teacher-degree',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'teacher_social_style',
            [
                'label' => esc_html__( 'Social', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .techer-social a.social-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label'     => __( 'Icon Hover', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .techer-social a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'layout_style',
            [
                'label' => esc_html__( 'Layout', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'image_fixed_height',
            [
                'label' => __( 'Image Height', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .image img' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'column_margin_bottom',
            [
                'label' => __( 'Margin Bottom', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher.mb-30' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );        $this->add_responsive_control(
            'content_height',
            [
                'label' => __( 'Content Area Height', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 70,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .teacher-content-area' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   

       $this->add_responsive_control(
            'content_area_padding',
            [
                'label'      => __('Content Area Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-single-teacher .teacher-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_bg_color',
            [
                'label'     => __( 'Content Background', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-teacher .teacher-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );
    }

    protected function render( $instance = [] ) {
        $settings   = $this->get_settings_for_display();

        $this->add_render_attribute( 'teacher_area_attr', 'class', 'edubin-teacher' );
        $this->add_render_attribute( 'teacher_row', 'class', 'row' );
        $this->add_render_attribute('edubin_posts_column', 'class', 'col-xs-' . '12' . ' col-sm-' . '6' . ' col-md-' . '6' . ' col-lg-' . $settings['posts_column'] );

        ?>
        <div <?php echo $this->get_render_attribute_string( 'teacher_row' ); ?> >

            <?php foreach ( $settings['teacher_options'] as $teacher_option ) : ?>
                <div <?php echo $this->get_render_attribute_string( 'edubin_posts_column' ); ?> >

                    <?php 

                    $all_social = $teacher_option['fb_link']['url'] || $teacher_option['twitter_link']['url'] || $teacher_option['linkedin_link']['url'] || $teacher_option['youtube_link']['url'] || $teacher_option['instagram_link']['url'] || $teacher_option['skype_link']['url'] || $teacher_option['vk_link']['url'] || $teacher_option['github_link']['url'] || $teacher_option['bitbucket_link']['url'] || $teacher_option['whatsapp_link']['url'] || $teacher_option['tumblr_link']['url'] || $teacher_option['stack_overflow_link']['url'] || $teacher_option['soundcloud_link']['url'] || $teacher_option['slack_link']['url'] || $teacher_option['dribbble_link']['url'] || $teacher_option['behance_link']['url']; 
                    ?>
                    <div class="edubin-single-teacher <?php if($all_social): echo "active-social"; endif; ?> mb-30 text-center">
                        <div class="image">
                            <?php if ($teacher_option['teacher_details_link']['url']): ?>
                                <a href="<?php echo $teacher_option['teacher_details_link']['url'] ?>" <?php if ($teacher_option['teacher_details_link']['is_external']): echo 'target="_blank"'; endif; ?>>
                                <?php endif; ?>
                                <?php
                                    echo '<div class="teacher-image">'.Group_Control_Image_Size::get_attachment_image_html( $teacher_option, 'teacher_imagesize', 'teacher_image' ).'</div>';
                                ?>
                                <?php if ($teacher_option['teacher_details_link']['url']): ?>
                                </a>
                                <?php endif; ?><!-- End teacher image -->
                            </div>
                            <?php if ($teacher_option['teacher_name']): ?>

                                <div class="teacher-content-area">
                                    <div class="teacher-content">
                                        <?php if ($teacher_option['teacher_details_link']['url']): ?>
                                            <a href="<?php echo $teacher_option['teacher_details_link']['url'] ?>">
                                            <?php endif; ?>
                                            <h6 class="teacher-name"><?php echo $teacher_option['teacher_name']; ?></h6>
                                            <?php if ($teacher_option['teacher_details_link']['url']): ?>
                                            </a>
                                            <?php endif; ?><!--  End title -->

                                            <?php if ($teacher_option['teacher_degree']): ?>
                                                <span class="teacher-degree"><?php echo $teacher_option['teacher_degree']; ?></span>
                                            <?php endif; ?>

                                            <?php if ($teacher_option['teacher_email']): ?>
                                                <span class="teacher-degree teacher-email"><?php echo $teacher_option['teacher_email']; ?></span>
                                            <?php endif; ?>

                                            <?php if ($teacher_option['fb_link']['url'] || $teacher_option['twitter_link']['url'] || $teacher_option['linkedin_link']['url'] || $teacher_option['youtube_link']['url'] || $teacher_option['instagram_link']['url'] || $teacher_option['skype_link']['url']) : ?>

                                                <div class="techer-social">
                                                    <?php if ($teacher_option['fb_link']['url']) : ?>
                                                      <a href="<?php echo esc_url($teacher_option['fb_link']['url']); ?>" <?php if ($teacher_option['fb_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                                        <i class="flaticon-facebook" aria-hidden="true"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if ($teacher_option['twitter_link']['url']) : ?>
                                                  <a href="<?php echo esc_url($teacher_option['twitter_link']['url']); ?>" <?php if ($teacher_option['twitter_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                                    <i class="flaticon-twitter" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($teacher_option['linkedin_link']['url']) : ?>
                                              <a href="<?php echo esc_url($teacher_option['linkedin_link']['url']); ?>" <?php if ($teacher_option['linkedin_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                                <i class="flaticon-linkedin" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($teacher_option['youtube_link']['url']) : ?>
                                          <a href="<?php echo esc_url($teacher_option['youtube_link']['url']); ?>" <?php if ($teacher_option['youtube_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                            <i class="flaticon-youtube-logotype" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($teacher_option['instagram_link']['url']) : ?>
                                      <a href="<?php echo esc_url($teacher_option['instagram_link']['url']); ?>" <?php if ($teacher_option['instagram_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                        <i class="flaticon-instagram-1" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if ($teacher_option['skype_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['skype_link']['url']); ?>" <?php if ($teacher_option['skype_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-skype" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['vk_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['vk_link']['url']); ?>" <?php if ($teacher_option['vk_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-vk" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['github_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['github_link']['url']); ?>" <?php if ($teacher_option['github_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-github" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['bitbucket_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['bitbucket_link']['url']); ?>" <?php if ($teacher_option['bitbucket_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-bitbucket-logotype-camera-lens-in-perspective" aria-hidden="true"></i>
                                </a>
      
                                <?php if ($teacher_option['whatsapp_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['whatsapp_link']['url']); ?>" <?php if ($teacher_option['whatsapp_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-whatsapp" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['tumblr_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['tumblr_link']['url']); ?>" <?php if ($teacher_option['tumblr_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-tumblr" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['stack_overflow_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['stack_overflow_link']['url']); ?>" <?php if ($teacher_option['stack_overflow_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-stack-overflow" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['soundcloud_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['soundcloud_link']['url']); ?>" <?php if ($teacher_option['soundcloud_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-soundcloud" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['slack_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['slack_link']['url']); ?>" <?php if ($teacher_option['slack_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-slack" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php if ($teacher_option['dribbble_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['dribbble_link']['url']); ?>" <?php if ($teacher_option['dribbble_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-dribbble-logo" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($teacher_option['behance_link']['url']) : ?>
                                  <a href="<?php echo esc_url($teacher_option['behance_link']['url']); ?>" <?php if ($teacher_option['behance_link']['is_external']): echo 'target="_blank"'; endif; ?> class="social-link" >
                                    <i class="flaticon-behance" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                        </div>
                        <?php endif; ?><!--  End social -->

                    </div>
                </div>
                <?php endif; ?><!-- End teacher content -->
            </div> <!-- single teachers -->
        </div>
    <?php endforeach; ?>

</div>

<?php
}
}


