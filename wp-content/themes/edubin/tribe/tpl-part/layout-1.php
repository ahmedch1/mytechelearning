<?php

    $defaults = edubin_generate_defaults();
    $show_event_date = get_theme_mod( 'show_event_date', $defaults['show_event_date']);
    $show_event_time = get_theme_mod( 'show_event_time', $defaults['show_event_time']);
    $show_event_end_date = get_theme_mod( 'show_event_end_date', $defaults['show_event_end_date']);
    $show_event_vanue = get_theme_mod( 'show_event_vanue', $defaults['show_event_vanue']);
    $events_title_word = get_theme_mod( 'events_title_word', $defaults['events_title_word']);
    $events_columns = get_theme_mod( 'events_columns', $defaults['events_columns']);


    $date_format = get_theme_mod( 'edubin_events_date_format', $defaults['edubin_events_date_format']);
    $time_format = get_theme_mod( 'edubin_events_time_format', $defaults['edubin_events_time_format']);
    $date_separator = get_theme_mod( 'edubin_events_date_separator', $defaults['edubin_events_date_separator']);
    $time_separator = get_theme_mod( 'edubin_events_time_separator', $defaults['edubin_events_time_separator']);

    $event_id = get_the_ID();
    $start_date = tribe_get_start_time ( $event_id, $date_format);
    $end_date = tribe_get_end_time ( $event_id, $date_format);

    $start_time = tribe_get_start_date( null, false, $time_format );
    $end_time = tribe_get_end_date( null, false, $time_format );

    $event_vanue = tribe_get_venue();

?>

<div class="col-lg-<?php echo esc_attr($events_columns); ?>">
    <div class="edubin-single-event-addon">

            <?php 
               // if ( $ld_archive_media_show ) {
                    get_template_part( 'tribe/tpl-part/media'); 
              //  }
              // if ( $ld_cat_show ) {
                 // get_template_part( 'tribe/tpl-part/category'); 
              // }
            ?>
            <?php $cost = tribe_get_formatted_cost(); ?>
            <?php if (!empty($cost)): ?>
                    <div class="edubin-event-price-1">
                        <span><?php echo esc_html( $cost ); ?></span>
                    </div>
            <?php endif; ?>

        <div class="event-content-wrap">
            
        <div class="event-meta-wrap">
             <?php if($show_event_date || $show_event_end_date ) : ?>
                <?php if(!empty($start_date || $end_date)) : ?>
                <span><i class="far fa-calendar-alt"></i> <?php echo $start_date; ?> <?php if($end_date && $show_event_end_date ) : ?> <?php echo esc_attr( $date_separator ); ?> <?php echo $end_date; ?> <?php endif; ?></span>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(!empty($show_event_time )) : ?>
            <span><i class="far fa-clock"></i> <?php echo $start_time; ?> <?php if($end_time) : ?> <?php echo esc_attr( $time_separator ); ?> <?php echo $end_time; ?> <?php endif; ?></span>
            <?php endif; ?>

        </div>

        <a href="<?php the_permalink(); ?>"><h4><?php echo wp_trim_words(get_the_title(), $events_title_word, ''); ?></h4></a>

             <?php if(!empty($event_vanue) && $show_event_vanue ) : ?>
                <span><i class="fas fa-map-marker-alt"></i> <?php echo $event_vanue; ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>