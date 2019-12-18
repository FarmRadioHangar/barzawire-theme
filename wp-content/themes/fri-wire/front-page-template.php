<?php /* Template Name: Front Page */ ?>
<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

      <!-- carousel -->
      <div class="row">
        <div class="col-12 p-0">

          <?php get_template_part( 'carousel' ); ?>

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
              <?php echo wire_category_posts( array( 'show_excerpt' => false, 'limit' => 2, 'before' => '<div class="col-lg-6 pb-4">', 'after' => '</div>' ) ); ?>
            </div>

            <div class="row">

              <div class="col-12">

                <?php get_template_part( 'feature-box' ); ?>

              </div>

            </div>

          </div>

          <div class="col-lg-3 pb-4">

            <!-- twitter feed -->
            <div class="p-2 wirefm-twitter">

              <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'barza-front-sidebar' ) ); ?>

            </div>
            <!-- /twitter feed -->

          </div>

        </div>

        <hr />

        <div class="row">

          <div class="col-md-6 col-lg-4 pb-4 smaller">

            <h3 class="wirefm-section-header">
              <?php _e( 'Resources', 'wire' ); ?>
            </h3>

            <?php echo wire_category_posts( array( 'image_height' => 200, 'category' => 'resources-en' ) ); ?>

          </div>

          <div class="col-md-6 col-lg-4 pb-4 smaller">

            <h3 class="wirefm-section-header">
              <?php _e( 'Opportunities', 'wire' ); ?>
            </h3>

            <?php echo wire_category_posts( array( 'image_height' => 200, 'category' => 'opportunities' ) ); ?>

          </div>

          <div class="col-md-12 col-lg-4 pb-4 smaller">

            <h3 class="wirefm-section-header yenkasa">
              <?php _e( 'YenKasa', 'wire' ); ?>
            </h3>

            <?php echo wire_category_posts( array( 'image_height' => 200, 'category' => 'yenkasa' ) ); ?>

          </div>

        </div>

      </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
