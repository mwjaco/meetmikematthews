<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

function register_theme_menus() {

	register_nav_menus (
		array(
			'primary-menu' => __( 'Primary Menu' )
		)
	);
}

add_action('init', 'register_theme_menus');

function wp_theme_styles() {
	wp_enqueue_style( 'style_css', get_template_directory_uri() . '/css/style.css' );	
}
add_action('wp_enqueue_scripts', 'wp_theme_styles');

function wp_theme_js() {
	wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', '', '', false );
	wp_enqueue_script('all_js', get_template_directory_uri() . '/js/all.js', array('jquery'), '', true );
} 
add_action( 'wp_enqueue_scripts', 'wp_theme_js' );

function codex_custom_init() {
  $labels = array(
    'name' => 'Videos',
    'singular_name' => 'Video',
    'add_new' => 'Add Video',
    'add_new_item' => 'Add Video',
    'edit_item' => 'Edit Video',
    'new_item' => 'New Video',
    'all_items' => 'All Videos',
    'view_item' => 'View Videos',
    'search_items' => 'Search Videos',
    'not_found' =>  'No Videos found',
    'not_found_in_trash' => 'No Videos found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Videos'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'video' ),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
  );
  register_post_type( 'videos', $args );
}
add_action( 'init', 'codex_custom_init' );
?>