<?php
$wp_customize->add_section( 'typography_section',
    array(
        'title' => esc_html__( 'Typography', 'edubin' ),
        'panel' => 'general_panel',
        'priority'   => 50,
    )
);