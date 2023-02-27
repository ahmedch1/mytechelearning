
<?php
/**
 * Template for displaying search forms in Edubin
 *
 * @package Edubin
 * Version: 1.0.0
 */

?>

<?php $unique_id = esc_attr(uniqid('search-form-'));?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="<?php echo esc_attr($unique_id); ?>">
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'edubin'); ?></span>
        <input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'edubin'); ?>" value="<?php get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text">
            <?php echo _x('Search', 'submit button', 'edubin'); ?>
        </span>
        <i class="flaticon-zoom" aria-hidden="true"></i>
    </button>
</form>
