<?php
/*
Template Name: Right Sidebar
*/
?>
<?php get_header(); ?>
<div class="column eightcol">
<?php the_post(); ?>
<?php the_content(); ?>
</div>
<aside id="sidebar" class="sidebar column fourcol last">
<?php get_sidebar(); ?>
</aside>
<?php get_template_part('module', 'topsell'); ?>
<?php get_footer(); ?>