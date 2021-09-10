<?php

get_header(); 
  pageBanner(array(
    'title' => 'Giles County Stations',
    'subtitle' => 'We have seven stations to serve and protect.'
  ));
?>

<div class="container container--narrow page-section">
  <?php
    while(have_posts()) {
      the_post(); ?>
      <div class="event-summary">
      
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
            </div>
          </div>
  <?php  }
    echo paginate_links();
  ?>

  <hr class="section-break">

</div>

<?php
get_footer();

?>