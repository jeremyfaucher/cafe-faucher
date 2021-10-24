<?php
/**
 * Template Name: Operations Page
 *
 * @package Cafe_Faucher
 * @since Cafe Faucher 1.1.1
 */
get_header();
?>
<main class="container">
	<h1><?php the_title(); ?></h1>
	<div class="grid">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col">
				<?php the_content(); ?>
<div style="border: 1px solid rgb(255, 255, 255); overflow: hidden; max-width: 100%;">
<iframe scrolling="yes" src="https://trello.com/b/ZkljWWbe.html" style="border: 0px none; margin-left: 0px; height: 100vh; margin-top: -78px; width: 100%;">
</iframe>
</div>

			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div><!-- end of main-inner -->
</main><!-- end of main -->
<?php get_footer(); ?>
