<?php
	$abbey_galleries = abbey_gallery_images();
?>
<section id="content" class="row">
	<header id="post-content-header" class="row text-center">
		<div id="page-title-wrap" class="md-50">
			<?php echo sprintf('<h3 class="page-title"><em>%1$s</em> %2$s</h3>', 
							__( "Photo Gallery:", "abbey" ), 
							get_the_title() 
						); 
			?>
			<summary class="post-excerpt description"><?php the_excerpt(); ?></summary>
			<?php do_action( "abbey_gallery_image_slides", $abbey_galleries ); ?>
		</div>
	</header>
	<div id="quote-content" class="row">
		
		<aside class="col-md-3" id="gallery-sidebar">
			<?php do_action( "abbey_gallery_post_sidebar", $abbey_galleries ); ?>
		</aside>
		


		<figure <?php abbey_post_class( "col-md-6 col-md-offset-2" ); ?> id="post-<?php the_ID(); ?>">
			<?php the_content(); ?>
		</figure>

	</div>

</section> 