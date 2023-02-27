
<?Php 
    // Render
    echo '<span class="price">';
        $wooproductID = get_post_meta(get_the_ID(), '_course_woocommerce_product', true);


        if($wooproductID != '-' && !empty($wooproductID)) { ?>
                <?php echo get_woocommerce_currency_symbol().get_post_meta($wooproductID, '_regular_price', true); ?>
        
            <?php
        } else { ?>
               <?php esc_html_e('Free' , 'edubin'); ?>
            <?php
        }
    echo '</span>';     
?>
