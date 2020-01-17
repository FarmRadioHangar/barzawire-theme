<?php /* Template Name: Front Page */ ?>
<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <!-- carousel -->
    <div class="row">
      <div class="col-12 p-0">
        <div id="wirefm_carouselIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#wirefm_carouselIndicators" data-slide-to=0" class="active"></li>
            <li data-target="#wirefm_carouselIndicators" data-slide-to=1"></li>
            <li data-target="#wirefm_carouselIndicators" data-slide-to=2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php Theme::carousel() ?>
          </div>
          <a class="carousel-control-prev" href="#wirefm_carouselIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php _e( 'Previous', 'wire' ); ?></span>
          </a>
          <a class="carousel-control-next" href="#wirefm_carouselIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php _e( 'Next', 'wire' ); ?></span>
          </a>
        </div>
      </div>
    </div>
    <!-- /carousel -->
    <!-- container -->
    <div class="container">
      <div class="row">
        <div class="col-12 pt-4">
          <h1 class="main pb-1 wirefm-green">
            <?php _e( 'Featured Farmer Stories', 'wire' ); ?>
          </h1>
        </div>
        <div class="col-lg-9">
          <div class="row featured-top">
            <?php Theme::frontpage_category_posts( array( 'before_article' => '<div class="wirefm-bleft">', 'post_type' => 'farmer-stories', 'show_excerpt' => false, 'limit' => 2, 'before' => '<div class="col-lg-6 pb-4">', 'after' => '</div>' ) ); ?>
          </div>
          <div class="row">
            <div class="col-12 mb-5">
              <?php get_template_part( 'feature-box' ); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-3 pb-4">
          <!-- twitter feed -->
          <div class="wirefm-twitter">
            <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'barza-front-sidebar' ) ); ?>
          </div>
          <!-- /twitter feed -->
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-6 col-lg-4 pb-4">
          <h3 class="wirefm-section-header section-resources">
            <?php _e( 'Resources', 'wire' ); ?>
          </h3>
          <?php Theme::frontpage_category_posts( array( 'before_article' => '<div class="wirefm-bleft">', 'image_height' => 200, 'post_type' => 'resources' ) ); ?>
        </div>
        <div class="col-md-6 col-lg-4 pb-4">
          <h3 class="wirefm-section-header section-opportunities">
            <?php _e( 'Opportunities', 'wire' ); ?>
          </h3>
          <?php Theme::frontpage_category_posts( array( 'before_article' => '<div class="wirefm-bleft">', 'image_height' => 200, 'post_type' => 'opportunities' ) ); ?>
        </div>
        <div class="col-md-12 col-lg-4 pb-4">
          <h3 class="wirefm-section-header section-spotlights">
            <?php _e( 'Spotlights', 'wire' ); ?>
          </h3>
          <?php Theme::frontpage_category_posts( array( 'before_article' => '<div class="wirefm-bleft">', 'image_height' => 200, 'post_type' => 'spotlights' ) ); ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
