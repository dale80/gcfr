<?php
function rescue_post_types() {
        // Event post type
        register_post_type('event', array(
            'capability_type' => 'event',
            'map_meta_cap' => true,
            'supports' => array('title', 'excerpt', 'thumbnail'),
            'public' => true,
            'menu_icon' => 'dashicons-calendar-alt',
            'rewrite' => array(
                'slug' => 'events'
            ),
            'has_archive' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Events',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'all_items' => 'All Events',
                'singular_name' => 'Event'
            )
            ));
        

        // Location post type
        register_post_type('station', array(
            'capability_type' => 'station',
            'map_meta_cap' => true,
            'supports' => array('title', 'excerpt', 'thumbnail'),
            'rewrite' => array(
                'slug' => 'stations'
            ),
            'has_archive' => true,
            'public' => true,
            'menu_icon' => 'dashicons-location-alt',
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Stations',
                'add_new_item' => 'Add New Station',
                'edit_item' => 'Edit Station',
                'all_items' => 'All Stations',
                'singular_name' => 'Station'
            )
        ));
    }

    add_action('init', 'rescue_post_types');

    ?>