<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php
            if (function_exists('the_custom_logo') && has_custom_logo()) {
                the_custom_logo();
            } else {
                bloginfo('name');
            }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbar" aria-controls="primaryNavbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'toluehagh-bootstrap'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="primaryNavbar">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
                'fallback_cb' => '__return_false'
            ));
            ?>
            <form class="d-flex ms-lg-3" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input class="form-control me-2" type="search" placeholder="<?php esc_attr_e('Search', 'toluehagh-bootstrap'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                <button class="btn btn-outline-light" type="submit"><?php _e('Search', 'toluehagh-bootstrap'); ?></button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-3">
                <li class="nav-item">
                    <?php if (is_user_logged_in()) : ?>
                        <a class="nav-link" href="<?php echo esc_url(wp_logout_url()); ?>"><?php _e('Log out', 'toluehagh-bootstrap'); ?></a>
                    <?php else : ?>
                        <a class="nav-link" href="<?php echo esc_url(wp_login_url()); ?>"><?php _e('Log in', 'toluehagh-bootstrap'); ?></a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
