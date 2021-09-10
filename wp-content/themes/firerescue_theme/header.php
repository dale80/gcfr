<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
      <div class="container">
          <a href="<?php echo site_url() ?>"><img class="site-header__logo float-left" src=<?php echo get_theme_file_uri('/images/rescuelogo2.png') ?>></a>
       
        <a href="<?php echo esc_url(site_url('/search')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
        <div class="site-header__menu-trigger">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <ul>
              <li <?php if (is_page('about-us') OR wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url("/about-us") ?>">About Us</a></li>
              <li <?php if (get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>
              <li <?php if (get_post_type() == 'station' OR wp_get_post_parent_id(0) == 29) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url("/stations") ?>">Stations</a></li>
            </ul>
          </nav>
          <div class="site-header__util">
            <?php if(is_user_logged_in()) { ?>
              <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small btn--dark-orange float-left btn--with-photo">
              <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
              <span class="btn__text">Log Out</span>
            </a>


           <?php } else { ?>
              <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
              <a href="<?php echo site_url("/support-us") ?>" class="btn btn--small btn--dark-orange float-left">Support Us</a>

           <?php } ?>
            <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </header>
    
