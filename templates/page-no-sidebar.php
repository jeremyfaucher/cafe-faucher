<?php
/**
 * Template Name: No Sidebar Page
 */
get_header();
?>
<main class="container">
	<h1><?php the_title(); ?></h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="feature-box">
				<?php the_content(); ?>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
