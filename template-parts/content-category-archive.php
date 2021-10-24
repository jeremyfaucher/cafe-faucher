<?php
/**
 * The default template for displaying content. Used for both index, category, archive & search.
 *
 * @package Cafe_Faucher
 * @since Cafe Faucher 1.1.6
 */
?>
<div class="grid">
<div>
  <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cafe-faucher' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
  <h2> <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cafe-faucher' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
    <?php the_title(); ?>
  </a> </div></h2>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
    <div class="featured-post">
      <?php _e( 'Featured post', 'cafe-faucher' ); ?>
    </div>
  <?php endif; ?>
  <?php if ( is_home() || is_front_page() || is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>

    <?php //the_excerpt(); ?>
  <?php else : ?>
    <div class="entry-content">
      <?php the_content( __( 'READ MORE <span class="small"></span>', 'cafe-faucher' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'cafe-faucher' ), 'after' => '</div>' ) ); ?>

    </div>
  <?php endif; ?>
<?php
$categories = get_the_category();
$separator = ' ';
$output = '';
if ( ! empty( $categories ) ) {
    foreach( $categories as $category ) {
        $output .= '<span class="topic"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'cafe-faucher' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></span>' . $separator;
    }
    echo trim( $output, $separator );
}
?>
</article>
</div>
