<div class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-4"><div class="vc_column-inner "><div class="wpb_wrapper">

	<div class="post featured-post small-featured-post ">

		<div class="post-meta">
			<h3 class="post-title"><a href="//localhost:3000/otra-galeria-mas/">Otra galería más</a></h3>

			<p class="post-author">por <a href="//localhost:3000/author/webdev/" class="author">webdev</a></p>
		</div><!-- .post-meta -->

		<div class="post-cover">
			<ul class="post-categories clean-list">
				<li class="category"><a href="//localhost:3000/category/galeria/">Galería</a></li>
			</ul><!-- .post-categories clean-list -->

			<a href="//localhost:3000/otra-galeria-mas/">
				<img width="528" height="320" src="//localhost:3000/wp-content/uploads/2017/07/evento_18-528x320.jpg" class="attachment-small-featured-post size-small-featured-post wp-post-image" alt="">
			</a>
			<span class="hover-color" style="background-color: rgba(17, 138, 195, 0.5)"></span>
		</div><!-- .post-cover -->

		<div class="post-body">
			<h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<p class="post-excerpt"><?php print tt_excerpt(get_the_ID(), 260);?></p>
			<p class="post-author"><?php _e('by ','dailypost');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></p>
		</div>
		
	</div><!-- .post featured-post small-featured-post -->
	
</div></div></div>