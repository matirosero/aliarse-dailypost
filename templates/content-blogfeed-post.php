<?php ?>

<li class="post list-post post-469 type-post status-publish format-standard has-post-thumbnail hentry category-galeria">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="post-container">
					<div class="row">

						<div class="col-md-8"><!-- This might become 10 -->

							<div class="post-body">

								<?php 
								$link = get_post_meta( $post->ID, 'post_link', true );

								if( $link ): ?>
									<h3 class="post-title"><a href="<?php echo $link;?>"><?php the_title();?></a></h3>
								<?php else: ?>
									<h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<?php endif; ?>

								<p class="post-excerpt"><?php print mro_excerpt(get_the_ID(), 90);?></p>

							</div><!-- .post-body -->
						</div><!-- .col-md-8 -->

						<div class="col-md-2">
							<div class="post-meta">
								<ul class="post-categories clean-list">
									<?php $terms = wp_get_post_terms( get_the_ID(), 'category');
									foreach($terms as $term):?>
									<li class="category"><a href="<?php echo get_category_link( $term->term_id);?>"><?php print $term->name;?></a></li>
									<?php endforeach;?>
								</ul><!-- .post-categories clean-list -->

								<?php
								/*
								<a class="post-author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
								*/ ?>
							</div><!-- .post-meta -->
						</div><!-- .col-md-2 -->

						<div class="col-md-2">
							<div class="post-cover">
								<?php
								if( $link ): ?>
									<a href="<?php echo $link;?>">
										<?php the_post_thumbnail('medium');?>
									</a>
								<?php else: ?>
									<a href="<?php the_permalink();?>">
										<?php the_post_thumbnail('medium');?>
									</a>
								<?php endif; ?>
							</div><!-- .post-cover -->
						</div><!-- .col-md-2 -->

					</div><!-- .row -->
				</div><!-- .post-container -->
			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</li><!-- .post .list-post -->