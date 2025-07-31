<div class="curtop plantop">

	<?php the_post(); ?>
	<div class="eightcol column">
		
		<div class="course-description widget premium-course plan-description">
			<div class="widget-title"><h2 class="nomargin"> توضیحات  <?php the_title(); ?> </h2></div>

			<div class="widget-content">
				<?php 
					if(get_post_meta($post->ID,'_plan_stuview', true)=='show'){
						$users=ThemexCore::parseMeta($post->ID, $post->post_type, 'users');
						if(is_array($users)){ echo '<h5 class="usersplan">'.'تعداد دانشجویان : <span>'.count($users).'</span></h5>';}
					}
				?>
				<?php the_content();?>
			</div>					

		</div>


		<div class="course-description widget premium-course">

			<div class="widget-title"><h2 class="nomargin"> دوره های   <?php the_title(); ?> </h2></div>

			<div class="widget-content">
				<?php					
					$plancat=get_post_meta($post->ID, '_plan_category');
					echo do_shortcode( '[courses category="'.$plancat[0].'" number="50" columns="4" order="date"]');
				?>
			</div>
		</div>

	</div>
	
    <div class="threecol column last sticky plan-box">
		<?php get_template_part('loop','plan'); ?>
	</div>	
	
</div>