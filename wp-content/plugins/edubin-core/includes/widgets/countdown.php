<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Countdown extends Widget_Base {

    public function get_name() {
        return 'edubin-countdown';
    }
    
    public function get_title() {
        return __( 'Countdown', 'edubin-addons' );
    }

    public function get_icon() {
        return 'edubin-icon eicon-countdown';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }
    public function get_keywords() {
        return [ 'countdown', 'edubin countdown', 'coundown', 'timer', 'count' ];
    }

    protected function register_controls() {

    $this->start_controls_section(
            'ctw_section',
            [
                'label' => __( 'Countdown', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'ctw_due_date',
            [
                'label' => __( 'Due Date', 'edubin-core' ),
                'type' => Controls_Manager::DATE_TIME,
                'default' => date( 'Y-m-d H:i', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
                'description' => sprintf( __( 'Date set according to your timezone: %s.', 'edubin-core' ), Utils::get_timezone_string() ),
                
            ]
        );
        $this->add_control(
            'ctw_show_days',
            [
                'label' => __( 'Days', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'ctw_show_hours',
            [
                'label' => __( 'Hours', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'ctw_show_minutes',
            [
                'label' => __( 'Minutes', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'ctw_show_seconds',
            [
                'label' => __( 'Seconds', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section(); 
        
        $this->start_controls_section(
            'ctw_expire_section',
            [
                'label' => __( 'Countdown Expire' , 'edubin-core' )
            ]
        );
        $this->add_control(
            'ctw_expire_show_type',
            [
                'label'         => __('Expire Type', 'edubin-core'),
                'label_block'   => false,
                'type'          => Controls_Manager::SELECT,
                'description'   => __('Select whether you want to set a message or a redirect link after expire countdown', 'edubin-core'),
                'options'       => [
                    'message'       => __('Message', 'edubin-core'),
                    'redirect_link'     => __('Redirect to Link', 'edubin-core')
                ],
                'default' => 'message'
            ]
        );
        $this->add_control(
            'ctw_expire_message',
            [
                'label'         => __('Expire Message', 'edubin-core'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __('Sorry you are late!','edubin-core'),
                'condition'     => [
                    'ctw_expire_show_type' => 'message'
                ]
            ]
        );
        $this->add_control(
            'ctw_expire_redirect_link',
            [
                'label'         => __('Redirect On', 'edubin-core'),
                'type'          => Controls_Manager::URL,
                'condition'     => [
                    'ctw_expire_show_type' => 'redirect_link'
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'ctw_label_text_section',
            [
                'label' => __( 'Change Labels Text' , 'edubin-core' )
            ]
        );
        $this->add_control(
            'ctw_change_labels',
            [
                'label' => __( 'Change Labels', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'edubin-core' ),
                'label_off' => __( 'No', 'edubin-core' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'ctw_label_days',
            [
                'label' => __( 'Days', 'edubin-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Days', 'edubin-core' ),
                'placeholder' => __( 'Days', 'edubin-core' ),
                'condition' => [
                    'ctw_change_labels' => 'yes',
                    'ctw_show_days' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ctw_label_hours',
            [
                'label' => __( 'Hours', 'edubin-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Hours', 'edubin-core' ),
                'placeholder' => __( 'Hours', 'edubin-core' ),
                'condition' => [
                    'ctw_change_labels' => 'yes',
                    'ctw_show_hours' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ctw_label_minuts',
            [
                'label' => __( 'Minutes', 'edubin-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Minutes', 'edubin-core' ),
                'placeholder' => __( 'Minutes', 'edubin-core' ),
                'condition' => [
                    'ctw_change_labels' => 'yes',
                    'ctw_show_minutes' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ctw_label_seconds',
            [
                'label' => __( 'Seconds', 'edubin-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Seconds', 'edubin-core' ),
                'placeholder' => __( 'Seconds', 'edubin-core' ),
                'condition' => [
                    'ctw_change_labels' => 'yes',
                    'ctw_show_seconds' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(   
            'ctw_style_section',
            [
                'label' => __( 'Box', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'ctw_box_align',
                [
                    'label'         => esc_html__( 'Alignment', 'edubin-core' ),
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
                        '{{WRAPPER}} .edubin-countdown-timer-widget' => 'text-align: {{VALUE}};',
                        ],
                ]
        );
        $this->add_control(
            'ctw_box_background_color',
            [
                'label' => __( 'Background Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-items' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->add_responsive_control(
            'ctw_box_size',
            [
                'label' => __( 'Size', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 600,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-countdown-timer-widget .countdown-items' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ctw_box_spacing',
            [
                'label' => __( 'Box Gap', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .countdown-items:not(:first-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
                    'body:not(.rtl) {{WRAPPER}} .countdown-items:not(:last-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
                    'body.rtl {{WRAPPER}} .countdown-items:not(:first-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
                    'body.rtl {{WRAPPER}} .countdown-items:not(:last-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
                ],
            ]
        );        

        $this->add_responsive_control(
            'ctw_digit_spacing',
            [
                'label' => __( 'Digit Gap', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .countdown-items .ctw-digits' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ctw_label_spacing',
            [
                'label' => __( 'Label Gap', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .countdown-items .ctw-digits' => 'height: calc( {{SIZE}}{{UNIT}}/2 );',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'selector' => '{{WRAPPER}} .countdown-items',
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'ctw_box_border_radius',
            [
                'label' => __( 'Border Radius', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .countdown-items' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'ctw_digits_style_section',
            [
                'label' => __( 'Digits', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'ctw_digit_background_color',
            [
                'label' => __( 'Background Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-items .ctw-digits' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'ctw_digits_color',
            [
                'label' => __( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ctw-digits' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ctw_digits_typography',
                'selector' => '{{WRAPPER}} .ctw-digits',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );
        $this->end_controls_section();   
        
        $this->start_controls_section(
            'ctw_labels_style_section',
            [
                'label' => __( 'Labels', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'ctw_label_background_color',
            [
                'label' => __( 'Background Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ctw-label' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'ctw_label_color',
            [
                'label' => __( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ctw-label' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ctw_label_typography',
                'selector' => '{{WRAPPER}} .ctw-label',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );
        $this->end_controls_section();   
        
        $this->start_controls_section(
            'ctw_finish_message_style_section',
            [
                'label' => __( 'Message', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'ctw_message_color',
            [
                'label' => __( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finished-message' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ctw_message_typography',
                'selector' => '{{WRAPPER}} .finished-message',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );
        $this->end_controls_section(); 

    } // End options

   
    protected function render() {
        $settings = $this->get_settings();
        
        $day = $settings['ctw_show_days'];
        $hours = $settings['ctw_show_hours'];
        $minute = $settings['ctw_show_minutes'];
        $seconds = $settings['ctw_show_seconds'];
        ?>
            <script>
            (function () {
              const second = 1000,
                    minute = second * 60,
                    hour = minute * 60,
                    day = hour * 24;

                var d = "<?php echo $settings['ctw_due_date']; ?>";
                d = d.split(' ')[0];
              const countDown = new Date(d).getTime(),
                  x = setInterval(function() {    


                    const now = new Date().getTime(),
                          distance = countDown - now;

                      document.getElementById("days").innerText = Math.floor(distance / (day)),
                      document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                      document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                      document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                    //do something later when date is reached
                    if (distance < 0) {
                      document.getElementById("countdown").style.display = "none";
                      document.getElementById("ctw-label").style.display = "block";
                      clearInterval(x);
                    }
                    //seconds
                  }, 0)
              }());
            </script>
            <div class="edubin-countdown-timer-widget">
              <div id="countdown">
                  <?php if ($day == "yes"){?>
                    <div class="countdown-items"> <span id="days" class="ctw-digits"></span><span class="ctw-label"><?php echo $settings['ctw_label_days']; ?></span></div>
                  <?php } ?>
                  <?php if ($hours == "yes"){?>
                    <div class="countdown-items"><span id="hours" class="ctw-digits"></span><span class="ctw-label"><?php echo $settings['ctw_label_hours']; ?></span></div>
                 <?php } ?>
                 <?php if ($minute == "yes"){?>
                    <div class="countdown-items"><span id="minutes" class="ctw-digits"></span><span class="ctw-label"><?php echo $settings['ctw_label_minuts']; ?></span></div>
                <?php } ?>
                <?php if ($seconds == "yes"){?>
                     <div class="countdown-items"><span id="seconds" class="ctw-digits"></span><span class="ctw-label"><?php echo $settings['ctw_label_seconds']; ?></span></div>
                 <?php } ?>

              </div>
            </div>


        <?php

    }

}

