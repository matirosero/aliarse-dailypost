<?php
/*
 * Shows gallery feed
 */
?>
<section class="gallery-section" style="margin-top: 90px !important; margin-bottom: 40px !important;">
	<div class="container-fluid clearfix ovh">

		<h2 class="section-title text-center">Galerías</h2>

		<div class="row">

			<?php

			$cat_name = 'galeria';
			$posts_per_page = 9;
			$i = 1;

			$args = array(

				//Category Parameters
				// 'cat'              => 1,
				'category_name'    => $cat_name,

				//Type & Status Parameters
				'post_type'   => 'post',
				'post_status' => 'publish',

				//Order & Orderby Parameters
				'order'               => 'DESC',
				'orderby'             => 'date',
				// 'ignore_sticky_posts' => false,
				// 'year'                => 2012,
				// 'monthnum'            => 1,
				// 'w'                   => 1,
				// 'day'                 => 1,
				// 'hour'                => 12,
				// 'minute'              => 5,
				// 'second'              => 30,

				//Pagination Parameters
				'posts_per_page'         => $posts_per_page,

				//Parameters relating to caching
				'no_found_rows'          => false,
				'cache_results'          => true,
				'update_post_term_cache' => true,
				'update_post_meta_cache' => true,

			);

			$query = new WP_Query( $args );

			while ( $query->have_posts() ) : $query->the_post();


				// get_template_part( 'templates/content', 'small' );

				include(locate_template('templates/content-small.php'));


				$i = mro_fix_grid($i);

			endwhile;

			wp_reset_postdata();

			?>

		</div><!-- .row -->
	</div><!-- .container-fluid clearfix ovh -->
</section><!-- .gallery-feed -->
