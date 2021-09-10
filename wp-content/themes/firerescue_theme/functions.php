<?php

require get_theme_file_path('/inc/search-route.php');

function rescue_custom_rest() {
    register_rest_field('post', 'authorName', array(
        'get_callback' => function() {return get_the_author();}
    ));
}

add_action('rest_api_init', 'rescue_custom_rest');

    function pageBanner($args = NULL) {
        if (!$args['title']) {
           $args['title'] = get_the_title();
        }

        if (!$args['subtitle']) {
            $args['subtitle'] = get_field('page_banner_subtitle');
        }

        if (!$args['photo']) {
            if(get_field('page_banner_background_image') AND !is_archive() AND !is_home()) {
                $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
            } else {
                $args['photo'] = get_theme_file_uri('/images/red_line.png');
            }
        }
        ?>
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
        <div class="page-banner__intro">
          <p><?php echo $args['subtitle']; ?></p>
        </div>
      </div>
    </div>

    <?php }

    // <link href="https://fonts.googleapis.com/css2?family=Norican&display=swap" rel="stylesheet">

    function rescue_files() {
        wp_enqueue_script('main_rescue_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
        wp_enqueue_style('rescue_main_styles', get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('rescue_extra_styles', get_theme_file_uri('/build/index.css'));
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i|Norican:400|Special+Elite:400');

        wp_localize_script('main_rescue_js', 'rescueData', array(
            'root_url' => get_site_url()

        ));
    }   
    add_action('wp_enqueue_scripts', 'rescue_files');

    function rescue_features() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('profileLandscape', 400, 260, true);
        add_image_size('profilePortrait', 480, 650, true);
        add_image_size('pageBanner', 1500, 350, true);
    }
    
    add_action('after_setup_theme', 'rescue_features');

    function rescue_adjust_queries($query) {
        if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
            $today = date('Ymd');
            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC');
            $query->set('meta_query', array(
                array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
                )
            ));

        }

        

        if (!is_admin() AND is_post_type_archive('station') AND $query->is_main_query()) {
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
        }
    }

    add_action('pre_get_posts', 'rescue_adjust_queries');

    // redirect subscriber accounts to front-end
    add_action('admin_init', 'redirectToFrontend');

    function redirectToFrontend() {
        $ourCurrentUser = wp_get_current_user();

        if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == array('subscriber', 'captain', 'lieutenant', 'assistant chief')) {
            wp_redirect(site_url('/'));
            exit;
        }
    }

    add_action('wp_loaded', 'noSubsAdminBar');

    function noSubsAdminBar() {
        $ourCurrentUser = wp_get_current_user();

        if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
            show_admin_bar(false);
        }
    }

    // customize login screen
    // add_filter('login_headerurl', 'ourHeaderUrl');

    // function ourHeaderUrl() {
    //     return esc_url(site_url('/'));
    // }

    // add_action('login_enqueue_scripts', 'ourLoginCSS');

    function my_login_logo() { ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/rescuelogo2.png);
            height:200px;
            width:200px;
            background-size: 200px 200px;
            background-repeat: no-repeat;
                padding-bottom: 10px;
            }
        </style>
    <?php }
    add_action( 'login_enqueue_scripts', 'my_login_logo' );

    function my_login_logo_url() {
        return home_url();
    }
    add_filter( 'login_headerurl', 'my_login_logo_url' );
    
    function my_login_logo_url_title() {
        return 'Giles County Fire and Rescue';
    }
    add_filter( 'login_headertitle', 'my_login_logo_url_title' );

    function ourLoginCSS() {
        wp_enqueue_style('rescue_main_styles', get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('rescue_extra_styles', get_theme_file_uri('/build/index.css'));
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    }

    // add_filter('login_headertitle', 'ourLoginTitle');

    // function ourLoginTitle() {
    //     return get_bloginfo('name');
    // }

    
////// ADD FAVICON //////
function my_favicon() { ?>
    <link rel="shortcut icon" href="/wp-content/themes/firerescue_theme/favicon.png" >
    <?php }
    add_action('wp_head', 'my_favicon');
    

    ?>