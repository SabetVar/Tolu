<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php printf(" با سلام، حساب کاربری شما در سایت موسسه طلوع حق با موفقیت ایجاد شد. <br> نام کاربری شما در سایت : <strong>%s</strong>", esc_html( $user_login ) ); ?></p>
<?php 
$userinfo = get_user_by( 'login', $user_login ) ; 
$user_id = $userinfo -> ID ; 
?>
<p><?php _e(' شما میتوانید از طریق لینک ذیل به حساب کاربری خود در سایت موسسه طلوع وارد شوید:'); ?> </p>
<p>
<a href="<?php echo get_author_posts_url($user_id); ?>" style="font-weight:normal;text-align: center;display: block;margin: 20px;padding: 5px 10px;background: #ae3f3f;color: #fff;text-decoration: none;border-radius: 5px;">
			<?php _e( 'ورود به پروفایل کاربری', 'woocommerce' ); ?></a>
</p>

<?php do_action( 'woocommerce_email_footer', $email );
