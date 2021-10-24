<?php
/**
 * Insert class into body tag for highest level Category or Page.
 *
 * Pages and Categories with identical slugs get the same class.
 * Works on Pages, Posts, and Category achives.
 *
 * @return string $top_slug  Class name for body tag.
 */
function top_cat_or_page_body_class( $class ) {
    $prefix = 'topic-'; // Editable class name prefix.
    global $wp_query;
    $object_id = $wp_query->get_queried_object_id();
    $top_slug  = ( is_home() ) ? 'home' : 'default';

    if ( is_single() ) {
        $cats    = get_the_category( $object_id ); // Get post categories.
        $parents = get_ancestors( $cats[0]->term_id, 'category', 'taxonomy' );
        $top_id  = ( $parents ) ? end( $parents ) : $object_id;

        // If term has parents, get ID of top page.
        $top_cat  = get_category( $top_id ); // Get top cat object.
        $top_slug = $top_cat->slug; // Get top cat slug.
    }

    if ( is_category() ) {
        $parents = get_ancestors( $object_id, 'category', 'taxonomy' );
        $top_id  = ( $parents ) ? end( $parents ) : $object_id;

        // If cat has parents, get ID of top cat.
        $top_cat  = get_category( $top_id ); // Get top cat object.
        $top_slug = $top_cat->slug; // Get top cat slug.
    }

    if ( is_page() ) {
        $parents = get_ancestors( $object_id, 'page', 'post_type' );
        $top_id  = ( $parents ) ? end( $parents ) : $object_id;

        // If page has parents, get ID of top page.
        $top_page = get_post( $top_id ); // Get top page object.
        $top_slug = $top_page->post_name; // Get top page slug.
    }

    $class[] = $top_slug;

    return $class;
}
add_filter( 'body_class', 'top_cat_or_page_body_class' );