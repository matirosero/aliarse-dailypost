<?php

// in your Child Theme's functions.php    

// Use the after_setup_theme hook with a priority of 11 to load after the
// parent theme, which will fire on the default priority of 10
add_action( 'after_setup_theme', 'remove_post_formats', 11 ); 

function remove_post_formats() {

    remove_theme_support( 'post-formats' );
    add_theme_support( 'post-formats', array( 'link' ) );
}