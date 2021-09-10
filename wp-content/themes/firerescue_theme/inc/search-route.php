<?php
add_action('rest_api_init', 'rescueRegisterSearch');

function rescueRegisterSearch() {
    register_rest_route('rescue/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'rescueSearchResults'
    ));
}

function rescueSearchResults($data) {
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'page', 'station', 'event'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'generalInfo' => array(),
        'event' => array(),
        'station' => array()
    );

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();

        if(get_post_type() == 'post' OR get_post_type() == 'page') {
            array_push($results['generalInfo'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'postType' => get_post_type(),
                'authorName' => get_the_author()
            ));
        }
        

        if(get_post_type() == 'station') {
            array_push($results['station'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink()
            ));
        }
        if(get_post_type() == 'event') {
            $eventDate = new DateTime(get_field('event_date'));
            $description = null;
            if (has_excerpt()) {
                $description = get_the_excerpt();
                    } else {
                        $description = wp_trim_words(get_the_content(), 18);
                }

            array_push($results['event'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'month' => $eventDate->format('M'),
                'day' => $eventDate->format('d'),
                'description' => $description
            ));
        }
        if(get_post_type() == 'event') {
            $relatedLocation = get_field('related_location');

            if ($relatedLocation) {
                foreach($relatedLocation as $location) {
                    array_push($results['station'], array(
                        'title' => get_the_title($location),
                        'permalink' => get_the_permalink($location)
                    ));
                }
            }

        }
    }

    if ($results['station']) {
        $eventsMetaQuery = array(
            'relation' => 'OR');
    
            foreach($results['station'] as $item) {
                array_push($eventsMetaQuery, array(
                    'key' => 'related_location',
                    'compare' => 'LIKE',
                    'value' => '"' . $item['id'] . '"'));
            }
        
    
        $eventRelationshipQuery = new WP_Query(array(
            'post_type' => 'event',
            'meta_query' => $eventsMetaQuery
        ));
    
        while($eventRelationshipQuery->have_posts()) {
            $eventRelationshipQuery->the_post();
    
            if(get_post_type() == 'event') {
                $eventDate = new DateTime(get_field('event_date'));
                $description = null;
                if (has_excerpt()) {
                    $description = get_the_excerpt();
                        } else {
                            $description = wp_trim_words(get_the_content(), 18);
                    }
    
                array_push($results['event'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'month' => $eventDate->format('M'),
                    'day' => $eventDate->format('d'),
                    'description' => $description
                ));
            }
        }
    
        $results['station'] = array_values(array_unique($results['station'], SORT_REGULAR));
    
    }

   
    return $results;

}

?>