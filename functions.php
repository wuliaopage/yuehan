<?php

$args = array(
	'width'         => 400,
	'height'        => 400,
	'default-image' => get_template_directory_uri() . '/image/header.jpg',
);
add_theme_support( 'custom-header', $args );


function posts_link_attributes_prev() {
    return 'class="prev"';
}
function posts_link_attributes_next() {
    return 'class="next"';
}

add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');



?>