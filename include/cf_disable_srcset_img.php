<?php 
/*
	Plugin Name: Disable Responsive Images Complete
	Plugin URI: https://perishablepress.com/disable-wordpress-responsive-images/
	Description: Completely disables WP responsive images
	Tags: responsive, images, responsive images, disable, srcset
	Author: Jeff Starr
	Author URI: https://plugin-planet.com/
	Donate link: https://monzillamedia.com/donate.html
	Contributors: specialk
	Requires at least: 4.4
	Tested up to: 5.1
	Stable tag: 1.4
	Version: 1.4
	Requires PHP: 5.2
	License: GPL v2 or later
*/

if (!defined('ABSPATH')) exit;

// disable srcset on frontend
function disable_wp_responsive_images() {
	
	return 1;
	
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

// disable 768px image generation
function disable_wp_responsive_image_sizes($sizes) {
	
	unset($sizes['medium_large']);
	
	return $sizes;
	
}
add_filter('intermediate_image_sizes_advanced', 'disable_wp_responsive_image_sizes');