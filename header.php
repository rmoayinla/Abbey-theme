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
			<div id="header-top" class="">
				<?php do_action( "abbey_theme_before_header" ); ?>

			</div><!--#header-top closes -->
			
			<div id="header-contact" class="">
				<?php do_action( "abbey_theme_header_contact" ); ?>

			</div><!--#header-top closes -->

			<div class="skip-link">
				<a class="skip-link sr-only" href="#content"><?php _e( 'Skip to content', 'abbey' ); ?>
				</a>
			</div><!--skip link closes -->
				
			
			<?php if ( has_nav_menu( 'primary' ) ): ?>
							
				<?php do_action("abbey_theme_primary_menu"); ?>
							
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
									

			<?php endif; ?>

									
			

			<?php if ( get_header_image() ) : ?>
						
						
			<?php endif; // End header image check. ?>

			<?php do_action( "abbey_theme_after_header" ); ?>
				
		</header><!-- .site-header -->

		<div id="content" class="site-content">