<?php

/*
 *  Load translation
 *
 */

load_theme_textdomain( 'xfce', TEMPLATEPATH . '/languages' );

/*
 *  Register HTML5 support for WordPress
 *
 */

add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

/*
 *  Register sidebars
 *
 */

if( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'xfce' ),
		'id' => 'sidebar_main',
		'before_widget' => ' ',
		'after_widget' => ' ',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	/* Add more sidebars here if needed */
}

/*
 *  Register menus
 *
 */

if( function_exists( 'register_nav_menu' ) ) {
	register_nav_menus( array(
		'navi_main' => __( 'Main navigation', 'xfce' )
		/* Add more menus here if needed */
	) );
}

/*
 *  Include stylesheets
 *
 */

add_action( 'wp_enqueue_scripts', 'xfce_styles' );

function xfce_styles( ) {
	wp_enqueue_style( 'xfce-base', 'https://www.xfce.org/style/css.php?site=blog' );
}

?>
