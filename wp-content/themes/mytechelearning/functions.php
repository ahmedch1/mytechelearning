<?php
function edubin_child_enqueue_styles() {
    wp_enqueue_style( 'edubin-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'edubin_child_enqueue_styles' );
?>

