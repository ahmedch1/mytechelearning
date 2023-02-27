<?php
/**
 * Content-course.php template file
 *
 * responsible for content on archive like pages. Only shows the course excerpt.
 *
 * For single course content please see single-course.php
 *
 * @author      Automattic
 * @package     Sensei
 * @category    Templates
 * @version     3.13.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

   $defaults = edubin_generate_defaults();
   $sensei_course_archive_style = get_theme_mod( 'sensei_course_archive_style', $defaults['sensei_course_archive_style']); 

   if ($sensei_course_archive_style == '5') :        
      get_template_part( 'sensei/tpl-part/layout', '5'); 
   elseif ($sensei_course_archive_style == '4') :        
      get_template_part( 'sensei/tpl-part/layout', '4'); 
   elseif ($sensei_course_archive_style == '3') :
      get_template_part( 'sensei/tpl-part/layout', '3'); 
   elseif ($sensei_course_archive_style == '2') :
      get_template_part( 'sensei/tpl-part/layout', '2');
   else :       
      get_template_part( 'sensei/tpl-part/layout', '1');        
   endif; //End course style

?>
