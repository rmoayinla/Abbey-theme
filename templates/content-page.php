<?php

?>
<section  id="content" class="page-content">
	<header id="page-content-header" class="row">
		<div class="col-md-6"><?php abbey_page_title(); ?></div>
		<div class="col-md-4 col-md-offset-2"><?php abbey_page_icon(); ?> </div>
		<div class="row"><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row">
		<article <?php abbey_post_class( "col-md-6 col-xs-12" ); ?> id="page-<?php the_ID(); ?>">
			<?php the_content("Read more . . "); ?>
		</article>
	</section>


</section><!-- #content .page-content closes -->
		
	
	