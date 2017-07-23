<?php

// Debug functions
include( 'includes/debug.php' );

// Enqueue and dequeue
include( 'includes/mro-enqueue.php' );

include( 'includes/mro-acf.php' );

/*
 * Load translation in child theme
 */
function child_theme_slug_setup() {
    load_child_theme_textdomain( 'dailypost', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'child_theme_slug_setup' );

include( 'includes/mro-theme-support.php' );

// MRo template tags
include( 'includes/mro-template-tags.php' );

include( 'includes/mro-widgets.php' );

include( 'includes/mro-menus.php' );

