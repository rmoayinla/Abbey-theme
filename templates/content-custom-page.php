<?php
	
?>
<section  id="content" class="page-content">
	<header id="page-content-header" class="row">
		<ul class="breadcrumb text-center"><?php abbey_post_info( true, array( "author", "date" )); ?></ul>
		<div class="page-title-wrap md-50 text-center">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			<summary class="post-summary"><?php the_excerpt(); ?></summary>
		</div>
		<div class="row"><?php do_action( "abbey_theme_page_extra_header" ); ?></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row" id="inner-content">
		<div class="col-md-8">
			<?php if( has_post_thumbnail() ) : ?>
				<figure class="post-thumbnail"><?php the_post_thumbnail( "large" ); ?> 
					<figcaption class="post-thumbnail-caption"><?php the_post_thumbnail_caption() ?> </figcaption>
				</figure>
			<?php endif; ?>
			<article <?php abbey_post_class(); ?> id="page-<?php the_ID();?>">
				<?php the_content("Read more . . "); ?>
			</article>
		</div>
		<aside class="col-md-4" role="complimentary" id="page-sidebar">
			<?php abbey_display_sidebar( "sidebar-main" ); ?>
		</aside>
	
	</section>


</section><!-- #content .page-content closes -->