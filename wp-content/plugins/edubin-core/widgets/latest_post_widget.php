<?php

class EdubinRecentPost extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'edubin_recent_post', 'description' => __( 'Your most recent posts, with optional excerpts', 'edubin-core') );
		parent::__construct('EdubinRecentPost', __('Edubin Recent Post', 'edubin-core'), $widget_ops);
	}
	
	
	function widget( $args, $instance ) {
			extract( $args );
			
			$title = apply_filters('widget_title', $instance['title']);
			
			echo $before_widget;
			if ( !empty($title) ) {

				echo $before_title.$title.$after_title;
			}
			$ul_classes = 'edubin_recent_post';
			$ul_classes = apply_filters('edubin_recent_post_list_classes', $ul_classes);
			if ( !empty( $ul_classes ) )
				$ul_classes = ' class="'.$ul_classes.'"';
			$li_classes = 'edubin_recent_post_list';
			$li_classes = apply_filters('edubin_recent_post_item_classes', $li_classes);
			if ( !empty( $li_classes ) )
				$li_classes = ' class="'.$li_classes.'"';
			$h2_classes = 'edubin_recent_post_title';
			$h2_classes = apply_filters('edubin_recent_post_heading_classes', $h2_classes);
			if ( !empty( $h2_classes ) )
				$h2_classes = ' class="'.$h2_classes.'"';
			
			do_action('edubin_recent_post_begin');
			echo '<ul'.$ul_classes.'>';
			
			// retrieve last n blog posts
			$q = array('posts_per_page' => $instance['numposts']);
			
			if (!empty($instance['ignore_sticky_posts'])) {
				$q["ignore_sticky_posts"] = $instance['ignore_sticky_posts'];
			}
			if (!empty($instance['cat'])) 
				$q['cat'] = $instance['cat'];
			if (!empty($instance['offset']) && $instance['offset'] > 0 )
				$q['offset'] = $instance['offset'];
			if (!empty($instance['tag'])) 
				$q['tag'] = $instance['tag'];
			$q = apply_filters('edubin_recent_post_query', $q, $instance);
			$rpwe = new wp_query($q);
			$excerpts = $instance['numexcerpts'];
			$date = apply_filters('edubin_recent_post_date_format', $instance['date']);
				  
			// the Loop
			if ($rpwe->have_posts()) :
			while ($rpwe->have_posts()) : $rpwe->the_post(); 
				echo '<li'.$li_classes.'>'; 
				if ($excerpts > 0 && $instance['thumbposition'] == 'above')
					echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail( get_the_id(), $instance['thumbsize']) .'</a>';
				
                echo '<h2'.$h2_classes.'><a href="'.get_permalink().'">'.wp_trim_words(get_the_title(), 15, '').'</a></h2>';

				if (!empty($date)) 
					echo '<span class="date">'.get_the_time($date).'</span>';
                
                if ($excerpts > 0) { // show the excerpt 
					if ( $instance['thumbposition'] == 'between')
						echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail( get_the_id(), $instance['thumbsize']) .'</a>';
					?>
				 <?php

					if ($excerpts > 0 && $instance['thumbposition'] == 'below')
						echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail( get_the_id(), $instance['thumbsize']) .'</a>';
						
                    $excerpts--;
		        }?></li>
			<?php endwhile; endif; ?>
			</ul>
			<?php
			do_action('edubin_recent_post_end');
			echo $after_widget;
			wp_reset_query();
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 				 = sanitize_text_field($new_instance['title']);
		$instance['numposts'] 			 = intval($new_instance['numposts']);
		$instance['ignore_sticky_posts'] = intval($new_instance['ignore_sticky_posts']);
		$instance['offset'] 			 = intval($new_instance['offset']);
		$instance['numexcerpts'] 		 = intval($new_instance['numexcerpts']);
		$instance['more_text'] 			 = sanitize_text_field($new_instance['more_text']);
		$instance['date'] 				 = sanitize_text_field($new_instance['date']);
		$instance['words'] 				 = '55';
		$instance['tags'] 				 = '<p><div><span><br><img><a><ul><ol><li><blockquote><cite><em><i><strong><b><h2><h3><h4><h5><h6>';
		$instance['cat'] 				 = intval($new_instance['cat']);
		$instance['tag'] 				 = sanitize_text_field($new_instance['tag']);
		$instance['thumb'] 				 = 0;
		$instance['thumbposition'] 		 = sanitize_text_field($new_instance['thumbposition']);
		$instance['thumbsize'] 			 = sanitize_text_field($new_instance['thumbsize']);
		return $instance;
	}

	function form( $instance ) {
		if (get_option('show_on_front') == 'page')
			$link = get_permalink(get_option('page_for_posts'));
		else 
			$link = home_url('/');

		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => __('Recent Posts', 'edubin-core'),
			'numposts' => 4,
			'ignore_sticky_posts' => 1,
			'numexcerpts' => 5,
			'date' => get_option('date_format'),
			'more_text' => __('more...', 'edubin-core'),
			'words' => '55',
			'tags' => '<p><div><span><br><img><a><ul><ol><li><blockquote><cite><em><i><strong><b><h2><h3><h4><h5><h6>',
			'cat' => 0,
			'tag' => '',
			'thumb' => 0,
			'thumbposition' => 'above',
			'thumbsize' => '',
			'offset' => 0 
		));
		?>  
      
       <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'edubin-core'); ?></label> 
       <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></p>

       <p><label for="<?php echo $this->get_field_id('numposts'); ?>"><?php _e('Number of posts to show:', 'edubin-core'); ?></label> 
       <input class="widefat" id="<?php echo $this->get_field_id('numposts'); ?>" name="<?php echo $this->get_field_name('numposts'); ?>" type="text" value="<?php echo $instance['numposts']; ?>" /></p>

		<p>
       <label for="<?php echo $this->get_field_id('ignore_sticky_posts'); ?>"><?php _e('Ignore sticky posts?', 'edubin-core'); ?></label>
       <input id="<?php echo $this->get_field_id('ignore_sticky_posts'); ?>" name="<?php echo $this->get_field_name('ignore_sticky_posts'); ?>" type="checkbox" <?php if ($instance['ignore_sticky_posts']) { ?> checked="checked" <?php } ?> />
       </p>
       <p><label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Offset By:', 'edubin-core'); ?></label> 
       <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $instance['offset']; ?>" /></p>
       
       <p>
       <p><label for="<?php echo $this->get_field_id('numexcerpts'); ?>"><?php _e('Number of excerpts to show:', 'edubin-core'); ?></label> 
       <input class="widefat" id="<?php echo $this->get_field_id('numexcerpts'); ?>" name="<?php echo $this->get_field_name('numexcerpts'); ?>" type="text" value="<?php echo $instance['numexcerpts']; ?>" /></p>
       
       <p>
       <label for="<?php echo $this->get_field_id('more_text'); ?>"><?php _e('"More" link text:', 'edubin-core'); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('more_text'); ?>" name="<?php echo $this->get_field_name('more_text'); ?>" type="text" value="<?php echo $instance['more_text']; ?>" />
       <br /><small><?php _e('Leave blank to omit "more" link', 'edubin-core'); ?></small>
       </p>

       <p>
       <label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Date format:', 'edubin-core'); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo $instance['date']; ?>" />
       <br /><small><?php _e('Leave blank to omit the date', 'edubin-core'); ?></small>
       </p>

       <p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Limit to category:', 'edubin-core'); ?>
       <?php wp_dropdown_categories(array('name' => $this->get_field_name('cat'), 'show_option_all' => __('None (all categories)'), 'hide_empty'=>0, 'hierarchical'=>1, 'selected'=>$instance['cat'])); ?></label></p>
       <p>
       <label for="<?php echo $this->get_field_id('tag'); ?>"><?php _e('Limit to tags:', 'edubin-core'); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text" value="<?php echo $instance['tag']; ?>" />
       <br /><small><?php _e('Enter post tags separated by commas ("cat,dog")', 'edubin-core'); ?></small>
       </p>
       <?php
       if (function_exists('the_excerpt_reloaded')) { ?>
       	<p>
        <label for="<?php echo $this->get_field_id('words'); ?>"><?php _e('Limit excerpt to how many words?', 'edubin-core'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('words'); ?>" name="<?php echo $this->get_field_name('words'); ?>" type="text" value="<?php echo $instance['words']; ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Allowed HTML tags:', 'edubin-core'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" type="text" value="<?php echo htmlspecialchars($instance['tags'], ENT_QUOTES); ?>" />
        <br /><small><?php 
		printf( __('E.g.: %s', 'edubin-core'), 
		'&lt;p&gt;&lt;div&gt;&lt;span&gt;&lt;br&gt;&lt;img&gt;&lt;a&gt;&lt;ul&gt;&lt;ol&gt;&lt;li&gt;&lt;blockquote&gt;&lt;cite&gt;&lt;em&gt;&lt;i&gt;&lt;strong&gt;&lt;b&gt;&lt;h2&gt;&lt;h3&gt;&lt;h4&gt;&lt;h5&gt;&lt;h6&gt;');
		?>
        </small></p>
	<?php } ?>
	<p>
       <label for="<?php echo $this->get_field_id('thumb'); ?>"><?php _e('Show featured images in excerpts?', 'edubin-core'); ?></label>
       <input id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>" type="checkbox" value="1" <?php checked($instance['thumb'], '1'); ?> />
       </p>

	<p><label for="<?php echo $this->get_field_id('thumbposition'); ?>"><?php _e('Featured image position:', 'edubin-core'); ?></label> 
		<select id="<?php echo $this->get_field_id('thumbposition'); ?>" name="<?php echo $this->get_field_name('thumbposition'); ?>">
			<option value="above" <?php selected('above', $instance['thumbposition']) ?>><?php _e('Above title', 'edubin-core'); ?></option>
			<option value="between" <?php selected('between', $instance['thumbposition']) ?>><?php _e('Between title and excerpt', 'edubin-core'); ?></option>
			<option value="below" <?php selected('below', $instance['thumbposition']) ?>><?php _e('Below excerpt', 'edubin-core'); ?></option>
		</select>
	</p>
	
	<p><label for="<?php echo $this->get_field_id('thumbsize'); ?>"><?php _e('Featured image size:', 'edubin-core'); ?></label> <br />
		<select id="<?php echo $this->get_field_id('thumbsize'); ?>" name="<?php echo $this->get_field_name('thumbsize'); ?>">
			<option value=""<?php selected( $instance['thumbsize'], '' ); ?>>&nbsp;</option>
			<?php
			global $_wp_additional_image_sizes;
	     	$sizes = array();
	 		foreach( get_intermediate_image_sizes() as $s ){
	 			//$sizes[ $s ] = array( 0, 0 );
	 			if( in_array( $s, array( 'thumbnail', 'medium', 'large' ) ) ){
	 				$sizes[ $s ][0] = get_option( $s . '_size_w' );
	 				$sizes[ $s ][1] = get_option( $s . '_size_h' );
	 			}else{
	 				if( isset( $_wp_additional_image_sizes ) && isset( $_wp_additional_image_sizes[ $s ] ) )
	 					$sizes[ $s ] = array( $_wp_additional_image_sizes[ $s ]['width'], $_wp_additional_image_sizes[ $s ]['height'], );
	 			}
	 		}

	 		foreach( $sizes as $size => $atts ){
	 			echo '<option value="'.$size.'" '. selected( $size, $instance['thumbsize'], false ).'>' . $size . ' (' . implode( 'x', $atts ) . ')</option>';
	 		}
			?>
		</select>
	</p>
	<?php	
	}
}

function edubin_recent_post_init() {
	register_widget('EdubinRecentPost');
}

add_action('widgets_init', 'edubin_recent_post_init');