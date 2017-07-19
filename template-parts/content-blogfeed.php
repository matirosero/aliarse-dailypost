<?php
/*
 * Shows blog feed
 */
?>

<section class="box-no-spaces ovh vc_section devbox"><!-- remove classes here -->
	<div class="row">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner">
				<ul class="clean-list list-posts">
					<?php get_template_part( 'template-parts/content', 'blogfeed-post' ); ?>
					<?php get_template_part( 'template-parts/content', 'blogfeed-post' ); ?>
				</ul><!-- .clean-list list-posts -->

				<!-- PAGINATION GOES HERE -->

			</div><!-- .vc_column-inner -->
		</div><!-- wpb_column vc_column_container vc_col-sm-12 -->
	</div><!-- .row -->
</section>
<!-- .box-no-spaces -->