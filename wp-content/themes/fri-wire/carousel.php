<?php /* TODO fix */ ?>

<?php $posts = wire_carousel_items(); ?>

<?php //foreach ($posts as $post): ?>

<?php //echo( $post->thumbnail ); ?>

<?php //endforeach; ?>

            <div id="wirefm_carouselIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php for ($i = 0; $i < count ($posts); $i++ ): ?>
                <li data-target="#wirefm_carouselIndicators" data-slide-to="<?php echo $i ?>"<?php if (0 == $i): ?> class="active"<?php endif; ?>></li>
                <?php endfor; ?>
<?php /*
                <li data-target="#wirefm_carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#wirefm_carouselIndicators" data-slide-to="1"></li>
                <li data-target="#wirefm_carouselIndicators" data-slide-to="2"></li>
 */ ?>
              </ol>
              <div class="carousel-inner" role="listbox">

<?php $i = 0; foreach ($posts as $post): $i++; ?>

                <div class="carousel-item <?php if ($i == 1) : ?>active<?php endif; ?>" style="background-image: url('<?php echo $post["thumbnail"] ?>');">
                  <div class="overlay">
                    <div class="caption">
                      <div class="box">
                        <p class="intro" >
    <?php echo $post["title"] ?>
                        </p>
                        <p class="mt-1">
                        <a class="read-more text-white" href="<?php echo $post["guid"] ?>">Read this story</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

<?php endforeach; ?>

<?php /*

                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1505923698663-359e69159f19?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80');">
                  <div class="overlay">
                    <div class="caption">
                      <div class="box">
                        <p class="intro" >
                          <b>DRC:</b> Small-scale miner turns to oranges for profitable, safer career
                        </p>
                        <p class="mt-1">
                          <a class="read-more text-white" href="http://localhost:8000/?p=98">Read this story</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1551356522-1de5dc9c2c08?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80');">
                  <div class="overlay">
                    <div class="caption">
                      <div class="box">
                        <p class="intro" >
                          <b>Niger:</b> Farmers in Niger benefit from letting trees grow in their fields
                        </p>
                        <p class="mt-1">
                          <a class="read-more text-white" href="http://localhost:8000/?p=98">Read this story</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
 */ ?>

              </div>
              <a class="carousel-control-prev" href="#wirefm_carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#wirefm_carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
