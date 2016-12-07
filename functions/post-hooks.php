<?php
add_action( "abbey_theme_before_post_content", "abbey_post_tags", 90 ); 
function abbey_post_tags(){
	if( has_post_format() )
		return;
	
	$html = "<div class='post-tags'>";
	if( !empty ( get_the_tags() ) ){
		$html .= abbey_cats_or_tags( "tags", __( "Tagged in:", "abbey" ), "fa-tags" );
	}

	$html .= "</div>";

	echo $html;
}

add_action( "abbey_theme_after_page_header", "abbey_post_gallery_slides" );
function abbey_post_gallery_slides(){
	$gallery = get_post_gallery( get_the_ID(), false ); 
	

	if( has_post_format() || empty( $gallery ) )
		return;
	
	$gallery_id = explode( ",", $gallery["ids"] );

	$html = "<ul class='list-inline'>";
	$gallery = get_post_gallery( get_the_ID(), false ); 
	foreach( $gallery["src"] as $key => $src ){
		$html .= sprintf( '<li><a href="%1$s" data-full-image="%3$s"><img src="%2$s"></a></li>', 
							get_attachment_link( (int) $gallery_id[$key] ),
							esc_url( $src ), 
							wp_get_attachment_image_url( $gallery_id[$key], "full" )
						);
	}
	$html .= "</ul>";

	echo $html;

	print_r($gallery);

}

/*
Quote post
*/
add_action( "abbey_theme_quote_post_footer", "abbey_show_quote_archive", 10 ); 
function abbey_show_quote_archive(){
	$html = sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', 
						get_post_format_link( "quote" ), 
						__( "Read all my quotes", "abbey" ), 
						__( "RMO Book of Quotes", "abbey" ) 
					);
	echo "<li>$html</li>";
}

/*
* Gallery post 
*/
add_action( "abbey_gallery_post_summary", "abbey_gallery_summary" ); 
function abbey_gallery_summary( $galleries ){
	
}