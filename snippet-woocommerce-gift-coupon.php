<?php
// Apply the free gift product when the coupon is used

add_action('woocommerce_before_calculate_totals', 'free_gift');
function free_gift($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    // Enter your coupon code and free gift product ID
    $coupon_code = 'your_coupon_code';
    $free_gift_product_id = your_product_id;

    if ($cart->has_discount($coupon_code)) {
        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $free_gift_product_id) {
                unset($cart->cart_contents[$cart_item_key]);
            }
        }
    } else {
        $cart_total = $cart->subtotal;
        $required_purchase_amount = 100; // Set your required purchase amount
        if ($cart_total >= $required_purchase_amount) {
            $cart->add_to_cart($free_gift_product_id);
        }
    }
}

?>