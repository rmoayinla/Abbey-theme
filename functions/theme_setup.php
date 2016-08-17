<?php
function abbey_theme_defaults(){
	$defaults = apply_filters( "abbey_theme_defaults", 
		array(
			"contacts" => array(),
			"logo" => "", 
			"services" => array()
		)
	);
}