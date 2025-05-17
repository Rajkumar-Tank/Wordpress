<?php
function cpm_register_product_post_type() {
    register_post_type('cpm_product', [
        'labels' => [
            'name' => 'Products',
            'singular_name' => 'Product'
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-cart',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}