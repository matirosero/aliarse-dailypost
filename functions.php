<?php

add_action( 'wp_enqueue_scripts', 'dailypost_parent_theme_enqueue_styles' );

function dailypost_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'dailypost-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'aliarse-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'dailypost-style' )
    );

}

// Debug functions
include( 'includes/debug.php' );