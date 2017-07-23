<?php

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configuración del home',
		'menu_title'	=> 'Configuración del home',
		'menu_slug' 	=> 'home-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}