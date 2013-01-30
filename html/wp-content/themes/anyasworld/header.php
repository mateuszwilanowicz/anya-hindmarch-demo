<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php

	global $page, $paged;

	wp_title( '|', true, 'right' );

	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bare' ), max( $paged, $page ) );
?></title>


<!--
<link rel="profile" href="uri for xhtml profile" />
-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		<div id="logo">
			<a href="http://www.anyahindmarch.com" ><img src="<?php bloginfo('template_url') ?>/images/anyahindmarch_logo.gif" /></a>
			<div id="header">
				<ul id="TopMenu">
					<li><a title="Corporate Gifts" href="http://www.anyahindmarch.com/corporate/"><span id="ctl00_Header_rptTopNavigation_ctl01_lblName">Corporate Gifts</span></a></li>
					<li><a title="My Account" href="http://www.anyahindmarch.com/account/my_account_home"><span id="ctl00_Header_rptTopNavigation_ctl02_lblName">My Account</span></a></li>
					<li><a title="Your shopping bag" href="http://www.anyahindmarch.com/checkout/shopping_bag"><span id="ctl00_Header_rptTopNavigation_ctl03_lblName">Shopping Bag</span></a></li>
				</ul>
			</div>
		</div>
		
		<!--<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>

		<<?php echo $heading_tag; ?> id="site-title">
		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</<?php echo $heading_tag; ?>>	-->
		<!--		<div>
					<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'bare' ); ?>"><?php _e( 'Skip to content', 'bare' ); ?></a></div>
					<?php
	/*
	wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) );
	*/
	?>
				</div> #access -->
		<div id="main">
			<div id="smaller_logo">
				<img src="<?php bloginfo('template_url') ?>/images/logo_website_print.jpg" />
			</div>
			<?php wp_nav_menu(  array( 'theme_location' => 'header-menu' ));  ?>
			<div class="clearer"></div>
			<?php wp_nav_menu(  array( 'theme_location' => 'sub-menu' ));  ?>