<?php
/**
 * The Event calender compatibility
 *
 * @package Edubin
 */

// Remove the event calender search bar
add_filter( 'tribe-events-bar-should-show', '__return_false' );

// add_filter( 'tribe-events-bar-filters',  'setup_my_field_in_bar', 1, 1 );

function setup_my_field_in_bar( ) {
	add_filter( 'tribe-events-bar-should-show', '__return_true' );
}