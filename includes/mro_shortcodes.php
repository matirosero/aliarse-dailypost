<?php

add_shortcode('mro_post_block', 'mro_post_block');
function mro_post_block($atts, $content = null) {
	$defaults = shortcode_atts(array(
		'tesla_category' 	=> '',
		'tesla_all_post' 	=> '',
		'custom_color' 	=> '',
		'box_style' 	=> '',
		'css' => '',
		'el_class' 	=> '',
	), $atts);

	$vc_classes = function_exists('vc_shortcode_custom_css_class') ? vc_shortcode_custom_css_class( $defaults['css'], ' ' ) : '';
	$class = $defaults['el_class'].$vc_classes;
	$color = !empty($defaults['custom_color']) ? 'background-color: '.$defaults['custom_color'] : 'background-color: rgba(17, 138, 195, 0.5)';
	$box_style = !empty($defaults['box_style']) ? (int)$defaults['box_style'] : 2;
	$nr_posts = $box_style == 3 ? 4 : 1;

	if(!empty($defaults['tesla_category'])) {
		if(is_numeric($defaults['tesla_category'])) 
			$args = array(
				'post_type' => 'post',
				'cat' => (int)$defaults['tesla_category'],
				'showposts' => $nr_posts
			);
		else 
			$args = array(
				'post_type' => 'post',
				'category_name' => $defaults['tesla_category'],
				'showposts' => $nr_posts
			);
	} else {
		if(is_numeric($defaults['tesla_all_post'])) 
			$args = array(
				'post_type' => 'post',
				'p' => (int)$defaults['tesla_all_post'],
			);
		else 
			$args = array(
				'post_type' => 'post',
				'name' => $defaults['tesla_all_post'],
			);
	}

	$box_query = new WP_Query($args);
	ob_start();
	while ( $box_query->have_posts() ) : $box_query->the_post(); $postid = get_the_ID(); 
	$terms = wp_get_post_terms( $postid, 'category');
	$post_thumb = get_post_meta($postid, THEME_NAME.'_post_thumbnail', true);
	if($box_style == 1):?>  
	    <div class="post featured-post big-featured-post <?php echo esc_attr($class);?>">
			<h1 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>

			<div class="post-cover">
				<ul class="post-categories clean-list">
					<?php foreach($terms as $term):?>
					<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
					<?php endforeach;?>
				</ul>

				<a href="<?php the_permalink();?>">
					<?php if($post_thumb):?>
						<img src="<?php echo esc_url($post_thumb['url']);?>" alt="<?php the_title();?>">
					<?php else:?>
						<?php the_post_thumbnail('featured-image');?>
					<?php endif;?>
				</a>
				<span class="hover-color" style="<?php echo esc_attr($color);?>">
			</div>
		</div>
	<?php elseif($box_style == 2):?>
		<div class="post featured-post small-featured-post <?php echo esc_attr($class);?>">
			<div class="post-meta">
				<h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

				<p class="post-author"><?php _e('by','dailypost');?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author"><?php the_author(); ?></a></p>
			</div>

			<div class="post-cover">
				<ul class="post-categories clean-list">
					<?php foreach($terms as $term):?>
					<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
					<?php endforeach;?>
				</ul>

				<a href="<?php the_permalink();?>">
					<?php if($post_thumb):?>
						<img src="<?php echo esc_url($post_thumb['url']);?>" alt="<?php the_title();?>">
					<?php else:?>
						<?php the_post_thumbnail('small-featured-post');?>
					<?php endif;?>
				</a>
				<span class="hover-color" style="<?php echo esc_attr($color);?>">
			</div>
		</div>
	<?php elseif($box_style == 3):?>
		<?php if($box_query->current_post < 1):?>
		<div class="post-with-more">
		<div class="post simple-post <?php echo esc_attr($class);?>">
			<div class="post-cover">
				<ul class="post-categories clean-list">
					<?php foreach($terms as $term):?>
					<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
					<?php endforeach;?>
				</ul>

				<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('large');?>
				</a>
				<span class="hover-color" style="<?php echo esc_attr($color);?>">
			</div>

			<div class="post-body">
				<h4 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
				<p class="post-excerpt"><?php echo tt_excerpt($postid, 120);?> <span class="post-author"> <?php _e('by','dailypost');?> <a class="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></p>
			</div>
		</div>
		<?php else:?>
		<div class="post-list">
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		</div>
		<?php if ($box_query->current_post + 1 == $box_query->post_count):
				if(!is_numeric($defaults['tesla_category'])) {
					$cat_arr = get_category_by_slug( $defaults['tesla_category'] ); 
					$cat_obj = $cat_arr->term_id;
				} else {
					$cat_obj = $defaults['tesla_category'];
				}
		?>
		<p class="post-category"><a href="<?php echo get_category_link( $cat_obj );?>"><?php _e('More in','dailypost');?> <b><?php echo get_cat_name($cat_obj);?></b></a></p>
		<?php endif;?>
		<?php endif;?>
		<?php if($box_query->current_post + 1 == $box_query->post_count):?>
		</div>
		<?php endif;?>
	<?php elseif($box_style == 4):?>
		<div class="post latest-post  <?php echo esc_attr($class);?>">
			<div class="post-cover">
				<div class="post-meta">
					<ul class="post-categories clean-list">
						<?php foreach($terms as $term):?>
						<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
						<?php endforeach;?>
					</ul>

					<h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

					<p class="post-excerpt"><?php echo tt_excerpt($postid, 100);?><span class="post-author"><?php _e('by','dailypost');?> <a class="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></p>
				</div>

				<a href="<?php the_permalink();?>">
					<?php if($post_thumb):?>
						<img src="<?php echo esc_url($post_thumb['url']);?>" alt="<?php the_title();?>">
					<?php else:?>
						<?php the_post_thumbnail('medium-featured-image');?>
					<?php endif;?>
				</a>
				<span class="hover-color" style="<?php echo esc_attr($color);?>">
			</div>
		</div>
	<?php elseif($box_style == 5):?>
		<div class="post medium-post <?php echo esc_attr($class);?>">
			<div class="post-cover">
				<ul class="post-categories clean-list">
					<?php foreach($terms as $term):?>
					<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
					<?php endforeach;?>
				</ul>

				<a href="<?php the_permalink();?>">
					<?php if($post_thumb):?>
						<img src="<?php echo esc_url($post_thumb['url']);?>" alt="<?php the_title();?>">
					<?php else:?>
						<?php the_post_thumbnail('medium-featured-image-x');?>
					<?php endif;?>
				</a>
				<span class="hover-color" style="<?php echo esc_attr($color);?>">
			</div>

			<div class="post-body">
				<h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

				<p class="post-excerpt"><?php echo tt_excerpt($postid, 280);?></p>

				<p class="post-author"><?php _e('by','dailypost');?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></p>
			</div>
		</div>
	<?php elseif($box_style == 12):?>
		<div class="post featured-post">
				<div class="row">
					<div class="col-md-4">
						<div class="post-meta">
							<h1 class="post-title" style="white-space: normal;"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>

							<p class="post-excerpt"><?php echo tt_excerpt($postid, 100);?></p>

							<p class="post-author"><?php _e('by','dailypost');?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></p>
						</div>
					</div>

					<div class="col-md-8">
						<div class="post-cover">
							<ul class="post-categories clean-list">
								<?php foreach($terms as $term):?>
								<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
								<?php endforeach;?>
							</ul>

							<a href="<?php the_permalink();?>">
								<?php if($post_thumb):?>
									<img src="<?php echo esc_url($post_thumb['url']);?>" alt="<?php the_title();?>">
								<?php else:?>
									<?php the_post_thumbnail('featured-image');?>
								<?php endif;?>
							</a>
							<span class="hover-color" style="<?php echo esc_attr($color);?>">
						</div>
					</div>
				</div>
		</div>
	<?php elseif($box_style == 22):?>
		<div class="post featured-post extra-small-featured-post">
			<div class="post-meta">
				<h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			</div>
	
			<div class="post-cover">
				<a href="<?php the_permalink();?>">
					<?php if($post_thumb):?>
						<img src="<?php echo esc_url($post_thumb['url']);?>" alt="<?php the_title();?>">
					<?php else:?>
						<?php the_post_thumbnail('extra-small-featured-image');?>
					<?php endif;?>
				</a>
				<span class="hover-color" style="<?php echo esc_attr($color);?>">
			</div>
		</div>
	<?php endif;
    endwhile; wp_reset_postdata();
	return ob_get_clean();
}