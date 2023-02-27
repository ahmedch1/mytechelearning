<?php
/**
 * Enqueue scripts for google fonts
 */
function edubin_google_fonts_scripts()
{
    $headings_font = esc_html(get_theme_mod('headings_fonts'));
    $body_font     = esc_html(get_theme_mod('body_fonts'));
    $menu_font     = esc_html(get_theme_mod('menu_font'));

    if ( $headings_font ) {
        wp_enqueue_style('edubin-headings-fonts', '//fonts.googleapis.com/css?family=' . $headings_font);
    } else {
        wp_enqueue_style('edubin-source-sans', '//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700');
    }

    if ( $body_font ) {
        wp_enqueue_style('edubin-body-fonts', '//fonts.googleapis.com/css?family=' . $body_font);
    } else {
        wp_enqueue_style('edubin-source-body', '//fonts.googleapis.com/css?family=Roboto:300,400,700');
    }

    if ( $menu_font ) {
        wp_enqueue_style('edubin-menu-fonts', '//fonts.googleapis.com/css?family=' . $menu_font);
    } else {
        wp_enqueue_style('edubin-source-menu', '//fonts.googleapis.com/css?family=Roboto:300,400,700');
    }
}
add_action('wp_enqueue_scripts', 'edubin_google_fonts_scripts');

/**
 * Select google font typography.
 */
function edubin_google_fonts_styles($custom)
{
    //Fonts
    $headings_font = esc_html(get_theme_mod('headings_fonts'));
    $body_font     = esc_html(get_theme_mod('body_fonts'));
    $menu_font     = esc_html(get_theme_mod('menu_font'));

    if ( $headings_font ) {
        $font_pieces = explode(":", $headings_font);
        $custom .= "h1, h2, h3, h4, h5, h6 { font-family: {$font_pieces[0]}; }" . "\n";
    }
    if ( $body_font ) {
        $font_pieces = explode(":", $body_font);
        $custom .= "body, button, input, select, textarea { font-family: {$font_pieces[0]}; }" . "\n";
    }
    if ( $menu_font ) {
        $font_pieces = explode(":", $menu_font);
        $custom .= " .main-navigation a { font-family: {$font_pieces[0]}; }" . "\n";
    }

    //Output all the styles
    wp_add_inline_style('edubin-theme-css', $custom);

}

add_action('wp_enqueue_scripts', 'edubin_google_fonts_styles');

//Sanitizes Fonts
function edubin_sanitize_fonts($input)
{
    $valid = array(
        'Source Sans Pro:400,700,400italic,700italic'            => 'Source Sans Pro',
        'Open Sans:400italic,700italic,400,700'                  => 'Open Sans',
        'Oswald:400,700'                                         => 'Oswald',
        'Playfair Display:400,700,400italic'                     => 'Playfair Display',
        'Montserrat:400,400i,500,600,700,700i'                   => 'Montserrat',
        'Raleway:400,700'                                        => 'Raleway',
        'Droid Sans:400,700'                                     => 'Droid Sans',
        'Lato:400,700,400italic,700italic'                       => 'Lato',
        'Arvo:400,700,400italic,700italic'                       => 'Arvo',
        'Lora:400,700,400italic,700italic'                       => 'Lora',
        'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
        'Oxygen:400,300,700'                                     => 'Oxygen',
        'PT Serif:400,700'                                       => 'PT Serif',
        'PT Sans:400,700,400italic,700italic'                    => 'PT Sans',
        'PT Sans Narrow:400,700'                                 => 'PT Sans Narrow',
        'Cabin:400,700,400italic'                                => 'Cabin',
        'Fjalla One:400'                                         => 'Fjalla One',
        'Francois One:400'                                       => 'Francois One',
        'Josefin Sans:400,300,600,700'                           => 'Josefin Sans',
        'Libre Baskerville:400,400italic,700'                    => 'Libre Baskerville',
        'Arimo:400,700,400italic,700italic'                      => 'Arimo',
        'Ubuntu:400,700,400italic,700italic'                     => 'Ubuntu',
        'Bitter:400,700,400italic'                               => 'Bitter',
        'Droid Serif:400,700,400italic,700italic'                => 'Droid Serif',
        'Roboto:400,400italic,700,700italic'                     => 'Roboto',
        'Open Sans Condensed:700,300italic,300'                  => 'Open Sans Condensed',
        'Roboto Condensed:400italic,700italic,400,700'           => 'Roboto Condensed',
        'Roboto Slab:400,700'                                    => 'Roboto Slab',
        'Yanone Kaffeesatz:400,700'                              => 'Yanone Kaffeesatz',
        'Rokkitt:400'                                            => 'Rokkitt',
    );

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}
