<?php

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
	if( has_custom_logo() ){
		$logo = get_theme_mod("custom_logo");
		$logo_attachment = wp_get_attachment_image_src( $logo, "full" );
		$logo_url = $logo_attachment[0]; 
		$image = "<img src='".esc_url($logo_url)."' class='custom-logo ".$class."' />";
		echo $image;
	}
	else{
		echo "<h2>".blog_info("name")."</h2>";
	}
}

function abbey_class ( $prefix ) {
	global $wp_query;
	$class = "";
	if( $wp_query->is_page() ){ $class = "page"; }
	esc_attr_e ( $prefix."-".$class );
}