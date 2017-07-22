<?php

function remove_some_widgets(){

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'footer_widgets' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

function mro_register_sidebars(){
    if (function_exists('register_sidebar')) {


        register_sidebar(
            array(
                'name'           => __('Footer Widget Left', 'dailypost'),
                'id'             => 'footer_widget_left',
                'description'    => __('Footer Widget Left Area', 'dailypost'),
                'before_widget'  => '<div class="widget %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h4 class="widget-title">',
                'after_title'    => '</h4>'
            )
        );
        register_sidebar(
            array(
                'name'           => __('Footer Widget Right', 'dailypost'),
                'id'             => 'footer_widget_right',
                'description'    => __('Footer Widget Right Area', 'dailypost'),
                'before_widget'  => '<div class="widget %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h4 class="widget-title">',
                'after_title'    => '</h4>'
            )
        );
    }
}
add_action('widgets_init','mro_register_sidebars');