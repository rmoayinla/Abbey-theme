<?php
/*
* a wordpress template file for displaying pages 
* you can copy this template, rename to a different file to display specific pages 
* example copy the content here, create a file and name it page-contact.php to display contact page 
* 
*/

get_header(); ?>

<main id="<?php abbey_theme_page_id(); ?>" class="row site-content"> 
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php global $more; $more = 0; ?>

			<header id="site-content-header">
				<?php do_action( "abbey_theme_before_page_content" ); ?>
			</header>
			
			<?php get_template_part("templates/content", "page"); ?>

		<?php endwhile; ?> 

	<?php else : get_template_part("templates/content", "none");?>

	<?php endif; ?>



</main> <!--main #page closes -->	<?php 

get_footer();