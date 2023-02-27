<?php
/**
 * Template for displaying archive courses breadcrumb.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/global/breadcrumb.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

defined( 'ABSPATH' ) || exit();


$defaults = edubin_generate_defaults();
$lp_single_page_layout = get_theme_mod('lp_single_page_layout', $defaults['lp_single_page_layout']); 

if ($lp_single_page_layout == '2') : // The section visible only for layout 2


if ( empty( $breadcrumb ) ) {
	return;
}
echo $wrap_before;

foreach ( $breadcrumb as $key => $crumb ) {

	echo $before;

	echo '<li>';

	if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
		echo '<a href="' . esc_url( $crumb[1] ) . '"><span>' . esc_html( $crumb[0] ) . '</span></a>';
	} else {
		echo '<span>' . esc_html( $crumb[0] ) . '</span>';
	}

	echo '</li>';

	echo $after;

	if ( sizeof( $breadcrumb ) !== $key + 1 ) {
		echo $delimiter;
	}
}

echo $wrap_after;

endif; // End section only visible for layout 2 
