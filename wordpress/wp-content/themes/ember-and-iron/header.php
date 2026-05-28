<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Iron/Ember Texture Background -->
    <div class="site-background"></div>
    <div class="spotlight"></div>

    <?php
    $nav_class = 'navbar';
    if ( is_front_page() ) {
        $nav_class .= ' fade-in-up home-navbar';
    } else {
        $nav_class .= ' solid-nav';
    }
    ?>
    <nav class="<?php echo esc_attr( $nav_class ); ?>" id="navbar">
      <div class="nav-container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/gallery/new logo.png' ); ?>" alt="Ember & Iron Logo" class="circular-logo" />
        </a>
        
        <div class="nav-links">
          <?php
          $menu_locations = get_nav_menu_locations();
          $menu_id = isset( $menu_locations['primary'] ) ? $menu_locations['primary'] : null;
          $menu_items = $menu_id ? wp_get_nav_menu_items( $menu_id ) : array();
          
          if ( ! empty( $menu_items ) ) {
              foreach ( $menu_items as $item ) {
                  echo '<a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
              }
          } else {
              // Fallback menu matching exact layout links
              ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
              <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a>
              <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">Projects</a>
              <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Services</a>
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
              <?php
          }
          ?>
        </div>
        
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav-cta-btn">REQUEST CUSTOM WORKS</a>
        <button class="mobile-menu-btn" aria-label="Toggle Menu">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </nav>
