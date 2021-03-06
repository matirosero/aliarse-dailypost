<?php

/**
 * Enqueue scripts and styles.
 */
function mro_deregister_scripts() {

    //Deregister styles

	// Bootstrap
	wp_dequeue_style( 'tt-bootstrap.css' );
	wp_deregister_style( 'tt-bootstrap.css' );

	// icomoon
	wp_dequeue_style( 'tt-icomoon.css' );
	wp_deregister_style( 'tt-icomoon.css' );

	// tt-main-style
	wp_dequeue_style( 'tt-main-style' );
	wp_deregister_style( 'tt-main-style' );

	// tt-theme-style
	wp_dequeue_style( 'tt-theme-style' );
	wp_deregister_style( 'tt-theme-style' );

}
add_action('wp_print_styles', 'mro_deregister_scripts', 99999);


function aliarse_theme_enqueue_styles() {
    // wp_enqueue_style( 'dailypost-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'aliarse-style',
        get_stylesheet_directory_uri() . '/assets/dist/css/style.css'
    );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i', false );
}
add_action( 'wp_enqueue_scripts', 'aliarse_theme_enqueue_styles' );
