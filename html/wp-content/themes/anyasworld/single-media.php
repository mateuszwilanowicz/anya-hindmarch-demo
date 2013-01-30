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

								<h1 class="entry_title">AAAAAAAAAAAAA<?php the_title(); ?></h1>

								<?php the_post_content(); ?>

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
									<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" class="pin-it-button" count-layout="horizontal"><img src="<?php bloginfo('template_url') ?>/images/social/pinterest.png" /></a>
									<a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" title="Share by Email"><img src="<?php bloginfo('template_url') ?>/images/social/email.png" /></a>
								</div>
							</div>

							<div class="clear"></div>

						</div><!-- .entry -->

						<div class="entry-meta">
							<?php #bare_posted_on(); ?>
						</div><!-- .entry-meta -->

		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>

					<!--	<div id="entry-author-info">
							<div id="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bare_author_bio_avatar_size', 60 ) ); ?>
							</div><!-- #author-avatar
							<div id="author-description">
								<h2><?php printf( esc_attr__( 'About %s', 'bare' ), get_the_author() ); ?></h2>
								<?php the_author_meta( 'description' ); ?>
								<div id="author-link">
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'bare' ), get_the_author() ); ?>
									</a>
								</div><!-- #author-link
							</div><!-- #author-description
						</div><!-- #entry-author-info -->

		<?php endif; ?>
<!--
						<div class="entry-utility">
							<?php
								#bare_posted_in();
							?>
							<?php #edit_post_link( __( 'Edit', 'bare' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-utility -->
					</div><!-- #post-## -->




					<div class="cat_pagination">
						<div  class="left"><?php previous_post_link( '%link', '' . _x( '&lt;', 'Previous post link', 'bare' ) . ' Older Post' ); ?></div>
						<div  class="right"><?php next_post_link( '%link', 'Newer Post ' . _x( '&gt;', 'Next post link', 'bare' ) . '' ); ?></div>
						<!--<div  class="alignleft"><?php previous_post_link( '%link', '' . _x( '&lt;', 'Previous post link', 'bare' ) . ' %title' ); ?></div>
						<div  class="alignright"><?php next_post_link( '%link', '%title ' . _x( '&gt;', 'Next post link', 'bare' ) . '' ); ?></div>-->
					</div><!-- #nav-below -->


					<?php //comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
