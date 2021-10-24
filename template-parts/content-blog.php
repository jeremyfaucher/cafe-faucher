<?php
/**
 * The default template for displaying content. Used for both single.
 *
 * @package Cafe_Faucher
 * @since Cafe Faucher 1.1.6
 */
?>
<div class="entry">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
      <?php the_content( __( 'READ MORE <span class="meta-nav"></span>', 'cafe-faucher' ) ); ?>
    </div>
    <!-- .entry-meta --> 
  </article>
</div>
