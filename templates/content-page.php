<?php
	$thumbnail_class = ( has_post_thumbnail() ) ? "has-thumbnail" : "no-thumbnail";
?>
<section  id="content" class="page-content">
	<header id="page-content-header" class="row <?php echo esc_attr( $thumbnail_class ); ?>">
		<div class="col-md-6" id="page-title"><?php abbey_page_title(); ?></div>
		<div class="col-md-6 col-md-offset-2" id="page-media"><?php abbey_page_media(); ?> </div>
		<div class="row"><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row">
		<article <?php abbey_post_class( "col-md-6 col-xs-12 col-sm-8" ); ?> id="page-<?php the_ID(); ?>">
			<?php the_content("Read more . . "); ?>
		</article>
		
		<aside class="col-md-3">
			<?php abbey_display_sidebar( "sidebar-main" ); ?>
		</aside>
	</section>


</section><!-- #content .page-content closes -->
		
	
	