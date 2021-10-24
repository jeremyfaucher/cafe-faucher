<?php
/**
 * The template for displaying pages
 *
 * @package Cafe_Faucher
 * @since Cafe Faucher 1.1.1
 */
get_header();
?>
<main class="container">
	<h1><?php the_title(); ?></h1>
	<div class="grid-2x1">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col">
				<?php the_content(); ?>
			</div>
			<aside class="col">
				<?php if ( is_active_sidebar( 'sidebar-page' ) ) :
				dynamic_sidebar( 'sidebar-page' ); ?>      
			<?php else : ?>
				<?php
				if(is_active_sidebar('sidebar-home')){
					dynamic_sidebar('sidebar-home'); } ?>
				<?php endif; ?>
			</aside>
		<?php endwhile; ?>
	<?php endif; ?>
</div><!-- end of main-inner -->
</main><!-- end of main -->
<?php get_footer(); ?>
