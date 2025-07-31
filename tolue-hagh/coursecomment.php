<?php if(have_comments() || comments_open()) { ?>
<div class="questions clearfix" id="comments">
	<?php if(have_comments()) { ?>		
	<div class="questions-listing toggles-wrap">
		<ul>
			<?php
			wp_list_comments(array(
									'per_page'=>-1,
									'avatar_size'=>75,
									'max_depth'=> 2,
									'callback'=>array('ThemexCourse','renderCourseComment'),
									)
							); 
			?>
		</ul>
	</div>
	<?php } else { ?>
     <div class="nocomment"> هنوز نظری ارسال نشده </div>
    <?php } ?>
	<?php if(comments_open() && ThemexUser::userActive() && (ThemexCourse::isMember() || ThemexCourse::isMemberv() || ThemexCourse::isMemberb() || ThemexCourse::isMembervb() || ThemexCourse::isAuthor())) {
		
		$args = array( 
						'label_submit'      => __( 'ارسال نظر' ),
					)
		 ?>
    
	<div class="question-form column last">
    	<div class="comment_des"> دانشجوی گرامی، لطفا پس از طی کامل این دوره آموزشی، در یک جمله نظر خود را در خصوص این دوره ارائه بفرمایید. <span class="inlineicon flashdown"></span></div>
		<?php comment_form($args); ?>
	</div>
    
	<?php } ?>
</div>

<?php } else { ?>
     <div class="nocomment"> هنوز نظری ارسال نشده </div>
<?php } ?>