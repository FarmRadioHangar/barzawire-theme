<?php /* Template Name: Country Archive */ ?>
<?php $country = urldecode($wp_query->query_vars['country_name']); ?>
<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <!-- container -->
    <div class="container wirefm-article-list mb-5 pt-4">
      <h1 class="main"><?php _e( 'Posts from: ', 'wire' ); ?><?php _e( $country, 'wire' ); ?></h1>
      <?php $query = Theme::country_posts( $country ); ?>
      <?php if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); ?>
        <?php get_template_part( 'loop-article' ); ?>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
      <?php else: ?>
        <div class="col col-12 col-lg-6 pb-5">
          <!-- article -->
          <article>
            <p><?php _e( 'Sorry, nothing to display.', 'wire' ); ?></p>
          </article>
          <!-- /article -->
        </div>
      <?php endif; ?>
    </div>
    <!-- /container -->
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
