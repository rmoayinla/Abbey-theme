<?php
	$title_class = ( has_post_thumbnail() ) ? "col-md-6" : "col-md-12";
?>
<section  id="content" class="post-content">
	<header id="post-content-header" class="row">
		<div class="<?php echo esc_attr( $title_class ); ?>"><?php abbey_post_title(); ?></div>
		<?php if( has_post_thumbnail() ) : ?><div class="col-md-6"><?php the_post_thumbnail( "large" ); ?> </div> <?php endif; ?>
		<div class="clearfix"> </div>
		<div class="row margin-top-sm">
			<div class="col-md-6 post-author"><?php abbey_post_author(); ?> </div>
		</div>
	</header><!-- #page-content-header closes -->

	<div class="row"><?php do_action("abbey_theme_after_page_header"); ?></div>

	<section class="row post-entry">
		<article <?php abbey_post_class( "col-md-8 col-xs-12" ); ?> id="post-<?php the_ID(); ?>">
			<?php the_content("Read more . . "); ?>
		</article>
		<aside class="col-md-4"> <?php  ?> </aside>
		<div class="clearfix"></div>
		<aside class="entry-footer"> <?php do_action( "abbey_theme_post_footer" ) ?>
		</aside>
	</section>


</section><!-- #content .page-content closes -->