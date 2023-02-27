<?php
namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Icon_Category extends Widget_Base
{

    public function get_name()
    {
        return 'edubin-icon-category-addons';
    }

    public function get_title()
    {
        return __('Image Carousel', 'edubin-core');
    }

    public function get_icon()
    {
        return 'edubin-icon eicon-posts-carousel';
    }

    public function get_categories()
    {
        return ['edubin-core'];
    }

    public function get_script_depends()
    {
        return [
            'slick',
            'edubin-widgets-scripts',
        ];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'carosul_content',
            [
                'label' => __('Icon Carousel', 'edubin-core'),
            ]
        );

        $this->add_control(
            'image_carosul_style',
            [
                'label'   => __('Style', 'edubin-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style 1', 'edubin-core'),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'carosul_image_title',
            [
                'label'       => __('Title', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __('Image Carosul Title.', 'edubin-core'),
            ]
        );

        $repeater->add_control(
            'carosul_image',
            [
                'label'   => __('Image', 'edubin-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'carosul_imagesize',
                'default'   => 'full',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'       => __('Link', 'edubin-core'),
                'type'        => Controls_Manager::URL,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('https://your-link.com', 'edubin-core'),
                'default'     => [
                    'url' => '#',
                ],
                'separator'   => 'before',
            ]
        );
        $repeater->add_control(
            'bg_colors',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
            ]
        );

        $repeater->add_control(
            'title_colors',
            [
                'label'     => __('Title Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
            ]
        );
        
        $repeater->end_controls_tab();

        $this->add_control(
            'carosul_image_list',
            [
                'type'        => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default'     => [

                    [
                        'carosul_image_title' => __('Image Carousel Title', 'edubin-core'),
                    ],

                ],
                'title_field' => '{{{ carosul_image_title }}}',
            ]
        );

        $this->add_control(
            'slider_on',
            [
                'label'        => __('Slider', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('On', 'edubin-core'),
                'label_off'    => __('Off', 'edubin-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();

        // Slider setting
        $this->start_controls_section(
            'carosul_slider_option',
            [
                'label'     => __('Slider Option', 'edubin-core'),
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slitems',
            [
                'label'     => __('Slider Items', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 20,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slarrows',
            [
                'label'        => __('Slider Arrow', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slprevicon',
            [
                'label'     => __('Previous icon', 'edubin-core'),
                'type'      => Controls_Manager::ICON,
                'default'   => 'flaticon-back',
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slnexticon',
            [
                'label'     => __('Next icon', 'edubin-core'),
                'type'      => Controls_Manager::ICON,
                'default'   => 'flaticon-next',
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sldots',
            [
                'label'        => __('Slider dots', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slpause_on_hover',
            [
                'type'         => Controls_Manager::SWITCHER,
                'label_off'    => __('No', 'edubin-core'),
                'label_on'     => __('Yes', 'edubin-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'label'        => __('Pause on Hover?', 'edubin-core'),
                'condition'    => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slcentermode',
            [
                'label'        => __('Center Mode', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slcenterpadding',
            [
                'label'     => __('Center padding', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 0,
                'max'       => 500,
                'step'      => 1,
                'default'   => 50,
                'condition' => [
                    'slider_on'    => 'yes',
                    'slcentermode' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slautolay',
            [
                'label'        => __('Slider auto play', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'separator'    => 'before',
                'default'      => 'no',
                'condition'    => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slautoplay_speed',
            [
                'label'     => __('Autoplay speed', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 3000,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slanimation_speed',
            [
                'label'     => __('Autoplay animation speed', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 300,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slscroll_columns',
            [
                'label'     => __('Slider item to scroll', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 10,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'heading_tablet',
            [
                'label'     => __('Tablet', 'edubin-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sltablet_display_columns',
            [
                'label'     => __('Slider Items', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 8,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sltablet_scroll_columns',
            [
                'label'     => __('Slider item to scroll', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 8,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sltablet_width',
            [
                'label'       => __('Tablet Resolution', 'edubin-core'),
                'description' => __('The resolution to tablet.', 'edubin-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 750,
                'condition'   => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'heading_mobile',
            [
                'label'     => __('Mobile Phone', 'edubin-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slmobile_display_columns',
            [
                'label'     => __('Slider Items', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 4,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slmobile_scroll_columns',
            [
                'label'     => __('Slider item to scroll', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 4,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slmobile_width',
            [
                'label'       => __('Mobile Resolution', 'edubin-core'),
                'description' => __('The resolution to mobile.', 'edubin-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 480,
                'condition'   => [
                    'slider_on' => 'yes',
                ],
            ]
        );

        $this->end_controls_section(); // Slider Option end

        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('title_style_tabs');

        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_responsive_control(
            'image_size',
            [
                'label'     => __('Image Width', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category .single-category img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __('Category Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category .single-category .icon-category-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __('Category Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-icon-category .single-category .icon-category-title',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label'     => __('Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category .single-category .icon-category-title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover Tab end

        $this->end_controls_tabs();
        $this->end_controls_section(); // Slider Option end

        // Style instagram arrow style start
        $this->start_controls_section(
            'edubin_instagram_arrow_style',
            [
                'label'     => __('Arrow', 'edubin-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('instagram_arrow_style_tabs');

        // Normal tab Start
        $this->start_controls_tab(
            'instagram_arrow_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'edubin_instagram_arrow_color',
            [
                'label'     => __('Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'edubin_instagram_arrow_fontsize',
            [
                'label'      => __('Font Size', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'instagram_arrow_background',
                'label'    => __('Background', 'edubin-core'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'edubin_instagram_arrow_border',
                'label'    => __('Border', 'edubin-core'),
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow',
            ]
        );

        $this->add_responsive_control(
            'edubin_instagram_arrow_border_radius',
            [
                'label'     => __('Border Radius', 'edubin-core'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_control(
            'edubin_instagram_arrow_height',
            [
                'label'      => __('Height', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 38,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'edubin_instagram_arrow_width',
            [
                'label'      => __('Width', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 38,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'edubin_instagram_arrow_padding',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->end_controls_tab(); // Normal tab end

        // Hover tab Start
        $this->start_controls_tab(
            'instagram_arrow_style_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );

        $this->add_control(
            'edubin_instagram_arrow_hover_color',
            [
                'label'     => __('Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'instagram_arrow_hover_background',
                'label'    => __('Background', 'edubin-core'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'edubin_instagram_arrow_hover_border',
                'label'    => __('Border', 'edubin-core'),
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow:hover',
            ]
        );

        $this->add_responsive_control(
            'edubin_instagram_arrow_hover_border_radius',
            [
                'label'     => __('Border Radius', 'edubin-core'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover tab end

        $this->end_controls_tabs();

        $this->end_controls_section(); // Style instagram arrow style end

        // Style instagram Dots style start
        $this->start_controls_section(
            'edubin_instagram_dots_style',
            [
                'label'     => __('Pagination', 'edubin-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_on' => 'yes',
                    'sldots'    => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('instagram_dots_style_tabs');

        // Normal tab Start
        $this->start_controls_tab(
            'instagram_dots_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'instagram_dots_background',
                'label'    => __('Background', 'edubin-core'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'edubin_instagram_dots_border',
                'label'    => __('Border', 'edubin-core'),
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li',
            ]
        );

        $this->add_responsive_control(
            'edubin_instagram_dots_border_radius',
            [
                'label'     => __('Border Radius', 'edubin-core'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_control(
            'edubin_instagram_dots_height',
            [
                'label'      => __('Height', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'edubin_instagram_dots_width',
            [
                'label'      => __('Width', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->end_controls_tab(); // Normal tab end

        // Hover tab Start
        $this->start_controls_tab(
            'instagram_dots_style_hover_tab',
            [
                'label' => __('Active', 'edubin-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'instagram_dots_hover_background',
                'label'    => __('Background', 'edubin-core'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li.slick-active',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'edubin_instagram_dots_hover_border',
                'label'    => __('Border', 'edubin-core'),
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li.slick-active',
            ]
        );

        $this->add_responsive_control(
            'edubin_instagram_dots_hover_border_radius',
            [
                'label'     => __('Border Radius', 'edubin-core'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .edubin-icon-category-style-1 .slick-dots li.slick-active' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover tab end

        $this->end_controls_tabs();

        $this->end_controls_section(); // Style instagram dots style end

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        // Carousel Attribute
        $this->add_render_attribute('edubin_carosul_attr', 'class', 'ht-custom-carousel');
        if ($settings['slider_on'] == 'yes') {
            $this->add_render_attribute('edubin_carosul_attr', 'class', 'edubin-carousel-activation edubin-icon-category-style-' . $settings['image_carosul_style']);

            $slider_settings = [
                'arrows'          => ('yes' === $settings['slarrows']),
                'arrow_prev_txt'  => $settings['slprevicon'],
                'arrow_next_txt'  => $settings['slnexticon'],
                'dots'            => ('yes' === $settings['sldots']),
                'autoplay'        => ('yes' === $settings['slautolay']),
                'autoplay_speed'  => absint($settings['slautoplay_speed']),
                'animation_speed' => absint($settings['slanimation_speed']),
                'pause_on_hover'  => ('yes' === $settings['slpause_on_hover']),
                'center_mode'     => ('yes' === $settings['slcentermode']),
                'center_padding'  => $settings['slcenterpadding'] . 'px',
            ];

            if ($settings['image_carosul_style'] == 2) {
                $slider_settings['carousel_style_ck'] = 7;
            }

            $slider_responsive_settings = [
                'display_columns'        => $settings['slitems'],
                'scroll_columns'         => $settings['slscroll_columns'],
                'tablet_width'           => $settings['sltablet_width'],
                'tablet_display_columns' => $settings['sltablet_display_columns'],
                'tablet_scroll_columns'  => $settings['sltablet_scroll_columns'],
                'mobile_width'           => $settings['slmobile_width'],
                'mobile_display_columns' => $settings['slmobile_display_columns'],
                'mobile_scroll_columns'  => $settings['slmobile_scroll_columns'],

            ];

            $slider_settings = array_merge($slider_settings, $slider_responsive_settings);

            $this->add_render_attribute('edubin_carosul_attr', 'data-settings', wp_json_encode($slider_settings));
        }

        ?>
    <div class="edubin-icon-category-style-1"> 
       <div <?php echo $this->get_render_attribute_string('edubin_carosul_attr'); ?> >

            <?php foreach ($settings['carosul_image_list'] as $imagecarosul): ?>
                <div class="edubin-icon-category">
                        <div class="single-category text-center" style="background: <?php echo esc_attr__($imagecarosul['bg_colors']); ?>">

                           <?php if (!empty($imagecarosul['link']['url'])): ?>
                                <a href="<?php echo esc_attr__($imagecarosul['link']['url']); ?>">
                           <?php endif;?>

                           <?php echo Group_Control_Image_Size::get_attachment_image_html($imagecarosul, 'carosul_imagesize', 'carosul_image'); ?>
                           
                           <?php if (!empty($imagecarosul['link']['url'])): ?>
                                </a>
                            <?php endif;?>

                           <?php if (!empty($imagecarosul['link']['url'])): ?>
                            <a href="<?php echo esc_attr__($imagecarosul['link']['url']); ?>">
                            <?php endif;?>
                                <h3 class="icon-category-title" style="color: <?php echo esc_attr__($imagecarosul['title_colors']); ?>"><?php echo $imagecarosul['carosul_image_title']; ?></h3>
                           <?php if (!empty($imagecarosul['link']['url'])): ?>
                            </a>
                            <?php endif;?>
                        </div>

                </div>
            <?php endforeach;?>

        </div>
    </div>


        <?php

    }

}
