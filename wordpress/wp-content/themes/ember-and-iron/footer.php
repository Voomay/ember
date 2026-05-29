    <footer class="footer-section padding-section fade-in-up">
      <div class="container">
        <div class="footer-grid">
          <div class="footer-brand-col">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/gallery/new logo.png' ); ?>" alt="Ember & Iron Logo" class="circular-logo" />
            </a>
            <p class="desc-text mt-20">We forge legacies. Premium custom steelwork engineered with uncompromising strength and precision.</p>
          </div>
          <div class="footer-links-col">
            <h4 class="footer-heading">QUICK LINKS</h4>
            <ul>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
              <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a></li>
              <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Our Services</a></li>
              <li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">Portfolio</a></li>
              <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Details</a></li>
            </ul>
          </div>
          <div class="footer-links-col">
            <h4 class="footer-heading">OUR SPECIALTIES</h4>
            <ul>
              <li><a href="<?php echo esc_url( home_url( '/projects/?filter=trailers' ) ); ?>">Custom Trailers</a></li>
              <li><a href="<?php echo esc_url( home_url( '/projects/?filter=braais' ) ); ?>">Trailer Spit Braais</a></li>
              <li><a href="<?php echo esc_url( home_url( '/projects/?filter=gates' ) ); ?>">Sliding Security Gates</a></li>
              <li><a href="<?php echo esc_url( home_url( '/projects/?filter=furniture' ) ); ?>">Industrial Furniture</a></li>
              <li><a href="<?php echo esc_url( home_url( '/projects/?filter=firepits' ) ); ?>">Geometric Firepits</a></li>
            </ul>
          </div>
          <div class="footer-contact-col">
            <h4 class="footer-heading">GET IN TOUCH</h4>
            <ul class="contact-info">
              <li><i class="fa-solid fa-location-dot"></i> <span>Cape Town, Western Cape</span></li>
              <li><i class="fa-solid fa-phone"></i> <span><?php echo esc_html( get_theme_mod( 'ember_iron_phone', '+27 (0) 62 943 8090' ) ); ?></span></li>
              <li><i class="fa-solid fa-envelope"></i> <span><?php echo esc_html( get_theme_mod( 'ember_iron_email', 'info@emberandiron.co.za' ) ); ?></span></li>
            </ul>
            <?php
            $facebook  = get_theme_mod( 'ember_iron_facebook' );
            $instagram = get_theme_mod( 'ember_iron_instagram' );
            $tiktok    = get_theme_mod( 'ember_iron_tiktok' );
            $google    = get_theme_mod( 'ember_iron_google' );

            if ( ! empty( $facebook ) || ! empty( $instagram ) || ! empty( $tiktok ) || ! empty( $google ) ) :
            ?>
              <div class="footer-social-links" style="margin-top: 20px; display: flex; gap: 15px; align-items: center;">
                <?php if ( ! empty( $facebook ) ) : ?>
                  <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--color-brand); font-size: 1.25rem; transition: var(--transition);" onmouseover="this.style.color='#fff'; this.style.transform='translateY(-2px)';" onmouseout="this.style.color='var(--color-brand)'; this.style.transform='none';"><i class="fa-brands fa-facebook"></i></a>
                <?php endif; ?>
                <?php if ( ! empty( $instagram ) ) : ?>
                  <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--color-brand); font-size: 1.25rem; transition: var(--transition);" onmouseover="this.style.color='#fff'; this.style.transform='translateY(-2px)';" onmouseout="this.style.color='var(--color-brand)'; this.style.transform='none';"><i class="fa-brands fa-instagram"></i></a>
                <?php endif; ?>
                <?php if ( ! empty( $tiktok ) ) : ?>
                  <a href="<?php echo esc_url( $tiktok ); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--color-brand); font-size: 1.25rem; transition: var(--transition);" onmouseover="this.style.color='#fff'; this.style.transform='translateY(-2px)';" onmouseout="this.style.color='var(--color-brand)'; this.style.transform='none';"><i class="fa-brands fa-tiktok"></i></a>
                <?php endif; ?>
                <?php if ( ! empty( $google ) ) : ?>
                  <a href="<?php echo esc_url( $google ); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--color-brand); font-size: 1.25rem; transition: var(--transition);" onmouseover="this.style.color='#fff'; this.style.transform='translateY(-2px)';" onmouseout="this.style.color='var(--color-brand)'; this.style.transform='none';"><i class="fa-brands fa-google"></i></a>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; <?php echo date('Y'); ?> Ember & Iron Steelworks. All rights reserved.</p>
        </div>
      </div>
    </footer>

    <!-- Floating Call Button (Mobile Only) -->
    <?php
    $raw_phone = ember_iron_clean_phone( get_theme_mod( 'ember_iron_phone', '+27 (0) 62 943 8090' ) );
    ?>
    <a href="tel:<?php echo esc_attr( $raw_phone ); ?>" class="call-floater" aria-label="Call Us">
      <i class="fa-solid fa-phone"></i>
    </a>

    <!-- Floating WhatsApp Button -->
    <?php
    $whatsapp_url = ember_iron_whatsapp_link( get_theme_mod( 'ember_iron_whatsapp', '+27 (0) 62 943 8090' ) );
    ?>
    <a href="<?php echo esc_url( $whatsapp_url ); ?>" class="whatsapp-floater" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
      <i class="fa-brands fa-whatsapp"></i>
    </a>

    <?php wp_footer(); ?>
  </body>
</html>
