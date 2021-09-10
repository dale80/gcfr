<?php
    get_header();
    while(have_posts()) {
        the_post(); 
          pageBanner();
        ?>


    <div class="container container--narrow page-section">
    

        <div class="generic-content"><?php the_content(); ?></div>

        

        <?php
          $image = get_field('station_image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if( $image ) {
              echo wp_get_attachment_image( $image, $size );
            } ?>

            <div class="container">
              <div class="headline headline--medium t-center"><?php echo get_field('station_address') ?></div>
              <div class="headline headline--medium t-center"><?php echo get_field('station_city') ?></div>
            </div>

          <?php
          wp_reset_postdata();
          
          $today = date('Ymd');
          $relatedEvents = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              ),
              array(
                'key' => 'related_location',
                'compare' => 'LIKE',
                'value' =>'"' . get_the_ID() . '"'               
                )
                )
              ));
              

          if ($relatedEvents) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Upcoming Events at ' . get_the_title() . '</h2>';
            
            while($relatedEvents->have_posts()) {
              $relatedEvents->the_post();
              get_template_part('template-parts/content-event');
            }
          } 
              
          ?>
    </div>


<?php    }

    get_footer();
?>