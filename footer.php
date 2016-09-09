<?php

$site_about = ( !empty( abbey_get_defaults( "about" ) ) ) ? abbey_get_defaults( "about" ) : "";

?>
		<footer class="row" id="site-footer">	
			<header id="footer-header">
				<?php do_action( "abbey_theme_footer_widgets" ); ?>
			</header>

			<section class="row margin-top-sm pad-large" id="inner-footer">
				<div id="footer-logo" class="col-md-4 col-md-offset-2 float-right-responsive">

				</div>
				<div class="col-md-6" id="site-info"> 
					<h2 class="large-text"> <?php bloginfo( "name" ); ?> </h2> 
					<p class="small description"> <?php bloginfo( "description" ); ?> </p>
					<?php if ( !empty( $site_about ) ) : ?>
						<summary> <?php echo esc_html ( $site_about ); ?> </summary>
					<?php endif; ?>
				</div>

			</section>

			<div id="footer-bottom" class="row">
				<?php do_action( "abbey_theme_footer_credits" ); ?>

			</div>


		</footer>

	</div><!-- #content open in header.php -->
</div><!--#site wrapper open in header.php -->
	<?php wp_footer(); ?>
</body>
</html>