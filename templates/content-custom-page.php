<?php

?>
<section  id="content" class="page-content">
	<header id="page-content-header" class="row text-center">
		<div class="md-50">
			<div id="page-title"><h1 class="page-title"><?php the_title(); ?></h2></div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post-thumbnail"><?php the_post_thumbnail(); ?> </div>
			<?php endif; ?>
		</div>
					
		<div class="row"><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row" id="inner-content">
		<article <?php abbey_post_class( "col-md-8" )?> id="page-<?php the_ID();?>">
			<?php the_content("Read more . . "); ?>
		</article>
		<aside class="col-md-3" role="complimentary" id="page-sidebar">
			<?php abbey_display_sidebar( "sidebar-main" ); ?>
		</aside>
	</section>


</section><!-- #content .page-content closes -->