<?php get_header(); ?>
<main role="main">
	<!-- section -->
	<section>
    <div id="content" class="container mb-5 pt-4">
      <h1 class="main pb-1"><?php echo sprintf( __( '%s Search Results for ', 'wire' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
      <?php get_template_part( 'searchloop' ); ?>
    </div>
	</section>
	<!-- /section -->
</main>
<?php get_footer(); ?>
