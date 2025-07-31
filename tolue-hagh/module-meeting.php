<?php the_post(); ?>
<?php ThemexCourse::initCourse($post->ID); ?>
<div class="threecol column">
<?php get_template_part('loop','meeting'); ?>
</div>
<?php if( get_post_meta(ThemexCourse::$data['meeting']['ID'], '_meeting_stuview', true)!='hidden' && (ThemexCourse::hasMembers() || ThemexCourse::hasMembersv() || ThemexCourse::hasMembersb() || ThemexCourse::hasMembersvb() )  ) { ?>
<div class="sixcol column">
<?php } else { ?>
<div class="ninecol column last">
<?php } ?>
	<div class="course-description widget <?php echo ThemexCourse::$data['meeting']['status']; ?>-course">
		<div class="widget-title"><h4 class="nomargin"><?php _e('Description', 'academy'); ?></h4></div>
		<div class="widget-content">
        
			<?php	the_content(); ?>
            
            			
			<footer class="course-footer">
			<?php get_template_part('module', 'form'); ?>
			</footer>			
		</div>						
	</div>
</div>
<div class="threecol column last">
<?php get_template_part('module', 'users'); ?>
</div>
<?php if($attachments=ThemexCore::parseMeta($post->ID, 'course', 'notif')) { ?>
<div class="twelvecol column">
	<div class="course-notif widget <?php echo ThemexCourse::$data['meeting']['status']; ?>-course">
		<div class="widget-title"><h4 class="nomargin"><?php _e('اطلاعیه های دوره', 'academy'); ?></h4></div>
		<div class="widget-content">
        	
            <ul>
            <?php $in= count($attachments); foreach( array_reverse($attachments) as $attachment) { ?>
			<li class="cource-notif">
				<div class="not-num"> <div> <?php echo $in; ?></div>  </div><div class="not-des"><?php echo stripslashes($attachment['title']);?></div>
                <div class="clear"></div>
            </li>
			<?php $in--; } ?>
            </ul>
       
        </div>
    </div>
</div>
<?php } ?>