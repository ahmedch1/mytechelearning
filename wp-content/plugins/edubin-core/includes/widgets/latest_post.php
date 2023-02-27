<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Latest_Post extends Widget_Base {

    public function get_name() {
        return 'edubin-latest-post';
    }

    public function get_title() {
        return __( 'Blog Posts', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'Blog Posts', 'blog', 'posts', 'post'];
    }
    public function get_icon() {
        return 'edubin-icon eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [''];
    }

    protected function register_controls() {

    $this->start_controls_section(
        'post_grid_section',
        [
            'label' => __( 'Post Grid', 'edubin-core' ),
        ]
    );

    $this->add_control(
        'layout_style',
        [
            'label' => __( 'Style', 'edubin-core' ),
            'type' => Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1'   => __( 'Style 1', 'edubin-core' ),
                '2'   => __( 'Style 2', 'edubin-core' ),
                '3'   => __( 'Style 3', 'edubin-core' ),
                '4'   => __( 'Style 4', 'edubin-core' ),
                '5'   => __( 'Style 5', 'edubin-core' ),
                '6'   => __( 'Style 6', 'edubin-core' ),
            ],
        ]
    );
    $this->add_control(
        'big_post_limit',
        [
            'label' => __('Limit Posts', 'edubin-core'),
            'type' => Controls_Manager::NUMBER,
            'default' => 1,
        ]
    );            

    $this->add_control(
        'list_post_limit',
        [
            'label' => __('Limit Lists Posts', 'edubin-core'),
            'type' => Controls_Manager::NUMBER,
            'default' => 3,
            'condition' => [
                'layout_style' => array('2', '3', '4'),
            ]
        ]
    );
$this->add_control(
    'column_layout',
    [
        'label' => __( 'Column Layout', 'edubin-core' ),
        'type' => Controls_Manager::SELECT,
        'default' => '6',
        'options' => [
            '6'   => __( 'Column 6-6', 'edubin-core' ),
            '5'   => __( 'Column 5-7', 'edubin-core' ),
            '7'   => __( 'Column 7-5', 'edubin-core' ),
        ],
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->add_control(
    'column_layout_2',
    [
        'label' => __( 'Column Layout', 'edubin-core' ),
        'type' => Controls_Manager::SELECT,
        'default' => '4',
        'options' => [
            '12'   => __( 'Column 1', 'edubin-core' ),
            '6'   => __( 'Column 2', 'edubin-core' ),
            '4'   => __( 'Column 3', 'edubin-core' ),
            '3'   => __( 'Column 4', 'edubin-core' ),
        ],
        'condition' => [
            'layout_style' => array('1', '5', '6'),
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
            'default' => 'date',
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
        'posts_category',
        [
            'label' => __('Select Category', 'edubin-core'),
            'type' => Controls_Manager::SELECT2,
            'options' => edubin_posts_get_taxonomies(),
            'multiple' => true,
        ]
    );

$this->add_responsive_control(
    'fixed_image_height',
    [
        'label' => __( 'Image Height', 'edubin-core' ),
        'type' => Controls_Manager::SLIDER,
        'default' => [
            'size' => '',
        ],
        'range' => [
            'px' => [
                'min' => 100,
                'max' => 700,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news.layout-1 .news-thum' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .news-thum' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .edubin-latest-news.layout-1 .news-thum img' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .news-thum img' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .edubin-latest-news .news-thum.thum-single img' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .layout-6 .single-news .news-thum img' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
);
$this->add_responsive_control(
    'fixed_image_height_list_posts',
    [
        'label' => __( 'Image Height List Posts', 'edubin-core' ),
        'type' => Controls_Manager::SLIDER,
        'default' => [
            'size' => '',
        ],
        'range' => [
            'px' => [
                'min' => 100,
                'max' => 500,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .news-thum.thum-list img' => 'height: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);

$this->add_responsive_control(
    'fixed_image_width_list_posts',
    [
        'label' => __( 'Image Width List Posts', 'edubin-core' ),
        'type' => Controls_Manager::SLIDER,
        'default' => [
            'size' => '',
        ],
        'range' => [
            'px' => [
                'min' => 50,
                'max' => 700,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .single-news .blog-list-img' => 'width: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->end_controls_section(); // Content Option End

$this->start_controls_section(
    'post_grid_title',
    [
        'label' => __( 'Title', 'edubin-core' ),
    ]
);
$this->add_control(
    'show_title',
    [
        'label' => esc_html__( 'Title', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => 'yes',
        'separator'=>'before',
    ]
);
$this->add_control(
    'title_length',
    [
        'label' => __('Title Length', 'edubin-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 15,
    ]
);
$this->add_control(
    'show_title_list',
    [
        'label' => esc_html__( 'Title List Post', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => 'yes',
        'separator'=>'before',
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->add_control(
    'title_length_list',
    [
        'label' => __('Title Length List Posts', 'edubin-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 15,
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ] 
    ]
);
$this->end_controls_section(); // Content Option End

$this->start_controls_section(
    'post_grid_meta',
    [
        'label' => __( 'Meta', 'edubin-core' ),
    ]
);
$this->add_control(
    'show_author',
    [
        'label' => esc_html__( 'Author', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'show_date',
    [
        'label' => esc_html__( 'Date', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section(); // Content Option End

$this->start_controls_section(
    'post_grid_content',
    [
        'label' => __( 'Content', 'edubin-core' ),
    ]
);
$this->add_control(
    'show_content_big',
    [
        'label' => esc_html__( 'Content', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => 'yes',
    ]
); 
$this->add_control(
    'content_length_big',
    [
        'label' => __('Content Length', 'edubin-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 45,
    ]
);
  
$this->add_group_control(
    Group_Control_Image_Size::get_type(),
    [
        'name' => 'image_size',
        'default' => 'large',
        'separator' => 'none',
    ]
);

$this->add_control(
    'show_content_list',
    [
        'label' => esc_html__( 'Content List Posts', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => '',
        'separator'=>'before',
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->add_control(
    'content_length',
    [
        'label' => __('Content Length List Post', 'edubin-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 15,
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->add_control(
    'show_list_image',
    [
        'label' => esc_html__( 'List Posts Image', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => 'yes',
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->add_group_control(
    Group_Control_Image_Size::get_type(),
    [
        'name' => 'list_image_size',
        'default' => 'medium',
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->end_controls_section(); // Content Option End

$this->start_controls_section(
    'read_more_section',
    [
        'label' => __( 'Read More', 'edubin-core' ),
        'condition' => [
            'layout_style' => array('1','5'),
        ]
    ]
);
$this->add_control(
    'show_read_more',
    [
        'label' => esc_html__( 'Read More', 'edubin-core' ),
        'type' => Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => '',

    ]
);
$this->add_control(
    'read_more_text',
    [
        'label' => __( 'Read More Text', 'edubin-core' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( 'Read More', 'edubin-core' ),
        'placeholder' => __( 'Read More', 'edubin-core' ),
        'condition' => [
            'show_read_more' => 'yes',
        ],
    ]
);
$this->end_controls_section(); // Content Option End

// Pagination 
$this->start_controls_section(
    'pagination_section',
    [
        'label' => __( 'Pagination', 'edubin-core' ),
        'condition' => [
            'layout_style' =>  array('1', '5', '6'),
        ]
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




// Style content tab section
$this->start_controls_section(
    'post_grid_style_section',
    [
        'label' => __( 'Styles', 'edubin-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_group_control(
    Group_Control_Background::get_type(),
    [
        'name' => 'gradient_image_overlay_color',
        'label' => __('Image Overlay', 'edubin-core'),
        'types' => ['classic', 'gradient'],
        'selector' => '{{WRAPPER}} .edubin-latest-news .news-thum.thum-single.overlay-layout-3>a:before, .edubin-latest-news.layout-5 .single-news',
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
            '{{WRAPPER}} .single-news .news-cont a .news-title' => 'color: {{VALUE}};',
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
            '{{WRAPPER}} .single-news .news-cont a:hover .news-title' => 'color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();


$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'title_typography',
        'label' => __( 'Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
        ],
        'selector' => '{{WRAPPER}} .single-news .news-cont a .news-title',
    ]
);
$this->add_responsive_control(
    'title_padding',
    [
        'label' => __( 'Padding', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .single-news .news-cont a .news-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'title_align',
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
            ]
        ],
        'selectors' => [
            '{{WRAPPER}} .single-news .news-cont a .news-title' => 'text-align: {{VALUE}};',
        ],
        'default' => 'left',
    ]
);
 
$this->end_controls_section();

// List items
$this->start_controls_section(
    'section_title_list_style',
    [
        'label' => __( 'List Posts Title', 'edubin-core' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->start_controls_tabs( 'tabs_title_list_style' );

$this->end_controls_tabs();

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'title_list_typography',
        'label' => __( 'Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
        ],
        'selector' => '{{WRAPPER}} .single-news .news-cont a .news-title.news-list-title',
    ]
);
$this->add_responsive_control(
    'title_list_padding',
    [
        'label' => __( 'Padding', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .single-news .news-cont a .news-title.news-list-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();

// Style meta tab section
$this->start_controls_section(
    'post_grid_meta_style_section',
    [
        'label' => __( 'Meta', 'edubin-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);
$this->add_control(
    'meta_color',
    [
        'label' => __( 'Text Color', 'edubin-core' ),
        'type' => Controls_Manager::COLOR,
        'default'=>'',
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-news-meta ul li a' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-date p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-date p span' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'meta_bg_color',
    [
        'label' => __( 'Date Background Color', 'edubin-core' ),
        'type' => Controls_Manager::COLOR,
        'default'=>'',
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-date' => 'background: {{VALUE}}',
        ],
        'condition' => [
            'layout_style' => '4',
        ]
    ]
);
$this->add_control(
    'meta_icon_color',
    [
        'label' => __( 'Icon Color', 'edubin-core' ),
        'type' => Controls_Manager::COLOR,
        'default'=>'',
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news.layout-1 .single-news .news-cont ul li a i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .single-news .news-cont ul li a i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news.layout-1 .single-news .news-cont ul li i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .single-news .news-cont ul li i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news .edubin-news-meta ul li a i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news .single-news .news-cont ul li a i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news .news-cont > ul > li > i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news .edubin-news-meta ul li a span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'meta_typography',
        'label' => __( 'Date Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_TEXT,
        ],
        'selector' => '{{WRAPPER}} .edubin-latest-news.layout-1 .single-news .news-cont ul li a, .edubin-latest-news.layout-5 .single-news .news-cont ul li a, .edubin-latest-news .edubin-news-meta ul li a',
    ]
);
$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'meta_typography_big',
        'label' => __( 'Date Typography Big', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
        ],
        'selector' => '{{WRAPPER}} .edubin-latest-news .edubin-blog-date p span',
    ]
);
$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'meta_typography_month',
        'label' => __( 'Month Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_TEXT,
        ],
        'selector' => '{{WRAPPER}} .edubin-latest-news .edubin-blog-date p',
        'condition' => [
            'layout_style' => '4',
        ]
    ]
);
$this->add_responsive_control(
    'meta_padding',
    [
        'label' => __( 'Padding', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-news-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();
// Style meta tab section
$this->start_controls_section(
    'post_lists_meta_style_section',
    [
        'label' => __( 'Meta List Posts', 'edubin-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);
$this->add_control(
    'List_meta_color',
    [
        'label' => __( 'Text Color', 'edubin-core' ),
        'type' => Controls_Manager::COLOR,
        'default'=>'',
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .single-news .news-cont ul li a' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .single-news .news-cont ul li a' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'list_meta_icon_color',
    [
        'label' => __( 'Icon Color', 'edubin-core' ),
        'type' => Controls_Manager::COLOR,
        'default'=>'',
        'selectors' => [
            '{{WRAPPER}} .single-news .news-cont ul li a i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .single-news .news-cont ul li a span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news.layout-1 .single-news .news-cont ul li i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .single-news .news-cont ul li i' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'list_meta_typography',
        'label' => __( 'Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_TEXT,
        ],
        'selector' => '{{WRAPPER}} .single-news .news-cont ul li a',
    ]
);
$this->add_responsive_control(
    'list_meta_padding',
    [
        'label' => __( 'Padding', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .single-news .news-cont ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'post_grid_content_style_section',
    [
        'label' => __( 'Content', 'edubin-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'contetn_color',
    [
        'label' => __( 'Text Color', 'edubin-core' ),
        'type' => Controls_Manager::COLOR,
        'default'=>'',
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .content' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news .single-news' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'content_typography',
        'label' => __( 'Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_TEXT,
        ],
        'selector' => '{{WRAPPER}} .edubin-latest-news .content, .edubin-latest-news.layout-5 .news-cont',
    ]
);
$this->add_responsive_control(
    'content_padding',
    [
        'label' => __( 'Padding', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .news-cont' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();



$this->start_controls_section(
    'post_list_content_style_section',
    [
        'label' => __( 'Content List Posts', 'edubin-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'layout_style' => array('2', '3', '4'),
        ]
    ]
);

$this->add_control(
    'list_contetn_color',
    [
        'label' => __( 'Text Color', 'edubin-core' ),
        'type' => Controls_Manager::COLOR,
        'default'=>'',
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .blog-list-content .content' => 'color: {{VALUE}}',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .news-cont' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'list_content_typography',
        'label' => __( 'Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_TEXT,
        ],
        'selector' => '{{WRAPPER}} .edubin-latest-news .blog-list-content .content, .edubin-latest-news.layout-5 .news-cont',
    ]
);
$this->add_responsive_control(
    'list_content_padding',
    [
        'label' => __( 'Padding', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .blog-list-content .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .edubin-latest-news.layout-5 .news-cont' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'section_read_more_style',
    [
        'label' => __( 'Read More', 'edubin-core' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition' => [
            'layout_style' => array('1', '5', '6'),
        ]
    ]
);

$this->start_controls_tabs( 'tabs_read_more_style' );

$this->start_controls_tab(
    'tab_read_more_normal',
    [
        'label' => __( 'Normal', 'edubin-core' ),
    ]
);

$this->add_control(
    'read_more_color',
    [
        'label'     => __( 'Color', 'edubin-core' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore a' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'read_more_bg_color',
    [
        'label'     => __( 'Background Color', 'edubin-core' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore a' => 'background: {{VALUE}};',
        ],
    ]
);
$this->add_group_control(
    Group_Control_Border::get_type(),
    [
        'name'     => 'read_more_btn_border',
        'label'    => __('Border', 'edubin-core'),
        'selector' => '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore a',
    ]
);
$this->end_controls_tab();      

$this->start_controls_tab(
    'tab_read_more_hover',
    [
        'label' => __( 'Hover', 'edubin-core' ),
    ]
);

$this->add_control(
    'read_more_hover_color',
    [
        'label'     => __( 'Hover Color', 'edubin-core' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore:hover a' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'read_more_hover_bg_color',
    [
        'label'     => __( 'Background Hover Color', 'edubin-core' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore:hover a' => 'background: {{VALUE}};',
        ],
    ]
);
$this->add_group_control(
    Group_Control_Border::get_type(),
    [
        'name'     => 'read_more_btn_hover_border',
        'label'    => __('Border', 'edubin-core'),
        'selector' => '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore:hover a',
    ]
);
$this->end_controls_tab();

$this->end_controls_tabs();


$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'read_more_typography',
        'label' => __( 'Typography', 'edubin-core' ),
        'global' => [
            'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
        ],
        'selector' => '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore a',
    ]
);

$this->add_responsive_control(
    'btn_border_radius',
    [
        'label' => esc_html__( 'Border Radius', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
        ],
    ]
);
$this->add_responsive_control(
    'read_more_padding',
    [
        'label' => __( 'Padding', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'read_more_margin',
    [
        'label' => __( 'Margin', 'edubin-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .edubin-latest-news .edubin-blog-readmore' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

 
$this->end_controls_section();
} // End options

protected function render( $instance = [] ) {

    $settings   = $this->get_settings_for_display();

    global $post;
    $prefix = '_edubin_';

    $custom_order_ck    = $this->get_settings_for_display('custom_order');
    $orderby            = $this->get_settings_for_display('orderby');
    $postorder          = $this->get_settings_for_display('postorder');

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    // Single Big
    $single_args = array(
        'post_type' => 'post',
        'posts_per_page' => $settings['big_post_limit'],
        'post_status'    => 'publish',
        'paged' => $paged,
        'ignore_sticky_posts'   => 1,
        'order'                 => $postorder

    );

    // Skip single big
    $lists_args = array(
        'post_type' => 'post',
        'posts_per_page' => $settings['list_post_limit'],
        'post_status'    => 'publish',
        'paged' => $paged,
        'ignore_sticky_posts'   => 1,
        'offset' => 1,
        'order'  => $postorder
    ); 

    // Custom Order
    if( $custom_order_ck == 'yes' ){
        $single_args['orderby']    = $orderby;
    }
    if( $custom_order_ck == 'yes' ){
        $lists_args['orderby']    = $orderby;
    }
 
    if( !empty($settings['posts_category']) ){
        $get_categories = $settings['posts_category'];
    }else{
       $get_categories = $settings['posts_category'];
    }


    $posts_cats = str_replace(' ', '', $get_categories);

    if (  !empty( $get_categories ) ) {
        if( is_array($posts_cats) && count($posts_cats) > 0 ){
            $field_name = is_numeric( $posts_cats[0] ) ? 'term_id' : 'slug';
            $single_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'terms' => $posts_cats,
                    'field' => $field_name,
                    'include_children' => false
                )
        );
     }
}

    if (  !empty( $get_categories ) ) {
        if( is_array($posts_cats) && count($posts_cats) > 0 ){
            $field_name = is_numeric( $posts_cats[0] ) ? 'term_id' : 'slug';
            $lists_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'terms' => $posts_cats,
                    'field' => $field_name,
                    'include_children' => false
                )
        );
     }
}

    ?>
    <?php if ($settings['layout_style'] == '1' || $settings['layout_style'] == '5' || $settings['layout_style'] == '6') : ?>
        <div class="row tpc_g_30 edubin-latest-news layout-<?php echo esc_attr($settings['layout_style']);?>">

            <?php 
            $query = new \WP_Query($single_args);
            if($query->have_posts()): 
                while($query->have_posts()): 
                    $query->the_post(); 
                    $video_link = get_post_meta(get_the_id(), $prefix . 'video_format', true);?>

                       <?php 
                        if ( $settings['column_layout'] == '5' ) : 
                            $column_layout_left = '5';
                        elseif( $settings['column_layout'] == '6' ) :
                             $column_layout_left = '6';
                        elseif( $settings['column_layout'] == '7' ) :
                             $column_layout_left = '7';
                        endif;


                        // $layout_style = $settings['layout_style'];
                        $clm_layout_2 = $settings['column_layout_2'];
                     ?>

                
          
                    <div class="<?php if( $settings['layout_style'] == '6') : echo 'edubin-no-gutters'; endif; ?> col-xs-12 col-sm-6 col-md-6 col-lg-<?php echo esc_attr($clm_layout_2); ?> <?php if( $settings['layout_style'] == '1' || $settings['layout_style'] == '5' || $settings['layout_style'] == '6') : echo $clm_layout_2; else : echo $column_layout_left; endif; ?> ">
                        <div class="single-news">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="news-thum">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( $settings['image_size_size'] );?>
                                    </a>
                                </div>
                            <?php else: ?>
                                <?php echo wp_oembed_get($video_link);?>
                            <?php endif; ?>

                                <div class="news-cont">
                                    <?php   
                                    $archive_year  = get_the_time('Y'); 
                                    $archive_month = get_the_time('m'); 
                                    $archive_day   = get_the_time('d'); 
                                    ?>
                                    <ul>
                                        <?php if( !empty($settings['show_date']) ): ?>
                                            <li><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day) ); ?>"><i class="flaticon-calendar-1"></i><?php the_time(esc_html__('d F Y','edubin-core'));?> </a></li>
                                        <?php endif; ?>
                                        <?php if( !empty($settings['show_author']) ): ?>
                                            <li><i class="flaticon-user-4"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo esc_html( get_the_author() ); ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if( !empty($settings['show_title']) ): ?>
                                        <a href="<?php the_permalink();?>"><h3 class="news-title"><?php echo wp_trim_words( get_the_title(), $settings['title_length'], ''); ?></h3></a>
                                    <?php endif; ?>
                                    <?php if( !empty($settings['show_content_big']) ): ?>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), $settings['content_length_big'], ''); ?></p>
                                    <?php endif; ?>
                                    <?php if( $settings['show_read_more'] ): ?>
                                    <div class="edubin-blog-readmore">
                                    <a href="<?php the_permalink(); ?>"><?php echo $settings['read_more_text']; ?></a>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div> <!-- single news -->
                    </div>
      

                    <?php endwhile; 
                    wp_reset_postdata(); ?>

                    <?php if ($settings['pagi_on_off']) : ?>

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
             <?php endif; ?>


    <?php elseif( $settings['layout_style'] == '2' || $settings['layout_style'] == '3'  || $settings['layout_style'] == '4' ) : ?>
                    <div class="row tpc_g_30 edubin-latest-news">
                        <?php 
                            if ( $settings['column_layout'] == '5' ) : 
                                $column_layout_left = '5';
                            elseif( $settings['column_layout'] == '6' ) :
                                 $column_layout_left = '6';
                            elseif( $settings['column_layout'] == '7' ) :
                                 $column_layout_left = '7';
                            endif;
                         ?>
                        <div class="col-lg-<?php echo $column_layout_left; ?> ">
                            <?php 
                            $query = new \WP_Query($single_args);
                            if($query->have_posts()): 
                                while($query->have_posts()): 
                                    $query->the_post(); 
                                    $video_link = get_post_meta(get_the_id(), $prefix . 'video_format', true);?>

                                    <div class="single-news news-big">
                                        <?php if (has_post_thumbnail()): ?>
                                            <div class="news-thum thum-single <?php if ($settings['layout_style'] == '3') : echo "overlay-layout-3"; endif; ?>">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail( $settings['image_size_size'] );?>
                                                </a>
                                                <?php if ( $settings['layout_style'] == '2' || $settings['layout_style'] == '3') : ?>
                                                <div class="edubin-news-meta">
                                                    <?php   
                                                    $archive_year  = get_the_time('Y'); 
                                                    $archive_month = get_the_time('m'); 
                                                    $archive_day   = get_the_time('d'); 
                                                    ?>
                                                
                                                        <ul>
                                                            <?php if( !empty($settings['show_date']) ): ?>
                                                                <li><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day) ); ?>"><i class="flaticon-calendar-1"></i><?php the_time(esc_html__('d F Y','edubin-core'));?> </a></li>
                                                            <?php endif; ?>

                                                            <?php if( !empty($settings['show_author']) ): ?>
                                                                <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <span><i class="flaticon-user-4"></i></span> <?php echo esc_html( get_the_author() ); ?></a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                
                                                </div>
                                            <?php endif; ?>

                                            <?php if ( $settings['layout_style'] == '4' ) : ?>
                                                <div class="edubin-blog-date">
                                                    <?php   
                                                    $archive_month_M = get_the_time('M'); 
                                                    $archive_day_d   = get_the_time('d'); 
                                                    ?>
                                                    <p>
                                                        <span><?php echo esc_attr( $archive_day_d ); ?></span>
                                                        <?php echo esc_attr( $archive_month_M ); ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                            
                                            </div>
                                            <?php else: ?>
                                                <?php echo wp_oembed_get($video_link);?>
                                            <?php endif; ?>

                                            <div class="news-cont">

                                                <?php if( !empty($settings['show_title']) ): ?>
                                                    <a href="<?php the_permalink();?>"><h3 class="news-title"><?php echo wp_trim_words( get_the_title(), $settings['title_length'], ''); ?></h3></a>
                                                <?php endif; ?>
                                                <?php if( !empty($settings['show_content_big']) ): ?>
                                                    <p class="content"><?php echo wp_trim_words(get_the_excerpt(), $settings['content_length_big'], ''); ?></p>
                                                <?php endif; ?>

                                            </div>
                                        </div> <!-- single news -->

                                    <?php endwhile; wp_reset_postdata(); endif; ?>

                                </div>
                                <?php 
                                    if ( $settings['column_layout'] == '5' ) : 
                                        $column_layout_right = '7';
                                    elseif( $settings['column_layout'] == '6' ) :
                                         $column_layout_right = '6';
                                    elseif( $settings['column_layout'] == '7' ) :
                                         $column_layout_right = '5';
                                    endif;
                                 ?>
                                <div class="col-lg-<?php echo $column_layout_right; ?>">
                                    <?php 
                                    $query = new \WP_Query($lists_args);
                                    if($query->have_posts()): 
                                        while($query->have_posts()): 
                                            $query->the_post(); 
                                            $video_link = get_post_meta(get_the_id(), $prefix . 'video_format', true); ?>

                                            <div class="single-news news-list">
                                                <?php if( !empty($settings['show_list_image'] ) ) : ?>
                                                    <div class="blog-list-img">
                                                        <?php if ( has_post_thumbnail() ): ?>
                                                            <div class="news-thum thum-list <?php if ($settings['layout_style'] == '3') : echo "overlay-layout-3"; endif; ?>">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_post_thumbnail();?>
                                                                </a>
                                                            </div>
                                                            <?php else: ?>
                                                                <?php echo wp_oembed_get($video_link);?>
                                                            <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                    <div class="blog-list-content">
                                                        <div class="news-cont">
                                                     
                                                            <?php   
                                                            $archive_year  = get_the_time('Y'); 
                                                            $archive_month = get_the_time('m'); 
                                                            $archive_day   = get_the_time('d'); 
                                                            ?>
                                                            <ul>
                                                                <?php if( !empty($settings['show_date']) ): ?>
                                                                    <li><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day) ); ?>"><i class="flaticon-calendar-1"></i><?php the_time(esc_html__('d F Y','edubin-core'));?> </a></li>
                                                                <?php endif; ?>

                                                                <?php if( !empty($settings['show_author']) ): ?>
                                                                    <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <span><i class="flaticon-user-4"></i></span> <?php echo esc_html( get_the_author() ); ?></a></li>
                                                                <?php endif; ?>
                                                            </ul>
                                  
                                                            <?php if( !empty($settings['show_title_list']) ): ?>
                                                                <a href="<?php the_permalink();?>"><h3 class="news-title news-list-title"><?php echo wp_trim_words( get_the_title(), $settings['title_length_list'], ''); ?></h3></a>
                                                            <?php endif; ?>
                                                            <?php if( !empty($settings['show_content_list']) ): ?>
                                                                <p class="content"><?php echo wp_trim_words(get_the_excerpt(), $settings['content_length'], ''); ?></p>
                                                            <?php endif; ?>
                                               
                                                        </div>
                                                    </div>
                                                </div> 
                                            <?php endwhile; wp_reset_postdata(); endif; ?>
                                        </div>
                                    </div> <!-- row -->
            <?php endif; ?>

                                <?php

                            }

                        }

