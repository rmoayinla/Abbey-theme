<?php
	$has_thumbnail = ( has_post_thumbnail() ) ? true : false;
?>
<section  id="content" class="post-content col-md-9" itemscope itemtype="http://schema.org/Article">
	
	<header id="post-content-header" class="row">
		
		<div class="post-title">
			<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			<ul class="breadcrumb post-info"><?php abbey_post_info(); ?></ul>
		</div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="post-entry row">
			
		<?php if( $has_thumbnail )  : ?>
			<div class="post-media">
				<figure class="post-thumbnail" itemprop="image"><?php the_post_thumbnail( "large" ); ?> </figure>
				<summary class="post-excerpt">
					<?php the_excerpt(); ?>
				</summary>
			</div>
		<?php endif; ?>

		<article <?php abbey_post_class( "col-md-8" ); ?> id="post-<?php the_ID(); ?>">
			<?php if( !$has_thumbnail ) : ?>
				<summary class="post-excerpt">
					<?php the_excerpt(); ?>
				</summary>
			<?php endif; ?>

			<?php the_content(); ?>

			<div><?php abbey_post_pagination(); ?> </div>

		</article>
		
		<aside class="col-md-4"> 
			<?php  ?>
		</aside>

		<div class="clearfix"></div>

		<footer class="entry-footer"> <?php do_action( "abbey_theme_post_footer" ) ?></footer>
		
	</section><!-- .post-entry closes -->

	<?php if ( comments_open() ) : ?>
				<?php comments_template(); ?>
	<?php endif; ?>

</section><!-- #content .page-content closes -->