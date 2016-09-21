<?php

?>
<section  id="content" class="post-content">
	<header id="page-content-header" class="row">
		<div class="col-md-6"><?php ?></div>
		<div class="col-md-4 col-md-offset-2"><?php ?> </div>
		<div class="row"><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row post-entry">
		<article <?php abbey_post_class( "col-md-8 col-xs-12" ); ?> id="post-<?php the_ID(); ?>">
			<?php the_content("Read more . . "); ?>
		</article>

		<aside class="col-md-4"> <?php do_action ( "abbey_theme_post_content_sidebar" ); ?> </as
	</section>


</section><!-- #content .page-content closes -->