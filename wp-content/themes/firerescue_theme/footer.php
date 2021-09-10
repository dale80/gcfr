
<footer class="site-footer">
      <div class="site-footer__inner container container--narrow">
        <div class="group">
          <div class="site-footer__col-one">
            <h1 class="school-logo-text school-logo-text--alt-color">
              <a href="<?php echo site_url() ?>"><strong>Giles County</strong><br> Fire & Rescue</a>
            </h1>
            <p><a class="site-footer__link" href="tel:+19313633708">931.363.3708</a></p>
          </div>

          <div class="site-footer__col-two-three-group">
            <div class="site-footer__col-two">
              <h3 class="headline headline--small">Explore</h3>
              <nav class="nav-list">
                <ul>
                  <li><a href="<?php echo site_url("/about-us") ?>">About Us</a></li>
                  <li><a href="<?php echo site_url("/events") ?>">Events</a></li>
                  <li><a href="<?php echo site_url("/stations") ?>">Stations</a></li>
                </ul>
              </nav>
            </div>

            <div class="site-footer__col-three">
              <h3 class="headline headline--small">Extras</h3>
              <nav class="nav-list">
                <ul>
                  <li><a href="<?php echo site_url("/privacy-policy") ?>">Privacy</a></li>
                  <li><a href="<?php echo site_url("/join-us") ?>">Become a member</a></li>
                  <li><a href="<?php echo site_url("/support-us") ?>">Support Us</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="site-footer__col-four">
            <h3 class="headline headline--small">Connect With Us</h3>
            <nav>
              <ul class="min-list social-icons-list group">
                <li>
                  <a href="https://www.facebook.com/Giles-County-Fire-Rescue-130092189437" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <!-- <li>
                  <a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </li> -->
                <li>
                  <a href="https://www.instagram.com/gilescountyfire/?hl=en" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <div class="stamp-footer">
        <div class="stamp-footer__spacer"><hr class="section-break"></div>
        <div class="stamp-footer__stamp"><img class="stamp-footer__image" src="<?php echo get_theme_file_uri('/images/footer_axe.png'); ?>"></div>
        <div class="stamp-footer__spacer"><hr class="section-break"></div>
      </div>

      <div class="legal-footer">
        <div class="legal-footer__logo-container headline headline--small">Powered By:
          <div>
            <a href="https://kddigitaldesign.com"><img class="legal-footer__logo" src="<?php echo get_theme_file_uri('/images/kd_logo3.png') ?>"></a>
          </div>
        </div>
        <div class="legal-footer__copy-container headline headline--small">&copy; <?php echo date('Y'); ?></div>
      </div>
    </footer>

  

<?php wp_footer(); ?>
</body>
</html>