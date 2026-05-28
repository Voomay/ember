<?php
/**
 * Template Name: Contact Us Page
 */

get_header();
?>

<style>
  .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; }
  .contact-form { background: var(--color-dark-box); padding: 25px 20px; border: 1px solid #222; }
  .form-group { margin-bottom: 20px; }
  .form-group label { display: block; font-size: 0.9rem; margin-bottom: 8px; color: var(--color-text-gray); }
  .form-group input, .form-group textarea { width: 100%; padding: 15px; background: var(--color-black); border: 1px solid #333; color: white; font-family: var(--font-body); }
  .form-group input:focus, .form-group textarea:focus { outline: none; border-color: var(--color-brand); }
  .info-box { margin-bottom: 30px; }
  .info-box h3 { font-family: var(--font-heading); font-size: 1.5rem; color: #fff; margin-bottom: 10px; }
  .info-box p { color: var(--color-text-gray); display: flex; align-items: center; gap: 15px; }
  .info-box i { color: var(--color-brand); font-size: 1.2rem; }
  @media (max-width: 900px) {
    .contact-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="page-hero-banner fade-in-up" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/gallery/faq_bg.png' ); ?>');">
  <div class="overlay"></div>
  <div class="container relative text-center" style="z-index: 1;">
    <h1 class="hero-title">CONTACT US</h1>
    <p class="breadcrumb">
      <span style="color: var(--color-brand);">HOME</span> / <span style="color: #fff;">CONTACT US</span>
    </p>
  </div>
</div>

<section class="padding-section pt-0 fade-in-up">
  <div class="container contact-grid">
    
    <div class="contact-info-block">
      <h2 class="section-heading">WE ARE READY<br>TO BUILD IT</h2>
      <p class="desc-text mb-40">Whether you need a custom-built structural trailer, emergency welding repairs, or a bespoke braai, our forge is hot and ready.</p>
      
      <div class="info-box">
        <h3>LOCATION</h3>
        <p><i class="fa-solid fa-location-dot"></i> Cape Town, Western Cape</p>
      </div>
      <div class="info-box">
        <h3>PHONE</h3>
        <p><i class="fa-solid fa-phone"></i> +27 (0) 62 943 8090</p>
      </div>
      <div class="info-box">
        <h3>EMAIL</h3>
        <p><i class="fa-solid fa-envelope"></i> info@emberandIron.co.za</p>
      </div>
    </div>

    <div class="contact-form" id="contact-form">
      <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
        <input type="hidden" name="action" value="ember_iron_contact_submit">
        
        <?php if ( isset( $_GET['status'] ) && 'success' === $_GET['status'] ) : ?>
          <div style="padding: 15px; background: rgba(37, 211, 102, 0.15); border: 1px solid #25d366; color: #fff; margin-bottom: 20px; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">
            Message sent successfully! We will reach out to you shortly.
          </div>
        <?php elseif ( isset( $_GET['status'] ) && 'error' === $_GET['status'] ) : ?>
          <div style="padding: 15px; background: rgba(212, 82, 0, 0.15); border: 1px solid var(--color-brand); color: #fff; margin-bottom: 20px; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">
            Error sending message. Please try calling us directly.
          </div>
        <?php elseif ( isset( $_GET['status'] ) && 'validation_error' === $_GET['status'] ) : ?>
          <div style="padding: 15px; background: rgba(212, 82, 0, 0.15); border: 1px solid var(--color-brand); color: #fff; margin-bottom: 20px; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">
            Please fill in all required fields.
          </div>
        <?php endif; ?>

        <div class="form-group">
          <label>FULL NAME</label>
          <input type="text" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
          <label>EMAIL ADDRESS</label>
          <input type="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
          <label>PHONE NUMBER</label>
          <input type="tel" name="phone" placeholder="Your Phone Number">
        </div>
        <div class="form-group">
          <label>PROJECT DETAILS</label>
          <textarea name="message" rows="5" placeholder="Tell us about your project..." required></textarea>
        </div>
        <button type="submit" class="btn btn-brand" style="width: 100%; border: none; cursor: pointer;">SEND MESSAGE</button>
      </form>
    </div>

  </div>
</section>

<!-- SECTION: Location Map -->
<section class="map-section fade-in-up" style="width: 100%; height: 450px; border-top: 1px solid #222;">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d211933.1554378121!2d18.3556598587189!3d-33.924873669145695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc500f4002b53b%3A0xf20d88ca9e27117a!2sCape%20Town!5e0!3m2!1sen!2sza!4v1716768800000!5m2!1sen!2sza" width="100%" height="100%" style="border:0; filter: grayscale(1) invert(0.9) contrast(1.2);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php
get_footer();
