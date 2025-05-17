<?php
function cpm_add_product_meta_boxes() {
    add_meta_box('cpm_product_meta', 'Product Details', 'cpm_product_meta_callback', 'cpm_product');
}

function cpm_product_meta_callback($post) {
    $price = get_post_meta($post->ID, '_cpm_price', true);
    echo '<label>Price: </label><input type="text" name="cpm_price" value="' . esc_attr($price) . '" />';
}

function cpm_save_product_meta($post_id) {
    if (isset($_POST['cpm_price'])) {
        update_post_meta($post_id, '_cpm_price', sanitize_text_field($_POST['cpm_price']));
    }
}
