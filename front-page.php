<?php 
/**
 *  Page Template
 */
get_header();?>

	<!-- Main Content -->
	<div class="" style="width:100%; background:red; margin: 50px,0;">ABOVE VC CONTENT</div>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$page_id = tt_get_page_id();
			if(has_shortcode( get_the_content(), 'vc_row' ) && class_exists('Vc_Manager')):
				if(is_front_page() && get_query_var('page') > 1 && has_shortcode( get_the_content(), 'tt_blog_list')) {
					$matches = array();
					preg_match_all('/\[tt_blog_list(.*?)\]/', get_the_content(), $matches); 
					?>
					<div class="content-wrapper no-padding">
						<section class="list-posts-section index">
							<?php echo do_shortcode($matches[0][0]);?>
						</section>
					</div>
					<?php
				} else {
					the_content();
				}
			else: 
				$sidebar = get_post_meta( tt_get_page_id(), THEME_NAME . '_sidebar_position', true );
				$sidebar = $sidebar ? $sidebar : 'right';
			?>
				<div class="content-wrapper no-padding">
					<div class="single-post-area <?php echo esc_attr($sidebar);?>">
						<div class="container-fluid post-wrap">
							<div class="row">
								<?php if($sidebar == "left"): ?>
								<div class="col-md-3 sidebar-wrapper">
									<?php get_sidebar();?>
								</div>
								<?php endif;?>
								<?php if($sidebar !== "full_width"): ?>
								<div class="col-md-9 post-wrap">
								<?php endif;?>
									<div class="single-post-container">
										<div class="row">
											<div class="col-md-11 post-wrap">
												<div class="post single-post">
													<div class="readable-post-area">
														<h1 class="post-title align-center"><?php the_title();?></h1>

														<div class="post-body">
															<div class="post-content">
																<?php the_content();?>
															</div>
														</div>
													</div>

													<?php comments_template();?>
												</div>
											</div>
										</div>
									</div>
								<?php if($sidebar !== "full_width"): ?>
								</div>
								<?php endif;?>

								<?php if($sidebar == "right"): ?>
								<div class="col-md-3 sidebar-wrapper">
									<?php get_sidebar();?>
								</div>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			<?php endif;
		endwhile;
	endif; ?>
	<!-- </div> --><!-- Extra closing div, mistake? -->
	<div class="" style="width:100%; background:red; margin: 50px,0;">BELOW VC CONTENT</div>
	<?php get_template_part( 'templates/content', 'signup' ); ?>
	<?php get_template_part( 'templates/content', 'galleryfeed' ); ?>
	<?php get_template_part( 'templates/content', 'eventsview' ); ?>
	<?php get_template_part( 'templates/content', 'blogfeed' ); ?>
<?php get_footer();?>