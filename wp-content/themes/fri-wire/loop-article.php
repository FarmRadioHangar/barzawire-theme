<div class="col col-12 col-lg-6 col-xl-4">
  <!-- article -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- post thumbnail -->
    <div style="position: relative;">
      <?php Theme::thumbnail_country(); ?>
      <div onclick="location.href='<?php the_permalink(); ?>';" class="wire-loop-thumbnail-container container mb-3" style="cursor: pointer; background-image: url('<?php Theme::thumbnail_url(); ?>');">
      </div>
    </div>
    <!-- /post thumbnail -->
    <div class="wirefm-bleft">
      <!-- post title -->
      <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </h2>
      <!-- /post title -->
      <!-- post meta -->
      <div class="smaller">
        <p class="meta">
          <b><?php the_author_posts_link(); ?></b> | <span class="date"><?php echo get_the_date(); ?></span>
        </p>
      </div>
      <!-- /post meta -->
      <div class="smaller">
        <?php Theme::excerpt(); ?>
      </div>
    </div>
  </article>
  <!-- /article -->
</div>
