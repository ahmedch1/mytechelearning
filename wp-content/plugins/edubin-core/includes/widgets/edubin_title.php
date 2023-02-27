<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\{Group_Control_Box_Shadow, Widget_Base, Controls_Manager, Group_Control_Typography};
class Edubin_Elementor_Widget_Title extends Widget_Base {

    public function get_name() {
        return 'custom-title-addons';
    }
    
    public function get_title() {
        return __( 'Custom Title', 'edubin-core' );
    }

    public function get_icon() {
        return 'edubin-icon eicon-heading';
    }
    public function get_categories() {
        return [ 'edubin-core' ];
    }

   
    protected function register_controls()
    {
        /*-----------------------------------------------------------------------------------*/
        /*  CONTENT -> GENERAL
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'tpc_double_headings_section',
            ['label' => esc_html__('General', 'edubin-core')]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'edubin-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => ['active' => true],
                'placeholder' => esc_attr__('ex: About Us', 'edubin-core'),
                'default' => esc_html__('Subtitle', 'edubin-core'),
            ]
        );

        $this->add_control(
            'dbl_title',
            [
                'label' => esc_html__('Title 1st Part', 'edubin-core'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => ['active' => true],
                'rows' => 1,
                'placeholder' => esc_attr__('1st part', 'edubin-core'),
                'default' => esc_html_x('Title', 'LMSMart Double Heading', 'edubin-core'),
            ]
        );

        $this->add_control(
            'dbl_title2',
            [
                'label' => esc_html__('Title 2nd Part', 'edubin-core'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => ['active' => true],
                'rows' => 1,
                'placeholder' => esc_attr__('2nd part', 'edubin-core'),
                'default' => esc_html_x(' consists of parts', 'LMSMart Double Heading', 'edubin-core'),
            ]
        );

        $this->add_control(
            'dbl_title3',
            [
                'label' => esc_html__('Title 3rd Part', 'edubin-core'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => ['active' => true],
                'rows' => 1,
                'placeholder' => esc_attr__('3rd part', 'edubin-core'),
            ]
        );

        $this->add_responsive_control(
            'subtitle_alignemnt',
                [
                    'label'         => esc_html__( 'Sub Title Alignment', 'edubin-core' ),
                    'type'          => Controls_Manager::CHOOSE,
                    'options'       => [
                        'left'      => [
                            'title'=> esc_html__( 'Left', 'edubin-core' ),
                            'icon' => 'eicon-text-align-left',
                            ],
                        'center'    => [
                            'title'=> esc_html__( 'Center', 'edubin-core' ),
                            'icon' => 'eicon-text-align-center',
                            ],
                        'right'     => [
                            'title'=> esc_html__( 'Right', 'edubin-core' ),
                            'icon' => 'eicon-text-align-right',
                            ],
                        ],
                    'toggle'        => false,
                    'default'       => 'center',
                    'selectors'     => [
                        '{{WRAPPER}} .dbl__subtitle' => 'text-align: {{VALUE}};',
                        ],
                ]
        );

        $this->add_responsive_control(
            'title_alignemnt',
                [
                    'label'         => esc_html__( 'Title Alignment', 'edubin-core' ),
                    'type'          => Controls_Manager::CHOOSE,
                    'options'       => [
                        'left'      => [
                            'title'=> esc_html__( 'Left', 'edubin-core' ),
                            'icon' => 'eicon-text-align-left',
                            ],
                        'center'    => [
                            'title'=> esc_html__( 'Center', 'edubin-core' ),
                            'icon' => 'eicon-text-align-center',
                            ],
                        'right'     => [
                            'title'=> esc_html__( 'Right', 'edubin-core' ),
                            'icon' => 'eicon-text-align-right',
                            ],
                        ],
                    'toggle'        => false,
                    'default'       => 'center',
                    'selectors'     => [
                        '{{WRAPPER}} .dbl__title-wrapper' => 'text-align: {{VALUE}};',
                        ],
                ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Title Link', 'edubin-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_attr__('https://your-link.com', 'edubin-core'),
            ]
        );
        $this->add_control(
            'shape_bg',
            [
                'label' => esc_html__('Shape Background', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'edubin-core'),
                'label_off' => esc_html__('Off', 'edubin-core'),

            ]
        );        

        $this->add_control(
            'shape_bg_animation',
            [
                'label' => esc_html__('Shape Animation', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'edubin-core'),
                'label_off' => esc_html__('Off', 'edubin-core'),
                'condition' => ['shape_bg!' => ''],
            ]
        );
        $this->add_responsive_control(
            'shape_bg_width',
            [
                'label' => esc_html__('Shape Width', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => ['min' => 0, 'max' => 700],
                ],
                'default' => ['size' => 165],
                'condition' => ['shape_bg!' => ''],
            ]
        );
        $this->add_responsive_control(
            'shape_bg_position_x',
            [
                'label' => esc_html__('Shape Position X', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => ['min' => -100, 'max' => 100],
                ],
                'default' => ['size' => ''],
                'condition' => ['shape_bg!' => ''],
            ]
        );        
        $this->add_responsive_control(
            'shape_bg_position_y',
            [
                'label' => esc_html__('Shape Position Y', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => ['min' => -100, 'max' => 600],
                ],
                'default' => ['size' => ''],
                'condition' => ['shape_bg!' => ''],
            ]
        );
        $this->add_control(
            'shape_image',
            [
                'label' => esc_html__('Image Shape', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'edubin-core'),
                'label_off' => esc_html__('Off', 'edubin-core'),

            ]
        );
        $this->add_control(
            'shape_thumb',
            [
                'label' => esc_html__('Image Shape', 'edubin-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [ 'url' => Utils::get_placeholder_image_src() ],
                 'condition' => ['shape_image!' => ''],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'shape_imagesize',
                'default' => 'large',
                'separator' => 'none',
                'condition' => ['shape_image!' => ''],
            ]
        );
        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  STYLES -> TITLE
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_style_title',
            [
                'label' => esc_html__('Title', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_all',
                'selector' => '{{WRAPPER}} .dbl__title',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('HTML Tag', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => '‹h1›',
                    'h2' => '‹h2›',
                    'h3' => '‹h3›',
                    'h4' => '‹h4›',
                    'h5' => '‹h5›',
                    'h6' => '‹h6›',
                    'span' => '‹span›',
                    'div' => '‹div›',
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'heading_1st_part',
            [
                'label' => esc_html__('1st Part', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'condition' => ['dbl_title!' => ''],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_1st',
                'condition' => ['dbl_title!' => ''],
                'selector' => '{{WRAPPER}} .dbl-title_1',
            ]
        );

        $this->add_control(
            'title_1st_color',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'condition' => ['dbl_title!' => ''],
                'dynamic' => ['active' => true],
                'default' => '#ffc221',
                'selectors' => [
                    '{{WRAPPER}} .dbl-title_1' => 'color: {{VALUE}};',
                ],
            ]
        );
           $this->add_control(
            'shape_bg_color',
            [
                'label' => esc_html__('Shape Background', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '#ffd24d',
                'condition' => ['shape_bg!' => ''],
            ]
        );
        $this->add_control(
            'heading_2nd_part',
            [
                'label' => esc_html__('2nd Part', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'condition' => ['dbl_title2!' => ''],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_2nd',
                'condition' => ['dbl_title2!' => ''],
                'selector' => '{{WRAPPER}} .dbl-title_2',
            ]
        );

        $this->add_control(
            'title_2nd_color',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'condition' => ['dbl_title2!' => ''],
                'dynamic' => ['active' => true],
                'default' => '#021a38',
                'selectors' => [
                    '{{WRAPPER}} .dbl-title_2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_3rd_part',
            [
                'label' => esc_html__('3rd Part', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'condition' => ['dbl_title3!' => ''],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_3rd',
                'condition' => ['dbl_title3!' => ''],
                'selector' => '{{WRAPPER}} .dbl-title_3',
            ]
        );

        $this->add_control(
            'title_3rd_color',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'condition' => ['dbl_title3!' => ''],
                'dynamic' => ['active' => true],
                'default' => '#ffc221',
                'selectors' => [
                    '{{WRAPPER}} .dbl-title_3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  STYLES -> SUBTITLE
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_style_subtitle',
            [
                'label' => esc_html__('Subtitle', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['subtitle!' => ''],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'selector' => '{{WRAPPER}} .dbl__subtitle',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '#4c5e78',
                'selectors' => [
                    '{{WRAPPER}} .dbl__subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_bg_color',
            [
                'label' => esc_html__('Subtitle Background Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'selectors' => [
                    '{{WRAPPER}} .dbl__subtitle' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hide_circle',
            [
                'label' => esc_html__('Hide Circle?', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .dbl__subtitle span:before' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'additional_color',
            [
                'label' => esc_html__('Additional Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '#0071dc',
                'condition' => [ 'hide_circle' => '' ],
                'selectors' => [
                    '{{WRAPPER}} .dbl__subtitle span:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label' => esc_html__('Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'separator' => 'before',
                'default' => [
                    'top' => '7',
                    'right' => '12',
                    'bottom' => '7',
                    'left' => '12',
                    'unit'  => 'px',
                    'isLinked' => false
                ],
                'selectors' => [
                    '{{WRAPPER}} .dbl__subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__('Margin', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .dbl__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_border_radius',
            [
                'label' => esc_html__('Border Radius', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit'  => 'px',
                    'isLinked' => false
                ],
                'selectors' => [
                    '{{WRAPPER}} .dbl__subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'subtitle_shadow',
                'selector' => '{{WRAPPER}} .dbl__subtitle',
                // 'fields_options' => [
                   //  'box_shadow_type' => [
                      //   'default' => 'yes'
                   //  ],
                   //  'box_shadow' => [
                      //   'default' => [
                         //    'horizontal' => 5,
                         //    'vertical' => 4,
                         //    'blur' => 13,
                         //    'spread' => 0,
                         //    'color' => 'rgba( 46, 63, 99, .15)',
                      //   ]
                   //  ]
                // ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $_s = $this->get_settings_for_display();

        if (!empty($_s['link']['url'])) {
            $this->add_render_attribute('link', 'class', 'dbl__link');
            $this->add_link_attributes('link', $_s['link']);
        }

        $this->add_render_attribute('heading_wrapper', 'class', 'tpc-double_heading');

        echo '<div ', $this->get_render_attribute_string('heading_wrapper'), '>';

            if ($_s['subtitle']) {
                echo '<div class="dbl__subtitle">';
                    if ($_s['subtitle']) echo '<span>', $_s['subtitle'], '</span>';
                echo '</div>';
            }

            if ($_s['dbl_title'] || $_s['dbl_title2'] || $_s['dbl_title3'] || $_s['shape_bg']) {

                if (!empty($_s['link']['url'])) echo '<a ', $this->get_render_attribute_string('link'), '>';

                echo '<', $_s['title_tag'], ' class="dbl__title-wrapper">'; ?>
                 <?php if ($_s['shape_bg']) {  ?>
                    
                <?php if( !empty($_s['shape_thumb']['url']) ) : ?>
                    <span style="<?php if ($_s['shape_bg_position_x']): ?> top: <?php echo $_s['shape_bg_position_x']["size"]; endif; ?><?php echo $_s['shape_bg_position_x']["unit"];?>; <?php if ($_s['shape_bg_position_y']): ?> left: <?php echo $_s['shape_bg_position_y']["size"]; endif; ?><?php echo $_s['shape_bg_position_y']["unit"];?>; width: <?php echo $_s['shape_bg_width']["size"];?><?php echo $_s['shape_bg_width']["unit"];?>; max-width: <?php echo $_s['shape_bg_width']["size"];?><?php echo $_s['shape_bg_width']["unit"];?>;" class="thumb-shape-bg <?php if($_s['shape_bg_animation']): echo 'animation_active'; endif; ?>">
                        <span class="thumb-shape__bg">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $_s, 'shape_imagesize', 'shape_thumb' ); ?>
                        </span>
                    </span>
                <?php else: ?>

                  <span style="<?php if ($_s['shape_bg_position_x']): ?> top: <?php echo $_s['shape_bg_position_x']["size"]; endif; ?><?php echo $_s['shape_bg_position_x']["unit"];?>; <?php if ($_s['shape_bg_position_y']): ?> left: <?php echo $_s['shape_bg_position_y']["size"]; endif; ?><?php echo $_s['shape_bg_position_y']["unit"];?>; width: <?php echo $_s['shape_bg_width']["size"];?><?php echo $_s['shape_bg_width']["unit"];?>; max-width: <?php echo $_s['shape_bg_width']["size"];?><?php echo $_s['shape_bg_width']["unit"];?>;" class="shape-bg <?php if($_s['shape_bg_animation']): echo 'animation_active'; endif; ?>">
                    <?php if ($_s['shape_bg_color'] && empty($_s['shape_thumb']['url'])): ?><span style="background: <?php echo $_s['shape_bg_color'];?>" class="shape__bg"></span><?php endif; ?>
                </span>
                <?php endif; ?>
                   
                <?php }; ?>
                   <?php if ($_s['dbl_title']) echo '<span class="dbl__title dbl-title_1">', $_s['dbl_title'], '</span>'; 
                    if ($_s['dbl_title2']) echo '<span class="dbl__title dbl-title_2">', $_s['dbl_title2'], '</span>';
                    if ($_s['dbl_title3']) echo '<span class="dbl__title dbl-title_3">', $_s['dbl_title3'], '</span>';
                echo '</', $_s['title_tag'], '>';

                if (!empty($_s['link']['url'])) echo '</a>';

            }

        echo '</div>';
    }
}
