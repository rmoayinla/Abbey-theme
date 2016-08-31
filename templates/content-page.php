<?php

?>
	
<main id="content" class="row"> 
	<?php if ( have_posts() ) : ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php global $more; $more = 0; ?>
			<section <?php post_class(); ?> id="page-content">
				<header id="page-content-header" class="row">
					<div class="col-md-6">
						<?php do_action( "abbey_theme_page_title", get_the_ID() ); ?>
					</div>
					
					<div class="col-md-4 col-md-offset-2">
						<?php do_action( "abbey_theme_page_header_media", get_the_ID() ); ?>
					</div>

					<div class="row">
						<?php do_action( "abbey_theme_page_extra_header" ); ?>
					</div>
				</header><!-- #page-content-header closes -->

				<div class="row bg-white">
					<?php do_action("abbey_theme_page_content_after_header"); ?>
				</div>

				<section class="row">
					<article class="col-md-6 pad-medium" id="page-post">
					
						<?php the_content("Read more . . "); ?>


					</article>
				</section>


			</section><!-- #page-content closes -->
		<?php endwhile; ?> 
	
	<?php else : get_template_part("templates/content", "none");?>

	<?php endif; ?>



</main>