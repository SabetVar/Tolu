<?php
// Theme functions file.

function toluehagh_bootstrap_enqueue_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('custom', get_template_directory_uri().'/assets/css/custom.css', array('bootstrap'));
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'toluehagh_bootstrap_enqueue_scripts');

function toluehagh_bootstrap_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'toluehagh-bootstrap'),
    ));
}
add_action('after_setup_theme', 'toluehagh_bootstrap_setup');

function toluehagh_bootstrap_nav_menu_css_class($classes, $item, $args, $depth) {
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'toluehagh_bootstrap_nav_menu_css_class', 10, 4);

function toluehagh_bootstrap_nav_menu_link_attributes($atts, $item, $args, $depth) {
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        $atts['class'] = trim(($atts['class'] ?? '') . ' nav-link');
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'toluehagh_bootstrap_nav_menu_link_attributes', 10, 4);

