<?php get_header(); ?>
<main role="main">
  <!-- section -->
  <section>
    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wirefm-post-image" style="background-image: url('<?php echo Theme::thumbnail_url(); ?>');"></div>
    <!-- container -->
    <div class="container">
      <div class="wirefm-post-title">
        <!-- post title -->
        <div class="post-box">
          <h1>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
            </a>
          </h1>
        </div>
        <!-- /post title -->
      </div>
      <div class="row">
        <div class="col-4 ml-auto smaller">
          <p class="wirefm-blue">
            <b>
              <?php the_author_posts_link(); ?>
            </b> | 
            <span class="date">
              <?php the_time( 'F j, Y' ); ?>
            </span>
          </p>
        </div>
        <div class="col-8 ml-auto">
          <!-- tags -->
          <div class="mb-3 text-right">
            <?php foreach( Theme::get_tags() as $tag ): ?>
            <span class="badge badge-primary wirefm-badge">
              <a href="<?php echo get_tag_link( $tag->term_id ) ?>">
                <?php echo $tag->slug; ?>
              </a>
            </span>
            <?php endforeach; ?>
          </div>
          <!-- /tags -->
        </div>
        <div class="col-12 mr-auto mb-5">
          <?php if ( function_exists( 'sharing_display' )): ?>
            <?php sharing_display( '', true ); ?>
          <?php endif; ?>
            <?php if ( function_exists('wp_print' ) ):  ?>
              <p style="float: right; margin-top: -3em;">
                <?php print_link(); ?>
              </p>
            <?php endif; ?>
          <?php if ( metadata_exists( 'post', get_the_ID(), 'News Brief' ) ): ?>
          <div class="wirefm-news-brief">
            <h2 class="wirefm-section-header"><?php _e( 'News Brief' ); ?></h2>
            <p>
              <?php echo get_post_meta( get_the_ID(), 'News Brief', true ); ?>
            </p>
          </div>
          <?php endif; ?>
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
    <h1>
      <?php _e( 'Sorry, nothing to display.', 'wire' ); ?>
    </h1>
  </article>
  <!-- /article -->
  <?php endif; ?>
  </section>
<!-- /section -->
</main>
<?php get_footer(); ?>
