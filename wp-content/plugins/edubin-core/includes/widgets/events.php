<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


use Elementor\Core\Kits\Documents\Tabs\Global_Typography;


class Edubin_Elementor_Widget_Events extends Widget_Base {

    public function get_name() {
        return 'edubin-events';
    }
    
    public function get_title() {
        return __( 'The Events Calendar', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'The Events Calendar', 'events', 'event'];
    }
    public function get_icon() {
        return 'edubin-icon eicon-archive-posts';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [''];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_events',
            [
                'label' => __( 'Events', 'edubin-core' ),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __( 'Style', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'   => __( 'Style 1', 'edubin-core' ),
                    '2'   => __( 'Style 2', 'edubin-core' ),
                ],
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Number of Event', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 15,
                'step' => 1,
            ]
        );

        $this->add_control(
            'column_layout',
            [
                'label' => __('Items Column', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '2' => __('6 Column', 'edubin-core'),
                    '3' => __('4 Column', 'edubin-core'),
                    '4' => __('3 Column', 'edubin-core'),
                    '6' => __('2 Column', 'edubin-core'),
                    '12' => __('1 Column', 'edubin-core'),
                ],
                'condition'=>[
                    'layout'=> '2',
                ]
            ]
        );
      $this->add_control(
            'custom_order',
            [
                'label' => esc_html__( 'Custom Order', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC'  => esc_html__('Descending','edubin-core'),
                    'ASC'   => esc_html__('Ascending','edubin-core'),
                ],
                'condition' => [
                    'custom_order!' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Orderby', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__('None','edubin-core'),
                    'ID'            => esc_html__('ID','edubin-core'),
                    'date'          => esc_html__('Date','edubin-core'),
                    'name'          => esc_html__('Name','edubin-core'),
                    'title'         => esc_html__('Title','edubin-core'),
                    'comment_count' => esc_html__('Comment count','edubin-core'),
                    'rand'          => esc_html__('Random','edubin-core'),
                ],
                'condition' => [
                    'custom_order' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'tribe_events_by_category',
            [
                'label' => __('Select Category', 'edubin-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => edubin_tribe_events_get_taxonomies(),
                'multiple' => true,
            ]
        );
        $this->add_control(
            'events_heading',
            [
                'label'   => __( 'Events Heading', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Upcoming events',
                'placeholder' => __('Upcoming events','edubin-core'),
            ]
        );
        $this->add_control(
            'date_format',
            [
                'label'   => __( 'Date Format', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'd. F',
                'placeholder' => __('d. F','edubin-core'),
            ]
        );
        $this->add_control(
            'date_separator',
            [
                'label'   => __( 'Date Separator', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'To',
                'placeholder' => __('To','edubin-core'),
            ]
        );
        $this->add_control(
            'time_format',
            [
                'label'   => __( 'Time Format', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'g:i A',
                'placeholder' => __('g:i A','edubin-core'),
            ]
        );
        $this->add_control(
            'time_separator',
            [
                'label'   => __( 'Time Separator', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'To',
                'placeholder' => __('To','edubin-core'),
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_thumb',
            [
                'label' => __( 'Image', 'edubin-core' ),
                'condition' => [
                    'layout' =>  '2',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'Image Height', 'edubin-core' ),
                'description' => __('Keep blank value for the default', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'separator' => 'before',
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-event-addon .event-thum img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();  
               
        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'title_word',
            [
                'label' => __('Number of Title Word', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 40,
                'min' => 1,
                'max' => 250,
                'step' => 1,
            ]
        );
        $this->end_controls_section();  
              
        $this->start_controls_section(
            'section_meta',
            [
                'label' => __( 'Meta', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'show_event_date',
            [
                'label' => __( 'Event Start Date', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'show_event_end_date',
            [
                'label' => __( 'Event End Date', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'show_event_time',
            [
                'label' => __( 'Event Time', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'show_event_vanue',
            [
                'label' => __( 'Event Venue', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'edubin-core' ),
                'label_off' => __( 'Hide', 'edubin-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->end_controls_section();

        // Pagination 
        $this->start_controls_section(
        'pagination_section',
            [
                'label' => __( 'Pagination', 'edubin-core' ),
            ]
        );

        $this->add_control(
        'pagi_on_off',
            [
                'label' => esc_html__( 'Pagination', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        ); 
        $this->add_responsive_control(
        'pagi_align',
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
                    '{{WRAPPER}} nav.navigation.pagination' => 'text-align: {{VALUE}};',
                    ],
            ]
        );
        $this->add_control(
            'pagi_end_size',
            [
                'label' => __('End Size', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );  
        $this->add_control(
        'pagi_mid_size',
            [
                'label' => __('Mid Size', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );  

        $this->add_control(
        'pagi_show_all',
            [   
                'label' => esc_html__( 'Show All', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'edubin-core'),
                'label_on' => __('Yes', 'edubin-core'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->end_controls_section();

        // Style Scetion start
        $this->start_controls_section(
            'section_event_style',
            [
                'label' => __( 'Events', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'headign_color',
            [
                'label'     => __( 'Heading', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-event .event-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'eading_typography',
                'selector' => '{{WRAPPER}} .edubin-event .event-title h3',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );
        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => __( 'Heading Padding', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-event .event-title h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label'     => __( 'Background', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-event' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-single-event-addon .event-content-wrap' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'body_padding',
            [
                'label' => __( 'Padding', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-event' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-single-event-addon .event-content-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'body_box_shadow',
                'selector' => '{{WRAPPER}} .edubin-event',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Title', 'edubin-core' ),
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
                    '{{WRAPPER}} .edubin-event ul li .edubin-single-event a h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-single-event-addon a h4' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .edubin-event ul li .edubin-single-event a:hover h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-single-event-addon a:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .edubin-event ul li .edubin-single-event a h4, .edubin-single-event-addon a h4',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __( 'Title Padding', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-event ul li .edubin-single-event a h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-single-event-addon a h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_meta',
            [
                'label' => __( 'Meta', 'edubin-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'meta_color',
            [
                'label'     => __( 'Color', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-event ul li .edubin-single-event span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-single-event-addon .event-meta-wrap>span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .edubin-event ul li .edubin-single-event span, .edubin-single-event-addon .event-meta-wrap>span',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );
        $this->add_control(
            'meta_icon_color',
            [
                'label'     => __( 'Icon Color', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-event ul li .edubin-single-event span i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-single-event-addon .event-meta-wrap>span i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label'     => __( 'Price Color', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-event-addon .edubin-event-price-1 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'price_bg_color',
            [
                'label'     => __( 'Price Background', 'edubin-core' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-event-addon .edubin-event-price-1 span' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

    } // End options

    protected function render( $instance = [] ) {
        
            $settings = $this->get_settings();

            $custom_order_ck    = $this->get_settings_for_display('custom_order');
            $orderby            = $this->get_settings_for_display('orderby');
            $order          = $this->get_settings_for_display('order');

            $events_heading = $settings['events_heading'];
            $number_of_post = $settings['posts_per_page'];
            $title_word = $settings['title_word'];
            $show_event_date = $settings['show_event_date'];
            $show_event_end_date = $settings['show_event_end_date'];
            $show_event_time = $settings['show_event_time'];
            $show_event_vanue = $settings['show_event_vanue'];

            $date_format = $settings['date_format'];
            $time_format = $settings['time_format'];
            $date_separator = $settings['date_separator'];
            $time_separator = $settings['time_separator'];

            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        // Query
        $args = array(
            'post_type'             => 'tribe_events',
            'post_status'           => 'publish',
            'paged'                 => $paged,
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $number_of_post,
            'order'                 => $order
        );

        // Custom Order
        if( $custom_order_ck == 'yes' ){
            $args['orderby']    = $orderby;
        }
        if( !empty($settings['tribe_events_by_category']) ){
            $get_categories = $settings['tribe_events_by_category'];
        }else{
           $get_categories = $settings['tribe_events_by_category'];
        }

            $tribe_events_cats = str_replace(' ', '', $get_categories);

            if (  !empty( $get_categories ) ) {
                if( is_array($tribe_events_cats) && count($tribe_events_cats) > 0 ){
                    $field_name = is_numeric( $tribe_events_cats[0] ) ? 'term_id' : 'slug';
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'tribe_events_cat',
                            'terms' => $tribe_events_cats,
                            'field' => $field_name,
                            'include_children' => false
                        )
                );
             }
        }

        ?>

    <?php if ($settings['layout'] == '1'): ?>

        <div id="edubin-event" class="edubin-event layout-<?php echo esc_attr($settings['layout']);?>">
            <?php if(!empty($events_heading)) : ?>
            <div class="event-title">
                <h3><?php echo $events_heading; ?></h3>
            </div> <!-- event heading -->
            <?php endif; ?>
            <ul>
        <?php

        $query = new \WP_Query($args);

        if($query->have_posts() and class_exists( 'Tribe__Events__Main' ) ):
            while($query->have_posts()):
                $query->the_post(); ?>
                 <?php 

                    $event_id = get_the_ID();
                    $start_date = tribe_get_start_time ( $event_id, $date_format);
                    $end_date = tribe_get_end_time ( $event_id, $date_format);

                    $start_time = tribe_get_start_date( null, false, $time_format );
                    $end_time = tribe_get_end_date( null, false, $time_format );

                    $event_vanue = tribe_get_venue();

                ?>
                <li>
                    <div class="edubin-single-event">

                        <?php if($show_event_date == 'yes' || $show_event_end_date == 'yes') : ?>
                            <?php if(!empty($start_date || $end_date)) : ?>
                            <span><i class="far fa-calendar-alt"></i> <?php echo $start_date; ?> <?php if($end_date && $show_event_end_date == 'yes') : ?> <?php echo esc_attr( $date_separator ); ?> <?php echo $end_date; ?> <?php endif; ?></span>
                            <?php endif; ?>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>"><h4><?php echo wp_trim_words(get_the_title(), $title_word, ''); ?></h4></a>

                        <?php if(!empty($show_event_time == 'yes')) : ?>
                        <span><i class="far fa-clock"></i> <?php echo $start_time; ?> <?php if($end_time) : ?> <?php echo esc_attr( $time_separator ); ?> <?php echo $end_time; ?> <?php endif; ?></span>
                        <?php endif; ?>

                        <?php if(!empty($event_vanue) && $show_event_vanue == 'yes') : ?>
                            <span><i class="fas fa-map-marker-alt"></i> <?php echo $event_vanue; ?></span>
                        <?php endif; ?>
                    </div>
                </li>
            <?php
                endwhile; wp_reset_postdata();
              else: ?>
                <p> <?php _e( 'Sorry no post found', 'edubin-core' ); ?> </p>
           <?php endif; ?>
            </ul> 
        </div>

    <?php elseif ($settings['layout'] == '2'): ?>

    <?php 
        if ( $settings['column_layout'] == '5' ) : 
            $column_layout_right = '7';
        elseif( $settings['column_layout'] == '6' ) :
             $column_layout_right = '6';
        elseif( $settings['column_layout'] == '7' ) :
             $column_layout_right = '5';
        endif;
     ?>

       
<div class="row tpc_g_30">
    <?php
        $query = new \WP_Query($args);

        if($query->have_posts() and class_exists( 'Tribe__Events__Main' ) ):
            while($query->have_posts()):
                $query->the_post(); ?>
                 <?php 

                    $event_id = get_the_ID();
                    $start_date = tribe_get_start_time ( $event_id, $date_format);
                    $end_date = tribe_get_end_time ( $event_id, $date_format);

                    $start_time = tribe_get_start_date( null, false, $time_format );
                    $end_time = tribe_get_end_date( null, false, $time_format );

                    $event_vanue = tribe_get_venue();

                ?>

                <div class="col-lg-<?php echo $settings['column_layout']; ?>">
                    <div class="edubin-single-event-addon">

                        <?php if (has_post_thumbnail()): ?>
                            <div class="event-thum">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( $settings['image_size'] );?>
                                </a>
                            </div>

                        <?php $cost = tribe_get_formatted_cost(); ?>
                            <?php if (!empty($cost)): ?>
                                <div class="edubin-event-price-1">
                                    <span><?php echo esc_html( $cost ); ?></span>
                                </div>
                        <?php endif; ?>

                        <?php endif; ?>
                        <div class="event-content-wrap">
                            
                        <div class="event-meta-wrap">
                             <?php if($show_event_date == 'yes' || $show_event_end_date == 'yes') : ?>
                                <?php if(!empty($start_date || $end_date)) : ?>
                                <span><i class="far fa-calendar-alt"></i> <?php echo $start_date; ?> <?php if($end_date && $show_event_end_date == 'yes') : ?> <?php echo esc_attr( $date_separator ); ?> <?php echo $end_date; ?> <?php endif; ?></span>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($show_event_time == 'yes')) : ?>
                            <span><i class="far fa-clock"></i> <?php echo $start_time; ?> <?php if($end_time) : ?> <?php echo esc_attr( $time_separator ); ?> <?php echo $end_time; ?> <?php endif; ?></span>
                            <?php endif; ?>

                        </div>

                        <a href="<?php the_permalink(); ?>"><h4><?php echo wp_trim_words(get_the_title(), $title_word, ''); ?></h4></a>

                             <?php if(!empty($event_vanue) && $show_event_vanue == 'yes') : ?>
                                <span><i class="fas fa-map-marker-alt"></i> <?php echo $event_vanue; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
                endwhile; wp_reset_postdata();


                if ($settings['pagi_on_off']) : ?>

                    <nav class="navigation pagination" role="navigation" aria-label="Posts">
                        <div class="nav-links">
                            <?php 
                                echo paginate_links( array(
                                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                    'total'        => $query->max_num_pages,
                                    'current'      => max( 1, get_query_var( 'paged' ) ),
                                    'format'       => '?paged=%#%',
                                    'show_all'     => $settings['pagi_show_all'],
                                    'type'         => 'plain',
                                    'end_size'     => $settings['pagi_end_size'],
                                    'mid_size'     => $settings['pagi_mid_size'],
                                    'prev_next'    => true,
                                    'prev_text' => '<i class="flaticon-back" aria-hidden="true"></i>',
                                    'next_text' => '<i class="flaticon-next" aria-hidden="true"></i>',
                                    'add_args'     => false,
                                    'add_fragment' => '',
                                ) );
                            ?>
                        </div> <!-- row -->  
                    </nav>
                <?php endif; //end pagination ?>

            <?php  else: ?>
                <p> <?php _e( 'Sorry no post found', 'edubin-core' ); ?> </p>
           <?php endif; ?>

</div>
    <?php endif  //End Layout ?>
<?php

    }

}

