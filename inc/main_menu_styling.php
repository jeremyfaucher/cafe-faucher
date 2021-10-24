<?php
// Use if statement if needed
//if ( $args->theme_location == 'main' ) {}
// Add class to nav li
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
// Add class to sub-menu ul
function nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'dropdown-menu';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'nav_menu_submenu_css_class' );
// Add class to nav a tags
function nav_a_add_class( $atts, $item, $args ) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    //return $atts;
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'nav_a_add_class', 10, 3 );
// filter test simpler version
// add_filter( 'nav_menu_css_class', function($classes) {
//     $classes[] = 'nav-item2';
//     return $classes;
// }, 10, 1 );
// Add drop down a tag class id and attributes
function anchor_menu_add_class( $atts, $item, $args) {

    if($item->title == 'Programs') {

        $class = 'nav-link dropdown-toggle'; // your class
        $id ='navbarDropdown';
        $role = "button";
        $toggle="dropdown";
        $haspopup="true";
        $expanded="false";

        $atts['class'] = $class;
        $atts['id'] = $id;
        $atts['role'] = $role;
        $atts['data-toggle'] = $toggle;
        $atts['aria-haspopup'] = $haspopup;
        $atts['aria-expanded'] = $expanded;

    }
    return $atts;//enter code here
}
add_filter( 'nav_menu_link_attributes', 'anchor_menu_add_class', 10, 3 );