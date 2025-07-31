<?php
$courseid = $post->ID ;
$relteach = get_post_meta( $courseid , '_course_teachcourses', true);

$icount = 1 ;
if (class_exists('CoAuthorsIterator')) {
	$i = new CoAuthorsIterator();
	$icount = $i->count();
}

if( $relteach !='hidden' && $icount == 1 ) {	
	
	$getauthor = get_the_author_meta( 'ID' );
	$coursesTeacher = ThemexCourse::getTeacherCourses($getauthor , $courseid , 'rand' , '6');
	
	if($coursesTeacher ) {
		$authordata = get_userdata($getauthor);		
		$display_name = $authordata->first_name . ' ' .$authordata->last_name ; ?>
        <div class="regbox clearfix relcourse"> 
            <h4 class="reghead" > سایر دوره های استاد <?php echo $display_name ?> </h4>
            <div class="courses-listing clearfix">
                <?php 
                $counter=0;
                foreach($coursesTeacher as $post) { 
                $counter++; ?>
                <div class="twocol column <?php if($counter==6) { ?>last<?php } ?>">
                    <?php get_template_part('loop', 'course'); ?>
                </div>
                <?php } wp_reset_query(); ?>	
            </div>
        </div>
<?php }
 } ?>