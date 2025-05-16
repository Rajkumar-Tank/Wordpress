<?php
// Hook into admin_init to register the metabox
add_action('add_meta_boxes', 'book_custom_meta_boxes');
add_action('save_post', 'book_save_custom_meta');

// Register Meta Box
function book_custom_meta_boxes() {
    add_meta_box(
        'book_details',            // ID
        'Book Details',            // Title
        'book_meta_box_callback',  // Callback function
        'book',                    // Post type
        'normal',                  // Context
        'high'                     // Priority
    );
}

// Fields render callback
function book_meta_box_callback($post) {
    // Get existing values
    $author     = get_post_meta($post->ID, '_book_author', true);
    $pub_date   = get_post_meta($post->ID, '_book_pub_date', true);
    $price      = get_post_meta($post->ID, '_book_price', true);
    $genre      = get_post_meta($post->ID, '_book_genre', true);
    $bestseller = get_post_meta($post->ID, '_book_bestseller', true);
    $summary    = get_post_meta($post->ID, '_book_summary', true);

    // Nonce field
    wp_nonce_field('book_meta_box_nonce', 'book_meta_box_nonce_field');
    ?>

    <p>
        <label>Author:</label><br>
        <input type="text" name="_book_author" value="<?php echo esc_attr($author); ?>" style="width:100%;">
    </p>

    <p>
        <label>Publication Date:</label><br>
        <input type="date" name="_book_pub_date" value="<?php echo esc_attr($pub_date); ?>">
    </p>

    <p>
        <label>Price (₹):</label><br>
        <input type="number" step="0.01" name="_book_price" value="<?php echo esc_attr($price); ?>">
    </p>

    <p>
        <label>Genre:</label><br>
        <select name="_book_genre">
            <option value="">-- Select Genre --</option>
            <option value="fiction" <?php selected($genre, 'fiction'); ?>>Fiction</option>
            <option value="non-fiction" <?php selected($genre, 'non-fiction'); ?>>Non-Fiction</option>
            <option value="biography" <?php selected($genre, 'biography'); ?>>Biography</option>
            <option value="fantasy" <?php selected($genre, 'fantasy'); ?>>Fantasy</option>
        </select>
    </p>

    <p>
        <label><input type="checkbox" name="_book_bestseller" value="yes" <?php checked($bestseller, 'yes'); ?>> Bestseller</label>
    </p>

    <p>
        <label>Summary:</label><br>
        <textarea name="_book_summary" rows="5" style="width:100%;"><?php echo esc_textarea($summary); ?></textarea>
    </p>

    <?php
}

// Save metabox fields
function book_save_custom_meta($post_id) {
    // Nonce check
    if (!isset($_POST['book_meta_box_nonce_field']) || 
        !wp_verify_nonce($_POST['book_meta_box_nonce_field'], 'book_meta_box_nonce')) {
        return;
    }

    // Autosave bypass
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Permission check
    if (!current_user_can('edit_post', $post_id)) return;

    // Save fields
    update_post_meta($post_id, '_book_author', sanitize_text_field($_POST['_book_author']));
    update_post_meta($post_id, '_book_pub_date', sanitize_text_field($_POST['_book_pub_date']));
    update_post_meta($post_id, '_book_price', sanitize_text_field($_POST['_book_price']));
    update_post_meta($post_id, '_book_genre', sanitize_text_field($_POST['_book_genre']));
    
    // Checkbox special handling
    if (isset($_POST['_book_bestseller'])) {
        update_post_meta($post_id, '_book_bestseller', 'yes');
    } else {
        delete_post_meta($post_id, '_book_bestseller');
    }

    update_post_meta($post_id, '_book_summary', sanitize_textarea_field($_POST['_book_summary']));
}
