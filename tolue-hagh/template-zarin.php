<?php
/*
Template Name: zarin-comp
*/
?>
<?php 

if(ThemexUser::userActive()) { 

	$homepg=ThemexUser::$data['profile_page_url'];	
	header("Location: $homepg",TRUE,301);
	
} else {
	$homepg=get_bloginfo('url');
	header("Location: $homepg",TRUE,301);
	
}
?>
<?php get_header();
if ( function_exists( 'check_zarinpalwg_response' ) ) {
check_zarinpalwg_response();
}
 ?>
<?php the_post(); ?>
<?php the_content(); ?>
<?php get_footer(); ?>