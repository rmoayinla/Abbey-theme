<?php
	$title_class = ( has_post_thumbnail() ) ? "col-md-6" : "col-md-12";
?>
<section  id="content" class="post-content" itemscope itemtype="http://schema.org/Article">
	<header id="post-content-header" class="row">
		
		<div class="<?php echo esc_attr( $title_class ); ?>"><?php abbey_post_title(); ?></div>
		
		<?php if( has_post_thumbnail() ) : ?>
			<div class="col-md-6" itemprop="image"><?php the_post_thumbnail( "large" ); ?> </div>
		 <?php endif; ?>

		<div class="clearfix"></div>

		<div id="post-info"><ul class="breadcrumb"><?php abbey_post_info(); ?></ul></div>
	
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row post-entry">
		<article <?php abbey_post_class( "col-md-8 col-xs-12" ); ?> id="post-<?php the_ID(); ?>">
			
			<?php the_content(); ?>
			
			<div><?php abbey_post_pagination(); ?> </div>
		</article>
		
		<aside class="col-md-4"> <?php  ?> </aside>
		
		<div class="clearfix"></div>
		
		<footer class="entry-footer"> <?php do_action( "abbey_theme_post_footer" ) ?></footer>
		
	</section><!-- .post-entry closes -->

	<?php if ( comments_open() ) : ?>
				<?php comments_template(); ?>
	<?php endif; ?>

</section><!-- #content .page-content closes -->