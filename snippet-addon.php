<?php 

// Add the ACF field content to the new tab
function custom_addon_tab_myaccount() {
    echo '<h3>Custom Addon Tab</h3>';
    
    // Check if the specific product is purchased
    $user_id = get_current_user_id();
    $product_id_to_check = 123; // Replace with the actual product ID
    $has_purchased = wc_customer_bought_product($user_id, $user_id, $product_id_to_check);
    
    if ($has_purchased) {
        // Display the ACF field content
        $custom_addon_content = get_field('custom_addon_field', 'user_' . $user_id);
        if ($custom_addon_content) {
            echo $custom_addon_content;
                    }
    } else {
        echo '<p>Heading/Content Goes Here</i></p>';
        //echo do_shortcode(' /* your shortcode here */ ');
    }
}

add_action('woocommerce_account_premium-support_endpoint', 'custom_addon_tab_myaccount');


?>
