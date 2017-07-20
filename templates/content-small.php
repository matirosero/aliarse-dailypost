<div class="col-sm-6 col-md-4">
	<div <?php post_class('post simple-post'); ?>>
		<div class="post-cover">
			<ul class="post-categories clean-list">
				<?php $terms = wp_get_post_terms( get_the_ID(), 'category');
				foreach($terms as $term):?>
				<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
				<?php endforeach;?>
			</ul>

			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('large');?>
			</a>
		</div>

		<div class="post-body">
			<h4 class="post-title">
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h4>
			<p class="post-excerpt"><?php print tt_excerpt(get_the_ID(), 100);?></p>
			<p class="post-author"><?php _e('by ','dailypost');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></p>
		</div>
	</div>
</div>