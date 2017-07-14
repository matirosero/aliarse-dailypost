<?php
/**
 * Template Name: Debug
 * The template for debugging and tests.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mro-resume
 */

get_header(); ?>

<div style="margin-top:100px">

<?php
$all_the_scripts_and_styles = crunchify_print_scripts_styles();
var_dump($all_the_scripts_and_styles);
// var_dump($wp_styles->queue);
?>

</div>

<?php get_footer(); ?>
