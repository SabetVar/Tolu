<?php get_header(); ?>

<?php the_post(); ?>
<?php $statusclass= get_post_meta($post->ID, '_lesson_fullclass', true);
	$valskys=get_post_meta($post->ID,'_lesson_skyenable',true);

if ($valskys == 'yes'){ 
	
	$skyID=get_post_meta($post->ID,'_lesson_skylesson',true);
	$args = array('room_id'=>$skyID);
	$contentshow = skyrcall('getLoginUrl',$args);
	
	if(isset($contentshow['error_code'])){
		$fcontent ='<p>کد خطا : '.$contentshow['error_code'].'</p>';
		$fcontent .='<p>متن خطا : '.$contentshow['error_message'].'</p>';

	} else {
		
		$contentshow_res=$contentshow['result'];
		$fcontent = '<iframe style="width:100%; height:100vh;" src="'.$contentshow_res.'" width="100%" height="100%" frameborder="0" allowFullScreen="true" allow="autoplay;fullscreen;speaker;microphone;camera;display-capture"></iframe>';
	}	
?>
	<div class="twelvecol column">
		<div class="regbox">
			<h2 class="reghead"><?php the_title(); ?></h2>
			<?php echo $fcontent ;?>
		</div>
	</div>
	<div class="twelvecol column">
			<a href="<?php echo get_permalink($post->_lesson_course); ?>" title="<?php _e('Close Lesson', 'academy'); ?>" class="button close-lesson secondary " style="margin: auto; display: block;max-width: 120px;">  <span> 
			<span class="button-icon close"></span>بستن درس
			</span></a>
	</div>	
	
<?php
} elseif ($statusclass == 'fullwidth') { ?>
<div class="twelvecol column">
	<div class="regbox">
        <h2 class="reghead"><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
</div>
<div class="twelvecol column">
		<a href="<?php echo get_permalink($post->_lesson_course); ?>" title="<?php _e('Close Lesson', 'academy'); ?>" class="button close-lesson secondary " style="margin: auto; display: block;max-width: 120px;">  <span> 
		<span class="button-icon close"></span>بستن درس
		</span></a>
</div>


	 <?php } else { ?>
<div class="eightcol column">
	<div class="regbox">
        <h2 class="reghead"><?php the_title(); ?></h2>	<?php the_content(); ?>
		<?php comments_template('/questions.php'); ?>
    </div>
</div>
<aside class="sidebar fourcol column last">
	<?php get_template_part('sidebar', 'lesson'); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>