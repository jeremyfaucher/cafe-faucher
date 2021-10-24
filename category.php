<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cafe_Faucher
 * @since Cafe Faucher 1.0
 */
get_header(); ?>
<div class="container-nb sm-bottom">
<?php //get_template_part( 'template-parts/content-cat-nav', get_post_format() ); ?>

<h1 class="archive-title">
<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
} ?></h1>
<?php //single_cat_title(); ?>
</div>
<main class="container">
    <section class="grid-1x1x1">
      <?php if ( have_posts() ) : ?>
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/content-category-archive', get_post_format() );
        endwhile;
        cafefaucher_content_nav( 'nav-below' );
        ?>
      <?php endif; ?>
    </section>
    <?php //get_sidebar(); ?>
</main><!-- end of main -->
<?php get_footer(); ?>
