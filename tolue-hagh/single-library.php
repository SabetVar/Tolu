<?php get_header(); ?>

<div class="sixcol column"> 
<?php comments_template(); ?>
</div>

<div class="sixcol column last"> 
		<?php if ($courses=ThemexCourse::getRelatedLibrary($post->ID)) { ?>
   		 <h1><?php _e('کتاب های مرتبط', 'academy'); ?></h1>
   		 <div class="courses-listing clearfix">
        <?php 
        $counter=0;
        foreach($courses as $post) { 
        $counter++;
        ?>
        <div class="sixcol column <?php if($counter==2 || $counter==4 ) { ?>last<?php } ?>">
            <?php get_template_part('loop', 'library'); ?>
        </div>
        <?php }	wp_reset_query(); ?>	
        </div>
        <?php } ?>
</div>

<?php get_footer(); ?>