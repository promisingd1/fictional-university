<?php
//require_once( get_theme_file_uri( '/plugins/fictional-university-custom-post-type/custom-post-type.php' ) );
function fictionaluni_theme_setup() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'fictionaluni_theme_setup');

function fictionaluni_assets() {
	wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('fontawesom-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('fictionaluni-main-css', get_stylesheet_uri());

	wp_enqueue_script('scripts-js', get_theme_file_uri( './dist/main.js'), null, time(), true);
}
add_action('wp_enqueue_scripts', 'fictionaluni_assets');

function fictionaluni_adjust_query($query) {
	if( !is_admin() && is_post_type_archive('event') && $query->is_main_query() ) {
		$today = date('Ymd');
//		$query->set('posts_per_page', '2');
		$query->set('meta_key', 'event_date');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'DESC');
		$query->set('meta_query', array(
			array(
				'key'     => 'event_date',
				'compare' => '>=',
				'value'   => $today
			)
		));
	}
//	Program post type query
	if( !is_admin() && is_post_type_archive('programs') && $query->is_main_query() ) {
		$query->set('orderby', 'title');
		$query->set('order', 'DESC');
		$query->set('posts_per_page', -1);

	}
}

add_action('pre_get_posts', 'fictionaluni_adjust_query');