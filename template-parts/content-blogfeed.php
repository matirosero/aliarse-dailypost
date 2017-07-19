<?php
/*
 * Shows blog feed
 */
?>

<section class="box-no-spaces ovh vc_section"><!-- remove classes here -->
	<div class="row">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner">
				<ul class="clean-list list-posts">

					<?php

					$cat_name = 'tendencias-mundiales';
					$posts_per_page = 6;

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

						get_template_part( 'template-parts/content', 'blogfeed-post' );

					endwhile;

					wp_reset_postdata();

					?>

				</ul><!-- .clean-list list-posts -->

				<!-- PAGINATION GOES HERE -->

			</div><!-- .vc_column-inner -->
		</div><!-- wpb_column vc_column_container vc_col-sm-12 -->
	</div><!-- .row -->
</section><!-- .box-no-spaces -->