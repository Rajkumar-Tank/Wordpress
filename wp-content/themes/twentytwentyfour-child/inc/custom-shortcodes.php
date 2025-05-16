<?php
// Shortcode to display book CPT
add_shortcode('show_books', function() {
    ob_start();

    $query = new WP_Query(['post_type' => 'book']);
    if ($query->have_posts()) {
        echo "<div class='book-list'>";
        while ($query->have_posts()) {
            $query->the_post();
            echo "<div class='book-item'>";
            echo "<h3>" . get_the_title() . "</h3>";
            echo "</div>";
        }
        echo "</div>";
        wp_reset_postdata();
    } else {
        echo "No books found.";
    }

    return ob_get_clean();
});
