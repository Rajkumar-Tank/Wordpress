<?php get_header(); ?>

<?php
// Check if this is a 'book' post
if (have_posts()) :
  while (have_posts()) : the_post(); 
?>

  <article class="book-details">
    <h1 class="book-title"><?php the_title(); ?></h1>

    <div class="book-meta">
      <p><strong>Author:</strong> <?php the_field('book_author'); ?></p>
      <p><strong>Publication Date:</strong> <?php the_field('book_pub_date'); ?></p>
      <p><strong>Price:</strong> ₹<?php the_field('book_price'); ?></p>
      <p><strong>Genre:</strong> <?php the_field('book_genre'); ?></p>

      <p><strong>Bestseller:</strong> <?php echo (get_field('book_bestseller')) ? 'Yes' : 'No'; ?></p>
    </div>

    <div class="book-summary">
      <h3>Summary</h3>
      <p><?php the_field('book_summary'); ?></p>
    </div>

  </article>

<?php
  endwhile;
endif;
?>

<?php get_footer(); ?>
