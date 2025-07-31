<div class="lesson-item <?php if($GLOBALS['lesson']->post_parent!=0) { ?>lesson-child<?php } ?> <?php if((ThemexCourse::isMember() || ThemexCourse::isMemberv() || ThemexCourse::isMemberb() || ThemexCourse::isMembervb() ) && ThemexCourse::isCompletedLesson($GLOBALS['lesson']->ID)) { ?>completed<?php } ?>">
	<div class="lesson-title">
		<?php if($GLOBALS['lesson']->_lesson_status=='free') { ?>
		<div class="course-status"><?php _e('Free', 'academy'); ?></div>
		<?php } ?>
		<h4 class="nomargin"><a href="<?php echo get_permalink($GLOBALS['lesson']->ID); ?>" class="<?php if($GLOBALS['lesson']->_lesson_status=='free') { ?>no-popup<?php } ?>"><?php echo get_the_title($GLOBALS['lesson']->ID); ?></a></h4>
		<?php if((ThemexCourse::isMember() || ThemexCourse::isMemberv() || ThemexCourse::isMemberb() || ThemexCourse::isMembervb() ) && $GLOBALS['lesson']->_lesson_quiz && ThemexCourse::getLessonMark($GLOBALS['lesson']->ID)) { ?>
		<?php ThemexCourse::$data['course']['progress']=ThemexCourse::getLessonMark($GLOBALS['lesson']->ID); ?>
		<?php get_template_part('module', 'progress'); ?>
		<?php } ?>		
	</div>
	<?php if($attachments=ThemexCore::parseMeta($GLOBALS['lesson']->ID, 'lesson', 'attachments')) { ?>
	<div class="lesson-attachments">
		<?php
		$attnumber = 0 ;
		$limitnumb = 5 ;
		$p_content = '';
		foreach($attachments as $attachment) {			
			if($attachment['url']!='') {
			$attnumber++;
                 
                $p_content .= '<li>';                   
                $p_content .= '<a href="' . get_permalink($GLOBALS['lesson']->ID) .'#'.$attnumber .'" class="' ;
				
				if($GLOBALS['lesson']->_lesson_status=='free') { 
					$p_content .= ' no-popup';
				}
				$p_content .='">';
				$p_content .= '<span class="cir numb">'. $attnumber .'</span>';
				$p_content .= '<span class="cir type '. $attachment['type'] .'"></span>';
				$p_content .= '<span class="togtext">'. $attachment['title'] .'</span>' ;
                $p_content .= '</a></li>';
                
              
		?>
		<?php 
			}
		}
			if( $lessnumber == 1){ $expanded = 'expanded';} else {$expanded ='';};
			echo '<ul class="toggle-container faq-toggle ' . $expanded .' ">';
			echo '<span class="lesnumber toggle-title">' . $attnumber . ' بخش </span>' ;
			echo '<span class="toggle-content">'.$p_content.'</span>';
			echo '</ul>';

		?>
	</div>
	<?php } else { ?>
	<div class="lesson-title"></div>
	<?php } ?>
</div>