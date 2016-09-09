<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>

	
</head>

<body <?php body_class(); ?> >
	<div class="container-fluid" id="site-wrapper">
	
		<header id="sitehead" class="site-header row" role="header">
			<div id="header-top" class=""><?php do_action( "abbey_theme_before_header" ); ?></div>
			<!--#header-top closes -->
			
			<div class="skip-link">
				<a class="skip-link sr-only" href="#content"><?php _e( 'Skip to content', 'abbey' ); ?></a>
			</div><!--skip link closes -->

			<div id="main-header">
				<div id="header-contact" class="<?php abbey_class( "contact-header" ) ?> row pad-small" >
					<?php do_action( "abbey_theme_header_contact" ); ?>
				</div><!--#header-contact closes -->
	
				<nav class="navbar navbar-default no-bottom-margin" role="navigation" id="primary-menu">
	  				<div class="navbar-header">
	      				<!-- Brand and toggle get grouped for better mobile display -->
	      				<?php echo abbey_nav_toggle(); ?>
	      				<a class="navbar-brand" href="<?php echo home_url( "/" ); ?>">
	               			<div id="header-site-logo" class="inline"> <?php abbey_custom_logo(); ?> </div>
	               			<div id="header-site-name" class="inline"> <?php bloginfo('name'); ?> </div>
	      				</a>
	      			</div>
					<?php do_action("abbey_theme_primary_menu"); ?>
				</nav>
			
			</div><!--#main-header closes -->

			<?php if ( is_front_page() ) : ?>
					<div class="jumbotron pad-large" id="site-banner" role="banner">
						<div class="row">
							<?php do_action( "abbey_theme_after_main_header" ); ?>
						</div>
					</div><!--end of jumbotron/#site-banner -->
			<?php endif; ?>

				
		</header><!-- .site-header -->

		<div id="content">

		