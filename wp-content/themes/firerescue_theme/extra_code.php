<?php
            $relatedProfiles = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'profile',
              'orderby' => 'title',
              'order' => 'ASC',
              'meta_query' => array(
                array(
                  'key' => 'related_location',
                  'compare' => 'LIKE',
                  'value' => '"' . get_the_ID() . '"'
                  )
                  )
                ));
                
                
                if ($relatedProfiles->have_posts()) {
                  echo '<hr class="section-break">';
                  echo '<h2 class="headline headline--medium">' . get_the_title() . ' Members</h2>';
                  echo '<ul class="professor_card">';
                  
                  while($relatedProfiles->have_posts()) {
                    $relatedProfiles->the_post(); ?>
                <li class="professor-card__list-item">
                  <a class="professor-card" href="<?php the_permalink(); ?>"><?php the_title(); ?>
                  <img class="professor-card__image" src="<?php the_post_thumbnail_url(); ?>">
                  <span class="professor-card__name"><?php the_title(); ?></span>
                </a>
              </li>
              <?php }
            echo '</ul>';
          } ?>