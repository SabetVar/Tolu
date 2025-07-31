<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
 
global $woocommerce;



if ($order) {

	

	$item=ThemexWoo::getRelatedItem($order->get_id());

	$itemv=ThemexWoo::getRelatedItemv($order->get_id());

	

	if($item!==false ) {

		

		$course_query=new WP_Query(array(

			'post_type'=>$item->post_type,

			'post__in'=>array($item->ID),

		));

		

	} else if ( $itemv!==false ) {

		

		$course_query=new WP_Query(array(

			'post_type'=>$itemv->post_type,

			'post__in'=>array($itemv->ID),

		));

	}

	

	if($course_query->have_posts()) : while($course_query->have_posts()) :

?>

<div class="column threecol">

	<div class="regbox">

		<h3 class="reghead"> مشخصات سفارش:</h1>

		<?php

			$course_query->the_post();

			

		if ( $itemv!==false && $itemv->post_type=='course') {

				get_template_part('loopv', $itemv->post_type);

		} else if ( $item!==false && $item->post_type=='course') {

                get_template_part('loops', $item->post_type);

		} else {

                get_template_part('loop', $item->post_type);

        }	

		?>

	</div>   

</div> 



<?php  

		endwhile;

	endif;

	wp_reset_postdata(); 

?>



	<div class="column fivecol">

    	<div class="regbox">



		<?php if($order){ ?>

			<?php if($order->has_status( 'failed')){ ?>

            <h3 class="reghead"><?php _e('Failure in Processing the Payment.', 'academy'); ?></h3>

				<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce'); ?></p>

				<p><?php

					if(is_user_logged_in())

						_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce');

					else

						_e( 'Please attempt your purchase again.', 'woocommerce');

				?></p>

				<p>

					<a href="<?php echo esc_url( $order->get_checkout_payment_url()); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce') ?></a>

					<?php if(is_user_logged_in()) : ?>

					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>

					<?php endif; ?>

				</p>

			<?php } else { ?>

		<h3 class="reghead">سفارش شما ثبت شد.

         <?php if ($order->get_payment_method() == 'bacs') { echo ' برای تکمیل روند ثبت نام از طریق مشخصات ارائه شده ذیل پرداخت خود را انجام دهید. ' ;} ?> 

         </h3>		

				<ul class="order_details">

		<li class="order">

			<strong><?php _e('Order:', 'academy'); ?></strong>

			<?php echo $order->get_order_number(); ?>

		</li>

		<li class="order">

			<strong><?php _e('Email:', 'academy'); ?></strong>

			<?php echo $order->get_billing_email(); ?>

		</li>

		<li class="date">

			<strong><?php _e('Date:', 'academy'); ?></strong>

            <?php if (function_exists('jdate')) {echo  jdate('Y-m-d', strtotime( $order->get_date_created() ) ) ; } else {echo  date('Y-m-d', strtotime( $order->get_date_created() ) ) ; } ?>

		</li>

		<li class="total">

			<strong><?php _e('Total:', 'academy'); ?></strong>

			<?php echo $order->get_formatted_order_total(); ?>

		</li>

		<?php if ($order->get_payment_method_title()) : ?>

		<li class="method">

			<strong><?php _e('Payment method:', 'academy'); ?></strong>

			<?php echo $order->get_payment_method_title(); ?>

		</li>

		<?php endif; ?>

	</ul>

				<div class="clear"></div>

			<?php } ?>

			<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>

		<?php } else { ?>

			<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce'), null); ?></p>

		<?php } ?>

		</div>

    </div>

        

<div class="column fourcol last">

<?php if(ThemexUser::userActive()) { ?>

    <a href="<?php echo ThemexUser::$data['profile_page_url']; ?>" class="button secondary full">

        <span><span class="button-icon register"></span> بازگشت به صفحه کاربری شما</span>

    </a>

<?php } ?>

</div>

<div class="clear"></div>

<?php } ?>

<?php remove_filter('the_title', 'wc_page_endpoint_title'); ?>
