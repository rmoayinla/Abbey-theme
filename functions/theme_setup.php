<?php
function abbey_theme_defaults(){
	$defaults = apply_filters( "abbey_theme_defaults", 
		array(
			"contacts" => array(
				"address" => __( "8, Kadiri street, Alausa, Ikeja, Lagos State, Nigeria", "abbey"),
				"tel" => array( 08028617830 ), 
				"facebook" => "facebook.com/rabiu.mustapha.5",
				"twitter" => "twitter.com/rabiu.mustapha",
				"instagram" => "instagram.com/rmoayinla",
				"pinterst" => "",
				"yahoo" => "",
				"tumblr"=> "",
				"whatsapp" => "+2348028617830"
			),
			"logo" => get_template_directory_uri()."/img/author.jpg", 
			"services" => array(), 
			"about" => __("I am Rabiu Mustapha, a blogger and developer from Lagos, Nigeria. This 
							blog is where I share my latest projects, code snippets and new hacks
							I have just learn in the ever evolving web developing field.",
						"abbey"
						),
			"admin" => array(
				"name" => __("Rabiu Mustapha", "abbey"),
				"roles" => array("Developer", "Writer", "Administrator")
				), 
			"front-page" => array(
					"blog-posts" => array(
						"header-text" => __("latest from my blog", "abbey"),
						"body-text" => __("Read the latest articles from my trending blog posts ", "abbey"),
						"posts_no" => 5
					), 
					"services" => array(
						"header-text" => __("My Services - What I do", "abbey"), 
						"body-text" => __("Since my service is based in Lagos, Nigeria, I am totally
							aware of the difficulties and the lack of tehcnical know-how that has 
							discouraged lots of organisations and indiviudals from having a Personal
							blog or a business website. I dont just build websites, what makes me 
							standout is I give you a website and handover all the necessary tools
							to fully utilize, personalize and customize your website without contacting 
							a Developer.", "abbey"),
						"lists" => array(
							__("Domain registration", "abbey"), 
							__("Web Hosting and Website/Domain transfer", "abbey"),
							__("Website security, backup and maintenance", "abbey"), 
							__("Wordpress themes and plugins", "abbey"), 
							__("Personal Blogs and Corporate/Institutional Websites", "abbey")
						)
					)
				)
		)
	);

	return $defaults;
}

function abbey_theme_front_page_defaults(){
	$defaults = abbey_theme_defaults();
	return $defaults["front-page"];
}