<?php if((!ThemexCourse::isCompletedCourse(0) || is_single()) ){ ?>
<div class="regbox progress">
<p class="progres-text"><span class="inlineicon flashdown"></span>درصد پیشرفت شما در کلاس های این دوره<span class="inlineicon flashdown"></span></p>
<div class="course-progress">
	<span style="width:<?php echo ThemexCourse::$data['course']['progress']; ?>%;"></span>
</div>
</div>
<?php } ?>