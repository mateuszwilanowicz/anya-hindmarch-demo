<?php get_header(); ?>
			<div id="container">
				<div id="content" role="main">
	<?php

		$category = get_the_category();
		$cat_link = get_category_link( $category[0]->cat_ID );
	?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<!--<div id="nav-above" class="navigation">
						<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bare' ) . '</span> %title' ); ?></div>
						<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bare' ) . '</span>' ); ?></div>
					</div> #nav-above -->
					<div id="breadcrumbs">
						<a href="<?= esc_url($cat_link) ?>" ><?= $category[0]->cat_name ?></a> / <?php
							the_title();
					?></div>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry">

							<div class="entry_pics"></h1><?php

									$feat_img = get_the_image( array(
										'size' => 'large',
										'echo' => false
									));

									if( $feat_img ) :

										echo $feat_img;

								endif;

								the_post_images();
							?>
							</div>

							<div class="entry_text">

								<h1 class="entry_title"><?php the_title(); ?></h1>

								<?php the_post_content(); ?>

								<div class="entry_meta">
									<p>Posted on <?php the_time('F jS, Y') ?></p><?php

										$categories = get_the_category();
										$cat_no = count( $categories );
										$cat_title = '';
										$cat_list = '';

										if( $cat_no > 0 ) :

											if( $cat_no == 1 ) $cat_title = 'Category:';
											else if( $cat_no > 1 ) $cat_title = 'Categories:';
											echo '<p>' . $cat_title;

											foreach( $categories as $category ) :

												$cat_list .= $sep . ' <a href="'. get_category_link( $category->cat_ID ) . '" title="View all posts in '. $category->name . '" rel="category tag">' . $category->name . '</a>';
												$sep = ',';

											endforeach;
											echo $cat_list . '</p>';

										endif;

									?><p><?= the_tags() ?></p>
								</div>

								<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bare' ), 'after' => '</div>' ) ); ?>

								<div class="clear"></div>
								<script>
									function fbs_click() {
										u=location.href;
										t=document.title;
										window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
										return false;
									}
								</script>
								<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>
								<div class="social_share">
									<a rel="nofollow" href="http://www.facebook.com/share.php?u=<?= get_permalink(); ?>" class="fb_share_button" onclick="return fbs_click()" target="_blank" style="text-decoration:none;"><img src="<?php bloginfo('template_url') ?>/images/social/fb.png" /></a>
									<a id="twitter_btn" href="http://twitter.com/share?url=<?= get_permalink(); ?>" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/social/twitter.png" /></a>
									<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" class="pin-it-button" count-layout="horizontal" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/social/pinterest.png" /></a>
									<a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" title="Share by Email" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/social/email.png" /></a>
									<?php if(function_exists('wp_email')) { email_link(); } ?>	
								</div>
							</div>

							<div class="clear"></div>

						</div	><!-- .entry -->

						<?php the_galleries(); ?>
<!--
						<div class="entry-utility">
							<?php
								#bare_posted_in();
							?>
							<?php #edit_post_link( __( 'Edit', 'bare' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-utility -->
					</div><!-- #post-## -->


					<div class="cat_pagination">
						<div  class="left"><?php previous_post_link( '%link', '' . _x( '&lt;', 'Previous post link', 'bare' ) . ' Older Post', true); ?></div>
						<div  class="right"><?php next_post_link( '%link', 'Newer Post ' . _x( '&gt;', 'Next post link', 'bare' ) . '', true); ?></div>
					</div><!-- #nav-below -->


					<?php //comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>