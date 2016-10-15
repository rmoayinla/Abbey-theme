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
* wrapper function for wordpress register_sidebar
*
*/

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
		case "website":
			$icon = "fa-globe"; 
			break;
		case "profile":
			$icon = "fa-user";
			break;
		case "posts":
			$icon = "fa-newspapar-o";
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
		if ( is_single() ) { $id = "post-page"; }
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

/*
* a wrapper function to get the uploaded logo 
*
*/

function abbey_custom_logo( $class = "" ){
	$class = ( !empty($class) ) ? esc_attr( $class ) : "";
	$title = get_bloginfo("name");
	if( has_custom_logo() ){
		$logo = get_theme_mod("custom_logo");
		$logo_attachment = wp_get_attachment_image_src( $logo, "full" );
		$logo_url = $logo_attachment[0]; 
		$image = "<img src='".esc_url($logo_url)."' class='custom-logo {$class}' alt ='{$title}' ";
		$image .= " /> ";
		return $image;
	}
	else{
		return "<h2>".bloginfo("name")."</h2>";
	}
}

function abbey_show_logo ( $prefix_id = "", $logo_class = "", $show_site_name = true ){
	$prefix_id = ( !empty( $prefix_id ) ) ? esc_attr( $prefix_id."-" ) : "";

	$html = '<div id="'.$prefix_id.'site-logo" class="inline">'.abbey_custom_logo( $logo_class ).'</div>';
	if ( $show_site_name )
		$html .= '<div id="'.$prefix_id.'site-name" class="inline">'.get_bloginfo('name'). '</div>';
	
	echo $html; 
	
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
* wrapper function for wp post_class() function 
*
*/
function abbey_post_class ( $class = "" ){
	if ( !is_array( $class ) ) { $class .= " entry-content"; }
	else { $class[] = "entry-content"; }
	post_class( apply_filters( "abbey_post_classes", $class ) );
}

/*
* 
*
*/
function abbey_display_sidebar ( $sidebar_id ){
	if ( is_active_sidebar( $sidebar_id ) ){
		dynamic_sidebar( $sidebar_id );
	} else {
		echo __( "Sorry, there is no sidebar widget registerd with {$sidebar_id}", "abbey" );
	}
}

/*
* a wp filter to add icons to nav_menu
*
*/
function abbey_add_to_primary_menu ( $items, $args ) {
	if( 'primary' === $args->theme_location ) {
		$items .= '</ul>';
		$items = apply_filters( "abbey_extra_primary_menu", $items );
	}
	return $items;
}
add_filter( 'wp_nav_menu_items','abbey_add_to_primary_menu',10,2 );

function abbey_add_extra_primary_menu ( $extras ){
	$extras .= "<div class='navbar-right'><ul class='nav navbar-nav' id='primary-icon-nav'>";
	$icons = apply_filters( "abbey_icon_navs", 
		array(
			"search" => "fa-search",
			"comment" => "fa-comments", 
			"read snippets" => "fa-code", 
			"print" => "fa-print",
			"read latest posts" => "fa-th"
		) 
	);
	foreach ( $icons as $title => $icon ){
		$extras .= sprintf( '<li><a href="#" id="%1$s-icon-nav" class="js-link" title="%2$s">
							<span class="fa %3$s"></span>
							</a></li>', 
							esc_attr( $title ),
							esc_attr( sprintf( __( "Click to %s", "abbey" ), $title ) ), 
							esc_attr( $icon )
			);
	}
	
	$extras .= "</ul></div>";
	return $extras;
}
add_filter( "abbey_extra_primary_menu", "abbey_add_extra_primary_menu" );


function abbey_show_nav( $post, $nav = "previous" ){
	$class = ( $nav === "previous" ) ? "previous-button" : "next-button";
	$icon = ( $nav === "previous" ) ? "glyphicon-chevron-left" : "glyphicon glyphicon-chevron-right";
	
	return sprintf( '<a href="%1$s" class="%5$s-button" title="%2$s">
				<span class="glyphicon %6$s"></span>
		 		<p> %3$s </p><h4 class="%5$s-post-title">%4$s</h4>
		 	   </a>',
			get_permalink($post->ID),
			sprintf( __( "Click to view %s post", "abbey" ), $nav ),
			sprintf( __( "%s post:", "abbey" ), ucwords( $nav ) ), 
			apply_filters( "the_title", $post->post_title ), 
			esc_attr( $nav ),
			esc_attr( $icon ) 
			);
}

function abbey_post_author( $key = "" ){
	global $authordata, $post;

	$author_id = ( is_object( $authordata ) ) ? $authordata->ID : $post->post_author; // get the post author id //
	$author = get_userdata( $author_id );
	$values = array(); 
	$values["display_name"] = $author->display_name; // the author display name//
	$values["post_count"] = get_the_author_posts(); // the author post count //
	$values["description"] = $author->description;
	$values["author"] = $author;
	
	if ( !empty( $key ) && array_key_exists( $key, $values ) )
		return $values[$key];

	$html = sprintf( '<span class="post-author-info"><span class="author-name"> %1$s </span>
						<span class="badge author-post-count"> %2$s </span> </span>',
						esc_html( $values["display_name"] ), 
						(int) $values["post_count"]
					);
	
	echo $html;
	
}

function abbey_author_info( $author, $key = "" ){
	$author_info = array(); // array to contain author info which will be displayed in a dropdown //
	$author_info["email"] = sprintf( '<a href="mailto:%1$s" title="%2$s" id="emailauthor">
									<span class="fa fa-envelope"></span></a>', 
							antispambot( $author->user_email ), 
							esc_attr( __( "Send this author an email", "abbey" ) )
							); 
	
	$author_info["website"] = sprintf( '<a href="%1$s" title="%2$s" target="_blank">
										<span class="fa fa-fw fa-globe"></span> </a>',
									esc_url( $author->user_url ),
									esc_attr( __( "Visit author's website", "abbey" ) )
							);


	$author_info["profile"] = sprintf( '<a href="#" title="%1$s" id="authorprofile" class="js-link"> 
										<span class="fa fa-fw fa-user"></span> </a>',
										esc_attr( __( "View author's profile", "abbey" ) )
							);

	$author_info["posts"] = sprintf( '<a href="%1$s" title="%2$s"> 
									<span class="fa fa-fw fa-newspaper-o"></span> </a>', 
							esc_url( get_author_posts_url( $author->ID ) ),
							esc_attr( sprintf( __( "View posts by %s", "abbey" ), $author->display_name ) )
							 );
	return $author_info;
}

function abbey_author_photo( $id = "", $size = 32, $class = "" ){
	global $authordata;
	if ( empty($id) && !empty( $authordata->ID ) )
		$id = (int) $authordata->ID;
	return get_avatar( $id, $size, "", "", array("class" => $class ) );
}

