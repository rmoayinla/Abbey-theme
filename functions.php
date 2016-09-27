<?php

require trailingslashit( get_template_directory () )."libs/wp_bootstrap_navwalker.php";
require trailingslashit( get_template_directory () )."libs/abbey_social_navwalker.php";

require trailingslashit( get_template_directory () )."functions/theme_setup.php";
require trailingslashit( get_template_directory () )."functions/front-page-hooks.php";
require trailingslashit( get_template_directory () )."functions/page-hooks.php";
require trailingslashit( get_template_directory () )."functions/post-hooks.php";
require trailingslashit( get_template_directory () )."functions/core.php";
require trailingslashit( get_template_directory () )."functions/plugins.php";

$content_width = $abbey_defaults = ""; 

if( !function_exists( "abbey_theme_setup" ) ) {
	
	function abbey_theme_setup () {

		// add theme support for post formats //

		$abbey_theme_post_formats = apply_filters ( "abbey_theme_post_formats", array( "gallery", "quote" ) );
		add_theme_support ( "post-formats", $abbey_theme_post_formats );

		/**
    	 * Add default posts and comments RSS feed links to <head>.
     	*/
    	add_theme_support( 'automatic-feed-links' );
 
    	/**
    	 * Enable support for post thumbnails and featured images.
    	 */
    	$abbey_theme_post_thumbnails_support = apply_filters ( "abbey_theme_post_thumbnails_support", array( "post", "page" ) );
   	 	add_theme_support( 'post-thumbnails', $abbey_theme_post_thumbnails_support );

   	 	$abbey_theme_thumbnail_size = apply_filters ( "abbey_theme_thumbnail_size", array ("width" => 320, "height" => 320 ) );

   	 	set_post_thumbnail_size ( $abbey_theme_thumbnail_size["width"], $abbey_theme_thumbnail_size["height"] );

   	 	/*
   	 	* add theme support for custom backgrounds 
   	 	*
   	 	*/
		 $abbey_theme_custom_background_defaults = apply_filters( "abbey_theme_custom_background_defaults",
		 	array(
		    'default-color'          => '',
		    'default-image'          => '',
		    'wp-head-callback'       => '_custom_background_cb',
		    'admin-head-callback'    => '',
		    'admin-preview-callback' => ''
			)
		);
		add_theme_support( 'custom-background', $abbey_theme_custom_background_defaults );

		/*
		* add theme support for custom headers 
		*
		*/

		register_default_headers( apply_filters( "abbey_theme_header_images", array() ) );

		$abbey_theme_custom_header_defaults = apply_filters( "abbey_theme_custom_header_defaults", 
			array(
		    'default-image'          => '',
		    'random-default'         => false,
		    'width'                  => 0,
		    'height'                 => 0,
		    'flex-height'            => true,
		    'flex-width'             => true,
		    'default-text-color'     => '',
		    'header-text'            => true,
		    'uploads'                => true,
		    'wp-head-callback'       => '',
		    'admin-head-callback'    => '',
		    'admin-preview-callback' => '',
		    )
		);
		add_theme_support( 'custom-header', $abbey_theme_custom_header_defaults );

		/*
		* add theme support for logo upload 
		*
		*/
		$abbey_theme_logo_upload_defaults = apply_filters( "abbey_theme_logo_upload_defaults", 
			array(
	    	'header-text' => array( 'site-title', 'site-description' ),
			) 
		);
		add_theme_support( 'custom-logo', $abbey_theme_logo_upload_defaults );


		//add support for document title tag //
		add_theme_support( 'title-tag' );

		/*
	 	* Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

   	 	/**
    	 * register custom navigation menus.
    	 */
    	register_nav_menus( apply_filters("abbey_theme_nav_menus", 
    	array(
        'primary'   => __( "Primary Menu", "abbey" ),
        'secondary' => __("Secondary Menu", "abbey" ), 
        'social' => __( "Social Icons Menu", "abbey")
    	) 
    	) );

    	global $content_width; 

    	$content_width = apply_filters( "abbey_theme_content_width", 400 );

    	global $abbey_defaults;

    	$abbey_defaults = abbey_theme_defaults();

		/*
		* abbey theme custom hook
		* add additional hooks here for theme setup 
		*
		*/ 

		do_action( "abbey_theme_after_setup" );

	}

} //end of function exist abbey_theme_setup //

add_action ( "after_setup_theme", "abbey_theme_setup" );

if( !function_exists( "abbey_theme_enque_styles" ) ) {
	
	function abbey_theme_enque_styles () {

		wp_enqueue_script( "abbey-script", get_template_directory_uri()."/js/script.js", array( "jquery" ), 1.0, true );

		/*
		* enqueueu bootstrap js 
		*
		*/
		$bootstrap_js_cdn = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js";
		wp_enqueue_script( "abbey-bootstrap-js", esc_url( $bootstrap_js_cdn ), array( "jquery" ), "", true );
		/*
		* enqueue bootstrap css
		*
		*/
		$bootstrap_cdn = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css";
		wp_enqueue_style( 'abbey-bootstrap-css', esc_url($bootstrap_cdn), array(), null );


		// enqueue theme style.css//
		wp_enqueue_style ( "abbey-style", get_stylesheet_uri() );

		
		/*
		* enque font-awesome 
		*
		*/
		wp_enqueue_style("abbey-fontawesome-css", get_template_directory_uri()."/css/font-awesome.min.css" ); 
		
		/*
		* action hook for other enqueueus 
		*
		*/
		do_action( "abbey_theme_enqueues" ); 


	}

}//end of function exist abbey_theme_enque_styles//

add_action( "wp_enqueue_scripts", "abbey_theme_enque_styles" );

add_filter( "abbey_theme_nav_menus", function ( $nav_menus ){
	$nav_menus ["footer-menu"] = __( "Footer Menu", "abbey" );

	return $nav_menus;
} );

