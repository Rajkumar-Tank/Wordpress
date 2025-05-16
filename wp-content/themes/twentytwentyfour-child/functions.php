<?php
// Enqueue parent and child theme styles
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');

function child_theme_enqueue_styles() {
    // Load parent style
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Load child theme style
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), wp_get_theme()->get('Version'));
}

add_theme_support('menus');

register_nav_menus([
  'primary' => __('Primary Menu'),
]);

// Include custom functionality files
require_once get_stylesheet_directory() . '/inc/custom-post-types.php';
require_once get_stylesheet_directory() . '/inc/custom-shortcodes.php';
require_once get_stylesheet_directory() . '/inc/custom-metaboxes.php';
