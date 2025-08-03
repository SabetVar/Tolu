<?php
require_once get_template_directory() . "/inc/themex-styler.php";
require_once get_template_directory() . "/inc/themex-user.php";
function newtheme_setup() {
    load_theme_textdomain( 'new-theme', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    register_nav_menus( array(
        'main_menu'     => __( 'Main Menu', 'new-theme' ),
        'footer_menu'   => __( 'Footer Menu', 'new-theme' ),
        'social_footer' => __( 'Social Footer Menu', 'new-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'newtheme_setup' );

function newtheme_customize_register( $wp_customize ) {
    $wp_customize->add_section(
        'newtheme_theme_options',
        [
            'title'    => __( 'Theme Options', 'new-theme' ),
            'priority' => 30,
        ]
    );
    $control = $wp_customize->get_control( 'custom_logo' );
    if ( $control ) {
        $control->section     = 'newtheme_theme_options';
        $control->height      = 100;
        $control->width       = 300;
        $control->flex_height = true;
        $control->flex_width  = true;
    }
}
add_action( 'customize_register', 'newtheme_customize_register' );

function newtheme_enqueue_scripts() {
    $dir = get_template_directory_uri();
    $path = get_template_directory();
    wp_enqueue_style(
        'newtheme-tailwind',
        $dir . '/css/tailwind-output.css',
        array(),
        file_exists( $path . '/css/tailwind-output.css' ) ? filemtime( $path . '/css/tailwind-output.css' ) : null
    );
    if ( is_rtl() ) {
        wp_enqueue_style(
            'newtheme-tailwind-rtl',
            $dir . '/css/tailwind-output-rtl.css',
            array( 'newtheme-tailwind' ),
            file_exists( $path . '/css/tailwind-output-rtl.css' ) ? filemtime( $path . '/css/tailwind-output-rtl.css' ) : null
        );
    }
}
add_action( 'wp_enqueue_scripts', 'newtheme_enqueue_scripts' );
