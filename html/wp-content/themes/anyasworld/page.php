<?php
/**
 * Template Name: Page
 **/
get_header();

	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div id="breadcrumbs">
				<?php the_title(); ?>
			</div>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="page_entry">

					<?php $feat_img = get_the_image( array(
								'size' => 'large',
								'echo' => false
							));

							if( $feat_img ) :

								echo $feat_img;

							endif; ?>

						<h1 class="page_title"><?php the_title(); ?></h1>

						<?php the_content() ?>

						<?php
							$meta = get_post_meta(get_the_ID());
							if(array_key_exists('_media_leftimg', $meta) || array_key_exists('_media_rightimg', $meta)) {
						?>
						<div class="media_gallery">
						<?php
								if(array_key_exists('_media_leftimg', $meta)) {
									$leftpost = get_post($meta['_media_leftimg'][0]);
									$content = $leftpost->post_content;
									$link = get_permalink($leftpost->ID);
						?>
							<div>
								<?= apply_filters('the_content', $content); ?>
								<!-- <a href="<?= $link ?>" class="readmore">See More &gt;</a> -->
							</div>
						<?php
								}
								if(array_key_exists('_media_rightimg', $meta)) {
									$rightpost = get_post($meta['_media_rightimg'][0]);
									$content = $rightpost->post_content;
									$link = get_permalink($rightpost->ID);
						?>
							<div>
								<?= apply_filters('the_content', $content); ?>
								<!--  <a href="<?= $link ?>" class="readmore">See More &gt;</a> -->
							</div>
						<?php
								}
						?>
						</div>
						<?php
							}
							if(array_key_exists('Linked Tag', $meta)) {
								$tag = $meta['Linked Tag'][0];
								$posts = get_posts(array('tag'=>$tag, 'orderby'=>'date', 'order'=>'ASC', 'posts_per_page'=>6));
								if(count($posts) > 0) {
						?>
						<div class="medium_panels">
						<?php
							$counter = 0;
							foreach($posts as $post) {
								setup_postdata($post);
								echo '<div><a href="' . get_permalink($post->ID) . '">';
								echo get_the_post_thumbnail($post->ID, 'medium');
								echo '</a>';
								echo '<span class="home_title">' . (empty($post_meta['Homepage Title'][0]) ? $post->post_title : $post_meta['Homepage Title'][0]) . '</span><br />';
								echo empty($post_meta['Homepage Description'][0]) ? get_the_excerpt() : $post_meta['Homepage Description'][0] . '<a href="' . get_permalink($post->ID) . '" class="readmore">Read More &gt;</a>';
								echo '</div>';
								++$counter;
								if($counter % 3 == 0 && count($posts) > $counter) {
									echo '</div><div class="medium_panels">';
								}
							}
							wp_reset_postdata();
						?> 
						</div>
						<?php
								}
							}

						?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bare' ), 'after' => '</div>' ) ); ?>

					<div class="clear"></div>

				</div><!-- .entry -->
			</div>

	<?php endwhile;

get_footer(); ?>