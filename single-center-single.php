<?php
/**
 * Single Post Template: Center Single
 */
get_header(); ?>
<main>
  <div class="container-centered">
    <h1 class="entry-header-blog">
      <?php if ( is_single() ) : ?>
        <h1 class="entry-title-blog">
          <?php the_title(); ?>
        </h1>
         <?php the_post_thumbnail(); ?>
      <?php else : ?>
        <h2 class="entry-title-blog"> <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cafe-faucher-child' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
          <?php the_title(); ?>
        </a> </h2>
      <?php endif; // is_single() ?>
    </h1>
    <section class="col">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>
        <?php endwhile; // end of the loop. ?>
    </section>
  </div><!-- end of main-inner -->
</main><!-- end of main -->
<?php get_footer(); ?>
