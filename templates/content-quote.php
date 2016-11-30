<?php
	$quotes_page_description = __( "This is where I share my quotes on whatever or whatsoever I have in 
		mind which can be about lifestyles, rhymes, rants, jokes and sometimes too some wise inspirating
		word.", "abbey" );
?>
<section id="content" class="quote-content" itemscope itemtype="http://schema.org/Article">
	<header id="post-content-header" class="row text-center">
		<div id="page-title-wrap" class="md-50">
			<h1><?php bloginfo( "name" ); ?></h1>
			<h4 class="oblique"><?php _e( "Book of Quotes", "abbey" ); ?> </h4>
			<p class="description">
				<?php _e( apply_filters( "abbey_quote_page_description", $quotes_page_description ) ); ?>
			</p>
		</div>

	</header>

	<div id="quote-content" class="row">
		<article class="post-entry col-md-6">
			<ul class="breadcrumb">
				<?php abbey_post_info( true, array( "author", "date" => [ "icon" => "fa-calendar-o" ] ) ); ?>
			</ul>
			<blockquote <?php abbey_post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php the_content(); ?>
				<footer>
					<ul class="list-inline"><?php do_action( "abbey_theme_quote_post_footer" ); ?></ul>
				</footer>
			</blockquote>

			<div><?php abbey_post_pagination(); ?> </div>
			<footer>
				<ul class="list-inline">
					<li><?php echo abbey_cats_or_tags( "categories", "", "fa-folder-o" ); ?></li>
					<li><?php echo abbey_cats_or_tags( "tags", "", "fa-tags" );  ?></li>
				</ul>
			</footer>
		</article>

		<aside id="quote-post-sidebar" role="complimentary" class="col-md-3">

		</aisde>

	</div>

</section>