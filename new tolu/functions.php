<?php
// Theme functions file.

function toluehagh_bootstrap_enqueue_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('custom', get_template_directory_uri().'/assets/css/custom.css', array('bootstrap'));
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'toluehagh_bootstrap_enqueue_scripts');

