<?php

   $level = learn_press_get_post_level( get_the_ID() );

   if ( ! $level ) {
      return;
   }
?>

<div class="course__level">

   <span class="lp-course-loop-level"><?php echo esc_html( $level ); ?></span>
</div>