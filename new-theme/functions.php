<?php
require_once get_template_directory() . "/inc/themex-styler.php";
require_once get_template_directory() . "/inc/themex-user.php";
function newtheme_setup() {
    load_theme_textdomain( 'new-theme', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'main_menu'     => __( 'Main Menu', 'new-theme' ),
        'footer_menu'   => __( 'Footer Menu', 'new-theme' ),
        'social_footer' => __( 'Social Footer Menu', 'new-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'newtheme_setup' );

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
