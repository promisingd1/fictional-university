<?php
function fictionaluni_theme_setup() {
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'fictionaluni_theme_setup');

function fictionaluni_assets() {
	wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('fontawesom-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('fictionaluni-main-css', get_stylesheet_uri());

	wp_enqueue_script('scripts-js', get_theme_file_uri( '/assets/js/scripts-bundled.js'), null, '1.0', true);
}
add_action('wp_enqueue_scripts', 'fictionaluni_assets');
