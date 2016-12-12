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
		<nav class="navbar navbar-default no-bottom-margin" role="navigation" id="primary-menu">
	  		<!-- Brand and toggle get grouped for better mobile display -->
	    	<div class="navbar-header">
	      		
	      		<a class="navbar-brand" href="<?php echo home_url(); ?>">
	               <div id="header-site-logo" class="inline"> <?php abbey_custom_logo(); ?> </div>
	               <div id="header-site-name" class="inline"> <?php bloginfo('name'); ?> </div>
	      		</a>
	      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        		<span class="sr-only">Toggle navigation</span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	       	 		<span class="icon-bar"></span>
	      		</button>
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
					
					<div class="col-md-6 col-sm-8 col-xs-7">
						<div class="page-header no-bottom-margin"><h1><?php bloginfo('name'); ?> </h1></div>
						<div class="small description">
							<p><?php bloginfo('description');?></p>
						</div>
						<div class="" id="about-site">
							<?php echo esc_html($defaults["about"]); ?>
						</div>
						<?php if( has_nav_menu("secondary") ): 
									do_action("abbey_theme_secondary_menu");
							endif;//if has-nav menu//
						?>
					</div>
					<div class="col-md-4 col-md-offset-1 text-center col-sm-3 col-xs-5" id="admin-info">
						<div class="no-border">
							<img src="<?php echo esc_url($defaults['logo']); ?>" alt="Site Logo" class="img-circle logo-md">
							<div class="">
								<h3> <?php echo esc_html($defaults['admin']['name']); ?></h3>
								<em class="small italize"> <?php echo esc_html(implode($defaults['admin']['roles'], " , " ) ); ?> </em>
							</div>

						</div>
					</div>
				</div>
			</div><!--end of jumbotron/#site-banner -->
		<?php echo ob_get_clean(); 
	endif;
}

add_action ( "abbey_theme_after_main_header", "abbey_after_header" );

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
			$html .= "<div class='col-md-3 col-xs-4 col-sm-4 more-service-icons'><div class='service-wrapper row'>";	
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

function abbey_theme_contact_form(){
	ob_start(); ?>
		<form role="form" id="contact-form" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="exampleInputFile">File input</label>
				<input type="file" id="exampleInputFile">
				<p class="help-block">Example block-level help text here.</p>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox"> Check me out
				 </label>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
				
		</form> <?php
	echo ob_get_clean(); 

}
add_action("abbey_theme_front_page_contact_form", "abbey_theme_contact_form");

function abbey_show_contacts(){
	$defaults = abbey_theme_defaults();
	$contacts = $defaults["contacts"];
	
	if( count($contacts) > 0 ){
		$html = "<aside class='row inner-pad-medium'>";
		foreach( $contacts as $heading => $contact ){
			$html .= "<div class='row contact-wrapper' id='contact-".esc_attr($heading)."'>";
			$html .= "<div class='contact-icon lead'> <span class='fa ".abbey_contact_icon($heading)."'> </span> </div>";
			$html .= "<div class='col-md-11'><div class='row'>";
			$html .= abbey_display_contact( $contact, $heading );
			$html .= "</div></div>"; 
			$html .= "</div>";
			
		}
		
		$html .= "</aside>";
	}

	echo $html;
	
	
}
add_action( "abbey_theme_front_page_contacts", "abbey_show_contacts" );

function abbey_show_social_contacts(){
	$defaults = abbey_theme_defaults();
	$social_contacts = $defaults["social-contacts"];

	if( count( $social_contacts ) > 0 ){
		$html = "<footer id='social-contacts' class='row inner-pad-medium'>";
		$html .= "<div id='social-icons-header'><h4>".apply_filters( "abbey_theme_social_icons_header_text", "Follow me on social media" )."</h4></div>";
		$html .= "<div class='social-icons' id='social-contacts'><ul class='nav'>";
		foreach ( $social_contacts as $social => $contact ){
			if( empty($contact) ) continue;
			$html .= "<li class='inline'><a href='".esc_url($contact)."' class='' target='_blank' >";
			$html .= "<span class='fa fa-fw fa-2x ". abbey_contact_icon($social)."'> </span>"; 
			$html .= "</a></li>";
		}

		$html .= "</ul></div>";
		$html .= "</footer>";
	}
	echo $html;
}
add_action ( "abbey_theme_front_page_contacts", "abbey_show_social_contacts", 20 );

