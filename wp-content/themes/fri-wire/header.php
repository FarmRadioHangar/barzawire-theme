<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if (wp_title( '', false )) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet" crossorigin="anonymous">
    <link href="//fonts.googleapis.com/css?family=Rokkitt:100,200,300,400,700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/cropped-Favicon-512x512_FRI-32x32.png" />
    <?php wp_head(); ?>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
    </script>
  </head>
  <body <?php body_class(); ?>>
    <!-- language nav -->
    <nav class="wirefm-language-nav nav navbar text-white" role="navigation">
      <a href="https://farmradio.fm">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" height="32" />
      </a>
      <?php Theme::language_nav(); ?>
    </nav>
    <!-- /language nav -->
    <!-- main nav -->
    <div class="row wirefm-main-nav sticky-top bg-white">
      <div class="col-12 col-lg-9">
        <nav class="nav navbar navbar-expand-lg navbar-light bg-white py-0" role="navigation">
          <div class="container-fluid">
            <a class="navbar-brand" href="/">Barza Wire</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#wirefm_mainNavbarToggler" aria-controls="wirefm_mainNavbarToggler" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="px-0 collapse navbar-collapse navbar-right" id="wirefm_mainNavbarToggler">
              <?php Theme::main_nav(); ?>
              <div class="col-12 d-block d-lg-none p-0 py-4">
                <?php get_template_part( 'searchform' ); ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <div class="col-3 d-none d-lg-flex">
        <?php get_template_part( 'searchform' ); ?>
      </div>
    </div>
    <!-- /main nav -->
