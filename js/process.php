<?php
//https://stackoverflow.com/questions/45661276/wordpress-ajax-load-posts-content-in-popup-div
function prefix_ajax_single_post() {
$pid = $_REQUEST['pID'];
global $post;
$post = get_post($pid);
setup_postdata($post);
if ( $pid == $post->ID) {
echo the_content();
} else {    
}
exit();
}
add_action('wp_ajax_prefix_ajax_single_post', 'prefix_ajax_single_post');
add_action('wp_ajax_nopriv_prefix_ajax_single_post', 'prefix_ajax_single_post');

