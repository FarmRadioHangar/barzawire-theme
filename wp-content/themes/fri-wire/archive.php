<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <div class="wirefm-category-title">
      <div class="container py-3">
        <h1 class="main"><?php echo _e( post_type_archive_title( '', false ), 'wire' ); ?></h1>
      </div>
    </div>
    <!-- container -->
    <div id="content" class="container wirefm-article-list mb-5">
      <div id="content-row" class="row">
        <?php get_template_part( 'loop' ); ?>
      </div>
    </div>
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
