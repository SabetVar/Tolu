<?php
class ThemexStyler {
    public static function siteLogo() {
        if (function_exists('the_custom_logo') && has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '" rel="home">' . get_bloginfo('name') . '</a>';
        }
    }

    public static function pageBackground() {
        if (has_post_thumbnail()) {
            $url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            if ($url) {
                echo '<div class="substrate" style="background-image:url(' . esc_url($url) . ');"></div>';
            }
        }
    }

    public static function pageTitle() {
        if (is_singular()) {
            echo get_the_title();
        } else {
            echo wp_get_document_title();
        }
    }

    public static function siteCopyright() {
        echo '&copy; ' . date('Y') . ' ' . get_bloginfo('name');
    }
}
