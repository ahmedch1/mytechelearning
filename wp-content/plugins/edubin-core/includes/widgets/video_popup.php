<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Video_PopUp extends Widget_Base {

    public function get_name() {
        return 'edubin-video-popup';
    }
    
    public function get_title() {
        return __( 'Video PopUp', 'edubin-core' );
    }

    public function get_icon() {
        return 'edubin-icon eicon-play';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }
    public function get_keywords() {
        return [ 'video', 'video popup', 'popup video', 'video play', 'play button','youtube', 'vimeo' ];
    }
    public function get_script_depends() {
        return [''];
    }

    protected function register_controls() {

      
        $this->start_controls_section(

            'section_video',
            [
                'label' => __('Video', 'edubin-core'),
            ]
        );

        $this->add_control(
            'video_style',
            [
                'label'   => __('Style', 'edubin-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'                         => __('Style 1', 'edubin-core'),
                    '2'                         => __('Style 2', 'edubin-core'),
                    '3'                         => __('Style 3', 'edubin-core'),
                    '4'                         => __('Style 4', 'edubin-core'),
                    '5'                         => __('Style 5', 'edubin-core'),
                    'edubin-video-popup-left'  => __('Style 6', 'edubin-core'),
                    'edubin-video-popup'       => __('Style 7', 'edubin-core'),
                    'edubin-video-popup-round' => __('Style 8', 'edubin-core'),
                ],
            ]
        );
        $this->add_control(
            'popup_text',
            [
                'label'       => __('Video PopUp Text', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Play Video', 'edubin-core'),
                'placeholder' => __('Play Video', 'edubin-core'),
                'condition' => [
                    'video_style' => '2',
                ],
            ]
        );
        $this->add_control(
            'video_type',
            [
                'label'   => __('Video Source', 'edubin-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'youtube',
                'options' => [
                    'youtube' => __('YouTube', 'edubin-core'),
                    'vimeo'   => __('Vimeo', 'edubin-core'),
                ],
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label'       => __('Link', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __('Enter your YouTube link', 'edubin-core'),
                'default'     => 'https://www.youtube.com/watch?v=MLpWrANjFbI&ab_channel=eidelchteinadvogados',
                'label_block' => true,
                'condition'   => [
                    'video_type' => 'youtube',
                ],
            ]
        );

        $this->add_control(
            'vimeo_link',
            [
                'label'       => __('Link', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __('Enter your Vimeo link', 'edubin-core'),
                'default'     => 'https://vimeo.com/235215203',
                'label_block' => true,
                'condition'   => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'image_overlay',
            [
                'label'   => __('Image', 'edubin-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'video_style' => array('edubin-video-popup-left', 'edubin-video-popup-right', 'edubin-video-popup-round'),
                ],
            ]
        );

        $this->add_control(
            'heading_youtube',
            [
                'label'     => __('Video Options', 'edubin-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // YouTube.
        $this->add_control(
            'yt_autoplay',
            [
                'label' => __('Autoplay', 'edubin-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'edubin-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'edubin-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'edubin-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'edubin-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-video-popup-wrapper' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' =>'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_video_style',
            [
                'label' => __('Video', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __('Icon Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-video-popup-wrapper .video i'                  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper a.play-icon-text'                  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .play-btn::after'                  => 'border-left-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .play-btn:before'                  => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .play-btn'                  => 'Background: radial-gradient(rgba(255, 188, 0, 0.94) 60%, {{VALUE}} 62%);',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .video-play-button span'                  => 'border-left-color: {{VALUE}};',
                ],
                'condition' => [
                    'video_style' => array('1', '2', '3', '4', '5'),
                ],
            ]
        );
        $this->add_control(
            'video_border_color',
            [
                'label'     => __('Background', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-video-popup::before'                  => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup a.icon-video'             => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup a.icon-video:hover'       => 'background: {{VALUE}};',

                    '{{WRAPPER}} .edubin-video-popup-round'                    => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-round a.icon-video'       => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-round a.icon-video:hover' => 'background: {{VALUE}};',

                    '{{WRAPPER}} .edubin-video-popup-left::before'             => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-left a.icon-video'        => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-left a.icon-video:hover'  => 'background: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .video i'  => 'background: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .play-btn'  => 'background: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .video-play-button:after'  => 'background: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .video-play-button:before'  => 'background: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .play-btn:before'                  => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'video_style' => array('1', '3', '4', 'edubin-video-popup-left', 'edubin-video-popup-right', 'edubin-video-popup-round'),
                ],
            ]
        );

        $this->add_control(
            'video_overlay_color',
            [
                'label'     => __('Overlay Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-video-popup:hover:after'       => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-round:hover:after' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-video-popup-left:hover:after'  => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'video_style' => array('edubin-video-popup-left', 'edubin-video-popup-right', 'edubin-video-popup-round'),
                ],
            ]
        );
        $this->add_control(
            'play_bg_size',
            [
                'label'     => __('Play Background Size', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-video-popup a.icon-video'       => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-video-popup-round a.icon-video' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-video-popup-left a.icon-video'  => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .video i'  => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'video_style' => array('1', 'edubin-video-popup-left', 'edubin-video-popup-right', 'edubin-video-popup-round'),
                ],
            ]
        );

        $this->add_control(
            'play_icon_size',
            [
                'label'     => __('Play Icon Size', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-video-popup i.icofont-ui-play'       => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-video-popup-round i.icofont-ui-play' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-video-popup-left i.icofont-ui-play'  => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-video-popup-wrapper .video i'  => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-video-popup-left a.icon-video'  => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'video_style' => array('1', 'edubin-video-popup-left', 'edubin-video-popup-right', 'edubin-video-popup-round'),
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'Content_typography',
                'selector' => '{{WRAPPER}} .edubin-video-popup-wrapper a.play-icon-text',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
                'condition' => [
                    'video_style' => array('2'),
                ],
            ]
        );
        $this->end_controls_section();

    } // End options

    protected function render( $instance = [] ) {
    
       $settings = $this->get_settings_for_display();
        $id       = $this->get_id();
        ?>

        <div class="edubin-video-popup-wrapper">

        <?php if ($settings['video_style'] == '1'): ?>

            <div class="video">
                <a class="<?php echo $id; ?>bla-<?php if ($settings['yt_autoplay'] == 'yes'): echo '1'; else: echo '2'; endif;?>" href="<?php if ($settings['video_type'] == 'youtube'): ?><?php echo $settings['video_link']; ?><?php else: echo $settings['vimeo_link']; endif;?>"><i class="fas fa-play"></i></a>
            </div>

        <?php elseif ($settings['video_style'] == '2'): ?>

          <a href="<?php if ($settings['video_type'] == 'youtube'): ?><?php echo $settings['video_link']; ?><?php else: echo $settings['vimeo_link']; endif;?>" class="icon-video play-icon-text <?php echo $id; ?>bla-<?php if ($settings['yt_autoplay'] == 'yes'): echo '1'; else: echo '2'; endif;?>"><i class="fas fa-play-circle" aria-hidden="true">&nbsp;</i> <?php echo $settings['popup_text']; ?></a>

        <?php elseif ($settings['video_style'] == '3'): ?>

          <a style="<?php if ($settings['align'] == 'left'): echo 'float:left'; elseif($settings['align'] == 'right') : echo 'float:right'; elseif($settings['align'] == 'center'): echo 'float:none'; endif; ?>" class="play-btn <?php echo $id; ?>bla-<?php if ($settings['yt_autoplay'] == 'yes'): echo '1'; else: echo '2'; endif;?>" href="<?php if ($settings['video_type'] == 'youtube'): ?><?php echo $settings['video_link']; ?><?php else: echo $settings['vimeo_link']; endif;?>"></a>

        <?php elseif ($settings['video_style'] == '4'): ?>
            <div class="video-popup-4" style="<?php if ($settings['align'] == 'left'): echo 'float:left'; elseif($settings['align'] == 'right') : echo 'float:right'; elseif($settings['align'] == 'center'): echo 'float:none'; endif; ?>">
            <a id="play-video" class="video-play-button <?php echo $id; ?>bla-<?php if ($settings['yt_autoplay'] == 'yes'): echo '1'; else: echo '2'; endif;?>" href="<?php if ($settings['video_type'] == 'youtube'): ?><?php echo $settings['video_link']; ?><?php else: echo $settings['vimeo_link']; endif;?>">
              <span></span>
            </a>
        </div>s
        <?php elseif ($settings['video_style'] == '5'): ?>
            <div class="video-popup-5" style="<?php if ($settings['align'] == 'left'): echo 'float:left'; elseif($settings['align'] == 'right') : echo 'float:right'; elseif($settings['align'] == 'center'): echo 'float:none'; endif; ?>">
            <a class="<?php echo $id; ?>bla-<?php if ($settings['yt_autoplay'] == 'yes'): echo '1'; else: echo '2'; endif;?>" href="<?php if ($settings['video_type'] == 'youtube'): ?><?php echo $settings['video_link']; ?><?php else: echo $settings['vimeo_link']; endif;?>">
                <svg version="1.1" id="play" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="100px" width="100px"
                     viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                  <path class="stroke-solid" fill="none" stroke="<?php if($settings['icon_color']) : echo $settings['icon_color']; else : echo 'white'; endif; ?>"  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
                    C97.3,23.7,75.7,2.3,49.9,2.5"/>
                  <path class="stroke-dotted" fill="none" stroke="<?php if($settings['icon_color']) : echo $settings['icon_color']; else : echo 'white'; endif; ?>"  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
                    C97.3,23.7,75.7,2.3,49.9,2.5"/>
                  <path class="icon" fill="<?php if($settings['icon_color']) : echo $settings['icon_color']; else : echo 'white'; endif; ?>" d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z"/>
                </svg>
            </a>
        </div>
        <?php elseif ($settings['video_style'] == 'edubin-video-popup' || $settings['video_style'] == 'edubin-video-popup-left' || $settings['video_style'] == 'edubin-video-popup-round' && $settings['video_type'] == 'youtube'): ?>

               <div class="<?php echo $settings['video_style'] ?>">
                  <img src="<?php echo $settings['image_overlay']['url']; ?>" alt="Video Overlay Image">
                  <a href="<?php echo $settings['video_link']; ?>" class="icon-video <?php echo $id; ?>bla-<?php if ($settings['yt_autoplay'] == 'yes'): echo '1'; else: echo '2'; endif;?>"><span><i class="fas fa-play"></i></span></a>
               </div>

       <?php elseif ($settings['video_style'] == 'edubin-video-popup' || $settings['video_style'] == 'edubin-video-popup-left' || $settings['video_style'] == 'edubin-video-popup-round' && $settings['video_type'] == 'vimeo'): ?>

               <div class="<?php echo $settings['video_style'] ?>">
                  <img src="<?php echo $settings['image_overlay']['url']; ?>" alt="Video Overlay Image">
                  <a href="<?php echo $settings['vimeo_link']; ?>" class="icon-video <?php echo $id; ?>bla-<?php if ($settings['yt_autoplay'] == 'yes'): echo '1'; else: echo '2'; endif;?>"><span><i class="fas fa-play"></i></span></a>
               </div>

        <?php endif;?>

        </div>
    <script>
        jQuery(document).ready(function () {
            jQuery(function(){
              jQuery("a.<?php echo $id; ?>bla-1").YouTubePopUp();
              jQuery("a.<?php echo $id; ?>bla-2").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
            });
        });
    </script>
    <?php 
    }

}