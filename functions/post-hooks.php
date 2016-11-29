<?php
add_action( "abbey_theme_before_post_content", "abbey_post_tags", 90 ); 
function abbey_post_tags(){
	$html = "<div class='post-tags'>";
	if( !empty ( get_the_tags() ) ){
		$html .= abbey_cats_or_tags( "tags", __( "Tagged in:", "abbey" ), "fa-tags" );
	}

	$html .= "</div>";

	echo $html;
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