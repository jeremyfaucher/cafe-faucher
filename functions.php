<?php
/**
 * Cafe Faucher functions and definitions.
 * @package Cafe_Faucher
 */
/**
 * Sets up theme defaults and registers support for various WordPress features
 *
 * @since Cafe Faucher 1.0
 */
function cafefaucher_setup() {
    //Make theme available for translation.
    load_theme_textdomain( 'cafe-faucher', get_template_directory() . '/languages' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Register Menu Locations.
    register_nav_menus( array(
        'main' => __( 'Main Menu', 'cafe-faucher' ),
        'landing' => __( 'Landing Menu', 'cafe-faucher' ),
        'footer' => __( 'Footer Menu', 'cafe-faucher' ),
        'sitemap' => __( 'Sitemap Menu', 'cafe-faucher' )
    ) );
}
add_action( 'after_setup_theme', 'cafefaucher_setup' );
/* Adds class to li automatically */
add_filter( 'nav_menu_css_class', function($classes, $item, $args) {
    if (property_exists($args, 'li_class')) {
        $classes[] = $args->li_class;
    }
    return $classes;
}, 10, 4 );
/**
 * Create is_blog function
 *
 * @since Cafe Faucher 1.0
 */
function is_blog () {
  global  $post;
  $posttype = get_post_type($post );
  return ( ( (is_home()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}
/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Cafe Faucher 1.0
 */
// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

function cafe_faucher_enqueue() {
    // Add Site CSS and JS
    wp_enqueue_style( 'parent-style',get_template_directory_uri() . '/style.css', 1);
    wp_enqueue_style('child-style', get_theme_file_uri('/style.css',1));
}
        add_action( "wp_enqueue_scripts", "cafe_faucher_enqueue" );
// Theme support for featured image
        function theme_functions() {
            add_theme_support( 'title-tag' );
            add_theme_support( 'post-thumbnails' );
        }
        add_action( 'after_setup_theme', 'theme_functions' );
/**
 * Homepage and Category pages next/previous pagination.
 * Check single.php for the Single page pagination
 * @since Cafe Faucher 1.0
 */
if ( ! function_exists( 'cafefaucher_content_nav' ) ) :
    function cafefaucher_content_nav( $html_id ) {
        global $wp_query;
        $html_id = esc_attr( $html_id );
        if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="nav-pagination" role="navigation">
            <span class="nav-previous">
                <?php next_posts_link( __( '<span class="small"><i class="icon-arrow-left"></i></span> Older Posts', 'cafe-faucher' ) ); ?>
            </span>
            <span class="nav-next">
                <?php previous_posts_link( __( 'Newer Posts <span class="meta-nav"><i class="icon-arrow-right"></i></span>', 'cafe-faucher' ) ); ?>
            </span>
        </nav>
        <!-- #<?php echo $html_id; ?> .navigation -->
    <?php endif;
}
endif;
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own cafefaucher_entry_meta() to override in a child theme.
 *
 * @since Cafe Faucher 1.0
 */
if ( ! function_exists( 'cafefaucher_entry_meta' ) ) :
    function cafefaucher_entry_meta() {
    // Translators: used between list items, there is a space after the comma.
        $categories_list = get_the_category_list( __( ', ', 'cafe-faucher' ) );
    // Translators: used between list items, there is a space after the comma.
        $tag_list = get_the_tag_list( '', __( ', ', 'cafe-faucher' ) );
        $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );
        $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
          esc_attr( sprintf( __( 'View all posts by %s', 'cafe-faucher' ), get_the_author() ) ),
          get_the_author()
      );
    // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
        if ( $tag_list ) {
            $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'cafe-faucher' );
        } elseif ( $categories_list ) {
            $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'cafe-faucher' );
        } else {
            $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'cafe-faucher' );
        }
        printf(
            $utility_text,
            $categories_list,
            $tag_list,
            $date,
            $author
        );
    }
endif;
// Page Linking Filter To Keep Page Linking Rigt Under Content
add_filter( 'the_content', function( $content ) {
  return $content . wp_link_pages( array(
    'before'            => '<div class="link-page">'.__( 'Pages:', 'cafe-faucher' ),
    'after'             => '</div>',
    'link_before'       => '<span>',
    'link_after'        => '</span>',
    'pagelink'          => '%',
    'echo'              => false ) );
}, -1 ); // Lower number = higher priority.
// Remove Customizer theme button
/**
 * Remove customizer options.
 *
 * @since 1.0.0
 * @param object $wp_customize
 */
function ja_remove_customizer_options( $wp_customize ) {
 $wp_customize->remove_section( 'static_front_page' );
 $wp_customize->remove_section( 'title_tagline'     );
   //$wp_customize->remove_section( 'nav'               );
 $wp_customize->remove_section( 'themes'              );
}
add_action( 'customize_register', 'ja_remove_customizer_options', 30 );

/* 
* Include cleanup functions
*/
// Disable Media duplicates - https://perishablepress.com/disable-wordpress-generated-images/
require get_template_directory() . '/inc/disable_media_duplicates.php';
// Disable srcset
require get_template_directory() . '/inc/disable_srcset_img.php';
// Disable comments
require get_template_directory() . '/inc/remove_comments.php';
// Disable emojis
require get_template_directory() . '/inc/remove_emojis.php';
// Remove the "category" slug
//require get_template_directory() . '/inc/remove_cat_slug.php';
// Remove the WordPress admin editors
//require get_template_directory() . '/inc/remove_editors.php';
// Remove the WordPress Block Styles
require get_template_directory() . '/inc/remove_blocks.php';

/**
 * Theme Includes
 */
// Cafe Faucher customizer additions
//require get_template_directory() . '/include/cf_customizer.php';
// Widgets additions
require get_template_directory() . '/include/cf_widgets.php';
// Carousel Post Type
require get_template_directory() . '/include/cf_carousel.php';
// Quotes
//require get_template_directory() . '/include/cf_quotes.php';
// Excerpts
require get_template_directory() . '/include/cf_excerpt.php';
// Comments
//require get_template_directory() . '/include/cf_comments.php';
// Remove Emojis
//require get_template_directory() . '/include/cf_remove_emojis.php';
// Disable WP srcset img
//require get_template_directory() . '/include/cf_disable_srcset_img.php';
// Contact Form 7
//require get_template_directory() . '/include/cf_contact_7.php';
// Custom Category Body Class
//require get_template_directory() . '/include/cf_body_class.php';
// Prefetch
//require get_template_directory() . '/include/cf_prefetch.php';
// Woocommerce
//require get_template_directory() . '/include/cf_woocommerce.php';


add_filter( 'autoptimize_fitler_css_preload_and_print', '__return_true', 1 );
