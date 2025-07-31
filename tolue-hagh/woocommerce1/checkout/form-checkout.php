<?php

/**

 * Checkout Form

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.

 *

 * HOWEVER, on occasion WooCommerce will need to update template files and you

 * (the theme developer) will need to copy the new files to your theme to

 * maintain compatibility. We try to do this as little as possible, but it does

 * happen. When this occurs the version of the template file will be bumped and

 * the readme will list any important changes.

 *

 * @see 	    https://docs.woocommerce.com/document/template-structure/

 * @author 		WooThemes

 * @package 	WooCommerce/Templates

 * @version     2.3.0

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

global $woocommerce;

$product=reset($woocommerce->cart->get_cart());

$item=ThemexWoo::getRelatedItem($product['product_id']);

$itemv=ThemexWoo::getRelatedItemv($product['product_id']);



if(!empty($item) || !empty($itemv) ) {

	

 if (!empty($itemv)){

	 $item = $itemv;

	}	

$query=new WP_Query(array(

	'post__in' => array($item->ID),

	'post_type' => $item->post_type,

));	

wc_print_notices();



do_action( 'woocommerce_before_checkout_form', $checkout );



// If checkout registration is disabled and not logged in, the user cannot checkout

if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {

	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );

	return;

}



?>



<form name="checkout" method="post" class="checkout woocommerce-checkout course-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">



	<div class="threecol column">

        <div class="regbox">

            <h5 class="regnumber"> <span> 1 </span> </h5>

            <h3 class="reghead"> بازبینی دوره: </h3>

            <?php	

           $query->the_post();

            if ($item->post_type=='course') {

				 if (!empty($itemv)){

					get_template_part('loopv', $item->post_type); 

				} else {	

					get_template_part('loops', $item->post_type); 

				}

			} else {

                    get_template_part('loop', $item->post_type);

                 }

            ?>

        </div>

	</div>

    

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>



		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>



		<div class="fourcol column" class="order_details" id="customer_details">

            <div class="regbox">

                <h5 class="regnumber"> <span> 2 </span> </h5>

                <h3 class="reghead"> تکمیل مشخصات فردی: </h3>

                       

                <?php do_action('woocommerce_checkout_billing'); ?>

                <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

                <?php if (wc_get_page_id('terms')>0) : ?>

                <p class="form-row terms">

                    <input type="checkbox" class="input-checkbox" name="terms" <?php if (isset($_POST['terms'])) echo 'checked="checked"'; ?> id="terms" />

                    <label for="terms" class="checkbox"><?php _e('I accept the', 'academy'); ?> <a href="<?php echo esc_url( get_permalink(woocommerce_get_page_id('terms')) ); ?>" target="_blank"><?php _e('terms &amp; conditions', 'academy'); ?></a></label>

                </p>

                <?php endif; ?>

                <div class="formatted-form">

                    <?php do_action('woocommerce_before_order_notes', $checkout); ?>

                    <?php do_action('woocommerce_after_order_notes', $checkout); ?>

                </div>

                <?php if ( $checkout->enable_guest_checkout ) : ?>

                <input id="createaccount" type="hidden" name="createaccount" value="1" />

                <?php endif; ?>

                <input id="shiptobilling-checkbox" type="hidden" name="shiptobilling" value="1" />	

                <input id="createaccount" type="hidden" name="createaccount" value="1">

                <input type="hidden" name="register_url" value="<?php echo ThemexUser::$data['register_page_url']; ?>" />

                <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

            </div>

		</div>



		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>



	<?php endif; ?>



	<div class="fivecol column last">

        <div class="regbox">

            <h5 class="regnumber"> <span> 3 </span> </h5>

            <h3 class="reghead">  انتخاب روش پرداخت: </h3>

			<?php do_action('woocommerce_checkout_order_review'); ?>

		</div>

	</div>

	<div class="clear"></div>

</form>



<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<?php } ?>

