<?php

function abbey_page_title(){
	global $abbey_defaults;
	$page_description = ( !empty( $abbey_defaults["page"]["description"] ) ) ? esc_html( $abbey_defaults["page"]["description"] ) : "";
	$title = '<h1 class="page-title">' . get_the_title() . '</h1>
		<summary class="description">
			<em>'.apply_filters( "abbey_page_description", $page_description, get_the_ID() ) . '</em>.
		</summary>';
	echo apply_filters( "abbey_theme_page_title", $title );
}

function abbey_post_title(){
	$summary = get_the_excerpt();
	$title = '<h1 class="page-title">' . get_the_title() . '</h1>
		<summary class="post-excerpt">
			<em>'.apply_filters( "abbey_post_summary", $summary, get_the_ID() ) . '</em>.
		</summary>';
	echo apply_filters( "abbey_theme_post_title", $title );
}


function abbey_page_media(){
	if ( has_post_thumbnail() ){
		$icon = the_post_thumbnail();
	} else{
		$icon = "";
	}
	//$icon = '<div><h2 class="icon-large"><span class="glyphicon glyphicon-blackboard"></span></h2></div>';//
	echo apply_filters( "abbey_theme_page_header_media", $icon );
}


function abbey_latest_posts(){
	echo '
		<aside id="latest-posts" class="pad-medium col-md-6 text-center">
			<div class="inner-wrapper">
				<h2 class="page-header">'. __( "Recent Posts", "abbey" ). '</h2>
				<div class="small description inner-pad-medium"> ' . 
					__("Most recent posts from my blog") . 
				'</div>';	
			// run function to show posts //

	echo	'</aside>';

}
add_action ( "abbey_theme_404_page_widgets", "abbey_latest_posts", 10);

function abbey_latest_quotes(){
	echo '
		<aside id="quotes" class="pad-medium col-md-6 text-center">
			<div class="inner-wrapper">
				<h2 class="page-header">'. __("Todays's Quote", "abbey"). '</h2>
				<div class="small description inner-pad-medium"> '.
					__( "Quotes and thoughts from my Quote book", "abbey" ) .
				'</div>';
			//run function to show quotes //

	echo	'</aside>';

}
add_action ( "abbey_theme_404_page_widgets", "abbey_latest_quotes", 20 );

function abbey_footer_credits(){
	$footer_defaults = ( !empty( abbey_get_defaults( "footer" ) ) ) ? abbey_get_defaults( "footer" ) : "";
	$footer_credits = ( !empty( $footer_defaults ) ) ? $footer_defaults[ "credits" ] : "";

	if( count( $footer_credits ) > 0 ) : 
		$html = '<ul class="list-inline">';
		foreach ( $footer_credits as $title => $credits ) : 
			$html .= '<li>'.$credits.'</li>';
		endforeach;
		$html .= '</ul>';
	endif;

	echo $html;
}

add_action ( "abbey_theme_footer_credits", "abbey_footer_credits" );