<?php get_header(); ?>
<?php echo category_description(); ?>
<div class="courses-listing clearfix">
	<?php 
	$counter=0;	
	while ( have_posts() ) {
	the_post();
	$counter++;
	?>
	<div class="column <?php echo ThemexCourse::$data['layout']; ?>col <?php echo $counter==ThemexCourse::$data['columns']?'last':''; ?>">
	<?php get_template_part('loop','library'); ?>
	</div>
		<?php if($counter==ThemexCourse::$data['columns']) { ?>
		<div class="clear"></div>
		<?php 
		$counter=0;
		}
	}
	?>
</div>
<?php ThemexInterface::renderPagination(); ?>
<?php get_footer(); ?>