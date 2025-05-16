<?php
/*
Plugin Name: My AJAX CRUD Plugin
Description: A WordPress plugin demonstrating AJAX CRUD operations using jQuery.
Version: 1.0
Author: Your Name
*/

defined('ABSPATH') or die('No script kiddies please!');

// Create custom table on plugin activation
register_activation_hook(__FILE__, 'my_crud_create_table');
function my_crud_create_table() {
    global $wpdb;
    $table = $wpdb->prefix . 'my_crud_data';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Load scripts
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_script('my-crud-script', plugin_dir_url(__FILE__) . 'assets/script.js', ['jquery'], null, true);
    wp_localize_script('my-crud-script', 'my_ajax_obj', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('my_crud_nonce')
    ]);
});

// Add admin menu page
add_action('admin_menu', function () {
    add_menu_page('AJAX CRUD', 'AJAX CRUD', 'manage_options', 'ajax-crud', 'my_crud_admin_page');
});

function my_crud_admin_page() {
    ?>
    <div class="wrap">
        <h1>AJAX CRUD Example</h1>
        <input type="text" id="name" placeholder="Name" />
        <input type="email" id="email" placeholder="Email" />
        <button id="add-user">Add User</button>
        <div id="crud-msg"></div>
        <hr>
        <div id="user-list"></div>
    </div>
    <?php
}

// Include CRUD functions
require_once plugin_dir_path(__FILE__) . 'includes/crud-functions.php';
