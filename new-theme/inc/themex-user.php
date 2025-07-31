<?php
class ThemexUser {
    public static function isLoginPage() {
        return is_page('login') || is_page('register');
    }
}
