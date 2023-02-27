
<?php 
global $post; 
$post_id = $post->ID;

$description   = get_post_meta( $post_id, '_learndash_course_grid_short_description', true );


 ?>
<?php if ($description ) : ?>

<p class="course__excerpt">
    <?php echo $description; ?>   
</p>
<?php else: ?>

<p class="course__excerpt">
    <?php echo wp_kses_post( get_the_excerpt() ); ?>
</p>
<?php endif; ?>