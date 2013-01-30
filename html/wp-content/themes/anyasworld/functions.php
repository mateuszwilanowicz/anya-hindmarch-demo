<?php

if ( ! isset( $content_width ) )
	$content_width = 640;

add_editor_style();

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );

add_custom_background();

add_custom_image_header( '', 'bare_admin_header_style' );

add_filter('widget_text', 'do_shortcode');

include_once 'metaboxes/setup.php';
include_once 'metaboxes/homepage.php';

if ( ! function_exists( 'bare_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 */
function bare_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

function register_bare_menus(){

register_nav_menus(
	array(
		'header-menu' => __( 'Header Menu' )
	)
);

register_nav_menus(
	array(
		'sub-menu' => __( 'Sub Menu' )
	)
);

}
add_action( 'init', 'register_bare_menus' );

if ( function_exists('register_sidebar') ){
    	register_sidebar();
}

if ( ! function_exists( 'bare_comment' ) ) :

function bare_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	echo '<li ';
		comment_class();
	echo join(array(
		' id="li-comment-',
		$comment->comment_ID,
		'">',
		'<span>',
		$comment->comment_author,
		' said: </span>',
		$comment->comment_content,
		'</li>'
	));

}
endif;

if ( ! function_exists( 'bare_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function bare_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bare' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bare' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bare' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

if ( ! function_exists( 'bare_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function bare_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'bare' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'bare' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/*********************************************************************************************************
 *  Custom PHP Written By Sam Newman 29th August 2012 - Modiefied by Mateusz Wilanowicz
 *********************************************************************************************************/
	function custom_excerpt_length( $length ) {	//	Fn returns customer excerpt len specified above
		return 10;
	}
	function custom_excerpt_more() {		//	Fn returns custom excerpt more specified above
		if(isset($post)) {
			return '... <a href="'. get_permalink($post->ID) . '" class="read_more">Read More &gt;</a>';
		}
	}

//	Add Filters
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	add_filter( 'excerpt_more', 'custom_excerpt_more' );

//
	function the_post_images() {
		$szPostContent = get_the_content();
		$szSearchPattern = '~<img [^\>]*\ />~';
		preg_match_all( $szSearchPattern, $szPostContent, $aPics );

		 $iNumberOfPics = count($aPics[0]);

		if ( $iNumberOfPics > 0 ) :

		    for ( $i=0; $i < $iNumberOfPics ; $i++ ) echo $aPics[0][$i];

		endif;
	}
	function get_oc( $content, $gallery_tag_start, $gallery_tag_end ) {

		$searchPattern = '~<img [^\>]*\ />~';
		$content = preg_replace( $searchPattern, '' , $content);
		return substr_count( $postContent, $gallery_tag_start );

	}
	function the_p_text($more_link_text = null, $stripteaser = false) {

		$postContent = get_the_content($more_link_text = null, $stripteaser = false);
		$searchPattern = '~<img [^\>]*\ />~';
		$postContent = preg_replace( $searchPattern, '' , $postContent);
		$gallery_tag_start = '[gallery';
		$gallery_tag_end = ']';

		$no_occurences = substr_count( $postContent, $gallery_tag_start );

		if( $no_occurences > 0 ) :

			$offset = 0;

			for( $i = 0; $i < $no_occurences; $i++ ) :

				$start = $offset = stripos( $postContent, $gallery_tag_start, $offset );
				$finish = $offset = stripos( $postContent, $gallery_tag_end, $offset );
				$len = $finish - $start;
				$len += 1;
				$postContent = substr_replace( $postContent, '', $start, $len );

			endfor;

		endif;

		return $postContent;
	}
	function the_post_content( $more_link_text = null, $stripteaser = false ) {
		$content = the_p_text( $more_link_text, $stripteaser );
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	}
	function the_galleries( $more_link_text = null, $stripteaser = false ) {

		$postContent = get_the_content( $more_link_text = null, $stripteaser = false );
		$searchPattern = '~<img [^\>]*\ />~';
		$postContent = preg_replace( $searchPattern, '' , $postContent);
		$gallery_tag_start = '[gallery';
		$gallery_tag_end = ']';
		$no_occurences = substr_count( $postContent, $gallery_tag_start );

		if( $no_occurences > 0 ) :

			$offset = 0;

			for( $i = 0; $i < $no_occurences; $i++ ) :

				$start = $offset = stripos( $postContent, $gallery_tag_start, $offset );
				$finish = $offset = stripos( $postContent, $gallery_tag_end, $offset );
				$len = $finish - $start;
				$len += 1;
				$galleries .= substr( $postContent, $start, $len );

			endfor;

		endif;
		$galleries = apply_filters('the_content', $galleries);
		$galleries = str_replace(']]>', ']]&gt;', $galleries);
		echo $galleries;
	}
	
	
	

?>

