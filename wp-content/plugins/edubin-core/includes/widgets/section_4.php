<?php
namespace Elementor;

if (!defined('ABSPATH')) {
exit;
}
// Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\{
    Widget_Base,
    Controls_Manager,
    Repeater,
    Icons_Manager,
    Group_Control_Border,
    Group_Control_Typography,
    Group_Control_Image_Size,
    Group_Control_Background,
    Group_Control_Box_Shadow
};
class Edubin_Elementor_Widget_Section_4 extends Widget_Base
{

public function get_name()
{
    return 'edubin-section-4';
}

public function get_title()
{
    return __('Here Section 4', 'edubin-core');
}

public function get_icon()
{
    return 'edubin-icon eicon-layout-settings';
}

public function get_categories()
{
    return ['edubin-core'];
}

  
    protected function register_controls() {
       
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'edubin-core'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'edubin-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('<span>Transform your</span> <span>full life today as</span> <span>my consultant</span>', 'edubin-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     => __('Description', 'edubin-core'),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => '',
                'separator' =>'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_shape_image',
            [
                'label' => __( 'Shape & Images', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'signature_image',
            [
                'label' => __( 'Signature Image', 'edubin-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'signature_image',
                'default' => 'large',
                'separator' => 'none',
            ]
        );  
        $this->add_responsive_control(
            'signature_image_width',
            [
                'label'     => __('Signature Image Width', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 5,
                        'max' => 600,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .hero-content .sign img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   
        $this->add_control(
            'image_1',
            [
                'label' => __( 'Dot Shape', 'edubin-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_1',
                'default' => 'full',
                'separator' => 'none',
            ]
        );        
        $this->add_responsive_control(
            'image_1_position',
            [
                'label'     => __('Image Position', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => -50,
                        'max' => 490,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .hero-content .shape-4' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_control(
            'shape_2',
            [
                'label' => __( 'Shape 2', 'edubin-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'shape_2',
                'default' => 'full',
                'separator' => 'none',
            ]
        );      
        $this->add_responsive_control(
            'shape_2_width',
            [
                'label'     => __('Shape 2 Position', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => -500,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .shape-3' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );     
        $this->end_controls_section();

        $this->start_controls_section(
            'section_btn',
            [
                'label' => __( 'Button', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_button',
            [
                'label' => esc_html__( 'Button', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Text', 'edubin-core' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__( 'Download Free E-Book', 'edubin-core' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Link', 'edubin-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'edubin-core' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();
 
         $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Style', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => __( 'Background', 'edubin-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .edubin-hero-4',
            ]
        );
        $this->add_control(
            'bg_shape_color_a',
            [
                'label'     => __('Background Shape A', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffc600',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .shape-2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bg_shape_color_b',
            [
                'label'     => __('Background Shape B', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff4612',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .shape-1 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bg_shape_color_c',
            [
                'label'     => __('Background Shape C', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffc600',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .shape-7 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bg_shape_color_d',
            [
                'label'     => __('Background Shape D', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff4612',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .shape-6 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'round_border_shape',
            [
                'label'     => __('Round Border', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff9071',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .shape-5 ' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        
         $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-hero-4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'section_height',
            [
                'label' => esc_html__( 'Section Height', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1300,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 850,
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_top_space',
            [
                'label'     => __('Content Position', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 600,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 170,
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .hero-content' => 'padding-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __('Title Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                ],
                'selector' => '{{WRAPPER}} .edubin-hero-4 .title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __('Title Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_bg_color',
            [
                'label'     => __('Title Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => ' #011021',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .title span' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-hero-4 .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
        $this->end_controls_section();

        // ==== Content Style Section ====

        $this->start_controls_section(
            'desc_style_section',
            [
                'label' => __('Description', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'desc_typography',
                'label'    => __('Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
                'selector' => '{{WRAPPER}} .edubin-hero-4 .description',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label'     => __('Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .description' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'desc_padding',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-hero-4 .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->end_controls_section();

        //======================================================================
        // Button style one
        //======================================================================
        $this->start_controls_section(
            'btn_section_style',
            [
                'label' => __('Button', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'button_top_space',
            [
                'label'     => __('Button Top Space', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 .edubin-btn-3' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );        

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-hero-4 a.here-btn',
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label'     => __('Text Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#011021',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color_one',
            [
                'label'     => __('Border Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label'     => __('Text Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffc600',
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label'     => __('Border Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .edubin-hero-4 a.here-btn',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label'      => __('Border Radius', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default' => [
                    'top' => 3,
                    'right' => 3,
                    'bottom' => 3,
                    'left' => 3,
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .edubin-hero-4 a.here-btn',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-hero-4 a.here-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->end_controls_section();
    } // End options

    protected function render( $instance = [] ) {

    $settings = $this->get_settings_for_display();

    ?>

        <!-- Hero Start -->
        <div class="edubin-hero-4">
            <div class="shape-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="1401px" height="1049px">
                    <path d="M127.828,0.1 L1273.171,0.1 C1343.769,0.1 1400.999,57.275 1400.999,127.927 L1209.257,921.72 C1183.691,1009.634 1152.26,1048.999 1081.428,1048.999 L127.828,1048.999 C57.230,1048.999 0.0,991.724 0.0,921.72 L0.0,127.927 C0.0,57.275 57.230,0.1 127.828,0.1 Z" />
                </svg>
            </div>
            <div class="shape-2">
                <svg width="661px" height="716px">
                    <path d="M609.525,302.24 C482.12,224.115 277.82,98.906 145.932,18.774 C72.32,-26.376 19.382,13.512 16.313,113.275 C11.487,270.135 4.452,498.778 0.195,637.148 C-2.26,709.363 39.95,734.489 103.670,700.370 C238.249,629.263 468.331,507.696 607.437,434.198 C677.560,397.147 678.308,344.49 609.525,302.24 Z" />
                </svg>
            </div>
            <div class="shape-3">
                <div class="sign" data-aos="fade-up" data-aos-delay="600">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'shape_2size', 'shape_2'); ?>
                </div>
            </div>
            <div class="shape-5"></div>
            <div class="shape-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="1057px" height="791px">
                    <path d="M960.558,790.999 L96.441,790.999 C43.178,790.999 0.0,747.811 0.0,694.536 L144.662,96.463 C163.950,29.682 187.840,0.0 241.103,0.0 L960.558,0.0 C1013.821,0.0 1056.999,43.187 1056.999,96.463 L1056.999,694.536 C1056.999,747.811 1013.821,790.999 960.558,790.999 Z" />
                </svg>
            </div>
            <div class="shape-7">
                <svg xmlns="http://www.w3.org/2000/svg" width="1057px" height="791px">
                    <path d="M960.558,790.999 L96.441,790.999 C43.178,790.999 0.0,747.811 0.0,694.536 L144.662,96.462 C163.950,29.682 187.840,0.0 241.103,0.0 L960.558,0.0 C1013.821,0.0 1056.999,43.187 1056.999,96.462 L1056.999,694.536 C1056.999,747.811 1013.821,790.999 960.558,790.999 Z" />
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Hero Content Start -->
                        <div class="hero-content">

                            <?php if ($settings['signature_image']['url']): ?>
                                <div class="sign" data-aos="fade-up" data-aos-delay="600">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'signature_imagesize', 'signature_image'); ?>
                                </div>
                            <?php endif ?>

                            <?php if ($settings['title']): ?>
                                 <h2 class="title" data-aos="fade-up" data-aos-delay="800"><?php echo $settings['title']; ?></h2>
                            <?php endif ?>

                            <?php if ($settings['description']): ?>
                                 <p class="description"><?php echo $settings['description']; ?></p>
                            <?php endif ?>

                            <div class="hero-btn" data-aos="fade-up" data-aos-delay="900">
                            <?php if ($settings['show_button']): ?>
                                <a class="here-btn edubin-btn-3" <?php echo ($settings['button_link']["is_external"] == 'on') ? 'target="_blank"' : '' ; ?> href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo $settings['button_text']; ?></a>
                            <?php endif; ?>

                            <div class="shape-4">
                                <div class="sign" data-aos="fade-up" data-aos-delay="600">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_1size', 'image_1'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Hero Content End -->
                    </div>
                </div>
            </div>

        </div>
        <!-- Hero End -->

<?php

    }

}

