<?php
/*
 * Shows gallery feed
 */
?>
<section class="gallery-feed devbox" style="margin-top: 90px !important; margin-bottom: 40px !important;">
	<div class="container-fluid clearfix ovh">

		<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator-has-text">
			<span class="vc_sep_holder vc_sep_holder_l">
				<span class="vc_sep_line"></span>
			</span>
			<h2>Galerías</h2>
			<span class="vc_sep_holder vc_sep_holder_r">
				<span class="vc_sep_line"></span>
			</span>
		</div>

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

				// get_template_part( 'templates/content', 'galleryfeed-post' );

				// get_template_part( 'templates/content', 'medium' );
				get_template_part( 'templates/content', 'small' );


				if ($i !== 0 && $i % 3 == 0) :
					// echo '<div class="clearfix visible-md-block"></div>';
				endif;


				$i++;

			endwhile;

			wp_reset_postdata();

			?>

		</div><!-- .row -->
	</div><!-- .container-fluid clearfix ovh -->
</section><!-- .gallery-feed -->
