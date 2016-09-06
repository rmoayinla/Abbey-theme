<?php
/*
* Template Name: Custom Page 
*
*/
get_header(); ?>

<main id="<?php abbey_theme_page_id( "custom-page" );?>" class="row site-content">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php global $more; $more = 0; ?>

			<header id="site-content-header">
				<?php do_action( "abbey_theme_before_page_content" ); ?>
			</header>
			
			<?php get_template_part("templates/content", "custom-page"); ?>

		<?php endwhile; ?> 

	<?php else : get_template_part("templates/content", "none");?>

	<?php endif; ?>


</main>	<?php
get_footer();