<?php

?>
<section  id="page-<?php the_ID(); ?>" class="page-content">
	<header id="page-content-header" class="row">
		<div class="col-md-6"><?php do_action( "abbey_theme_page_title", get_the_ID() ); ?></div>
					
		<div class="col-md-4 col-md-offset-2">
			<?php do_action( "abbey_theme_page_header_media", get_the_ID() ); ?>
		</div>
		<div class="row"><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row">
		<article <?php post_class( apply_filters( "abbey_post_classes", "col-md-6 pad-medium") ); ?> id="page-post">
			<?php the_content("Read more . . "); ?>
		</article>
	</section>


</section><!-- #page-content closes -->
		
	
	