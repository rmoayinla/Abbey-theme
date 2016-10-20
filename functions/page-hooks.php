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

function abbey_post_nav(){
	$prev_post = get_previous_post(); // previous post//
	$next_post = get_next_post(); // next post //
	$html = "<div class='row post-navigation'>\n";
	if ( !empty( $prev_post ) ) {
		$html .= "<div class='col-md-6 previous-post text-left'>\n";
		$html .= abbey_show_nav( $prev_post ); // check core for function documentation //
		$html .= "</div>";//close of previous-post class div//
	}
	if ( !empty( $next_post ) ){
		$html .= "<div class='col-md-6 next-post text-right'>\n";
		$html .= abbey_show_nav( $next_post, "next" );
		$html .= "</div>"; // close of next-post div //
	}
	$html .= "</div>"; // close of post-navigation class div //
	echo $html;
}

add_action( "abbey_theme_post_footer", "abbey_post_nav", 99);

function abbey_post_author_info(){
	$html = "<div class='author-info'>";
	$html .= "<div class='author-photo'>".abbey_author_photo( "", 64, "img-circle" ). "</div>";
	$html .= sprintf( '<div class="author-title row">
						<div class="author-name col-md-7"><h4 class="no-top-margin no-bottom-margin"> %1$s </h4></div>
						<div class="author-rate col-md-5"> <em> %2$s </em> <span class="author-post-count"> %3$s </span>
						</div></div>',
						abbey_post_author( "display_name" ), 
						__( "Published posts:", "abbey" ),
						abbey_post_author( "post_count" )
					);
	$html .= "<div class='author-description'>".esc_html( abbey_post_author( "description" ) ). "</div>";
	$html .= sprintf( '<footer class="author-info-footer h4">%1$s<footer>',
						implode( " ", abbey_author_info( abbey_post_author( "author" ) ) ) 
					);
	$html .= "</div>";

	echo $html; 
}
add_action ( "abbey_theme_post_footer", "abbey_post_author_info", 20);