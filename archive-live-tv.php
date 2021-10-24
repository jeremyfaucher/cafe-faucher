<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cafe_Faucher
 * @since Cafe Faucher 1.0
 */
get_header(); ?>
<h1 class="container-nb archive-title"><?php
if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?></h1>
<main class="container">
	<section class="feature-box grid-1x1x1">
		<?php if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-category-archive', get_post_format() );
			endwhile;
			cafefaucher_content_nav( 'nav-below' );
			?>
		<?php endif; ?>
	</section><!-- end of main-inner -->
</main><!-- end of main -->
<?php get_footer(); ?>
