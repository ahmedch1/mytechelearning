<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}



$event_id = get_the_ID();
$event = get_post( $event_id );

/**
 * If a yearless date format should be preferred.
 *
 * By default, this will be true if the event starts and ends in the current year.
 *
 * @since 0.2.5-alpha
 *
 * @param bool    $use_yearless_format
 * @param WP_Post $event
 */
$use_yearless_format = apply_filters( 'tribe_events_event_block_datetime_use_yearless_format',
    (
        tribe_get_start_date( $event_id, false, 'Y' ) === date_i18n( 'Y' )
        && tribe_get_end_date( $event_id, false, 'Y' ) === date_i18n( 'Y' )
    ),
    $event
);

$time_format    = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$date_format    = tribe_get_date_format( $use_yearless_format );
$timezone       = get_post_meta( $event_id, '_EventTimezone', true );


$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );


$formatted_start_date = tribe_get_start_date( $event_id, false, $date_format );
$formatted_start_time = tribe_get_start_time( $event_id, $time_format );
$formatted_end_date   = tribe_get_end_date( $event_id, false, $date_format );
$formatted_end_time   = tribe_get_end_time( $event_id, $time_format );
$separator_date       = get_post_meta( $event_id, '_EventDateTimeSeparator', true );
$separator_time       = get_post_meta( $event_id, '_EventTimeRangeSeparator', true );

if ( empty( $separator_time ) ) {
    $separator_time = tribe_get_option( 'timeRangeSeparator', ' - ' );
}
if ( empty( $separator_date ) ) {
    $separator_date = tribe_get_option( 'dateTimeSeparator', ' - ' );
}

$is_all_day        = tribe_event_is_all_day( $event_id );
$is_same_day       = $formatted_start_date == $formatted_end_date;
$is_same_start_end = $formatted_start_date == $formatted_end_date && $formatted_start_time == $formatted_end_time;



	$events_label_singular = tribe_get_event_label_singular();
	$events_label_plural   = tribe_get_event_label_plural();

	$event_id = get_the_ID();

    $organizer_ids = tribe_get_organizer_ids();
    $multiple      = count($organizer_ids) > 1;

    $phone      = tribe_get_organizer_phone();
    $email      = tribe_get_organizer_email();
    $website    = tribe_get_organizer_website_link();
    $start_time = tribe_get_start_date($event_id, false, $time_format);
    $end_time   = tribe_get_end_date($event_id, false,  $time_format);
    $event_date = tribe_get_start_time ( $event_id, 'j F H' );


    // CMB2
    $post_id = edubin_get_id();
    $prefix = '_edubin_';
    $defaults = edubin_generate_defaults();
    $page_header_enable = get_post_meta($post_id, $prefix . 'page_header_enable', true);

    $tbe_event_countdown = get_theme_mod('tbe_event_countdown', $defaults['tbe_event_countdown']); 
    $tbe_event_maps = get_theme_mod('tbe_event_maps', $defaults['tbe_event_maps']); 
    $tbe_event_cost = get_theme_mod('tbe_event_cost', $defaults['tbe_event_cost']); 
    $tbe_start_time = get_theme_mod('tbe_start_time', $defaults['tbe_start_time']); 
    $tbe_end_time = get_theme_mod('tbe_end_time', $defaults['tbe_end_time']); 
    $tbe_website = get_theme_mod('tbe_website', $defaults['tbe_website']); 
    $tbe_phone = get_theme_mod('tbe_phone', $defaults['tbe_phone']); 
    $tbe_email = get_theme_mod('tbe_email', $defaults['tbe_email']); 
    $tbe_organizer_ids = get_theme_mod('tbe_organizer_ids', $defaults['tbe_organizer_ids']); 
    $tbe_location = get_theme_mod('tbe_location', $defaults['tbe_location']); 
    $tbe_content_before_massage = get_theme_mod('tbe_content_before_massage', $defaults['tbe_content_before_massage']); 
    $tbe_content_after_massage = get_theme_mod('tbe_content_after_massage', $defaults['tbe_content_after_massage']); 
    $edubin_tribe_events_layout = get_theme_mod( 'edubin_tribe_events_layout', $defaults['edubin_tribe_events_layout']  );

?>
         
<?php if ($edubin_tribe_events_layout == 'layout_2'): ?>
    
<div id="event-single" class="pt-120 pb-120 gray-bg tribe-events-layout-2">
    <div class="events-area">
        <div class="row">

            <div class="col-lg-8">
                <div class="events-left">

                    <?php while (have_posts()): the_post();?>
                            <div id="post-<?php the_ID();?>" <?php post_class();?>>
                        <?php if ($tbe_event_countdown == true) :?>
                              <div class="edubin-events-countdown edubin-events-countdown-2 bg_cover" data-overlay="8" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($event_id, 'large')); ?>')">

                                <script>
                                    (function($) {
                                        "use strict";
                                    var timer;
                                    var compareDate = new Date("<?php echo tribe_get_start_date($event_id, false, 'Y/m/d'); ?>");
                                    compareDate.setDate(compareDate.getDate()); 

                                    timer = setInterval(function() {
                                      timeBetweenDates(compareDate);
                                    }, 1000);

                                    function timeBetweenDates(toDate) {
                                      var dateEntered = toDate;
                                      var now = new Date();
                                      var difference = dateEntered.getTime() - now.getTime();

                                      if (difference <= 0) {
                                        // Timer done
                                        clearInterval(timer);
                                      } else {
                                        
                                        var seconds = Math.floor(difference / 1000);
                                        var minutes = Math.floor(seconds / 60);
                                        var hours = Math.floor(minutes / 60);
                                        var days = Math.floor(hours / 24);

                                        hours %= 24;
                                        minutes %= 60;
                                        seconds %= 60;

                                        $("#days").text(days);
                                        $("#hours").text(hours);
                                        $("#minutes").text(minutes);
                                        $("#seconds").text(seconds);
                                      }
                                    }

                                    })(jQuery);
                                </script>

                                      <div class="count-down-time">
                                            <div class="single-count">
                                                <div class="number" id="days"></div>
                                                <span class="title"><?php esc_html_e( 'Days', 'edubin'); ?></span>
                                            </div>
                                            <div class="single-count">
                                                <div class="number" id="hours"></div>
                                                <span class="title"><?php esc_html_e( 'Hours', 'edubin'); ?></span>
                                            </div>
                                            <div class="single-count">
                                                <div class="number" id="minutes"></div>
                                                <span class="title"><?php esc_html_e( 'Minutes', 'edubin'); ?></span>
                                            </div>
                                            <div class="single-count">
                                                <div class="number" id="seconds"></div>
                                                <span class="title"><?php esc_html_e( 'Seconds', 'edubin'); ?></span>
                                            </div>
                                      </div>
                                      
                                    <div class="edubin-events-countdown-btn pt-30">

                                        <?php if ( shortcode_exists( 'rtec-registration-form' ) ) { ?>
                                         <div class="edubin-event-register-from">
                                            <!-- Notices -->
                                            <?php tribe_the_notices()?>
                                            <?php echo do_shortcode('[rtec-registration-form]'); ?>    
                                        </div>
                                        <?php } ?>
                                       
                                        <div class="tribe-events-single-event-description tribe-events-content">
                                            <?php do_action('tribe_events_single_event_meta_primary_section_end');?>
                                        </div>
                                    </div>
                                </div> <!-- events coundwon -->
                            <?php endif; ?>
                            <!-- Event content -->
                            <?php if($tbe_content_before_massage) : ?>
                                <?php do_action('tribe_events_single_event_before_the_content')?>
                            <?php endif; ?>

                            <div class="edubin-enevt-content">
                                <?php if ($page_header_enable == !'enable') { ?>
                                    <header class="entry-header-not-hidden">
                                        <?php the_title( sprintf( '<h2>', esc_url( get_permalink() ) ), '</h2>' ); ?>
                                    </header>
                                <?php } ?>
                                <?php the_content();?>
                            </div>
                            <!-- .tribe-events-single-event-description -->
                            <?php if($tbe_content_after_massage) : ?>
                                <?php do_action('tribe_events_single_event_after_the_content')?>
                            <?php endif; ?>

                            <!-- Event meta -->
                            <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>

                            <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                        </div> <!-- #post-x -->

                        <?php if (get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option('showComments', false)) {
                            comments_template(); } ?>
                    <?php endwhile; ?>

                </div> <!-- events left -->

            </div>

            <div class="col-lg-4">

                <div class="events-right">
                    
                    <div class="events-address">
                        <ul>
                        <?php $cost = tribe_get_formatted_cost(); ?>
                        <?php if (!empty($cost) && $tbe_event_cost): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Cost', 'edubin');?></h6>
                                       <span><?php echo esc_html( $cost ); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>

                        <?php if ($tbe_start_time): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Start Time', 'edubin');?></h6>
                                       <span><?php echo esc_html($formatted_start_date); ?> <?php echo esc_attr( $separator_date ); ?></span>
                                       <span><?php echo esc_html($start_time); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>
                        <?php if ($tbe_end_time): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-bell-slash"></i>
                                    </div>
                                    <div class="cont">
                                       <h6><?php esc_html_e('End Time', 'edubin');?></h6>
                                       <span><?php echo esc_html($formatted_end_date); ?> <?php echo esc_attr( $separator_date ); ?></span>
                                       <span><?php echo esc_html($end_time); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($website) && $tbe_website): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Website', 'edubin');?></h6>
                                       <span><?php echo wp_kses_post($website); ?></span>
                                    </div>
                                </div> <!-- Website -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($phone) && $tbe_phone): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Phone', 'edubin');?></h6>
                                       <span><?php echo esc_html($phone); ?></span>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($email)  && $tbe_email): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="far fa-envelope-open"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Email', 'edubin');?></h6>
                                       <span><?php echo esc_html($email); ?></span>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($organizer_ids) && $tbe_organizer_ids): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fab fa-bandcamp"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Organizer', 'edubin');?></h6>
                                        <?php
                                            foreach ($organizer_ids as $organizer) {
                                                if (!$organizer) {
                                                    continue;
                                                }
                                                ?>
                                                <span><?php echo tribe_get_organizer_link($organizer) ?></span>
                                        <?php } ?>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (tribe_address_exists() && $tbe_location): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Location', 'edubin');?></h6>
                                            <address class="event-address">
                                                <?php echo tribe_get_full_address(); ?>
                                                <?php if (tribe_show_google_map_link()): ?>
                                                    <?php echo tribe_get_map_link_html(); ?>
                                                <?php endif;?>
                                            </address>
                                    </div>
                                </div> <!-- Address -->

                            </li>
                        <?php endif;?>
                        </ul>
                        <?php if ($tbe_event_maps == true) :?>
                          <div class="edubin-events-maps">
                                <?php if (get_post_meta( get_the_ID(), 'edubin_cmb2_tribe_events_map_html_code', true )): ?>

                                    <?php echo wpautop(get_post_meta( get_the_ID(), 'edubin_cmb2_tribe_events_map_html_code', true )); ?>

                                <?php else :  // default tribe_event map ?>

                                    <?php $map = tribe_get_embedded_map(); ?>
                                    <?php if (!empty($map)): ?>

                                    <div id="contact-map">
                                        <div class="tribe-events-venue-map">
                                            <?php
                                                // Display the map.
                                                do_action('tribe_events_single_meta_map_section_start');
                                                echo esc_html($map);
                                                do_action('tribe_events_single_meta_map_section_end');
                                            ?>
                                        </div>
                                    </div> <!-- Map -->
                                <?php endif;?>
                                    
                                <?php endif ?>
                          </div>
                        <?php endif; ?>
                    </div> <!-- events address -->

                </div> <!-- events right -->

                <?php if ( is_active_sidebar( 'tribe_event_sidebar' ) ) { ?>
                    <aside id="secondary" class="widget-area tribe-events-bottom-widget">
                        <?php dynamic_sidebar( 'tribe_event_sidebar' ); ?>
                    </aside>
                <?php } ?>

            </div>
        </div> <!-- row -->
    </div> <!-- events-area -->
 </div>

<?php elseif($edubin_tribe_events_layout == 'layout_1') :  ?>

<div id="event-single" class="pt-120 pb-120 gray-bg">
    <div class="events-area">
        <div class="row">
            <div class="col-lg-8">
                <div class="events-left">

                    <?php while (have_posts()): the_post();?>
                            <div id="post-<?php the_ID();?>" <?php post_class();?>>
                            <!-- Event featured image, but exclude link -->
                            <?php echo tribe_event_featured_image($event_id, 'full', false); ?>

                            <!-- Event content -->
                            <?php if($tbe_content_before_massage) : ?>
                                <?php do_action('tribe_events_single_event_before_the_content')?>
                            <?php endif; ?>

                            <div class="edubin-enevt-content">
                                <?php if ($page_header_enable == !'enable') { ?>
                                    <header class="entry-header-not-hidden">
                                        <?php the_title( sprintf( '<h2>', esc_url( get_permalink() ) ), '</h2>' ); ?>
                                    </header>
                                <?php } ?>
                                <?php the_content();?>
                            </div>
                            <!-- .tribe-events-single-event-description -->
                            <?php if($tbe_content_after_massage) : ?>
                                <?php do_action('tribe_events_single_event_after_the_content')?>
                            <?php endif; ?>
                            <!-- Event meta -->
                            <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>

                            <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                            
                        </div> <!-- #post-x -->
                        <?php if (get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option('showComments', false)) {
                            comments_template(); } ?>
                    <?php endwhile; ?>

                </div> <!-- events left -->
            </div>

            <div class="col-lg-4">
                <div class="events-right">
                    <?php if ($tbe_event_countdown == true) :?>
                        <div class="edubin-events-countdown bg_cover" data-overlay="8" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($event_id, 'thumbnail')); ?>')">
                              <script>
                                    (function($) {
                                        "use strict";
                                    var timer;
                                    var compareDate = new Date("<?php echo tribe_get_start_date($event_id, false, 'Y/m/d'); ?>");
                                    compareDate.setDate(compareDate.getDate()); 

                                    timer = setInterval(function() {
                                      timeBetweenDates(compareDate);
                                    }, 1000);

                                    function timeBetweenDates(toDate) {
                                      var dateEntered = toDate;
                                      var now = new Date();
                                      var difference = dateEntered.getTime() - now.getTime();

                                      if (difference <= 0) {
                                        // Timer done
                                        clearInterval(timer);
                                      } else {
                                        
                                        var seconds = Math.floor(difference / 1000);
                                        var minutes = Math.floor(seconds / 60);
                                        var hours = Math.floor(minutes / 60);
                                        var days = Math.floor(hours / 24);

                                        hours %= 24;
                                        minutes %= 60;
                                        seconds %= 60;

                                        $("#days").text(days);
                                        $("#hours").text(hours);
                                        $("#minutes").text(minutes);
                                        $("#seconds").text(seconds);
                                      }
                                    }

                                    })(jQuery);
                                </script>

                                      <div class="count-down-time">
                                            <div class="single-count">
                                                <div class="number" id="days"></div>
                                                <span class="title"><?php esc_html_e( 'Days', 'edubin'); ?></span>
                                            </div>
                                            <div class="single-count">
                                                <div class="number" id="hours"></div>
                                                <span class="title"><?php esc_html_e( 'Hours', 'edubin'); ?></span>
                                            </div>
                                            <div class="single-count">
                                                <div class="number" id="minutes"></div>
                                                <span class="title"><?php esc_html_e( 'Minutes', 'edubin'); ?></span>
                                            </div>
                                            <div class="single-count">
                                                <div class="number" id="seconds"></div>
                                                <span class="title"><?php esc_html_e( 'Seconds', 'edubin'); ?></span>
                                            </div>
                                      </div>
                                      
                            <div class="edubin-events-countdown-btn pt-30">

                                <?php if ( shortcode_exists( 'rtec-registration-form' ) ) { ?>
                                 <div class="edubin-event-register-from">
                                    <!-- Notices -->
                                    <?php tribe_the_notices()?>
                                    <?php echo do_shortcode('[rtec-registration-form]'); ?>    
                                </div>
                                <?php } ?>
                               
                                <div class="tribe-events-single-event-description tribe-events-content">
                                    <?php do_action('tribe_events_single_event_meta_primary_section_end');?>
                                </div>
                            </div>
                        </div> <!-- events countdown -->
                    <?php endif; ?>
                    <div class="events-address">
                        <ul>
                        <?php $cost = tribe_get_formatted_cost(); ?>
                        <?php if (!empty($cost) && $tbe_event_cost): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Event Cost', 'edubin');?></h6>
                                       <span><?php echo esc_html( $cost ); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>

                        <?php if ($tbe_start_time): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Start Time', 'edubin');?></h6>
                                        <span><?php echo esc_html($formatted_start_date); ?> <?php echo esc_attr( $separator_date  ); ?></span>
                                       <span><?php echo esc_html($start_time); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>
                        <?php if ($tbe_end_time): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-bell-slash"></i>
                                    </div>
                                    <div class="cont">
                                       <h6><?php esc_html_e('End Time', 'edubin');?></h6>
                                        <span><?php echo esc_html($formatted_end_date); ?> <?php echo esc_attr( $separator_date ); ?></span>
                                       <span><?php echo esc_html($end_time); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($website) && $tbe_website): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Website', 'edubin');?></h6>
                                       <span><?php echo wp_kses_post($website); ?></span>
                                    </div>
                                </div> <!-- Website -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($phone) && $tbe_phone): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Phone', 'edubin');?></h6>
                                       <span><?php echo esc_html($phone); ?></span>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($email)  && $tbe_email): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="far fa-envelope-open"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Email', 'edubin');?></h6>
                                       <span><?php echo esc_html($email); ?></span>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($organizer_ids) && $tbe_organizer_ids): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fab fa-bandcamp"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Organizer', 'edubin');?></h6>
                                        <?php
                                            foreach ($organizer_ids as $organizer) {
                                                if (!$organizer) {
                                                    continue;
                                                }
                                                ?>
                                                <span><?php echo tribe_get_organizer_link($organizer) ?></span>
                                        <?php } ?>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (tribe_address_exists() && $tbe_location): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Location', 'edubin');?></h6>
                                            <address class="event-address">
                                                <?php echo tribe_get_full_address(); ?>
                                                <?php if (tribe_show_google_map_link()): ?>
                                                    <?php echo tribe_get_map_link_html(); ?>
                                                <?php endif;?>
                                            </address>
                                    </div>
                                </div> <!-- Address -->

                            </li>
                        <?php endif;?>
                        </ul>
                        <?php if ($tbe_event_maps == true) :?>
                          <div class="edubin-events-maps">
                                <?php if (get_post_meta( get_the_ID(), 'edubin_cmb2_tribe_events_map_html_code', true )): ?>

                                    <?php echo wpautop(get_post_meta( get_the_ID(), 'edubin_cmb2_tribe_events_map_html_code', true )); ?>

                                <?php else :  // default tribe_event map ?>

                                    <?php $map = tribe_get_embedded_map(); ?>
                                    <?php if (!empty($map)): ?>

                                    <div id="contact-map">
                                        <div class="tribe-events-venue-map">
                                            <?php
                                                // Display the map.
                                                do_action('tribe_events_single_meta_map_section_start');
                                                echo esc_html($map);
                                                do_action('tribe_events_single_meta_map_section_end');
                                            ?>
                                        </div>
                                    </div> <!-- Map -->
                                <?php endif;?>
                                    
                                <?php endif ?>
                          </div>
                        <?php endif; ?>
                    </div> <!-- events address -->
                </div> <!-- events right -->
                <?php if ( is_active_sidebar( 'tribe_event_sidebar' ) ) { ?>
                    <aside id="secondary" class="widget-area tribe-events-bottom-widget">
                        <?php dynamic_sidebar( 'tribe_event_sidebar' ); ?>
                    </aside>
                <?php } ?>

            </div>
        </div> <!-- row -->
    </div> <!-- events-area -->
 </div>

<?php else : ?>
<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'edubin' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>

	<div class="tribe-events-schedule tribe-clearfix">
		<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
		<?php if ( tribe_get_cost() ) : ?>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<nav class="tribe-events-nav-pagination" aria-label="<?php printf( esc_html__( '%s Navigation', 'edubin' ), $events_label_singular ); ?>">
			<ul class="tribe-events-sub-nav">
				<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
				<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
			</ul>
			<!-- .tribe-events-sub-nav -->
		</nav>
	</div>
	<!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<nav class="tribe-events-nav-pagination" aria-label="<?php printf( esc_html__( '%s Navigation', 'edubin' ), $events_label_singular ); ?>">
			<ul class="tribe-events-sub-nav">
				<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
				<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
			</ul>
			<!-- .tribe-events-sub-nav -->
		</nav>
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
<?php endif; ?>

