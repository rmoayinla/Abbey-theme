<?php

function abbey_page_title( $page_id ){
	global $abbey_defaults;
	$page_description = ( !empty( $abbey_defaults["page"]["description"] ) ) ? esc_html( $abbey_defaults["page"]["description"] ) : "";
	echo '<h1>' . get_the_title() . '</h1>
		<summary class="description">
			<em>'.apply_filters( "abbey_page_description", $page_description, get_the_ID() ) . '</em>.
		</summary>';
}

add_action( "abbey_theme_page_title", "abbey_page_title" );

function abbey_page_header_icon( $page_id ){
	echo '<div><h2 class="icon-large"><span class="glyphicon glyphicon-blackboard"></span></h2></div>';
}
add_action ( "abbey_theme_page_header_media", "abbey_page_header_icon"  );

function abbey_page_header_menu(){

}
add_action( "abbey_theme_header_contact", "abbey_page_header_menu" );