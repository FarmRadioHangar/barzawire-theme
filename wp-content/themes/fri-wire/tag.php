<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <!-- container -->
    <div class="container wirefm-article-list mb-5 pt-4">
      <h1 class="main"><?php _e( 'Stories tagged: ', 'wire' ); echo single_tag_title( '', false ); ?></h1>
      <?php get_template_part( 'loop' ); ?>
      <?php get_template_part( 'pagination' ); ?>
    </div>
    <!-- /container -->
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
