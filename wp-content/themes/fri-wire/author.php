<?php get_header(); ?>
  <main role="main">
    <!-- section -->
    <section>
      <!-- container -->
      <div class="container mb-5 pt-4">
      <?php if (have_posts()): the_post(); ?>
        <h1 class="main"><?php _e( 'Posts by ', 'wire' ); echo get_the_author(); ?></h1>
        <?php if ( get_the_author_meta('description')) : ?>
          <?php echo get_avatar(get_the_author_meta('user_email')); ?>
          <h2><?php _e( 'About ', 'wire' ); echo get_the_author() ; ?></h2>
          <?php echo wpautop( get_the_author_meta('description') ); ?>
        <?php endif; ?>
        <?php rewind_posts(); while (have_posts()) : the_post(); ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <!-- post title -->
          <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          </h2>
          <!-- /post title -->
          <?php Theme::excerpt(); ?>
          <!-- post meta -->
          <div class="smaller">
            <p class="meta">
              <b><?php the_author_posts_link(); ?></b> | <span class="date"><?php the_time( 'F j, Y' ); ?></span>
            </p>
          </div>
          <!-- /post meta -->
          <br class="clear">
        </article>
        <!-- /article -->
        <?php endwhile; ?>
      <?php else: ?>
        <!-- article -->
        <article>
          <h2><?php _e( 'Sorry, nothing to display.', 'wire' ); ?></h2>
        </article>
        <!-- /article -->
      <?php endif; ?>
      <hr />
      <?php get_template_part('pagination'); ?>
      </div>
    </section>
    <!-- /section -->
  </main>
<?php get_footer(); ?>
