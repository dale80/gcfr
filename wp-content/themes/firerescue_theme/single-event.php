<?php
    get_header();
    while(have_posts()) {
        the_post(); 
        pageBanner();
        ?>


    <div class="container container--narrow page-section">
    

        <div class="generic-content"><?php the_content(); ?></div>

        <?php
          $image = get_field('event_image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if( $image ) {
              echo wp_get_attachment_image( $image, $size );
            } ?>

            <div class="event-split">
              <div class="event-split__spacer"></div>
              <div class="headline headline--small-plus event-split__content1">Date of Event:</div>
              <div class="headline headline--small event-split__content2"><?php echo get_field('event_date') ?></div>
              <div class="event-split__spacer"></div>
            </div>
            <div class="event-split">
              <div class="event-split__spacer"></div>
              <div class="headline headline--small-plus event-split__content1">Time of Event:</div>
              <div class="headline headline--small event-split__content2"><?php echo get_field('event_time') ?></div>
              <div class="event-split__spacer"></div>
            </div>
            <div class="event-split">
              <div class="event-split__spacer"></div>
              <div class="headline headline--small-plus event-split__content1">Sponsored Station:</div>
              <div class="headline headline--small event-split__content2">
              <?php
                $sponsorStation = get_field('related_location'); ?>
                    
                  <?php 
                    foreach( $sponsorStation as $station );
                      echo get_the_title($station); ?> 
              </div>
              <div class="event-split__spacer"></div>
            </div>

            <?php
              wp_reset_postdata();
            ?>
              
              <div class="event-split">
              <div class="event-split__spacer"></div>
              <div class="headline headline--small-plus event-split__content1">Event Address:</div>
              <div class="headline headline--small event-split__content2">
                <?php echo get_field('event_address') ?><br>
                <?php echo get_field('event_city') ?>
              </div>
              <div class="event-split__spacer"></div>
            </div>    
               
              

              
    </div>
<?php    }

    get_footer();
?>