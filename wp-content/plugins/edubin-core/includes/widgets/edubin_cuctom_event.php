<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Custom_Event extends Widget_Base {

    public function get_name() {
        return 'edubin-customevent-addons';
    }
    
    public function get_title() {
        return __( 'Custom Event', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'Custom Event', 'event calendar', 'events'];
    }
    public function get_icon() {
        return 'edubin-icon eicon-post-list';
    }
    public function get_categories() {
        return [ 'edubin-core' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'customevent_content',
            [
                'label' => __( 'Event', 'edubin-core' ),
            ]
        );

            $this->add_control(
                'event_title',
                [
                    'label'   => __( 'Title', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'placeholder' => __('Event Title.','edubin-core'),
                ]
            );

            $this->add_control(
                'event_image',
                [
                    'label' => __( 'Image', 'edubin-core' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'event_imagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );

            $this->add_control(
                'event_time',
                [
                    'label' => __( 'Event Time', 'edubin-core' ),
                    'type' => Controls_Manager::DATE_TIME,
                ]
            );

            $this->add_control(
                'custom_date',
                [
                    'label'   => __( 'Custom Date', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'placeholder' => __('05','edubin-core'),
                ]
            );

            $this->add_control(
                'custom_month',
                [
                    'label'   => __( 'Custom Month', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'placeholder' => __('Jan','edubin-core'),
                ]
            );
            $this->add_control(
                'event_location',
                [
                    'label'   => __( 'Event Location', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'placeholder' => __('Location.','edubin-core'),
                ]
            );

            $this->add_control(
                'event_description',
                [
                    'label'   => __( 'Event description', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXTAREA,
                ]
            );

            $this->add_control(
                'event_button',
                [
                    'label'   => __( 'Event Button text', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'placeholder' => __('Read More.','edubin-core'),
                ]
            );

            $this->add_control(
                'event_link',
                [
                    'label' => __( 'Event Button Link', 'edubin-core' ),
                    'type' => Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'edubin-core' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                    'condition'=>[
                        'event_button!'=>'',
                    ]
                ]
            );
            
        $this->end_controls_section();

        // Event Title Style tab section
        $this->start_controls_section(
            'event_title_style_section',
            [
                'label' => __( 'Title', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_title!'=>'',
                ],
            ]
        );

            $this->start_controls_tabs('event_title_style_tabs');

                $this->start_controls_tab(
                    'event_title_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                ); 

                    $this->add_control(
                        'event_title_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#000000',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-custom-events .content h4' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'event_title_typography',
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                            ],
                            'selector' => '{{WRAPPER}} .edubin-custom-events .content h4',
                        ]
                    );

                    $this->add_responsive_control(
                        'event_title_padding',
                        [
                            'label' => __( 'Padding', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-custom-events .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'event_title_margin',
                        [
                            'label' => __( 'Margin', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-custom-events .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'event_title_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'event_title_hover_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#000000',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-custom-events .content h4 a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();
            
        $this->end_controls_section();

        // Event Description Style tab section
        $this->start_controls_section(
            'event_description_style_section',
            [
                'label' => __( 'Description', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_description!'=>'',
                ],
            ]
        );

            $this->add_control(
                'event_description_color',
                [
                    'label' => __( 'Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#727272',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_description_typography',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'selector' => '{{WRAPPER}} .edubin-custom-events .content p',
                ]
            );

            $this->add_responsive_control(
                'event_description_padding',
                [
                    'label' => __( 'Padding', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'event_description_margin',
                [
                    'label' => __( 'Margin', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );
            
        $this->end_controls_section();

        // Event Time Location Style tab section
        $this->start_controls_section(
            'event_timelocation_style_section',
            [
                'label' => __( 'Time / Location', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'event_timelocation_color',
                [
                    'label' => __( 'Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#909090',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .content ul.event-time li' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_timelocation_typography',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'selector' => '{{WRAPPER}} .edubin-custom-events .content ul.event-time li',
                ]
            );

            $this->add_responsive_control(
                'event_timelocation_margin',
                [
                    'label' => __( 'Margin', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .content ul.event-time li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );
            
        $this->end_controls_section();


        // Event Date Style tab section
        $this->start_controls_section(
            'event_eventdate_style_section',
            [
                'label' => __( 'Date', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'event_eventdate_color',
                [
                    'label' => __( 'Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .thumb .event-date' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'event_eventdate_bg_color',
                [
                    'label' => __( 'Background Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#141414',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .thumb .event-date' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_eventdate_typography',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                    ],
                    'selector' => '{{WRAPPER}} .edubin-custom-events .thumb .event-date',
                ]
            );

            $this->add_responsive_control(
                'event_eventdate_padding',
                [
                    'label' => __( 'Margin', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-custom-events .edubin-custom-events .thumb .event-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

        // Event Button Style tab section
        $this->start_controls_section(
            'event_button_style_section',
            [
                'label' => __( 'Button', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_button!'=>'',
                ],
            ]
        );

            $this->start_controls_tabs('event_button_style_tabs');

                $this->start_controls_tab(
                    'event_button_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'event_button_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#727272',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-custom-events .content .event-btn a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'event_button_typography',
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                            ],
                            'selector' => '{{WRAPPER}} .edubin-custom-events .content .event-btn a',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'event_button_border',
                            'label' => __( 'Border', 'edubin-core' ),
                            'selector' => '{{WRAPPER}} .edubin-custom-events .content .event-btn a',
                        ]
                    );

                    $this->add_responsive_control(
                        'event_button_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-custom-events .content .event-btn a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal Tab end

                $this->start_controls_tab(
                    'event_button_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'event_button_hover_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#727272',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-custom-events .content .event-btn a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'event_button_hover_border',
                            'label' => __( 'Border', 'edubin-core' ),
                            'selector' => '{{WRAPPER}} .edubin-custom-events .content .event-btn a:hover',
                        ]
                    );

                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $this->add_render_attribute( 'custom_event_attr', 'class', 'edubin-event-area' );

        // Event Link
        if ( isset( $settings['event_link'] ) ) {

            $this->add_render_attribute( 'url', 'href', $settings['event_link']['url'] );

            if ( $settings['event_link']['is_external'] ) {
                $this->add_render_attribute( 'url', 'target', '_blank' );
            }

            if ( ! empty( $settings['event_link']['nofollow'] ) ) {
                $this->add_render_attribute( 'url', 'rel', 'nofollow' );
            }
        }

        $eventdate = date_create( $settings['event_time'] );
       
        ?>
            <div <?php echo $this->get_render_attribute_string( 'custom_event_attr' ); ?>>
                <div class="edubin-custom-events">
                    <div class="thumb">
                        <a <?php echo $this->get_render_attribute_string( 'url' ); ?> >
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'event_imagesize', 'event_image' ); ?>
                        </a>
                        <div class="event-date">
                            <?php if ( $settings['custom_date']): ?>
                                <span><?php echo $settings['custom_date']; ?></span>
                            <?php else : ?>
                                <span><?php echo date_format( $eventdate,"d" ); ?></span>
                            <?php endif ?>

                            <?php if ( $settings['custom_month']): ?>
                                <span class="month"><?php echo $settings['custom_month']; ?></span>
                            <?php else : ?>
                               <span class="month"><?php echo date_format( $eventdate,"M" ); ?></span>
                            <?php endif ?>

                            
                        </div>
                    </div>
                    <div class="content">
                        <?php
                            if( !empty( $settings['event_title'] ) ){
                                echo '<h4><a href="#">'.esc_html__( $settings['event_title'],'edubin-core').'</a></h4>';
                            }
                            if( !empty( $settings['event_time'] ) || !empty( $settings['event_location'] ) ):
                        ?>
                        <ul class="event-time">
                            <?php
                                if( !empty( $settings['event_time'] ) ){
                                    echo '<li><i class="far fa-clock"></i>'.date_format( $eventdate,"H:i a" ).'</li>';
                                }
                                if( !empty( $settings['event_location'] ) ){
                                    echo '<li><i class="fas fa-map-marker-alt""></i>'.esc_html__( $settings['event_location'], 'edubin-core' ).'</li>';
                                }
                            ?>
                        </ul>
                        <?php 
                            endif;
                            if( !empty( $settings['event_description'] ) ){
                                echo '<p>'.esc_html__( $settings['event_description'], 'edubin-core' ).'</p>';
                            }
                        ?>
                        <?php if( !empty( $settings['event_button'] ) ):?>
                            <div class="event-btn">
                                <a <?php echo $this->get_render_attribute_string( 'url' ); ?> > <?php esc_html_e( $settings['event_button'], 'edubin-core' ); ?></a>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php

    }

}

