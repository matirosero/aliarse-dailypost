<?php 
/**
 * Archives Page
 */
get_header(); 

$page_id = get_option('page_for_posts');
$sidebar = get_post_meta( $page_id, THEME_NAME . '_sidebar_position', true );
$sidebar = $sidebar ? $sidebar : 'right';
$i = 1;
?>	

	<!-- Main Content -->
	<div class="content-wrapper no-padding">
		<?php if($sidebar == "full_width"):?>
		<div class="breadcrumbs">
			<div class="container-fluid">
				<h2 class="section-title text-center">
				<?php if (is_category()) { ?> <?php _e("You're browsing category: ", 'dailypost'); ?> <span><?php single_cat_title(); ?></span>
		        <?php } elseif( is_tag() ) { ?><?php _e('Post Tagged with:', 'dailypost'); ?> <span>"<?php single_tag_title(); ?>"</span>
		        <?php } elseif (is_day()) { ?><?php _e('Archive for', 'dailypost'); ?> <span><?php the_time('F jS, Y'); ?></span>
		        <?php } elseif (is_month()) { ?><?php _e('Archive for', 'dailypost'); ?> <span><?php the_time('F, Y'); ?></span>
		        <?php } elseif (is_year()) { ?><?php _e('Archive for', 'dailypost'); ?> <span><?php the_time('Y'); ?></span>
		        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><?php _e('Archives', 'dailypost'); } ?>
		        </h2>	
			</div>
		</div>
		<?php else: ?>
		<div class="single-post-area blog <?php echo esc_attr($sidebar);?>">
			<div class="container-fluid post-wrap">
				<div class="row">
					<?php if($sidebar == "left"): ?>
					<div class="col-md-3 sidebar-wrapper">
						<?php get_sidebar();?>
					</div>
					<?php endif;?>		
					<div class="col-md-9 post-wrap">
		<?php endif;?>
						<section class="list-posts-section">
							<?php if($sidebar !== "full_width"): ?>
							<div class="breadcrumbs">
								<div class="container-fluid">
									<h2>
									<?php if (is_category()) { ?> <?php _e("You're browsing category: ", 'dailypost'); ?> <span><?php single_cat_title(); ?></span>
							        <?php } elseif( is_tag() ) { ?><?php _e('Post Tagged with:', 'dailypost'); ?> <span>"<?php single_tag_title(); ?>"</span>
							        <?php } elseif (is_day()) { ?><?php _e('Archive for', 'dailypost'); ?> <span><?php the_time('F jS, Y'); ?></span>
							        <?php } elseif (is_month()) { ?><?php _e('Archive for', 'dailypost'); ?> <span><?php the_time('F, Y'); ?></span>
							        <?php } elseif (is_year()) { ?><?php _e('Archive for', 'dailypost'); ?> <span><?php the_time('Y'); ?></span>
							        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><?php _e('Archives', 'dailypost'); } ?>
							        </h2>	
								</div>
							</div>
							<?php endif;?>
							<div class="container-fluid post-wrap">
								<div class="row">
									<?php if (have_posts()) : while(have_posts()) : the_post(); 
										$curr = $wp_query->current_post < 2 && !is_paged() ? true : false;
										if ( $curr === true ) : 
											get_template_part('templates/content','medium'); 
										else: 
											// get_template_part('templates/content','small');
											include(locate_template('templates/content-small.php'));

											$i = mro_fix_grid($i);

										endif;
									endwhile;?>
									<?php else: ?>
									 	<h2><?php _e('No posts found','dailypost');?></h2>
									 <?php endif;?>
								</div>
								<?php if (have_posts()) get_template_part('nav','main'); ?>
							</div>
						</section>
		<?php if($sidebar !== "full_width"): ?>
					</div>
					<?php if($sidebar == "right"): ?>
					<div class="col-md-3 sidebar-wrapper">
						<?php get_sidebar();?>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<?php endif;?>
	</div>
<?php get_footer(); ?>