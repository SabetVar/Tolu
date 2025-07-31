<div class="lesson-options">
    <div class="regbox clearfix">
        <h4 class="reghead"> تنظیمات درس  <?php the_title(); ?></h4>
		<?php get_template_part('module', 'progress'); ?>
        <form action="<?php the_permalink(); ?>" method="POST" class="sixcol column">
            <?php if(ThemexCourse::isCompletedLesson($post->ID)) { ?>
                <?php if(ThemexCore::getOption('course_retake')!='true') { ?>
                <a href="#" class="button finish-lesson submit-button"><span> درس را نخواندم </span></a>
                <input type="hidden" name="course_action" value="uncomplete" />
                <?php } ?>
            <?php } else if((ThemexCourse::isMember() || ThemexCourse::isMemberv() || ThemexCourse::isMemberb() || ThemexCourse::isMembervb() ) && ThemexCourse::isCompletedLesson($post->_lesson_prerequisite)) { ?>
                <?php if(is_singular('quiz')) { ?>
                <a href="#quiz_form" class="button finish-lesson submit-button"><span><span class="button-icon check"></span><?php _e('Complete Quiz', 'academy'); ?></span></a>		
                <?php } else if($post->_lesson_quiz) { ?>
                <a href="<?php echo get_permalink($post->_lesson_quiz); ?>" class="button finish-lesson"><span>
                    <span class="button-icon edit"></span><?php _e('Take the Quiz', 'academy'); ?>
                </span></a>
                <?php } else { ?>
                <div class="finish-lesson">
                    <a href="#" class="button submit-button"><span><span class="button-icon check"></span>درس را خواندم</span></a>
                    <input type="hidden" name="course_action" value="complete" />	
                </div>
                <?php } ?>
            <?php } ?>
            <input type="hidden" name="lesson_id" value="<?php echo $post->ID; ?>" />
            <input type="hidden" name="course_id" value="<?php echo $post->_lesson_course; ?>" />			
        </form>
        <div class="sixcol column last"><a href="<?php echo get_permalink($post->_lesson_course); ?>" title="<?php _e('Close Lesson', 'academy'); ?>" class="button close-lesson secondary ">  <span> 
            <span class="button-icon close"></span>بستن درس
        </span></a></div>
        <?php if($URL=ThemexCourse::getLessonURL($post->ID)) { ?>
        <div class="sixcol column"><a href="<?php echo $URL; ?>" title="<?php _e('Next Lesson', 'academy'); ?>" class="button next-lesson secondary"><span><span class="button-icon next "></span> درس بعدی </span></a></div>
        <?php } ?>
        <?php if($URL=ThemexCourse::getLessonURL($post->ID, false)) { ?>
        <div class="sixcol column last"><a href="<?php echo $URL; ?>" title="<?php _e('Previous Lesson', 'academy'); ?>" class="button prev-lesson secondary"><span>درس قبلی<span class="button-icon prev ">  </span>  </span></a></div>
        <?php } ?>
    </div>
</div>
<?php get_template_part('module', 'allattachments'); ?>
<?php get_template_part('module', 'attachments'); ?>
<?php get_template_part('module', 'lessons'); ?>