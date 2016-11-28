<?php
	$thumbnail_class = ( has_post_thumbnail() ) ? "has-thumbnail" : "no-thumbnail";
?>
<section  id="content" class="page-content col-md-6 col-md-offset-2">
	<header id="page-content-header" class="<?php echo esc_attr( $thumbnail_class ); ?>">
		<div class="row">
			<div class="" id="page-title"><?php abbey_page_title(); ?></div>
			<div class="" id="page-media"><?php abbey_page_media(); ?> </div>
			<div class=""><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
		</div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>
	
	<article <?php abbey_post_class( "row" ); ?> id="page-<?php the_ID(); ?>">
		<?php the_content("Read more . . "); ?>
	</article>
	


</section><!-- #content .page-content closes -->
		
	
	