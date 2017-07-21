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