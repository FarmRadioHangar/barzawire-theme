<?php get_header(); ?>
<main role="main">
	<!-- section -->
	<section>
    <!-- container -->
    <div class="container wirefm-article-list mb-5 pt-4">
      <h1><?php the_title(); ?></h1>
      <?php if (have_posts()): ?>
        <?php while (have_posts()) : the_post(); ?>
          <!-- article -->
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content(); ?>
            <br class="clear">
            <?php edit_post_link(); ?>
          </article>
          <!-- /article -->
        <?php endwhile; ?>
      <?php else: ?>
        <!-- article -->
        <article>
          <p><?php _e( 'Sorry, nothing to display.', 'wire' ); ?></p>
        </article>
        <!-- /article -->
      <?php endif; ?>
    </div>
    <!-- /container -->
	</section>
	<!-- /section -->
</main>
<?php get_footer(); ?>
