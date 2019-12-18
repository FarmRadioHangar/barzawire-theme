<div class="row">

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="col col-12 col-lg-6 col-xl-4">

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!-- post thumbnail -->
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <div class="wire-loop-thumbnail-container container mb-3" style="background-image: url('<?php Theme::thumbnail_url(); ?>');">

            <?php Theme::thumbnail_country(); ?>

          </div>
        </a>
        <!-- /post thumbnail -->

        <div class="wirefm-bleft">

          <!-- post title -->
          <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          </h2>
          <!-- /post title -->

          <!-- post meta -->
          <div class="smaller">

            <p class="meta">
              <b><?php the_author_posts_link(); ?></b> | <span class="date"><?php the_time( 'F j, Y' ); ?></span>
            </p>

          </div>
          <!-- /post meta -->

          <div class="smaller">
            <?php //wire_excerpt( 'wire_index' ); ?>
          </div>

        </div>

      </article>
      <!-- /article -->

    </div>

  <?php endwhile; ?>

</div>

<?php else: ?>

  <div class="col col-12 col-lg-6 pb-5">

    <!-- article -->
    <article>
      <p><?php _e( 'Sorry, nothing to display.', 'wire' ); ?></p>
    </article>
    <!-- /article -->

  </div>

<?php endif; ?>
