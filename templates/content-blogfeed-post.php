<?php ?>

<li class="post list-post post-469 type-post status-publish format-standard has-post-thumbnail hentry category-galeria">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="post-container">
					<div class="row">

						<div class="col-md-10"><!-- This might become 10 -->

							<div class="post-body">

								<?php 
								/*
								$link = get_post_meta( $post->ID, 'post_link', true );

								if( $link ): ?>
									<h3 class="post-title"><a href="<?php echo $link;?>"><?php the_title();?></a></h3>
								<?php else: ?>
								*/ ?>
									<h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<?php //endif; ?>

								<p class="post-excerpt"><?php print mro_excerpt(get_the_ID(), 240);?></p>

							</div><!-- .post-body -->
						</div><!-- .col-md-10 -->

						<div class="col-md-2">
							<div class="post-cover">
								<a href="<?php the_permalink();?>">
									<?php the_post_thumbnail('medium');?>
								</a>
							</div><!-- .post-cover -->
						</div><!-- .col-md-2 -->

					</div><!-- .row -->
				</div><!-- .post-container -->
			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</li><!-- .post .list-post -->