<?php
/**
 * Restrict lesson content template.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/content-drip/restrict-content.php.
 *
 * @author  ThimPress
 * @package LearnPress/Addon/Template
 * @version 3.0.6
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

global $course;
$drip_type = get_post_meta( $course->get_id(), '_lp_content_drip_drip_type', true );
$message    = '';
$time_types = array(
	'minute' => __( 'minute', 'ecademy-toolkit' ),
	'hour'   => __( 'hour', 'ecademy-toolkit' ),
	'day'    => __( 'day', 'ecademy-toolkit' ),
	'week'   => __( 'week', 'ecademy-toolkit' )
);
/**
 * @var $drip_item
 */
 /*
  * New Area
  */
// Show reload html tag
// Get current time (timestamp)
$currenttime_timestamp = current_time( 'timestamp' );
$dripitem_timestamp = '';
if (isset( $drip_item['open_item'] ) && strtotime($drip_item['open_item'])) {
    $dripitem_timestamp = strtotime($drip_item['open_item']);
} elseif ($drip_item['depends']['open_time'][$drip_item['depends']['prerequisite'][0]] != false && $drip_item['depends']['open_time'][$drip_item['depends']['prerequisite'][0]]->format('Y-m-d h:i:s')) {
    $dripitem_timestamp = strtotime($drip_item['depends']['open_time'][$drip_item['depends']['prerequisite'][0]]->format('Y-m-d h:i:s a'));
}
if ( $dripitem_timestamp > $currenttime_timestamp ) {
    // Caculate time remaining
    $time_remaining = $dripitem_timestamp - $currenttime_timestamp;
    // convert time remaining to miliseconds
    $time_miliseconds = $time_remaining * 1000;

    $miliseconds_value = number_format( $time_miliseconds, 0, '.', '' );

    echo '<input type="hidden" name="lcd_reload" id="lcd-reload" value ="' . $miliseconds_value . '" />';
}

if ( isset( $drip_item['open_item'] ) ) {
	$message = sprintf( __( 'Sorry! You can not view this item right now. It will become available on <strong>%s</strong>.', 'ecademy-toolkit' ), $drip_item['open_item'] );

} else if ( isset( $drip_item['depends'] ) && $drip_type == 'prerequisite' ) {
	$set_time_type = $drip_item['depends']['interval'][1];
	$type_text     = isset( $time_types[ $set_time_type ] ) ? $time_types[ $set_time_type ] : $drip_item['depends']['interval'][1];
	$message       = __( 'Sorry! You can not view this item right now. It will become available when you completed ', 'ecademy-toolkit' );
	$message       .= '<ul>';

	foreach ( $drip_item['depends']['prerequisite'] as $prerequisite_item_id ) {
		/**
		 * @var $open_time LP_Datetime
		 */
		$open_time = $drip_item['depends']['open_time'][ $prerequisite_item_id ];

		// course item
		$item = $course->get_item( $prerequisite_item_id );

		$message .= '<li><a href="' . $item->get_permalink() . '">' . ' ' . get_the_title( $prerequisite_item_id ) . '</a></li>';
	}
	$message .= '</ul>';
	if ( isset( $drip_item['depends']['type'] ) && $drip_item['depends']['type'] != 'immediately' ) {
		$message .= __( 'and ', 'ecademy-toolkit' ) . ( $drip_item['depends']['type'] == 'interval' ? __( 'after ', 'ecademy-toolkit' ) . $drip_item['depends']['interval'][0] . ' ' . $type_text . __( '(s)', 'ecademy-toolkit' ) : __( 'on ', 'ecademy-toolkit' ) . date( get_option( 'date_format' ) . ' H:i', $drip_item['depends']['date'] ) );
	}
} else if ( $drip_type != 'prerequisite' ) {
	$set_time_type = $drip_item['depends']['interval'][1];
	$type_text     = isset( $time_types[ $set_time_type ] ) ? $time_types[ $set_time_type ] : $drip_item['depends']['interval'][1];
	$message       = __( 'Sorry! You can not view this item right now. It will become available when you completed ', 'ecademy-toolkit' );

	if ( $drip_item['depends']['prerequisite'] ) {
		foreach ( $drip_item['depends']['prerequisite'] as $item_id ) {
			$item    = $course->get_item( $item_id );
			$message .= '<strong><a href="' . $item->get_permalink() . '">' . ' ' . get_the_title( $item_id ) . '</a></strong>';
		}
	}
	//hungkv them
		$message .= '</ul>';
	if ( isset( $drip_item['depends']['type'] ) && $drip_item['depends']['type'] != 'immediately' ) {
		$message .= __( ' and ', 'ecademy-toolkit' ) . ( $drip_item['depends']['type'] == 'interval' ? __( 'after ', 'ecademy-toolkit' ) . $drip_item['depends']['interval'][0] . ' ' . $type_text . __( '(s)', 'ecademy-toolkit' ) : __( 'on ', 'ecademy-toolkit' ) . date( get_option( 'date_format' ) . ' H:i', $drip_item['depends']['date'] ) );
	}


} else if ( isset( $drip_item['dependency'] ) ) {
	// for old version
	$pre_item_id   = $drip_item['dependency']['pre_item_id'];
	$pre_item      = LP_Course_Item::get_item( $pre_item_id );
	$set_time_type = $drip_item['dependency']['item']['interval'][1];
	$type_text     = isset( $time_types[ $set_time_type ] ) ? $time_types[ $set_time_type ] : $drip_item['dependency']['item']['interval'][1];
	$message       = sprintf( wp_kses( __( 'Sorry! You can not view this item right now. It will become available when you complete <strong><a href="%s">%s</a></strong> %s. <br>', 'ecademy-toolkit' ), array(
		'a'      => array(
			'href' => array()
		),
		'strong' => array(),
		'br'     => array()
	) ), $pre_item->get_permalink(), get_the_title( $pre_item_id ), $drip_item['dependency']['item']['type'] == 'immediately' ? '' : ( $drip_item['dependency']['item']['type'] == 'specific' ? __( ' and after ', 'ecademy-toolkit' ) . date( get_option( 'date_format' ) . ' H:i', $drip_item['dependency']['item']['date'] ) : ( $drip_item['dependency']['item']['interval'][0] . ' ' . $type_text . '(s)' ) ) );

	if ( isset( $drip_item['dependency']['end_time'] ) ) {
		$message .= __( 'Complete time: ', 'ecademy-toolkit' ) . $drip_item['dependency']['end_time'];
	}
}
if($dripitem_timestamp != '' || $drip_item['depends']['date']){
    // add more GMT setting WP
    $lpcd_gmt = get_option('gmt_offset');
    if($lpcd_gmt >= 0){
        $lpcd_gmt = '+'.$lpcd_gmt.'';
    }else{
        $lpcd_gmt = '-.'.$lpcd_gmt.'';
    }
    $message .= ' (GMT '.$lpcd_gmt.')';
}

?>

<div class="learn-press-content-protected-message content-item-block">
	<?php echo $message; ?>
</div>

