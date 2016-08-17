<?php
function abbey_default_header(){
	echo '
	<div class="alert bg-dark alert-dismissable text-center full-width" id="contact-me">
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

function abbey_primary_menu(){
	ob_start(); ?>
		<nav class="navbar navbar-default" role="navigation">
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
			<div class="jumbotron" id="site-banner">
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
							<img src="<?php echo $defaults['logo']; ?>" alt="Site Logo" class="img-circle logo">
							<div class="">
								<h3> <?php echo esc_html($defaults['admin']['name']); ?></h3>
								<p class="small"> <?php echo esc_html(implode($defaults['admin']['roles'], " , " ) ); ?> </p>
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