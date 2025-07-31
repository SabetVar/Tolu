<?php the_post(); ?>
<?php ThemexCourse::initCourse($post->ID); ?>
<div class="threecol column">
<?php get_template_part('loop','library'); ?>
</div>
<div class="sixcol column">
	<div class="course-description widget <?php echo ThemexCourse::$data['course']['status']; ?>-course">
		<div class="widget-title"><h4 class="nomargin"><?php _e('Description', 'academy'); ?></h4></div>
		<div class="widget-content">
			<?php the_content(); ?>			
		</div>						
	</div>
</div>
<div class="threecol column last">
<?php if($attachments=ThemexCore::parseMeta($post->ID, 'library', 'attachments')) { ?>
<div class="widget sidebar-widget">
	<div class="widget-title"><h4 class="nomargin"><?php _e('دانلود الحاقات', 'academy'); ?></h4></div>
	<div class="widget-content">
		<ul class="styled-list style-4">
			<?php foreach($attachments as $attachment) { ?>
			<a class="at-s" href="<?php echo $attachment['url']; ?>"><li class="librar-at <?php echo $attachment['type']; ?>">
                <div> 
					<?php echo $attachment['title'];?>
                </div>
            </li></a>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?></div>