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
              <li><i class="fa-solid fa-phone"></i> <span>+27 (0) 62 943 8090</span></li>
              <li><i class="fa-solid fa-envelope"></i> <span>info@emberandiron.co.za</span></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; <?php echo date('Y'); ?> Ember & Iron Steelworks. All rights reserved.</p>
        </div>
      </div>
    </footer>

    <!-- Floating Call Button (Mobile Only) -->
    <a href="tel:+27629438090" class="call-floater" aria-label="Call Us">
      <i class="fa-solid fa-phone"></i>
    </a>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/27629438090" class="whatsapp-floater" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
      <i class="fa-brands fa-whatsapp"></i>
    </a>

    <?php wp_footer(); ?>
  </body>
</html>
