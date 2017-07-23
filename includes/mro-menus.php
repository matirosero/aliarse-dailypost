<?php

function mro_register_menus($return = false){
    $mro_menus = array(
            'footer_menu_1'    => _x('Footer Menu Column 1', 'dashboard','dailypost'),
            'footer_menu_2'    => _x('Footer Menu Column 2', 'dashboard','dailypost'),
        );
    if($return)
        return $mro_menus;
    register_nav_menus($mro_menus);
}
add_action('init', 'mro_register_menus');