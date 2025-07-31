<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
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
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php printf( __( "ثبت نام شما تکمیل شد، مشخصات سفارش شما به شرح ذیل است:", 'woocommerce' ), get_option( 'blogname' ) ); ?></p>


<h2 style="text-align: right;font-family: tahoma,arial; font-size: 16px;"><?php echo __( 'شماره سفارش : ', 'woocommerce' ) . ' ' . $order->get_order_number(); ?></h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:center; border: 1px solid #eee;"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:center; border: 1px solid #eee;"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:center; border: 1px solid #eee;"><?php _e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( true, false, true ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:center; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<h2 style="text-align: center;font-family:tahoma,arial;font-size:16px;padding: 10px;border-radius: 5px;background: #0f9292;color: #fff;" >مشخصات دانشجو : </h2>

<?php if ($order->billing_first_name) : ?>
	<p><strong><?php _e( 'نام:', 'woocommerce' ); ?></strong> <?php echo $order->billing_first_name; ?></p>
<?php endif; ?>
<?php if ($order->billing_last_name) : ?>
	<p><strong><?php _e( 'نام خانوادگی:', 'woocommerce' ); ?></strong> <?php echo $order->billing_last_name; ?></p>
<?php endif; ?>
<?php if ($order->billing_email) : ?>
	<p><strong><?php _e( 'Email:', 'woocommerce' ); ?></strong> <?php echo $order->billing_email; ?></p>
<?php endif; ?>
<?php if ($order->billing_phone) : ?>
	<p><strong><?php _e( 'Tel:', 'woocommerce' ); ?></strong> <?php echo $order->billing_phone; ?></p>
<?php endif; ?>
<h2 style="text-align: right;font-family:tahoma,arial;font-size:16px;padding: 5px 15px;border-radius: 5px;background: #0f9292;color: #fff;display: inline-block;font-weight: normal;" >یادآوری : </h2>
<ul>
<li>در صورتی که مشخصات فوق صحیح نمیباشد، با مراجعه به پروفایل خود آن ها را ویرایش نمایید. شرکت در دوره، ارائه گواهی، اطلاع رسانی در خصوص دوره و ... از طریق این اطلاعات امکان پذیر میباشد.</li>
<?php 
$user_id = $order->user_id;
?>
<p>
<a href="<?php echo get_author_posts_url($user_id); ?>" style="font-weight:normal;text-align: center;display: block;margin: 20px;padding: 5px 10px;background: #ae3f3f;color: #fff;text-decoration: none;border-radius: 5px;">
<?php _e( 'ورود به پروفایل کاربری', 'woocommerce' ); ?></a>
</p>
<li>توجه داشته باشید در صورتی که پیامک های تبلیغاتی خود را بسته باشید امکان ارسال پیامک به شما وجود نخواهد داشت و تنها با مراجعه به ایمیل و صفحه دوره ثبت نام شده میتوانید اطلاعیه ها را مطالعه نمایید.</li>
</ul>

<?php
/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
