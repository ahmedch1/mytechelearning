
<?Php 
    $defaults = edubin_generate_defaults();
    $tutor_course_archive_style = get_theme_mod( 'tutor_course_archive_style', $defaults['tutor_course_archive_style']);

    $course_id     = get_the_ID();
    $default_price = apply_filters('tutor-loop-default-price', esc_html__('Free', 'edubin'));
    $price_html    = '<span class="price"> ' . $default_price . '</span>';
?>

    <span class="price">
    <?php 
        if (tutor_utils()->is_course_purchasable()) {

            $product_id = tutor_utils()->get_course_product_id($course_id);
            $product    = wc_get_product($product_id);

            if ($product) {
                $price_html = '<span class="price"> ' . $product->get_price_html() . ' </span>';
            }
        }

         echo wp_kses( $price_html, 'edubin-default' );
    ?></span>
