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

        <?php $potitle = get_the_title($post->ID); ?>

			<h5 class="nomargin"><a href="<?php the_permalink(); ?>" class="ci ctitle"><?php echo $potitle; ?></a></h5>

            <?php list_multi_autors(); ?>





<?php if ( get_post_meta($post->ID, 'wpcf-curse_date', true) ) { ?>

<p class="ci curse_time">  زمان کلاس : <?php echo get_post_meta($post->ID, 'wpcf-curse_date', true); ?> </p>

<?php } ?>



<?php if ( get_post_meta($post->ID, 'wpcf-curse_date1', true) ) { ?>

<p class="ci curse_time num"> تعداد جلسات : <?php echo get_post_meta($post->ID, 'wpcf-curse_date1', true); ?> </p>

<?php } ?>



<?php if ( get_post_meta($post->ID, 'wpcf-curse_date2', true) ) { ?>

<p class="ci curse_time"> زمان کلاس : <?php echo get_post_meta($post->ID, 'wpcf-curse_date2', true); ?> </p>

<?php } ?>



		<div class="course-price">

		  	<div class="corner-wrap">

				<div class="corner"></div>

				<div class="corner-background"></div>

			</div>



            <div class="price-text"><span> حضوری : </span><?php echo ThemexCourse::$data['course']['price']; ?></div>

		</div>

        

		</header>

		<?php if(ThemexCourse::$data['rating']!='true' || ThemexCourse::$data['users_number']!='true' || ThemexCourse::$data['icon']!='true') { ?>

		<footer class="course-footer clearfix">

			<?php if(ThemexCourse::$data['users_number']!='true') { ?>		

			<div class="course-users left"><?php echo count(ThemexCourse::$data['course']['users']); ?></div>

			<?php } ?>

<?php if(ThemexCourse::$data['rating']!='true') { ?>

			<?php get_template_part('module', 'rating'); ?>

			<?php } ?>

            <?php if(ThemexCourse::$data['icon']!='true') { ?>

            <?php $statusclass= get_post_meta($post->ID, '_course_statusclass', true); ?>

            	<?php if ( $statusclass == 'on') { ?>

                	<div class="icon onclass" title="در حال ثبت نام" ></div>

            	<?php } elseif ( $statusclass == 'live') { ?>

				     <div class="icon liveclass" title="در حال برگزاری" ></div>

				<?php	} elseif ( $statusclass == 'off'){ ?>

                	<div class="icon offclass" title="برگزار شده" ></div>

                <?php }  ;?>

			 

			<?php };?>

		</footer>

		<?php } ?>

	</div>

</div>

<?php } ?>