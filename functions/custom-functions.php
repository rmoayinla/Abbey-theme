<?php
function abbey_default_header(){
	echo '
	<div class="alert bg-dark alert-dismissable text-center full-width">
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	 	<span aria-hidden="true">&times;</span>
	 </button>
	Want to hire me? Contact me
	</div>';
}
add_action( "abbey_theme_before_header", "abbey_default_header" );

function abbey_header_contact(){
	echo '
	<div class="row">
		<div class="col-md-4">
		<i class="fa fa-fw fa-map-marker"></i>
		8, Kadiri Street, Alausa, Ikeja, Lagos. 
		</div>
	</div>
	';
}
add_action( "abbey_theme_header_contact", "abbey_header_contact" );