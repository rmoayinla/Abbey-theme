<?php
get_header(); 
global $more; ?>

	<main id="<?php abbey_theme_page_id(); ?>" class="row">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $more = 0; ?>

			<header id="site-content-header">
				<?php do_action( "abbey_theme_before_post_content" ); ?>
			</header>
			
			<?php get_template_part("templates/content", "post"); ?>

			
			
		<?php endwhile; ?> 

	<?php else : get_template_part("templates/content", "none"); ?>

	<?php endif; ?>


	</main>		<?php

get_footer();