<?php get_header(); ?>
<div class="course-content clearfix <?php if((!ThemexCourse::isMember()) && !ThemexCourse::isMemberv() && !ThemexCourse::isMemberb() && !ThemexCourse::isMembervb() && !ThemexCourse::isAuthor()) { ?>popup-container<?php } ?>">	
	<div class="course-class sevencol column">
    	<div class="regbox">            
        <?php  $butttextclass = 'کلاس های دوره ' . get_the_title() ;
            $butttextclassr = ThemexCourse::$data['course']['butttextclass'] ;
            if ($butttextclassr !=''){$butttextclass = $butttextclassr; } 
         ?>
         	<h2 class="reghead"><?php  echo $butttextclass;?></h2>
			<?php if(!empty(ThemexCourse::$data['course']['lessons'])) { ?>                 
            <?php if(ThemexCourse::isMember() || ThemexCourse::isMemberv() || ThemexCourse::isMemberb() || ThemexCourse::isMembervb()  ) { ?>
            <?php get_template_part('module', 'progress'); ?>
            <?php } ?>
            <div class="lessons-listing">
                <?php
				$lessnumber =0; 
                foreach(ThemexCourse::sortLessons(ThemexCourse::$data['course']['lessons']) as $lesson) {
					$lessnumber++;
					include(locate_template('loop-lesson.php'));
                }
                ?>
            </div>
            <?php } else { ?>
            	<div class="nocomment"> در حال حاضر کلاسی برای این دوره وجود ندارد </div>
            <?php } ?>
        </div>
	</div>
    
   <?php /* ummu Delete Course Questions
   
	<div class="course-questions fivecol column last">
    	<div class="regbox">    
			<?php if($questions=ThemexCourse::getQuestions()) { ?>
            <h4 class="reghead"><?php echo 'سوالات دانشجویان '. get_the_title() ;?></h4>
            <ul class="styled-list style-2 bordered">
                <?php foreach($questions as $question) {?>
                <li><a href="<?php echo get_comment_link($question->comment_ID); ?>"><?php echo get_comment_meta($question->comment_ID, 'title', true); ?></a></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
	</div>
	
	*/ ?>
    
    <div class="course-comment fivecol column last">
    	<div class="regbox">
            <h4 class="reghead"><?php echo 'نظرات دانشجویان '. get_the_title() ;?></h4>    
            	<?php comments_template('/coursecomment.php'); ?>
        </div>
	</div>    
    
</div>
<!-- /course content -->
<div class="popup hidden">
	<h2 class="popup-text">
	<?php if(ThemexCourse::isSubscriber()) { ?>
	<?php _e('Take the course to view this content', 'academy').''; ?>
	<?php } else { ?>
	<?php _e('Take the course to view this content', 'academy').''; ?>
	<?php } ?>
	</h2>
</div>
<!-- /popup -->
<?php get_template_part('module', 'related'); ?>
<?php //get_template_part('module', 'relatedTeacher'); ?>
<?php get_template_part('module', 'topsell'); ?>
<?php get_footer(); ?>