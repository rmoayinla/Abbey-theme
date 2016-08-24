<?php
function abbey_theme_defaults(){
	$defaults = apply_filters( "abbey_theme_defaults", 
		array(
			"contacts" => array(
				"address" => __( "8, Kadiri street, Alausa, Ikeja, Lagos State, Nigeria", "abbey"),
				"tel" => array( "08028617830me" ), 
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
						"lists" => array()
							
					), 
					"quotes" =>  array(
						"header-text" => __("rmo quotes", "abbey"), 
						"body-text" => __("Straight out of my Quotes Book, Read my quote of the day. ", "abbey"), 
						"default" => __("This is only a default quote, this is not fetched from my quotes 
							post type or quotes post format", 
							"abbey"
						),
						"quotes_no" => 3
					),
					"contact" => array(
						"header-text" => __("contact me", "abbey"),
						"body-text" => __("Hire me for your web projects, Want me to review your codes,
							Want to join my dev team, you have a feedback/review/comment on any of my
							projects?.", "abbey"),
						"form-header-text" => __("Kindly visit me, mail me or fill the contact form below.", "abbey")
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

function abbey_theme_add_services($defaults){
	$defaults["services"]["lists"] = array(
		array("icon" => "fa-registered", "header-text" => __("Domain registration", "abbey"), 
				"body-text" => __("We register and transfer domain names from the most popular and trusted domain providers", "abbey") 
		), 
		array("icon"=> "fa-globe", "header-text" => __("Web Hosting and Website/Domain transfer", "abbey"),
				"body-text" => __("Never experience hosting or bandwith issues with your websites again,
				tell us your budget and we would recommend suitable hosting plans for your websites or blog
				without experiencing downtime issues", "abbey")
		),
		array("icon" => "fa-lock", "header-text" => __("Website security, backup and maintenance", "abbey"), 
			"body-text" => __( "We secure websites from hackers, bots, spammers and site crash, either its 
				a site built by us or another developer, we provide intensive code review to fix bugs and loopholes
				in your website source codes", "abbey" )
		),
		array("icon" => "fa-wordpress", "header-text" => __("Wordpress themes and plugins", "abbey"), 
			"body-text" => __("I am a wordpress fan both as a user and a developer, I build themes and plugins either 
				for personal use or open source.","abbey")
		),
		array( "icon" => "fa-rss", "header-text" => __("Personal Blogs and Corporate/Institutional Websites", "abbey"),
			"body-text" => __("There are mulitple reasons you need a website, either its a blog where you 
				can share your ideas or a full blown website for your business", "abbey")
		)
	);
	return $defaults;
}
add_filter( "abbey_theme_defaults", "abbey_theme_add_services" );

function abbey_theme_extra_services($defaults){
	$defaults["services"]["extras"] = array(
		array("icon" => "fa-code", "text" => __("Own a website without writing a line of code", "abbey") ),
		array("icon" => "fa-mobile", "text" => __("Mobile First Design: your site will look cool on every device no matter the size", "abbey") ),
		array("icon" => "fa-photo", "text" => __("Easily integrate photo galleries into your blog or websites", "abbey") ),
		array("icon" => "fa-video-camera", "text" => __("Want to share videos, easily embed videos from youtube or vimeo", "abbey") ),
		array("icon" => "fa-rocket", "text" => __("Our websites are optimized for speed, fast loading time and less bandwith", "abbey") ),
		array("icon" => "fa-signal", "text" => __("Let us handle your hosting and wave goodbye to downtime errors and unresponding servers", "abbey") ),
		array("icon" => "fa-upload", "text" => __("You dont need to code or contact an developer, be in charge of your website and customize to your taste", "abbey") )
	);
	return $defaults;
}
add_filter( "abbey_theme_defaults", "abbey_theme_extra_services", 20 );


