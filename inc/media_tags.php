<?php
// Media custom taxonomy tags drop down filter - https://github.com/faktorvier/f4-media-taxonomies
add_action( 'init', 'the_media_tags' );
function the_media_tags()
{   
  register_taxonomy( 'media-category', 'attachment' );
}