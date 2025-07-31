<?php if(have_comments() || comments_open()) { ?>
<div class="questions clearfix" id="comments">
	<h3 class="reghead"><?php _e('Questions', 'academy'); ?></h3>
	<?php if(have_comments()) { ?>		
	<div class="questions-listing toggles-wrap">
		<ul>
			<?php
			wp_list_comments(array(
				'per_page'=>-1,
				'avatar_size'=>75,
				'callback'=>array('ThemexCourse','renderQuestion'),
			)); 
			?>
		</ul>
	</div>
	<?php } ?>
	<?php if(comments_open() && ThemexUser::userActive() && (ThemexCourse::isMember() || ThemexCourse::isMemberv() || ThemexCourse::isMemberb() || ThemexCourse::isMembervb() || ThemexCourse::isAuthor())) {
		$args = array( 'label_submit'      => __( 'ارسال' ),
		) ?>
    
	<div class="question-form twelvecol column last">
        <p class="comment_des"> از طریق فرم زیر میتوانید نظر و یا سوالات خود در خصوص این کلاس از دوره را با سایر دانشجویان در میان بگذارید. <span class="inlineicon flashdown"></span></p>
		<?php comment_form($args); ?>
	</div>
	<?php } ?>
</div>
<?php } ?>