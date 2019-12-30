<?php if (have_posts()): ?>
  <?php while (have_posts()) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="row mb-4">
        <div class="col-auto">
          <?php if ( has_post_thumbnail() ): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_post_thumbnail( array( 150, 150 ) ); ?>
            </a>
          <?php else: ?>
            <div class="wirefm-searchloop-thumbnail-default"></div>
          <?php endif; ?>
        </div>
        <div class="col">
          <!-- post title -->
          <h4>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          </h4>
          <!-- /post title -->
          <div class="smaller">
            <?php Theme::excerpt(); ?>
          </div>
        </div>
      </div>
    </article>
    <!-- /article -->
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
