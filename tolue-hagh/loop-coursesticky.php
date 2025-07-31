<?php ThemexCourse::initCourse($post->ID); ?>
<?php if(has_post_thumbnail()) { ?>
<div class="course-preview <?php echo ThemexCourse::$data['course']['status']; ?>-course">
	<div class="course-image">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal',['alt' => get_the_title() .' '. ThemexCourse::$data['course']['author']->full_name, 'title' => get_the_title()]); ?></a>
		<?php if(!empty(ThemexCourse::$data['course']['price']) && empty(ThemexCourse::$data['course']['plans']) && ThemexCourse::$data['course']['status']!='private') { ?>

		<?php } ?>
         <?php $excerpt = $post->post_excerpt; if($excerpt!=''){ ?>  
        <a href="<?php the_permalink(); ?>" class="imtitle"><?php echo $excerpt; ?></a>
        <?php }; ?>
	</div>
	<div class="course-meta">
		<header class="course-header">
			<h5 class="nomargin"><a href="<?php the_permalink(); ?>" class="ci ctitle"><?php the_title(); ?></a></h5>
            <?php list_multi_autors(); ?>


<?php if ( get_post_meta($post->ID, 'wpcf-curse_date', true) ) { ?>
<p class="ci curse_time">  زمان کلاس : <?php echo get_post_meta($post->ID, 'wpcf-curse_date', true); ?> </p>
<?php } ?>

<?php if ( get_post_meta($post->ID, 'wpcf-curse_date1', true) ) { ?>
<p class="ci curse_time num"> تعداد جلسات : <?php echo get_post_meta($post->ID, 'wpcf-curse_date1', true); ?> </p>
<?php } ?>

<?php if ( get_post_meta($post->ID, 'wpcf-curse_date2', true) ) { ?>
<p class="ci curse_cat"> <?php echo get_post_meta($post->ID, 'wpcf-curse_date2', true); ?> </p>
<?php } ?>
<?php if (!is_front_page()) { ?>
		<div class="course-price">
			<div class="corner-wrap">
				<div class="corner"></div>
				<div class="corner-background"></div>
			</div>
	
			<div class="price-text"><span> حضوری : </span><?php echo ThemexCourse::$data['course']['price']; ?></div>
            <div class="price-text"><span> مجازی : </span><?php echo ThemexCourse::$data['course']['pricev']; ?></div>
          
		</div>
        <?php } ?>  
		</header>
		<?php if(ThemexCourse::$data['rating']!='true' || ThemexCourse::$data['users_number']!='true' || ThemexCourse::$data['icon']!='true') { ?>
		<footer class="course-footer clearfix"> 
            <?php get_template_part('module', 'form'); ?>
			<?php if(ThemexCourse::$data['users_number']!='true') { ?>
            <div class="ho-icon">		
			<div class="course-users left"><?php echo count(ThemexCourse::$data['course']['users']); ?></div>
            <div class="course-users left"><?php echo count(ThemexCourse::$data['course']['usersb']); ?></div>
            </div>
            <div class="vir-icon">
            <div class="course-users course-usersv left"><?php echo count(ThemexCourse::$data['course']['usersv']); ?></div>
            <div class="course-users course-usersv left"><?php echo count(ThemexCourse::$data['course']['usersvb']); ?></div>
            </div>
            <div class="clear"></div>            
			<?php } ?>
			<?php if(ThemexCourse::$data['rating']!='true') { ?>
			<?php get_template_part('module', 'rating'); ?>
			<?php } ?>
            <?php if(ThemexCourse::$data['icon']!='true') { ?>
            <?php $statusclass= get_post_meta($post->ID, '_course_statusclass', true); ?>
            	<?php if ( $statusclass == 'on') { ?>
                
                      <div class="incurse button"><a href="<?php the_permalink(); ?>" class="ci ctitle">جزئیات و ثبت نام</a></div>
                    

            	<?php } elseif ( $statusclass == 'live') { ?>
                     <div class="incurse button"><a href="<?php the_permalink(); ?>" class="ci ctitle play">در حال برگزاری</a></div>
				<?php } elseif ( $statusclass == 'off'){ ?>
                    <div class="incurse button"><a href="<?php the_permalink(); ?>" class="ci ctitle done">برگزار شده</a></div>
                <?php }  ;?>
			 
			<?php };?>
                    
                <?php if ( get_post_meta($post->ID, '_course_term2title', true) && get_post_meta($post->ID, '_course_term2link', true) ) { ?>
                      <div class="incurse button show"><a href="http://<?php echo get_post_meta($post->ID, '_course_term2link', true) ?>" class="ci ctitle"><?php echo get_post_meta($post->ID, '_course_term2title', true) ?></a></div>
                <?php } ?>
                
                <?php if ( get_post_meta($post->ID, '_course_term3title', true) && get_post_meta($post->ID, '_course_term3link', true) ) { ?>
                      <div class="incurse button show"><a href="http://<?php echo get_post_meta($post->ID, '_course_term3link', true) ?>" class="ci ctitle"><?php echo get_post_meta($post->ID, '_course_term3title', true) ?></a></div>
                <?php } ?> 

                <?php if ( get_post_meta($post->ID, '_course_term4title', true) && get_post_meta($post->ID, '_course_term4link', true) ) { ?>
                      <div class="incurse button show"><a href="http://<?php echo get_post_meta($post->ID, '_course_term4link', true) ?>" class="ci ctitle"><?php echo get_post_meta($post->ID, '_course_term4title', true) ?></a></div>
                <?php } ?>                 
		</footer>
		<?php } ?>
	</div>
</div>

<?php } ?>
