<?php
/*
*

*/

$front_page_defaults = abbey_theme_front_page_defaults();
$blog_section = $front_page_defaults["blog-posts"];
$service_section = $front_page_defaults["services"];
$quote_section = $front_page_defaults["quotes"];

?>
<main id="<?php abbey_theme_page_id();?>" class="site-content">
<!-- #content is already open in header.php -->
	<section id="latest-posts" class="pad-large bg-white text-center row tooltip-box">
		<div class="inner-wrapper">
			<h2 class="page-header text-capitalize"> <?php echo esc_html($blog_section["header-text"]); ?></h2>
			<div class="small description inner-pad-medium">
				<?php echo esc_html($blog_section["body-text"]); ?>
			</div>
			
			<article>
				<?php do_action("abbey_theme_front_page_recent_posts"); ?>
			</article>
			
			<div class="md-50 margin-top-md col-md-offset-3 center-block">
				<a href="" role="button" class="btn btn-default btn-lg btn-block"> <?php esc_html_e("View all articles", "abbey" ); ?></a>
			</div><!--.inner-wrapper closes -->
		
		</div>

	</section>

	<section id="services" class="pad-large bg-light text-center row tooltip-box">
		<h2 class="page-header text-capitalize"><?php echo esc_html($service_section["header-text"]);?></h2>
		<div class="small description">
			<?php echo esc_html($service_section["body-text"]); ?>
		</div>
		<div class="row margin-top-md" id="">
			
			<?php abbey_theme_show_services(); ?>
				
		</div>
		<div class="row margin-top-md" id="">
				<?php do_action("abbey_theme_more_services");?>
		</div>
			
		
	</section><!--end of #services section -->

	<section id="quotes" class="pad-large text-center row tooltip-box">
		<h2 class="page-header text-capitalize"> <?php echo esc_html($quote_section["header-text"]); ?> </h2>
		<div class="small description">
			<?php echo wp_kses_post($quote_section["body-text"]); ?>
		</div>


	</section><!--end of section #quotes -->

	
