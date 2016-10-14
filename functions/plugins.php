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
            $class = ( !empty($args) && isset( $args["class"] ) ) ? $args["class"] : "";
            $avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} {$class}' height='{$size}' width='{$size}' />";
        }


    return $avatar;
}