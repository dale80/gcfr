<?php get_header(); ?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/red_line.png') ?>)"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--medium">Proudly Serving Giles County</h1>
        <h3 class="headline headline--small headline__year"><i>Since 1969</i></h3>
        <!-- <a href="#" class="btn btn--large btn--blue">Find Your Major</a> -->
      </div>
    </div>

    <div class="flex-container">
      <div>
        <div class="headline headline--medium t-center">Our Activity for 2020</div>
      </div>
      <div class="icon-split">
        <div class="icon-split__icon"><img src="<?php echo get_theme_file_uri('/images/2020_icon7.png'); ?>"></div>
        <div class="icon-split__icon"><img src="<?php echo get_theme_file_uri('/images/2020_icon1.png'); ?>"></div>
        <div class="icon-split__icon"><img src="<?php echo get_theme_file_uri('/images/2020_icon2.png'); ?>"></div>
        <div class="icon-split__icon"><img src="<?php echo get_theme_file_uri('/images/2020_icon3.png'); ?>"></div>
      </div>
      <div class="icon-split">
      <div class="icon-split__blank"></div>
      <div class="icon-split__icon"><img src="<?php echo get_theme_file_uri('/images/2020_icon4.png'); ?>"></div>
      <div class="icon-split__icon"><img src="<?php echo get_theme_file_uri('/images/2020_icon5.png'); ?>"></div>
      <div class="icon-split__icon"><img src="<?php echo get_theme_file_uri('/images/2020_icon6.png'); ?>"></div>
      <div class="icon-split__blank"></div>
      </div>
    </div>

    <hr class="section-break">


    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

          <?php
            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
              'posts_per_page' => 2,
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
                )
              )
            ));

            while($homepageEvents->have_posts()) {
              $homepageEvents->the_post(); 
                get_template_part('template-parts/content-event');
              }
            ?>

          <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>
        </div>
      </div>
          <?php
            $homepagePosts = new WP_Query(array(
              'posts_per_page' => 2
            ));

            if ($homepagePosts->have_posts()) { ?>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

          <?php
            while ($homepagePosts->have_posts()) {
              $homepagePosts->the_post(); ?>
              <div class="event-summary">
                <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month"><?php the_time('M'); ?></span>
                  <span class="event-summary__day"><?php the_time('d'); ?></span>
                </a>
                <div class="event-summary__content">
                  <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                  } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                </div>
              </div>
              <?php
               } 
             
            
            wp_reset_postdata();
           ?>
           
           <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View all Blog Posts</a></p>
           </div>
           </div>
           <?php } else { ?>
            <div class="full-width-split__two-hide"></div>
            <?php } ?>
          </div>



    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/join_us.png') ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Join our Family</h2>
                <p class="t-center">We are needing new<br class="responsive"> members to join our team.</p>
                <p class="t-center no-margin"><a href="<?php echo site_url('/join-us') ?>" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/building_fire.png') ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Help us!!!</h2>
                <p class="t-center">Our squad is made possible<br class="responsive"> by your generous support.</p>
                <p class="t-center no-margin"><a href="<?php echo site_url('/support') ?>" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>


<?php get_footer(); ?>