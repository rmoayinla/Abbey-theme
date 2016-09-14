<?php

function abbey_numerize($string){
	$result = preg_replace("/[^0-9.]/", '', $string);
	return $result;
}

/*
* wrapper function for wp_nav_menu 
* instead of calling wp_nav_menu, I am using my own custom wrapper for the wordpress built in function
*/
function abbey_nav_menu( $args = array() ){
	$defaults = array(	'menu'              => '',
	                	'theme_location'    => '',
	                	'depth'             => 1,
	                	'container'         => 'div',
	                	'container_class'   => '',
	        			'container_id'      => '',
	                	'menu_class'        => '',
	                	'fallback_cb'       => '',
	                	'walker'            => ''
	            );
	$args = wp_parse_args( $args, $defaults );

	wp_nav_menu( $args );

}

/*
* function to generate font-awesome classes for social icons
* this function will only work properly when you have font-awesome enqueued in your theme
* @return: string 
*
*/
function abbey_contact_icon($contact){
	$contact = esc_attr($contact);
	switch ( $contact ){
		case "address" : 
			$icon = "fa-map-marker"; //icon for address//
			break;
		case "tel":
		case "telephone":
		case "phone-no":
		case "mobile-no":
			$icon = "fa-phone"; // mobile phone icon//
			break;
		case "email":
		case "mail":
			$icon = "fa-envelope"; // mail icon //
			break;
		case "facebook" :
			$icon = "fa-facebook"; // icon for facebook //
			break;
		case "twitter" :
			$icon = "fa-twitter"; // twitter icon //
			break;
		case "whatsapp":
		case "whats-app":
			$icon = "fa-whatsapp"; // whatsapp icon //
			break;
		case "pinterest":
		case "pininterest":
			$icon = "fa-pinterest"; // pinterst icon //
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
			$icon = "fa-list"; // default icon if icon is not set nor found //

	}
	return $icon;
}

function abbey_display_contact( $contact, $heading ){
	$html = "";
	
	if( !is_array( $contact ) ) {
		$html .= "<div class='col-md-6 margin-bottom-sm'>";
		$html .= "<header class='text-capitalize'>". esc_html( $heading ). "</header>";
		$html .= "<div class='medium'>". esc_html( $contact ) . "</div>";
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

function abbey_get_contact( $type, $key = "" ){
	global $abbey_defaults;
	if( isset( $abbey_defaults["contacts"] ) ){
		$contacts = $abbey_defaults["contacts"];
		$contact_type = ( isset ( $contacts[ $type ] ) ) ? $contacts[$type] : "";
		if (! empty ( $contact_type ) ) {
			$contact = ( !empty($key) && isset($contact_type[$key]) ) ? $contact_type[$key] : $contact_type;
		}
		
	}
	return $contact;
}
function abbey_theme_page_id( $id= "" ){
	if ( empty($id) ) {
		if( is_front_page() ){ $id = "front-page"; }
		if ( is_page() ) { $id = "site-page"; }
		if( is_404() ) { $id = "error-404-page"; }
		if( is_search() ) { $id = "search-page"; }
	} 
	echo esc_attr( apply_filters( "abbey_theme_page_id", $id ) );

}

function abbey_theme_show_services(){
	global $abbey_defaults;
	$services = ( !empty( $abbey_defaults["services"]["lists"] ) ) ? $abbey_defaults["services"]["lists"] : "";
	if( count($services) > 0 ){
			$html = "";
		foreach( $services as $service ){
			$html .= "<div class='col-md-4 col-sm-6 col-xs-6 service-icons'><div class='service-wrapper'>";
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



function abbey_custom_logo( $class = "" ){
	$class = ( !empty($class) ) ? esc_attr( $class ) : "";
	$title = get_bloginfo("name");
	if( has_custom_logo() ){
		$logo = get_theme_mod("custom_logo");
		$logo_attachment = wp_get_attachment_image_src( $logo, "full" );
		$logo_url = $logo_attachment[0]; 
		$image = "<img src='".esc_url($logo_url)."' class='custom-logo {$class}' alt ='{$title}' ";
		$image .= " /> ";
		echo $image;
	}
	else{
		echo "<h2>".bloginfo("name")."</h2>";
	}
}

function abbey_class ( $prefix ) {
	global $wp_query;
	$class = "";
	if( $wp_query->is_page() ){ $class = "page"; }
	esc_attr_e ( $prefix."-".$class );
}

function abbey_nav_toggle () { ?>
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	    <span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	</button>	<?php
}

/*
* display the theme set primary menu 
*
*/
function abbey_primary_menu(){
    $args = apply_filters( "abbey_primary_menu_args", array(
	                	'menu'              => 'primary',
	                	'theme_location'    => 'primary',
	              		'depth'             => 2,
	                	'container'         => 'div',
	                	'container_class'   => 'collapse navbar-collapse',
	        			'container_id'      => 'bs-example-navbar-collapse-1',
	                	'menu_class'        => 'nav navbar-nav',
	                	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                	'walker'            => new wp_bootstrap_navwalker()
	               	 	)
	);
	if ( has_nav_menu( 'primary' ) ):
    	abbey_nav_menu ( $args );
    endif;
}
add_action( "abbey_theme_primary_menu", "abbey_primary_menu" ); 

/*
* display the theme set secondary menu
*
*/
function abbey_secondary_menu( $args = array() ){
	$defaults = apply_filters( "abbey_theme_secondary_menu_args", array(
	                		'menu'              => 'secondary',
	                		'theme_location'    => 'secondary',
	                		'depth'             => 1,
	                		'container'         => 'ul',
	                		'menu_class'   		=> 'nav nav-pills',
	                	)
    );
    $args = ( count( $args ) > 0 ) ? wp_parse_args( $args, $defaults ) : $defaults;
	if( has_nav_menu("secondary") ) :
		abbey_nav_menu( $args );
	endif;
	
}

/*
* display the theme set social menu 
*
*/
function abbey_social_menu(){
	$defaults = apply_filters( "abbey_theme_social_menu_args", array(
								'menu' => 'social', 
								'theme_location' => 'social',
								'depth' => 1, 
								'container' => 'ul', 
								'menu_class' => 'nav', 
								'walker' => new Abbey_Social_Nav_Walker()
							) 
	);
	if (! has_nav_menu("social") ) { abbey_show_social_contacts();}
	else{ abbey_nav_menu ($defaults); }
}

/*
* wrapper class for wp post_class() function 
*
*/
function abbey_post_class ( $class = "" ){
	if ( !is_array( $class ) ) { $class .= " entry-content"; }
	else { $class[] = "entry-content"; }
	post_class( apply_filters( "abbey_post_classes", $class ) );
}
