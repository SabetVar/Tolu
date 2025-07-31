<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<table class="shop_table woocommerce-checkout-review-order-table">
	<tfoot>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); 
        $cart = WC()->cart;

			// Get the total discount amount
			// $total_discount = $cart->get_discount_total();

			   // Initialize variables to store regular and sale prices
			   $regular_total = 0;
			   $sale_total = 0;
		   
			   // Loop through cart items to calculate regular and sale prices
			   foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
				   $product = $cart_item['data']; // Get the product object
				   $quantity = $cart_item['quantity']; // Get the item quantity
		   
				   // Get the regular price and sale price for the product
				   $regular_price = $product->get_regular_price();
				   $sale_price = $product->get_sale_price();
		   
				   // Calculate totals
				   $regular_total += $regular_price * $quantity;
				   $sale_total += ( $sale_price ? $sale_price : $regular_price ) * $quantity;
			   }
			 // Get the total cart amount before discounts
			 $cart_total = $cart->get_cart_contents_total();
			    // Initialize variables to store regular and sale prices
				$regular_total = 0;
				$sale_total = 0;
			
				// Loop through cart items to calculate regular and sale prices
				foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
					$product = $cart_item['data']; // Get the product object
					$quantity = $cart_item['quantity']; // Get the item quantity
			
					// Get the regular price and sale price for the product
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_sale_price();
			
					// Calculate totals
					$regular_total += $regular_price * $quantity;
					$sale_total += ( $sale_price ? $sale_price : $regular_price ) * $quantity;
				}
				$final_price = $cart->get_total('edit'); // 'edit' returns the unformatted price
				$total_discount = $regular_total - $final_price ;
        
        ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'مبلغ کل', 'woocommerce' ); ?></th>
			<td><?php echo wc_price($regular_total); ?></td>
		</tr>
		<tr class="discount-total">
			<th><?php esc_html_e( 'سود حاصل شما', 'woocommerce' ); ?></th>
			<td><?php echo wc_price($total_discount); ?></td>
		</tr>
		<tr class="order-total">
			<th><?php esc_html_e( 'مبلغ قابل پرداخت', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>
