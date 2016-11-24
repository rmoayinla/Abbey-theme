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