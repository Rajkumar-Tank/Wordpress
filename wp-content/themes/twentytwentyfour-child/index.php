<?php get_header(); ?>

<?php if (have_posts()): ?>
  <div class="row">
    <?php while (have_posts()): the_post(); ?>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><?php the_title(); ?></h2>
            <p class="card-text"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <p>No posts found.</p>
<?php endif; ?>

<?php get_footer(); ?>
