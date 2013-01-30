<?php $category = get_the_category();  ?><div id="breadcrumbs"><?php

	echo $category[0]->cat_name . '</div>';

	$count = 0;

	while ( have_posts() ) : the_post();

		$count++;

		$adc = ' cat_el_rm';

		if( ( $count  % 3 ) == 0 ) $adc = ''; ?>

			<div class="cat_el<?= $adc; ?>">
				<div>
					<?php get_the_image( array( 'size' => 'medium' ) ); ?>
				</div>
				<div>
					<a class="post_link" href="<?php  the_permalink() ?>">
					<div class="cat_head"><?php the_title(); ?></div>
					<?php the_excerpt(); ?>
					</a>
				</div>
			</div>

	<?php endwhile; ?>

	<div class="clear"></div>

	<?php if ( $wp_query->max_num_pages > 1 ) : ?>

		<div class="cat_pagination">
			<div class="left"><?php next_posts_link('&lt; Older') ?></div>
			<div class="right"><?php previous_posts_link('Newer &gt;') ?></div>
		</div>
		
	<?php endif; ?>

<script>//alert("' . get_the_category() . '")</script>	