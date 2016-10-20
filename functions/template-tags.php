<?php

function abbey_author_photo( $id = "", $size = 32, $class = "" ){
	global $authordata;
	if ( empty($id) && !empty( $authordata->ID ) )
		$id = (int) $authordata->ID;
	return get_avatar( $id, $size, "", "", array("class" => $class ) );
}

function abbey_show_nav( $post, $nav = "previous" ){
	$class = ( $nav === "previous" ) ? "previous-button" : "next-button";
	$icon = ( $nav === "previous" ) ? "glyphicon-chevron-left" : "glyphicon glyphicon-chevron-right";
	
	return sprintf( '<a href="%1$s" class="%5$s-button" title="%2$s">
				<span class="glyphicon %6$s"></span>
		 		<p> %3$s </p><h4 class="%5$s-post-title">%4$s</h4>
		 	   </a>',
			get_permalink($post->ID),
			sprintf( __( "Click to view %s post", "abbey" ), $nav ),
			sprintf( __( "%s post:", "abbey" ), ucwords( $nav ) ), 
			apply_filters( "the_title", $post->post_title ), 
			esc_attr( $nav ),
			esc_attr( $icon ) 
			);
}

function abbey_post_author( $key = "" ){
	global $authordata, $post;

	$author_id = ( is_object( $authordata ) ) ? $authordata->ID : $post->post_author; // get the post author id //
	$author = get_userdata( $author_id );
	$values = array(); 
	$values["display_name"] = $author->display_name; // the author display name//
	$values["post_count"] = get_the_author_posts(); // the author post count //
	$values["description"] = $author->description;
	$values["author"] = $author;
	
	if ( !empty( $key ) && array_key_exists( $key, $values ) )
		return $values[$key];

	$html = sprintf( '<span class="post-author-info"><span class="author-name"> %1$s </span>
						<span class="badge author-post-count"> %2$s </span> </span>',
						esc_html( $values["display_name"] ), 
						(int) $values["post_count"]
					);
	
	echo $html;
	
}

function abbey_author_info( $author, $key = "" ){
	$author_info = array(); // array to contain author info which will be displayed in a dropdown //
	$author_info["email"] = sprintf( '<a href="mailto:%1$s" title="%2$s" id="emailauthor">
									<span class="fa fa-envelope"></span></a>', 
							antispambot( $author->user_email ), 
							esc_attr( __( "Send this author an email", "abbey" ) )
							); 
	
	$author_info["website"] = sprintf( '<a href="%1$s" title="%2$s" target="_blank">
										<span class="fa fa-fw fa-globe"></span> </a>',
									esc_url( $author->user_url ),
									esc_attr( __( "Visit author's website", "abbey" ) )
							);


	$author_info["profile"] = sprintf( '<a href="#" title="%1$s" id="authorprofile" class="js-link"> 
										<span class="fa fa-fw fa-user"></span> </a>',
										esc_attr( __( "View author's profile", "abbey" ) )
							);

	$author_info["posts"] = sprintf( '<a href="%1$s" title="%2$s"> 
									<span class="fa fa-fw fa-newspaper-o"></span> </a>', 
							esc_url( get_author_posts_url( $author->ID ) ),
							esc_attr( sprintf( __( "View posts by %s", "abbey" ), $author->display_name ) )
							 );
	return $author_info;
}

function abbey_post_pagination( $args = array() ){
	$defaults = array(
		'before'           => '<li>',
		'after'            => '</li>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page' ),
		'previouspagelink' => __( 'Previous page' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
	echo '<ul class="pagination">'.wp_link_pages( $defaults );
}