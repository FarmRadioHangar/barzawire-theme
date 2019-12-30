<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <!-- container -->
    <div class="container wirefm-article-list mb-5">
      <h1 class="main"><?php _e( 'Latest Posts', 'wire' ); ?></h1>
      <?php get_template_part( 'loop' ); ?>
      <?php get_template_part( 'pagination' ); ?>
    </div>
    <!-- /container -->
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
