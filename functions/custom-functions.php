<?php
function abbey_default_header(){
	echo "
	<div class='alert alert-default'>
	Want to hire me? Contact me
	</div>";
}
add_action( "abbey_theme_before_header", "abbey_default_header" );