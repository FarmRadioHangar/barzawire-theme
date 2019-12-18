<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="wirefm-post-image" style="background-image: url('<?php echo Theme::thumbnail_url(); ?>');"></div>

      <!-- container -->
      <div class="container">

        <div class="wirefm-post-title">

          <!-- post title -->
          <div class="post-box">

            <?php // $country = Theme::get_country(); echo ( $country ? "<p class='country'><b>" . $country . ":</b></p>" : "" ); ?>
            <h1>
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </h1>

          </div>
          <!-- /post title -->

        </div>

        <div class="row">

          <div class="col-4 ml-auto smaller">
            <p class="wirefm-blue">
              <b><?php the_author_posts_link(); ?></b> | <span class="date"><?php the_time('F j, Y'); ?></span>
            </p>
          </div>

          <div class="col-8 ml-auto">

            <div class="mb-3 text-right">
              <?php //echo wire_tags(); ?>
            </div>

          </div>

          <div class="col-12 mr-auto mb-5">

            <?php if ( has_excerpt() ): ?>

            <div class="wirefm-meta wirefm-blue">
              <?php the_excerpt(); ?>
            </div>

            <?php endif; ?>

            <?php /*
              if (function_exists( 'sharing_display' )) {
                sharing_display( '' , true );
              }
             */
            ?>

            <?php the_content(); ?>

          </div>

        </div>

      </div>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'wire' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
