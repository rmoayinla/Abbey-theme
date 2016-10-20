<?php

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
// Apply filter
add_filter( 'get_avatar' , 'abbey_custom_avatar' , 1 , 6 );

function abbey_custom_avatar( $avatar, $id_or_email, $size, $default, $alt, $args ) {
    $user = false;
    global $abbey_defaults;

    if ( is_numeric( $id_or_email ) ) {
		$id = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );

    } elseif ( is_object( $id_or_email ) ) {

        if ( ! empty( $id_or_email->user_id ) ) {
            $id = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );
        }

    } else {
        $user = get_user_by( 'email', $id_or_email );	
    }

    if ( $user && is_object( $user ) ) {
            $avatar = $abbey_defaults["admin"]["pics"];
            $class = ( !empty($args) && isset( $args["class"] ) ) ? esc_attr( $args["class"] ) : "";
            $avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} {$class}' height='{$size}' width='{$size}' />";
        }


    return $avatar;
}

/*
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Your Read More Link Text</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

function remove_more_link_scroll( $link ) {
    $link = preg_replace( '|#more-[0-9]+|', '', $link );
    return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
    return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

*/