<?php
    get_header();
    while(have_posts()) {
        the_post(); 
        pageBanner();
        ?>

    

    <div class="container container--narrow page-section">
    

        <div class="generic-content">
          <div class="row group">
            <div class="one-third">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="two-thirds">
              <?php the_content(); ?>
            </div>
          </div>
        </div>

        <?php
          $relatedLocation = get_field('related_location');

          if ($relatedLocation) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Home Station</h2>';
            echo '<ul class="link-list min-list">';
            foreach($relatedLocation as $location) { ?>
              <li><a href="<?php echo get_the_permalink($location); ?>"><?php echo get_the_title($location); ?></a></li>
          <?php  }
          echo '</ul>';
          }
        ?>
    </div>


<?php    }

    get_footer();
?>