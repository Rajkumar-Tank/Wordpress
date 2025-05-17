<?php
/*
Plugin Name: Custom Product Manager
Description: Manage products with custom post type, categories, and meta fields.
Version: 1.0
Author: Your Name
*/

defined('ABSPATH') or die('No script kiddies please!');

define('CPM_PATH', plugin_dir_path(__FILE__));

// Include required files
require_once CPM_PATH . 'includes/cpm-post-type.php';
require_once CPM_PATH . 'includes/cpm-taxonomies.php';
require_once CPM_PATH . 'includes/cpm-meta-fields.php';
require_once CPM_PATH . 'includes/cpm-shortcodes.php';

// Hooks
add_action('init', 'cpm_register_product_post_type');
add_action('init', 'cpm_register_product_taxonomies');
add_action('add_meta_boxes', 'cpm_add_product_meta_boxes');
add_action('save_post', 'cpm_save_product_meta');
add_shortcode('product_list', 'cpm_product_list_shortcode');
