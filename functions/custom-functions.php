<?php
/*
	* the functions here are added to actions or filters 
	* Check each function to know the exact action or filter attached to 
	* @theme: Abbey
	* @package: wordpress
	* @version: 0.1 
*/

/*
	* this function is hooked to abbey_theme_before_header
	* it echoes/prints out any site notice 
	*
*/
function abbey_default_header(){
	echo '
	<div class="alert bg-dark alert-dismissable text-center full-width pad-small no-bottom-margin" id="contact-me">
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	 	<span aria-hidden="true">&times;</span>
	 </button>
	Want to hire me? Contact me
	</div>';
}
add_action( "abbey_theme_before_header", "abbey_default_header" );//hook to default header; check header.php //

function abbey_header_contact(){
	echo '
	<div class="row pad-small">
		<div class="col-md-4">
		<i class="fa fa-fw fa-map-marker"></i>
		8, Kadiri Street, Alausa, Ikeja, Lagos. 
		</div>
	</div>
	';
}
add_action( "abbey_theme_header_contact", "abbey_header_contact" );//hook to header_contact; check header.php //

function abbey_primary_menu(){
	ob_start(); ?>
		<nav class="navbar navbar-default no-bottom-margin" role="navigation">
	  		<!-- Brand and toggle get grouped for better mobile display -->
	    	<div class="navbar-header">
	      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        		<span class="sr-only">Toggle navigation</span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	       	 		<span class="icon-bar"></span>
	      		</button>
	      		<a class="navbar-brand" href="<?php echo home_url(); ?>">
	                <?php bloginfo('name'); ?>
	      		</a>
	    	</div>

        	<?php
           		 wp_nav_menu( array(
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
        	?>
    
		</nav>
	<?php echo ob_get_clean(); 

}
add_action( "abbey_theme_primary_menu", "abbey_primary_menu" );

function abbey_after_header () {
	if( is_front_page() ):
		$defaults = abbey_theme_defaults();
		ob_start(); ?>
			<div class="jumbotron pad-large" id="site-banner">
				<div class="row">
					
					<div class="col-md-6">
						<div class="page-header no-bottom-margin"><h1><?php bloginfo('name'); ?> </h1></div>
						<div class="small description">
							<p><?php bloginfo('description');?></p>
						</div>
						<div class="" id="about-site">
							<?php echo esc_html($defaults["about"]); ?>
						</div>
						<?php if( has_nav_menu("secondary") ): 
									do_action("abbey_theme_secondary_menu");
							endif;//if has-nev menu//
						?>
					</div>
					<div class="col-md-4 col-md-offset-1 text-center" id="admin-info">
						<div class="no-border">
							<img src="<?php echo esc_url($defaults['logo']); ?>" alt="Site Logo" class="img-circle logo">
							<div class="">
								<h3> <?php echo esc_html($defaults['admin']['name']); ?></h3>
								<p class="small italize"> <?php echo esc_html(implode($defaults['admin']['roles'], " , " ) ); ?> </p>
							</div>

						</div>
					</div>
				</div>
			</div><!--end of jumbotron/#site-banner -->
		<?php echo ob_get_clean(); 
	endif;
}

add_action ( "abbey_theme_after_header", "abbey_after_header" );

function abbey_secondary_menu(){
	echo '<div class="margin-top-md" id="secondary-menu">';
			 wp_nav_menu( array(
                'menu'              => 'secondary',
                'theme_location'    => 'secondary',
                'depth'             => 1,
                'container'         => 'ul',
                'menu_class'   		=> 'nav nav-pills',
        		
                )
            );

	echo	'</div>';
	
}
add_action ( "abbey_theme_secondary_menu", "abbey_secondary_menu" );




function abbey_service_lists(){
	$defaults = abbey_theme_defaults();
	$services = $defaults["services"]["extras"];
	
	if(count($services) > 0 ){
		$html = "";
		foreach($services as $service){
			$html .= "<div class='col-md-3' id='more-service-icons'><div class='service-wrapper row'>";	
			if( !empty($service["icon"]) ){ 
				$html .= "<div class='more-service-icon col-md-3'>
							<span class='fa ".esc_attr($service["icon"])." fa-3x' > 
							</span> </div> ";
			 }
			
			if( !empty($service["text"]) ){ 
				$html .= "<div class='more-service-heading col-md-9 text-left'>"
						. esc_html( $service["text"] ). 
						"</div>" ; 
			}
			$html .= "</div></div>";
		}
	
	}

	echo $html;
	
}
add_action( "abbey_theme_more_services", "abbey_service_lists" );