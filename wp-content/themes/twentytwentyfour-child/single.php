<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <article class="mb-5">
    <h1 class="mb-3"><?php the_title(); ?></h1>
    <p class="text-muted">Published on <?php echo get_the_date(); ?> by <?php the_author(); ?></p>
    <div><?php the_content(); ?></div>
  </article>

  <div class="comments">
    <?php comments_template(); ?>
  </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
