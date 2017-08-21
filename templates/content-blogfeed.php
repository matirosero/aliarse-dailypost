<?php
/*
 * Shows blog feed
 */
?>

<section class="mro-blogfeed-section"><!-- HAD OVH don't know if need -->
	<div class="row">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner">

				<div class="container-fluid">
					<h2 class="section-title text-center">Tendencias mundiales</h2>
				</div><!-- .container-fluid -->



				<ul class="clean-list list-posts">

					<?php
					$cutoff = mro_get_cutoff();
					$cat_name = 'tendencias-mundiales';
					$posts_per_page = 2;

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
					    'date_query'     => array(
					        'after' =>  $cutoff,
					    ),

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

						get_template_part( 'templates/content', 'blogfeed-post' );
						// include(locate_template('templates/content-blogfeed-post.php'));

					endwhile;

					wp_reset_postdata();

					?>

				</ul><!-- .clean-list list-posts -->

				<!-- PAGINATION GOES HERE -->

			</div><!-- .vc_column-inner -->
		</div><!-- wpb_column vc_column_container vc_col-sm-12 -->
	</div><!-- .row -->
</section><!-- .box-no-spaces -->