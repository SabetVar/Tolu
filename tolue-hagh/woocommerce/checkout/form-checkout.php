<?php
/**
 * Checkout Form
 *
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Handle custom remove cart logic
if ( isset($_GET['remove_all']) && $_GET['remove_all'] == '1' ) {
    WC()->cart->empty_cart();
    wc_add_notice(__('سبد خرید به طور کامل پاک شد', 'woocommerce'), 'success');
    wp_redirect(wc_get_cart_url());
    exit;
}

if (isset($_GET['remove_cart'])) {
    $cart_item_id = intval(sanitize_text_field($_GET['remove_cart']));
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] == $cart_item_id ) {
            WC()->cart->remove_cart_item($cart_item_key);
            wc_add_notice(__('دوره از سبد خرید حذف شد', 'woocommerce'), 'success');
            break;
        }
    }
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// User must be logged in
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}

// Show custom cart review
$cart_items = WC()->cart->get_cart();
?>
<div class="twelvecol column">
    <a href="?remove_all=1" class="button wp-element-button">خالی کردن  کامل سبد خرید</a>
    <div class="regbox">
        <h5 class="regnumber"><span>1</span></h5>
        <h3 class="reghead">بازبینی سبد خرید:</h3>

        <?php
        if ( ! empty( $cart_items ) ) {
            foreach ( $cart_items as $cart_item_key => $cart_item ) {
                $product_id = $cart_item['product_id'];
                $item = ThemexWoo::getRelatedItem($product_id);
                $itemv = ThemexWoo::getRelatedItemv($product_id);
                if ( ! empty( $itemv ) ) $item = $itemv;

                if ( ! empty( $item ) ) {
                    $query = new WP_Query( array(
                        'post__in' => array( $item->ID ),
                        'post_type' => $item->post_type,
                    ) );
                    if ( $query->have_posts() ) {
                        echo '<div class="twocol column">';
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            if ( $item->post_type == 'course' ) {
                                get_template_part( ! empty($itemv) ? 'loopv' : 'loops', $item->post_type );
                            } else {
                                get_template_part( 'loop', $item->post_type );
                            }
                        }

                        $course_productv = get_post_meta(get_the_ID(), '_course_productv', true);
                        $course_product = ($course_productv == 0) ? get_post_meta(get_the_ID(), '_course_product', true) : $course_productv;
                        ?>
                        <div class="remove-cart-div">
                            <a href="?remove_cart=<?php echo esc_attr($course_product); ?>"><span class="dashicons dashicons-trash"></span></a>
                        </div>
                        <?php
                        echo '</div>';
                        wp_reset_postdata();
                    }
                }
            }
        }
        ?>
        <div class="clear"></div>
    </div>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout course-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">
    <?php if ( $checkout->get_checkout_fields() ) : ?>

        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

        <div class="sixcol column" id="customer_details">
            <div class="regbox">
                <h5 class="regnumber"><span>2</span></h5>
                <h3 class="reghead">تکمیل مشخصات فردی:</h3>
                <?php do_action('woocommerce_checkout_billing'); ?>
                <div class="formatted-form">
                    <?php
                    do_action('woocommerce_before_order_notes', $checkout);
                    do_action('woocommerce_after_order_notes', $checkout);
                    ?>
                </div>
            </div>
        </div>

        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

    <?php endif; ?>

    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

    <div class="sixcol column last">
        <div class="regbox">
            <h5 class="regnumber"><span>3</span></h5>
            <h3 class="reghead" id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>
    </div>

    <div class="clear"></div>
</form>

<script>
(function($) {
    $(document).ready(function() {
        var coupon2 = $(".checkout_coupon.woocommerce-form-coupon");
        coupon2.insertBefore('.shop_table.woocommerce-checkout-review-order-table');
    });
})(jQuery);
</script>

<style>
.checkout_coupon:first-of-type {
    display: block !important;
}
.woocommerce-info {
    display: none;
}
.checkout_coupon button.button {
    background-color: #insert button color here;
}
.remove-cart-div {
    border-top: 1px solid #f0f0f0;
    background: #f2f2f2;
    padding: 5px;
    display: flex;
    justify-content: center;
}
.dashicons.dashicons-trash {
    color: red;
}
.woocommerce-checkout .course-footer.clearfix {
    display: none;
}
form.checkout.woocommerce-checkout.course-checkout {
    margin-top: 45px;
}
</style>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
