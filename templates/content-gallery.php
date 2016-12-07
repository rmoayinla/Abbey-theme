<?php
	$abbey_galleries = get_post_galleries_images( $post );
?>
<section id="content" class="row">
	<header id="page-content-header" class="row text-center">

	</header>
	<div id="quote-content" class="row">
		<aside class="col-md-3">
			<?php do_action( "abbey_gallery_post_summary", $abbey_galleries ); ?>
		</aside>
		
		<figure <?php abbey_post_class( "col-md-6 col-md-offset-2" ); ?> id="post-<?php the_ID(); ?>">
			<?php the_content(); ?>
		</figure>

	</div>

</section> 