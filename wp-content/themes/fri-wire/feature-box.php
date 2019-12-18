                <div class="wirefm-feature-box solid-box p-5 mb-3 text-white">

                  <div class="row">

                    <div class="col-12 col-md-4">

                      <div class="wirefm-feature-thumbnail mb-4" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/script-of-the-week.jpg');"></div>

                    </div>

                    <div class="col-12 col-md-8">

                      <div class="wirefm-feature-container">
                        <?php echo wire_category_posts( array( 'category' => 'script-of-the-week-en', 'before_article' => '<div>', 'show_thumbnail' => false, 'show_tags' => false ) ); ?>
                      </div>

                    </div>

                  </div>

                </div>
