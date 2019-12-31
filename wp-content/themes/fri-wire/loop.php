<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <?php get_template_part( 'loop-article' ); ?>
<?php endwhile; ?>
<?php else: ?>
  <div class="col col-12 col-lg-6 pb-5">
    <!-- article -->
    <article>
      <p><?php _e( 'Sorry, nothing to display.', 'wire' ); ?></p>
    </article>
    <!-- /article -->
  </div>
<?php endif; ?>
