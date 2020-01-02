<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <!-- container -->
    <div class="container wirefm-article-list mb-5 pt-4">
      <h1 class="main"><?php _e( 'Stories tagged: ', 'wire' ); echo single_tag_title( '', false ); ?></h1>
      <div id="content" class="container wirefm-article-list mb-5">
        <div id="content-row" class="row">
          <?php get_template_part( 'loop' ); ?>
        </div>
      </div>
    </div>
    <!-- /container -->
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
