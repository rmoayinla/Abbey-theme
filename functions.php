<?php

require trailingslashit( get_template_directory () )."libs/wp_bootstrap_navwalker.php";
require trailingslashit( get_template_directory () )."functions/theme_setup.php";
require trailingslashit( get_template_directory () )."functions/custom-functions.php";

$content_width; 

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

   	 	set_post_thumbnail_size ( $abbey_theme_thumbnail_size );

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
			'height'      => '',
	    	'width'       => '',
	    	'flex-height' => true,
	    	'flex-width'  => true,
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

    	$content_width = apply_filters( "abbey_theme_content_width", 600 );


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

		wp_enqueue_script( "abbey-script", get_template_directory_uri()."/js/script.js", array( "jquery" ), 1.0, false );

		/*
		* enqueueu bootstrap js 
		*
		*/
		$bootstrap_js_cdn = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js";
		wp_enqueue_script( "abbey-bootstrap-js", esc_url( $bootstrap_js_cdn ), array( "jquery" ), "", false );
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

function abbey_theme_page_id(){
	$id = (is_front_page()) ? "front-page" : "blog-page" ;
	echo esc_attr($id);

}

function abbey_theme_show_services(){
	$defaults = abbey_theme_defaults();
	$services = $defaults["services"]["lists"];
	if( count($services) > 0 ){
			$html = "";
		foreach( $services as $service ){
			$html .= "<div class='col-md-4' id='service-icons'><div class='service-wrapper'>";
			if( !empty($service["icon"]) ){$html .= "<div class='service-icon'><span class='fa ".esc_attr($service["icon"])." fa-3x' > </span></div>"; }
			if( !empty($service["header-text"]) ){$html .= "<div class='service-heading text-capitalize'><h4>".esc_html($service["header-text"]). "</h4></div>"; }
			if( !empty($service["body-text"]) ){
				$html .= "<div class='service-body'>";
				$html .= esc_html($service["body-text"]);
				$html .= "</div>";
			 }
			$html .= "</div></div>";

		}
	}
	echo $html;
}

function abbey_numerize($string){
	$result = preg_replace("/[^0-9.]/", '', $string);
	return $result;
}

function abbey_contact_icon($contact){
	$contact = esc_attr($contact);
	switch ( $contact ){
		case "address" : 
			$icon = "fa-map-marker";
			break;
		case "tel":
		case "telephone":
		case "phone-no":
		case "mobile-no":
			$icon = "fa-phone";
			break;
		case "email":
		case "mail":
			$icon = "fa-envelope";
			break;
		case "facebook" :
			$icon = "fa-facebook";
			break;
		case "twitter" :
			$icon = "fa-twitter";
			break;
		case "whatsapp":
		case "whats-app":
			$icon = "fa-whatsapp";
			break;
		case "pinterest":
		case "pininterest":
			$icon = "fa-pinterest";
			break;
		case "g-plus":
		case "google-plus":
		case "googleplus":
			$icon = "fa-google-plus";
			break;
		case "instagram":
			$icon = "fa-instagram";
			break;
		case "tumblr":
			$icon = "fa-tumblr";
			break;
		case "github":
			$icon = "fa-github";
			break;
		case "bitbucket":
			$icon = "fa-bitbucket";
			break;
		default:
			$icon = "fa-list";

	}
	return $icon;
}

function abbey_display_contact( $contact, $heading ){
	$html = "";
	
	if( !is_array( $contact ) ) {
		$html .= "<div class='col-md-6 margin-bottom-sm'>";
		$html .= "<header class='text-capitalize'>". esc_html( $heading ). "</header>";
		$html .= "<div clas;s='medium'>". esc_html( $contact ) . "</div>";
		$html .= "</div>";
	}
	else{
		$contacts = $contact;
		foreach ( $contacts as $contact_heading => $contact ){
			$contact_heading = $contact_heading." ".$heading;
			$html .= abbey_display_contact($contact, $contact_heading);
		}
	}

	return $html;
}