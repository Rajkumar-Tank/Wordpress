<?php
function cpm_register_product_taxonomies() {
    register_taxonomy('product_category', 'cpm_product', [
        'label' => 'Categories',
        'hierarchical' => true,
        'public' => true,
    ]);
}