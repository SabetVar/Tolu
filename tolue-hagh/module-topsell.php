<?php

// Most Sell Courses
$topsellcourses = ThemexCourse::getTopSellCourses();
if($topsellcourses ) { ?>
		<div class="twelvecol column">
			<div class="regbox clearfix relcourse"> 
				<div class="reghead" > دوره های پر فروش </div>
				<div class="courses-listing clearfix">
					<?php 
					$counter=0;
					foreach($topsellcourses as $post) { 
					$counter++; ?>
					<div class="twocol column <?php if($counter% 6 == 0) { ?>last<?php } ?>">
						<?php get_template_part('loop', 'course'); ?>
					</div>
					<?php if($counter% 6 == 0) { ?> <div class="clear"></div> <?php } } wp_reset_query(); ?>	
				</div>
			</div>
		</div>
<?php } ?>