<?php
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// Enable support for Post Thumbnails, and declare two sizes.
	//add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 672, 372, true );
	//add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(array(
		'primaire'   => __('Menu principal', 'tcalsace'),
		'secondaire' => __('Menu secondaire', 'tcalsace'),
	));



	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));
	
	
	
	/*
	 * Action des miniatures d'aperçu des articles
	 */
	
	if (function_exists('add_theme_support')) {
		add_theme_support('post-thumbnails');
	}
	 
	 
	 /*
		 On met en place l'infinite scroll de Jetpack
	 */
	 
	 add_theme_support('infinite-scroll', array(
	 	'type'				=> 'click',
	 	'footer-widgets'		=> false,
	 	'container'			=> 'content-area',
	 	'wrapper'			=> true,
	 	'render'				=> false,
	 	'posts_per_page'		=> false
	 ));
	
?>
