<?php

$homepage_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_homepage_areas',
	'title' => 'Homepage Areas',
	'include_template' => 'homepage.php',
	'mode' => WPALCHEMY_MODE_EXTRACT,
	'prefix' => '_home_',
	'template' => get_stylesheet_directory() . '/metaboxes/homepage-meta.php',
));

$gallery_mb = new WPAlchemy_MetaBox(array
		(
				'id' => '_media_page',
				'title' => 'Media Box',
				'mode' => WPALCHEMY_MODE_EXTRACT,
				'prefix' => '_media_',
				'template' => get_stylesheet_directory() . '/metaboxes/media-meta.php',
		));

/* eof */