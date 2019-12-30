<?php if ( $show_thumbnail ): ?>
  <div class="container mb-3" style="height: <?php echo $image_height; ?>px; background-image: url('<?php echo $thumbnail_url; ?>'); background-position: center; background-size: cover;"></div>
<?php endif; ?>
<?php echo $before_article; ?>
  <h4>
    <a href="<?php echo $guid; ?>"><?php echo $title; ?></a>
  </h4>
  <?php if ( $show_excerpt ): ?>
  <p>
    <?php echo $excerpt; ?>
  </p>
  <p>
    <a class="view-article" href="<?php echo $guid; ?>"><?php _e( 'View story »', 'wire' ); ?></a>
  </p>
  <?php endif; ?>
  <?php if ( $show_tags ): ?>
  <div class="mb-3">
    <?php foreach ($tags as $tag): ?>
    <span class="badge badge-primary wirefm-badge">
      <a href="<?php echo get_tag_link( $tag->term_id ) ?>"><?php echo $tag->slug; ?></a>
    </span>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
<?php echo $after_article; ?>
