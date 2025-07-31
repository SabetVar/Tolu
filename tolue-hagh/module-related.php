<?php if(ThemexCourse::$data['related']!='true' && ($courses=ThemexCourse::getRelatedCourses($post->ID))) { ?>
<div class="regbox clearfix relcourse"> 
    <h4 class="reghead" ><?php _e('Related Courses', 'academy'); ?></h4>
    <div class="courses-listing clearfix">
        <?php 
        $counter=0;
        foreach($courses as $post) { 
        $counter++;
        ?>
        <div class="twocol column <?php if($counter==6) { ?>last<?php } ?>">
            <?php get_template_part('loop', 'course'); ?>
        </div>
        <?php }	wp_reset_query(); ?>	
    </div>
</div>
<?php } ?>