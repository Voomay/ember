<?php
/**
 * The main template file fallback
 */

get_header();
?>

<div class="padding-section" style="padding-top: 150px; min-height: 60vh;">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 40px;">
          <h2 class="section-heading" style="font-size: 2.2rem; margin-bottom: 15px;">
            <a href="<?php the_permalink(); ?>" style="color: #fff; text-decoration: none;"><?php the_title(); ?></a>
          </h2>
          <div class="entry-content" style="color: var(--color-text-gray); line-height: 1.6;">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <h2 class="section-heading" style="color: #fff;">NOTHING FOUND</h2>
      <p>Sorry, but no posts match your criteria.</p>
    <?php endif; ?>
  </div>
</div>

<?php
get_footer();
