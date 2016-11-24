<?php
get_header();

global $count;

global $wp_query;

global $abbey_query;

$count = 0;

$abbey_query = array();
?>

	<main id="<?php abbey_theme_page_id(); ?>" class="row">
		
		<header id="site-content-header" class="text-center">
			<h2 class="page-header"> 
				<?php echo sprintf( __( "Search results for <span class='search-keyword'>%s</span>", "abbey" ), 
										get_search_query() ); ?> 
			</h2>
			<p class="description h4"> <?php  ?> </p>
			<div id="search-form"> <?php get_search_form(); ?></div>
		</header>

		<section id="content" class="row">
			<?php if ( have_posts() ) : abbey_setup_query(); ?>
				<div class="col-md-3" id="search-results-summary">
					<ul class="list-group"><?php do_action( "abbey_search_page_summary", $abbey_query ); ?>
					</ul>
				</div>
				<div id="search-results" class="col-md-6">
					<?php while ( have_posts() ) : the_post(); $count++; ?>
						<?php get_template_part("templates/content", "search"); ?>
					<?php endwhile; ?> 
				</div>
				<?php else : get_template_part("templates/content", "none"); ?>
		</section>


	<?php endif; ?>
		

	</main>		<?php

get_footer();