<div class="wirefm-feature-box solid-box p-5 mb-3 text-white">
  <div class="row">
    <div class="col-12 col-md-5">
      <div class="wirefm-feature-thumbnail mb-4" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/script-of-the-week.jpeg');">
      </div>
    </div>
    <div class="col-12 col-md-7">
      <div class="wirefm-feature-container">
        <?php Theme::frontpage_category_posts( array( 'post_type' => 'weeks-script', 'show_thumbnail' => false, 'show_tags' => false ) ); ?>
      </div>
    </div>
  </div>
</div>
