<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-bg text-text'); ?>>
<?php wp_body_open(); ?>
<div class="site-wrap flex flex-col min-h-screen">
    <header class="bg-primary text-accent">
        <div class="container mx-auto flex items-center justify-between py-4">
            <div class="logo">
                <?php ThemexStyler::siteLogo(); ?>
            </div>
            <nav class="hidden md:block">
                <?php wp_nav_menu(array('theme_location' => 'main_menu', 'container_class' => 'menu flex space-x-4')); ?>
            </nav>
            <div class="flex items-center space-x-4">
                <div class="search-form hidden md:block">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </header>
    <div class="featured-content">
        <?php
        ThemexStyler::pageBackground();
        if (is_front_page() && !ThemexUser::isLoginPage()) {
            get_template_part('module', 'slider');
        } else {
        ?>
        <div class="container mx-auto">
            <?php if (function_exists('wc_print_notices')) : ?>
            <div class="woocommerce-notices-wrapper">
                <?php wc_print_notices(); ?>
            </div>
            <?php endif; ?>
            <?php
            if (get_post_type() == 'course' && is_single()) {
                get_template_part('module', 'course');
            } else if (get_post_type() == 'library' && is_single()) {
                get_template_part('module', 'library');
            } else if (get_post_type() == 'meeting' && is_single()) {
                get_template_part('module', 'meeting');
            } elseif (get_post_type() == 'plan' && is_single()) {
                get_template_part('module', 'plan');
            } else {
            ?>
            <div class="page-title">
                <h1 class="nomargin"><?php ThemexStyler::pageTitle(); ?></h1>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <div class="main-content flex-1">
        <div class="container mx-auto">
