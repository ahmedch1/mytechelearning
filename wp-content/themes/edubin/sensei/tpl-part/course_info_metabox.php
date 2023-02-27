<ul class="course-info-list remove__b_top">

    <?php
        $sensei_custom_feature_group = get_post_meta(get_the_ID(), 'sensei_custom_feature_group', true);
        if ($sensei_custom_feature_group): ?>
            <?php
            foreach ((array) $sensei_custom_feature_group as $key => $entry) {?>

                    <li>
                        <?php if (isset($entry['sensei_custom_feature_group_icon'])): ?>
                            <i class="fa <?php echo esc_html($entry['sensei_custom_feature_group_icon']); ?>"></i>
                        <?php else: ?>
                            <i class="fas fa-play-circle"></i>
                        <?php endif;?>

                        <?php if (isset($entry['sensei_custom_feature_group_label'])): ?>
                            <span class="label"><?php echo esc_html($entry['sensei_custom_feature_group_label']); ?> <?php echo esc_attr( ':' ); ?></span>
                        <?php endif;?>
                        <?php if (isset($entry['sensei_custom_feature_group_value'])): ?>
                            <span class="value"><?php echo esc_html($entry['sensei_custom_feature_group_value']); ?></span>
                        <?php endif;?>
                    </li>

                <?php
                    }
            endif;
            ?>
</ul>