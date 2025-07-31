<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php _e( 'درخواست تغییر رمز عبور نام کاربری ذیل در سایت موسسه ثبت شده است:', 'woocommerce' ); ?></p>
<p><?php printf( __( 'نام کاربری: %s', 'woocommerce' ), $user_login ); ?></p>
<p><?php _e( 'در صورتی که این درخواست توسط شما صادر نشده است، این ایمیل را نادیده بگیرید.', 'woocommerce' ); ?></p>
<p><?php _e( 'در غیر اینصورت، برای ایجاد رمز عبور جدید به آدرس ذیل مراجعه فرمایید و رمز عبور جدید خود را وارد نمایید:', 'woocommerce' ); ?></p>
<p>
            
	<a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>" style="font-weight:normal;text-align: center;display: block;margin: 20px;padding: 5px 10px;background: #ae3f3f;color: #fff;text-decoration: none;border-radius: 5px;">
			<?php _e( 'برای ریست کردن رمز عبور خود اینجا را کلیک کنید', 'woocommerce' ); ?></a>
</p>
<p></p>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
