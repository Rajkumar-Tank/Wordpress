<?php
function cpm_product_list_shortcode($atts) {
    $products = new WP_Query([
        'post_type' => 'cpm_product',
        'posts_per_page' => 10,
    ]);

    $output = '<ul class="cpm-product-list" style="list-style: none; padding: 0;">';

    while ($products->have_posts()) {
        $products->the_post();
        $price = get_post_meta(get_the_ID(), '_cpm_price', true);
        $thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail', ['style' => 'max-width:100px; height:auto; display:block;']);

        $output .= '<li style="margin-bottom: 20px;">';
        $output .= $thumbnail;
        $output .= '<strong>' . get_the_title() . '</strong><br>';
        $output .= 'Price: ₹' . esc_html($price);
        $output .= '</li>';
    }

    wp_reset_postdata();
    $output .= '</ul>';

    return $output;
}
