<?php
/**
 * Template Name: Projects Portfolio Page
 */

get_header();
?>

<div class="page-hero-banner fade-in-up" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/gallery/faq_bg.png' ); ?>');">
  <div class="overlay"></div>
  <div class="container relative text-center" style="z-index: 1;">
    <h1 class="hero-title">OUR PROJECTS</h1>
    <p class="breadcrumb">
      <span style="color: var(--color-brand);">HOME</span> / <span style="color: #fff;">PORTFOLIO</span>
    </p>
  </div>
</div>

<section class="container fade-in-up">
  <!-- High-End Category Showcase Tabs -->
  <div class="project-tabs">
    <button class="project-tab active" data-filter="all">ALL WORKS</button>
    <button class="project-tab" data-filter="furniture">STEEL FURNITURE</button>
    <button class="project-tab" data-filter="braais">BARBECUE BRAAIS</button>
    <button class="project-tab" data-filter="firepits">FIREPITS</button>
    <button class="project-tab" data-filter="gates">GATES & SECURITY</button>
    <button class="project-tab" data-filter="trailers">CUSTOM TRAILERS</button>
  </div>

  <div class="gallery-grid">
    <?php
    $args = array(
        'post_type'      => 'projects',
        'posts_per_page' => -1,
    );
    $query = new WP_Query( $args );
    
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            
            $terms = wp_get_post_terms( get_the_ID(), 'project_category' );
            $cat_slug = ! empty( $terms ) ? $terms[0]->slug : 'furniture';
            $image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            
            ?>
            <div class="gallery-item" data-category="<?php echo esc_attr( $cat_slug ); ?>">
              <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        // High-fidelity dynamic fallback loop containing exact client gallery items
        $theme_uri = get_template_directory_uri();
        ?>
        <!-- 1. STEEL FURNITURE (12 Items) -->
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/0374a8d1d1e75179cef3462064082047.jpg' ); ?>" alt="Industrial Metal Framing Dining Table"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/4ac55af25c7beafb9c5d653e99e778e3.jpg' ); ?>" alt="Premium Custom Steel Chair"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/76788ce70049796ffb1cb4179866bba6.jpg' ); ?>" alt="Heavy-duty Custom Steel Bookshelf"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/7ac943ed64e25b984ba71bdb6234aac3.jpg' ); ?>" alt="Bespoke Metal Frame Coffee Table"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/af4ac99213b7fb3e4fb399e6833c2ac9.jpg' ); ?>" alt="Minimalist Steel Dining Frame"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/b457973da9b92e75967d0f1724f0ec15.jpg' ); ?>" alt="Bespoke Metal Frame Sideboard"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/b84c1497546f67a9a02ee4ac184db78a.jpg' ); ?>" alt="Custom Steel Leg Bench"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/ce206917c38ad0d51b97aed561a588c3.jpg' ); ?>" alt="Premium Steel Office Desk"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/d22fb4e944ce391a86ee98fd126b46f2.jpg' ); ?>" alt="Bespoke Metal Stool Frame"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/dd3c214cfb471c0a8dcde665fb6b7a5d.jpg' ); ?>" alt="Industrial Metal Bookcase Unit"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/e2382dcd55c2e436986cfd215a1b44d4.jpg' ); ?>" alt="Custom Forged Steel Table Leg"></div>
        <div class="gallery-item" data-category="furniture"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/furniture/e62ba651487dfe85249eb1be1dce6f1d.jpg' ); ?>" alt="Modernist Iron Frame Table"></div>

        <!-- 2. BARBECUE BRAAIS (10 Items) -->
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/0689cd3ac4079d66a30291377199264f.jpg' ); ?>" alt="Heavy Built-in Braai Unit"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/9c8a52a3ecf2e1c47630298961be365a.jpg' ); ?>" alt="Custom Mobile Spit Braai Grill"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/WhatsApp Image 2026-05-19 at 11.42.51 (1).jpeg' ); ?>" alt="Double Grill Barbecue Station"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/WhatsApp Image 2026-05-19 at 11.42.54 (3).jpeg' ); ?>" alt="Patio Built-in Braai Unit"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/WhatsApp Image 2026-05-19 at 11.42.55 (2).jpeg' ); ?>" alt="Bespoke Braai Grid Fitting"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/WhatsApp Image 2026-05-19 at 11.42.55.jpeg' ); ?>" alt="Deluxe Double Grill Braai"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/WhatsApp Image 2026-05-19 at 11.42.58.jpeg' ); ?>" alt="Heavy Duty Trailer Braai Grill"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/ab26d1511809aa8acae1eb993020ee76.jpg' ); ?>" alt="High-capacity Commercial Spit Braai"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/c329b1505e6d4a92d7810545fad66b7d.jpg' ); ?>" alt="Bespoke Steel Wood-Fired Braai Grid"></div>
        <div class="gallery-item" data-category="braais"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/braai/d78cffa0fabef098943d501e74fa19af.jpg' ); ?>" alt="Deluxe Built-in Patio Braai"></div>

        <!-- 3. FIREPITS (8 Items) -->
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/3bb27ace6dd76b7f46646776ed564de0.jpg' ); ?>" alt="Premium Geometrical Steel Firepit"></div>
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/55cbcd32c384738f7dcdafbc42d0da4e.jpg' ); ?>" alt="Heavy-duty Circular Fire Pit Ring"></div>
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/81df20239fc0adf297c27a257716cf99.jpg' ); ?>" alt="Bespoke Metal Fire Pit Base Design"></div>
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/84fd64737a2bfb1c8715c6d5da52c408.jpg' ); ?>" alt="Custom Iron Outdoor Firepit Box"></div>
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/a8261fc428800ab29a4c844e5f2353f8.jpg' ); ?>" alt="Bespoke Geometrical Fire Bowl"></div>
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/ba24e53c335ede4e2a073c20f7090b30.jpg' ); ?>" alt="Industrial Grade Fire Pit stand"></div>
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/c4174c521d7396f6bfb30490788e4530.jpg' ); ?>" alt="Premium Octagonal Metal Firepit"></div>
        <div class="gallery-item" data-category="firepits"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/firepit/d6d57408dd502fc28e84de9d66c04bad.jpg' ); ?>" alt="Custom Iron Log Burning Firepit"></div>

        <!-- 4. GATES & SECURITY (8 Items) -->
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/23231d9172fbb3b0dd67c69dfadeb63f.jpg' ); ?>" alt="Designer Perimeter Steel Gate"></div>
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/32f967ce6090109819a4ba49ba20e148.jpg' ); ?>" alt="Heavy Industrial Driveway Slide Gate"></div>
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/34516f65bfee678c228fac39227c0c9a.jpg' ); ?>" alt="Decorative Bespoke Laser-Cut Gate"></div>
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/8d127c9936ce6fecd9df7a134f09a92b.jpg' ); ?>" alt="Heavy-duty Security Fencing Gate"></div>
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/WhatsApp Image 2026-05-19 at 11.42.52.jpeg' ); ?>" alt="Decorative Metal Driveway Gate"></div>
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/WhatsApp Image 2026-05-19 at 11.42.53 (1).jpeg' ); ?>" alt="Sleek Modern Double Gates"></div>
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/e16cc3935453a18b912b6ce3d1bc5efd.jpg' ); ?>" alt="Custom Laser Cut Security Panel"></div>
        <div class="gallery-item" data-category="gates"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/gates/ff42692c76220b38db14bda362e94ea2.jpg' ); ?>" alt="Industrial Steel Security Gate"></div>

        <!-- 5. CUSTOM TRAILERS (13 Items) -->
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/food trailer/3b78771719fc3232bc000fad1158d64d.jpg' ); ?>" alt="Custom Food Trailer Steel Chassis"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/food trailer/WhatsApp Image 2026-05-19 at 11.42.54 (1).jpeg' ); ?>" alt="Premium Mobile Kitchen Chassis fitout"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/food trailer/WhatsApp Image 2026-05-19 at 11.42.57.jpeg' ); ?>" alt="Industrial Grade Mobile Catering Unit"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/food trailer/dad6b8d3c1c0576675d5071c26112314.jpg' ); ?>" alt="Mobile Kitchen Catering Interior Frame"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/food trailer/f2d9e3a98403a7f045114c03c879f647.jpg' ); ?>" alt="Bespoke Food Truck Metal Fittings"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/05234e6c4054ed08a57244e12a9885b7.jpg' ); ?>" alt="Heavy Double Axle Horse Trailer Chassis"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/0d55b95153b039282c5f7d5fa484f1f1.jpg' ); ?>" alt="Custom Steel Horse Box Trailer Frame"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/4cbc875c70dff988760d7f379627d9a5.jpg' ); ?>" alt="Structural Trailer Steel Framing Fitout"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/7335bf8c10526403e8a674a43f9a5376.jpg' ); ?>" alt="Double Axle Box Horse Trailer Framework"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/8524344d12a9e1a3bf1320e1f89dba0d.jpg' ); ?>" alt="Heavy Utility Horse Trailer Framework"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/a8eaeb41ad88a53ca13cea3f3985a0ec.jpg' ); ?>" alt="Bespoke Double Stall Horse Trailer"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/f02816792f6c3f620a80d9e682b3f8d0.jpg' ); ?>" alt="Premium Horse Carrier Box Structure"></div>
        <div class="gallery-item" data-category="trailers"><img src="<?php echo esc_url( $theme_uri . '/gallery/new gallery/horse trailer/fe1f2aafba5ccee6b2e2bd179b3bd538.jpg' ); ?>" alt="Structural Steel Equestrian Trailer Stall"></div>
        <?php
    }
    ?>
  </div>
</section>

<section class="cta-section fade-in-up">
  <div class="container">
    <h2>READY TO BUILD?</h2>
    <p class="desc-text" style="color: rgba(255,255,255,0.9); margin: 0 auto 30px auto; max-width: 600px;">Let's turn your vision into an ironclad reality. Reach out to our team of experts today.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn">SPARK YOUR PROJECT</a>
  </div>
</section>

<?php
get_footer();
