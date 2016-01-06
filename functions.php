<?php
function wp_theme_styles() {
	wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css' );	
}
add_action('wp_enqueue_scripts', 'wp_theme_styles');

function wp_theme_js() {
	wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', '', '', false );
	wp_enqueue_script('all_js', get_template_directory_uri() . '/js/all.min.js', array('jquery'), '', true );
} 
add_action( 'wp_enqueue_scripts', 'wp_theme_js' );

?>