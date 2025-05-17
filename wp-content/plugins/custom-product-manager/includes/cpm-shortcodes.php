<?php
function cpm_product_list_shortcode($atts) {
    $products = new WP_Query([
        'post_type' => 'cpm_product',
        'posts_per_page' => 10,
    ]);

    $output = '<ul class="cpm-product-list">';
    while ($products->have_posts()) {
        $products->the_post();
        $price = get_post_meta(get_the_ID(), '_cpm_price', true);
        $output .= '<li><strong>' . get_the_title() . '</strong> - ₹' . esc_html($price) . '</li>';
    }
    wp_reset_postdata();
    $output .= '</ul>';

    return $output;
}
