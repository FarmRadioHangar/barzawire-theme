<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <div class="wirefm-category-title">
      <div class="container py-3">
        <h1 class="main"><?php single_cat_title(); ?></h1>
      </div>
    </div>
    <!-- container -->
    <div id="content" class="container wirefm-article-list mb-5">
      <?php get_template_part( 'loop' ); ?>
    </div>
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
