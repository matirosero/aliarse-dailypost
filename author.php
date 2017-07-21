<?php 
/**
 * Author Page
 */
get_header();

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$social_platforms = array(
	'email',
    'facebook',
    'twitter',
    'instagram',
    'linkedin',
    'url',
);

$i = 1;
?>
	<!-- Main Content -->
	<div class="content-wrapper no-padding">
		<div class="page-hero align-center single-author no-margin"></div>

		<div class="container-fluid">
			<div class="author-info-block">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="author-box single">
							<div class="thumbnail">
								<?php 
								if(get_the_author_meta( 'image', $curauth->ID)):?>
								<img src="<?php echo wp_get_attachment_url( get_the_author_meta( 'image', $curauth->ID) ); ?>" alt="<?php _e('author photo','dailypost');?>" />
								<?php endif;?>
							</div>

							<div class="user-meta">
								<h3 class="name"><?php print $curauth->display_name;?></h3>

								<span class="nr-of-posts"><?php print count_user_posts($curauth->ID, 'post');?> <?php _e('posts','dailypost');?></span>
								<ul class="social-block clean-list">
									<?php foreach($social_platforms as $platform):
				                        if (get_the_author_meta( $platform, $curauth->ID )):
				                        	switch($platform) {
				                        		case 'email' : $plat = 'envelope'; $url = 'mailto:'.get_the_author_meta( $platform, $curauth->ID ); break;
				                        		case 'url' : $plat = 'external-link'; $url = get_the_author_meta( $platform, $curauth->ID ); break;
				                        		default: $plat = $platform; $url = $url = get_the_author_meta( $platform, $curauth->ID );
				                        	}
				                        	?>
				                            <li>
				                                <a href="<?php echo esc_url($url);?>"><i class="fa fa-<?php echo esc_attr($plat); ?>" title="<?php echo esc_attr($platform); ?>"></i></a>
				                            </li>
				                        <?php endif;
				                    endforeach;?>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-lg-offset-1">
						<div class="author-bio-block">
							<h6 class="title"><?php _e('About author','dailypost');?></h6>
							<p class="body"><?php print $curauth->description;?></p>
						</div>

						<?php $userposts = get_posts('showposts=-1&author='.$curauth->ID); ?>
						<?php if($userposts):?>
						<div class="author-categories align-center">
							<h5><?php _e('I write about','dailypost');?></h5>
							<?php
								$i = 0;
								$cats = array();	
								foreach($userposts as $post):
									$terms = wp_get_post_terms( get_the_ID(), 'category');
									foreach($terms as $term){
							            $cats[$term->term_id] = $term->name;
							            $i++;
							        }
								endforeach;
							
								foreach($cats as $cat => $val):?>
									<a href="<?php echo get_category_link($cat);?>"><?php print $val;?></a>
								<?php endforeach;
							?>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<h5 class="author-posts-header align-center"><?php _e('All posts by','dailypost');?> <span><?php print $curauth->display_name;?></span></h5>
			<div class="row">
				<?php if (have_posts()) : while(have_posts()) : the_post(); 
					get_template_part('templates/content','small');
					$i = mro_fix_grid($i);
				endwhile;?>
				<?php else: ?>
				 	<h2><?php _e('No posts found','dailypost');?></h2>
				 <?php endif;?>
			</div>

			<?php if (have_posts()) get_template_part('nav','main'); ?>
		</div>
	</div>
<?php get_footer();?>