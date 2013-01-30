<?php get_header(); ?>
		<div id="container">
			<div id="content" role="main">
				<!--<h1><?php //printf( __( 'Category Archives: %s', 'bare' ), '<span>' . single_cat_title( '', false ) . '</span>' );?></h1> -->
				
				<?php
					#$category_description = category_description();
					#if ( !empty( $category_description ) ) echo '<div class="archive-meta">' . $category_description . '</div>';

					get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
