<?php





get_header();	?>

<main id="<?php abbey_theme_page_id(); ?>" class="site-content">
	<header id="site-content-header">
			<?php do_action( "abbey_theme_before_page_content" ); ?>
	</header>
	
	<section id="page-404" class="page-content">
		<?php get_template_part( "templates/content", "none" ); ?>
	</section>


</main> 	<?php

get_footer();