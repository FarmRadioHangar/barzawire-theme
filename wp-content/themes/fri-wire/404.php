<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <div class="container mb-5 pt-4">
      <!-- article -->
      <article id="post-404">
        <h1 class="main pb-1">
          <?php _e( 'Page not found', 'wire' ); ?>
        </h1>
        <p>
          <a href="<?php echo home_url(); ?>">
            <?php _e( 'Return home', 'wire' ); ?>
          </a>
        </p>
      </article>
      <!-- /article -->
    </div>
  </section>
  <!-- /section -->
</main>
<?php get_footer(); ?>
