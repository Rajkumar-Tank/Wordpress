<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right'); ?></title>

  <?php wp_head(); ?>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

<header class="bg-dark text-white py-3 mb-4">
  <div class="container">
    <h1 class="h3"><?php bloginfo('name'); ?></h1>
    <p class="lead mb-0"><?php bloginfo('description'); ?></p>
  </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="<?php echo home_url(); ?>">Home</a>
    <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
        'fallback_cb' => '__return_false',
        'depth' => 2,
        
      ]);
    ?>
  </div>
</nav>

<main class="container">
