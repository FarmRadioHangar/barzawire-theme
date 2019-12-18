<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

      <!-- container -->
      <div class="container mb-5">
        <h1><?php _e( 'Tag Archive: ', 'wire' ); echo single_tag_title( '', false ); ?></h1>
        <?php get_template_part( 'loop' ); ?>
        <?php get_template_part( 'pagination' ); ?>
      </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
