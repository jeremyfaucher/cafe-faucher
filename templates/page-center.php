<?php
/**
 * Template Name: Center Page
 */
get_header();
?>
<h1 class="container-nb"><?php the_title(); ?></h1>
<main class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="feature-box">
				<?php the_content(); ?>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
