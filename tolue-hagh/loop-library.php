<?php ThemexCourse::initCourse($post->ID); ?>
<?php if(has_post_thumbnail()) { ?>
<div class="course-preview <?php echo ThemexCourse::$data['course']['status']; ?>-course">
	<div class="course-image">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal'); ?></a>
	</div>
	<div class="course-meta">
		<header class="course-header">
			<h5 class="nomargin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
 

<?php if ( get_post_meta($post->ID, '_library_bookau', true) ) { ?>
<p class="library aur">  نویسنده : <?php echo get_post_meta($post->ID, '_library_bookau', true); ?> </p>
<?php } ?>

<?php if ( get_post_meta($post->ID, '_library_bookcop', true) ) { ?>
<p class="library pub"> ناشر : <?php echo get_post_meta($post->ID, '_library_bookcop', true); ?> </p>
<?php } ?>

<?php if ( get_post_meta($post->ID, '_library_bookyear', true) ) { ?>
<p class="library year"> سال چاپ : <?php echo get_post_meta($post->ID, '_library_bookyear', true); ?> </p>
<?php } ?>
		</header>
		
	</div>
</div>
<?php } ?>