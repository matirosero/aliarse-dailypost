<?php

// Debug functions
include( 'includes/debug.php' );

// Enqueue and dequeue
include( 'includes/mro-enqueue.php' );


/*
 * Load translation in child theme
 */
function child_theme_slug_setup() {
    load_child_theme_textdomain( 'dailypost', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'child_theme_slug_setup' );


// MRo template tags
include( 'includes/mro-template-tags.php' );

include( 'includes/mro-widgets.php' );