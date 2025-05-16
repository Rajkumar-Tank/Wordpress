<?php

add_action('wp_ajax_add_user', 'my_crud_add_user');
function my_crud_add_user() {
    check_ajax_referer('my_crud_nonce', 'nonce');

    global $wpdb;
    $table = $wpdb->prefix . 'my_crud_data';

    $name  = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);

    $wpdb->insert($table, [
        'name' => $name,
        'email' => $email
    ]);

    wp_send_json(['message' => 'User added successfully.']);
}

add_action('wp_ajax_load_users', 'my_crud_load_users');
function my_crud_load_users() {
    global $wpdb;
    $table = $wpdb->prefix . 'my_crud_data';
    $results = $wpdb->get_results("SELECT * FROM $table");

    if ($results) {
        echo '<table><tr><th>Name</th><th>Email</th><th>Action</th></tr>';
        foreach ($results as $row) {
            echo "<tr>
                    <td>{$row->name}</td>
                    <td>{$row->email}</td>
                    <td><button class='delete-user' data-id='{$row->id}'>Delete</button></td>
                  </tr>";
        }
        echo '</table>';
    } else {
        echo '<p>No users found.</p>';
    }

    wp_die();
}

add_action('wp_ajax_delete_user', 'my_crud_delete_user');
function my_crud_delete_user() {
    check_ajax_referer('my_crud_nonce', 'nonce');

    global $wpdb;
    $table = $wpdb->prefix . 'my_crud_data';
    $id = intval($_POST['id']);

    $wpdb->delete($table, ['id' => $id]);

    wp_send_json(['message' => 'User deleted successfully.']);
}
