<?php


$args = array(
	'width'         => 400,
	'height'        => 400,
	'default-image' => get_template_directory_uri() . '/image/header.jpg',
);
add_theme_support( 'custom-header', $args );


function filter_next_post_link($link) {
    $link = str_replace("rel=", 'class="next" rel=', $link);
    return $link;
};
add_filter('next_post_link', 'filter_next_post_link');

function filter_prev_post_link($link) {
    $link = str_replace("rel=", 'class="prev" rel=', $link);
    return $link;
};
add_filter('prev_post_link', 'filter_prev_post_link');


?>