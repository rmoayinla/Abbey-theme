<?php

?>
<section  id="content" class="page-content">
	<header id="page-content-header" class="row text-center">
		<div class="md-50">
			<?php do_action( "abbey_theme_page_title", get_the_ID() ); ?>
		</div>
					
		<div class="row"><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row" id="inner-content">
		<article <?php abbey_post_class( "col-md-9" )?> id="page-<?php the_ID();?>">
			<?php the_content("Read more . . "); ?>
		</article>
	</section>


</section><!-- #content .page-content closes -->