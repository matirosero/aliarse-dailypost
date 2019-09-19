<?php

function mro_fix_grid($i) {
	if ($i !== 0 && $i % 2 == 0) : 
		echo'<div class="col-xs-12 break-sm"></div>';
	endif;
	if ($i !== 0 && $i % 3 == 0) : 
		echo '<div class="col-xs-12 break-md"></div>';
	endif;

	$i++;

	return $i;
}



function mro_excerpt( $id, $length = NULL ) {
    $length = !empty($length) ? $length : 55;
    $content = get_the_excerpt( $id );
    $content = substr($content, 0, $length);
    print $content.'...';
}

function excerpt_count_js(){
	if ('page' != get_post_type()) {

	echo '<script>jQuery(document).ready(function(){
	jQuery("#postexcerpt .handlediv").after("<div style=\"position:absolute;top:12px;right:34px;color:#666;\"><small>Excerpt length: </small><span id=\"excerpt_counter\"></span><span style=\"font-weight:bold; padding-left:7px;\">/ 90</span><small><span style=\"font-weight:bold; padding-left:7px;\">character(s).</span></small></div>");
	     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
	     jQuery("#excerpt").keyup( function() {
	         if(jQuery(this).val().length > 90){
	            jQuery(this).val(jQuery(this).val().substr(0, 90));
	        }
	     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);

	   });
	});</script>';
	}
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');


function mro_get_cutoff() {
	$cutoff = get_field('home_start_date', 'option', false, false);
	return $cutoff;
}

//hide visual composer stuff
function mro_filter_plugin_updates( $value ) {
    unset( $value->response['js_composer/js_composer.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'mro_filter_plugin_updates' );