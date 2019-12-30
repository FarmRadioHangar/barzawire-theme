		<!-- footer -->
    <footer class="wirefm-page-footer page-footer py-4">
      <div class="container text-center text-md-left">
        <div class="row justify-content-between">
          <div class="col-md-6 mb-md-0 mb-3">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("barza-site-info") ); ?>
            <div>
              <a href="https://creativecommons.org/licenses/by-sa/4.0/">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/by-sa.png" style="height: 40px;">
              </a>
            </div>
          </div>
          <hr class="clearfix w-100 d-md-none pb-3">
          <div class="col-md-4 ml-3 mt-md-0 mt-3">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("barza-contact-info") ); ?>
          </div>
        </div>
      </div>
		</footer>
    <div class="footer-copyright text-center py-3">
      <div class="row justify-content-around">
        <div class="col-lg-5 px-5 text-lg-left">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("barza-copyright") ); ?>
        </div>
        <div class="col-lg-7 px-5 text-lg-right">
          &copy; <?php echo date('Y'); ?> <?php _e( 'Farm Radio International', 'wire' ); ?>
        </div>
      </div>
    </div>
		<footer class="wirefm-social-footer row justify-content-center text-white" role="contentinfo">
      <a class="icon" href="https://www.facebook.com/barzaradio?ref=hl">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/social-media/fb.png">
      </a>
      <a class="icon" href="https://twitter.com/BarzaFm">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/social-media/twitter.png">
      </a>
		</footer>
		<!-- /footer -->
		<?php wp_footer(); ?>
		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>
	</body>
</html>
