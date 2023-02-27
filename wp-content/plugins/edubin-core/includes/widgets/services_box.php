<?php
namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class edubin_Elementor_Widget_Services_Box extends Widget_Base
{

    public function get_name()
    {
        return 'edubin-services-box';
    }

    public function get_title()
    {
        return __('Services', 'edubin-core');
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
                'label' => __('Content', 'edubin-core'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon_image',
            [
                'label'   => __('Choose Your Image', 'edubin-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'icon_imagesize',
                'default'   => 'full',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'b_icon_image',
            [
                'label'   => __('Icon Image', 'edubin-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('/edubin-core/assets/img/ba.png'),
                ],
            ]
        );
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'b_icon_imagesize',
                'default'   => 'full',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'services_title',
            [
                'label'       => __('Service Title', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __('Science', 'edubin-core'),
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label'       => __('Content', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'default' => 'You can start and finish one of these popular courses in under a day - for free! Check out the list below',
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'       => __('Title Link', 'edubin-core'),
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
                'label'   => __('Background Color', 'edubin-core'),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
            ]
        );

        $repeater->end_controls_tab();

        $this->add_control(
            'icon_image_list',
            [
                'type'        => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default'     => [

                    [
                        'services_title' => __('Service Title', 'edubin-core'),
                    ],

                ],
                'title_field' => '{{{ services_title }}}',
            ]
        );

        $this->add_control(
            'carousel_on_off',
            [
                'label'        => __('Carousel', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('On', 'edubin-core'),
                'label_off'    => __('Off', 'edubin-core'),
                'return_value' => 'yes',
                'default'      => '',
            ]
        );

        $this->end_controls_section();

        // Slider setting
        $this->start_controls_section(
            'carosul_slider_option',
            [
                'label'     => __('Carousel Option', 'edubin-core'),
                'condition' => [
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slitems',
            [
                'label'     => __('Carousel Items', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 20,
                'step'      => 1,
                'default'   => 4,
                'condition' => [
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slarrows',
            [
                'label'        => __('Arrow', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'carousel_on_off' => array('yes'),
                ],
            ]
        );
        $this->add_control(
            'nav_arrow_style',
            [
                'label' => __('Nav Style', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style 1', 'edubin-core'),
                    '2' => __('Style 2', 'edubin-core'),
                ],
                'condition' => [
                    'slarrows' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slprevicon',
            [
                'label' => __('Previous icon', 'edubin-core'),
                'type' => Controls_Manager::ICON,
                'default' => 'flaticon-back',
                'condition' => [
                    'slarrows' => 'yes',
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slnexticon',
            [
                'label' => __('Next icon', 'edubin-core'),
                'type' => Controls_Manager::ICON,
                'default' => 'flaticon-next',
                'condition' => [
                    'slarrows' => 'yes',
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sldots',
            [
                'label'        => __('Carousel dots', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off'    => 'yes',
                    'slcentermode' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slautolay',
            [
                'label'        => __('Carousel auto play', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'separator'    => 'before',
                'default'      => 'no',
                'condition'    => [
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slanimation_speed',
            [
                'label'     => __('Auto play animation speed', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 300,
                'condition' => [
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slscroll_columns',
            [
                'label'     => __('Carousel item to scroll', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 10,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sltablet_display_columns',
            [
                'label'     => __('Carousel Items', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 8,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sltablet_scroll_columns',
            [
                'label'     => __('Carousel item to scroll', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 8,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slmobile_display_columns',
            [
                'label'     => __('Carousel Items', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 4,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slmobile_scroll_columns',
            [
                'label'     => __('Carousel item to scroll', 'edubin-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 4,
                'step'      => 1,
                'default'   => 1,
                'condition' => [
                    'carousel_on_off' => 'yes',
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
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->end_controls_section(); // Carousel Option end

        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_image_max_size',
            [
                'label'       => __('Icon Image Size', 'edubin-core'),
                'type'        => Controls_Manager::SLIDER,
                'range'       => [
                    'px' => [
                        'min' => 20,
                        'max' => 120,
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .edubin-services-wrapper .cat-icon-img img ' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __('Title Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-services-wrapper .cat-title',
            ]
        );

        $this->add_responsive_control(
            'edubin_cat_box_border_radius',
            [
                'label'     => __('Border Radius', 'edubin-core'),
                'type'      => Controls_Manager::DIMENSIONS,
                'separator'  => 'before',
                'selectors' => [
                    '{{WRAPPER}} .edubin-services-wrapper .services-single-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'edubin_cat_box_padding',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-services-wrapper .slick-initialized .slick-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // Slider Option end

        // Style arrow style start
        $this->start_controls_section(
            'edubin_cat_box_arrow_style',
            [
                'label'     => __('Navigation Arrow', 'edubin-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'carousel_on_off' => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('cat_box_arrow_style_tabs');

        // Normal tab Start
        $this->start_controls_tab(
            'cat_box_arrow_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'edubin_cat_box_arrow_color',
            [
                'label'     => __('Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-style button.slick-arrow i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'edubin_cat_box_arrow_fontsize',
            [
                'label'      => __('Font Size', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 28,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-carousel-style button.slick-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_bg_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-style button.edubin-carosul-prev.slick-arrow, .edubin-carousel-style button.edubin-carosul-next.slick-arrow' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'edubin_cat_box_arrow_border',
                'label'    => __('Border', 'edubin-core'),
                'selector' => '{{WRAPPER}} .edubin-carousel-style button.edubin-carosul-prev.slick-arrow, .edubin-carousel-style button.edubin-carosul-next.slick-arrow',
            ]
        );

        $this->add_responsive_control(
            'edubin_cat_box_arrow_border_radius',
            [
                'label'     => __('Border Radius', 'edubin-core'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-style button.edubin-carosul-prev.slick-arrow, .edubin-carousel-style button.edubin-carosul-next.slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'edubin_cat_box_arrow_height',
            [
                'label'      => __('Arrow Size', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 10,
                        'max'  => 70,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 45,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-carousel-style button.edubin-carosul-prev.slick-arrow, .edubin-carousel-style button.edubin-carosul-next.slick-arrow' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab(); // Normal tab end

        // Hover tab Start
        $this->start_controls_tab(
            'cat_box_arrow_style_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );

        $this->add_control(
            'edubin_cat_box_arrow_hover_color',
            [
                'label'     => __('Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-style button.slick-arrow:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_hover_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-style button.slick-arrow:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'edubin_cat_box_arrow_hover_border',
                'label'    => __('Border', 'edubin-core'),
                'selector' => '{{WRAPPER}} .edubin-icon-category-style-1 .slick-arrow:hover',
            ]
        );

        $this->add_responsive_control(
            'edubin_cat_box_arrow_hover_border_radius',
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

        $this->end_controls_section(); // Style cat box arrow style end

        // Style cat box Dots style start
        $this->start_controls_section(
            'edubin_cat_box_dots_style',
            [
                'label'     => __('Dot Pagination', 'edubin-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'carousel_on_off' => 'yes',
                    'sldots'    => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('cat_box_dots_style_tabs');

        // Normal tab Start
        $this->start_controls_tab(
            'cat_box_dots_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'dot_color',
            [
                'label'     => __('Dot Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots li button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'edubin_cat_box_dots_height',
            [
                'label'      => __('Dot Size', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 30,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots li.slick-active button, .edubin-carousel-style .slick-dots li button' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'edubin_cat_box_dots_space',
            [
                'label'      => __('Space Between', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 30,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots li' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'edubin_cat_box_dots_position',
            [
                'label'      => __('Dot Position', 'edubin-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => -100,
                        'max'  => 10,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab(); // Normal tab end

        // Hover tab Start
        $this->start_controls_tab(
            'cat_box_dots_style_hover_tab',
            [
                'label' => __('Active', 'edubin-core'),
            ]
        );
        $this->add_control(
            'dot_hover_color',
            [
                'label'     => __('Dot Active Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots li.slick-active button' => 'border-color: {{VALUE}}; background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover tab end

        $this->end_controls_tabs();

        $this->end_controls_section(); // Style cat box dots style end

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        // Carousel Attribute
        $this->add_render_attribute('edubin_carosul_attr', 'class', 'edubin-custom-carousel');
        if ($settings['carousel_on_off'] == 'yes') {
            $this->add_render_attribute('edubin_carosul_attr', 'class', 'edubin-carousel-btn-dot edubin-carousel-nav-1 edubin-carousel-activation edubin-carousel-style');

            $slider_settings = [
                'arrows'          => ('yes' === $settings['slarrows']),
                'arrow_prev_txt' => $settings['slprevicon'],
                'arrow_next_txt' => $settings['slnexticon'],
                'dots'            => ('yes' === $settings['sldots']),
                'autoplay'        => ('yes' === $settings['slautolay']),
                'autoplay_speed'  => absint($settings['slautoplay_speed']),
                'animation_speed' => absint($settings['slanimation_speed']),
                'pause_on_hover'  => ('yes' === $settings['slpause_on_hover']),
                'center_mode'     => ('yes' === $settings['slcentermode']),
                'center_padding'  => $settings['slcenterpadding'] . 'px',
            ];

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
    <div class="edubin-services-wrapper">

       <div <?php echo $this->get_render_attribute_string('edubin_carosul_attr'); ?> >

            <?php foreach ($settings['icon_image_list'] as $imagecarosul): ?>

                <div class="services-single-wrap">
                    <div class="<?php if(!$settings['carousel_on_off'] == 'yes') : echo "no-carousel"; endif; ?> services-single-item text-center" style="background: <?php echo esc_attr__($imagecarosul['bg_colors']); ?>">

                       <?php if (!empty($imagecarosul['link']['url'])): ?>
                            <a href="<?php echo esc_attr__($imagecarosul['link']['url']); ?>">
                        <?php endif;?>
                           <div class="cat-icon-img">
                               <?php echo Group_Control_Image_Size::get_attachment_image_html($imagecarosul, 'icon_imagesize', 'icon_image'); ?>
                           </div>
                        <?php if (!empty($imagecarosul['link']['url'])): ?>
                            </a>
                        <?php endif;?>

                       <div class="cat-balloon-img">
                           <?php echo Group_Control_Image_Size::get_attachment_image_html($imagecarosul, 'b_icon_imagesize', 'b_icon_image'); ?>
                       </div>
                       <?php if (!empty($imagecarosul['link']['url'])): ?>
                            <a href="<?php echo esc_attr__($imagecarosul['link']['url']); ?>">
                        <?php endif;?>
                            <h3 class="cat-title"><?php echo $imagecarosul['services_title']; ?></h3>
                        <?php if (!empty($imagecarosul['link']['url'])): ?>
                            </a>
                        <?php endif;?>
                        <p class="edubin-cat-content">
                            <?php echo $imagecarosul['content']; ?>
                        </p>

                    </div>
                </div>

            <?php endforeach;?>

        </div>

    </div>


        <?php

    }

}
