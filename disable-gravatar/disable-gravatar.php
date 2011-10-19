<?php
/*
Plugin Name: Disable gravatar completely
Plugin URI: http://bp-tricks.com/snippets/completely-disable-the-use-of-gravatars-on-your-buddypress-site/
Description: Disable gravatar completely from your buddypress
Version: 0.1
Author: Juan Ramon & Christian
Author URI: http://twitter.com/juanradiaz
*/

function bp_remove_gravatar ($image, $params, $item_id, $avatar_dir, $css_id, $html_width, $html_height, $avatar_folder_url, $avatar_folder_dir) {
    $default = get_bloginfo('home') . '/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg' ;

    if( $image && strpos( $image, "gravatar.com" ) ) {
        return '<img src="' . $default . '" alt="avatar" class="avatar" ' . $html_width . $html_height . ' />' ;
    } else {
        return $image ;
    }
}

add_filter('bp_core_fetch_avatar', 'bp_remove_gravatar', 1, 9 ) ;
 
function remove_gravatar ($avatar, $id_or_email, $size, $default, $alt) {
    $default = get_bloginfo('home') . '/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg' ;
    
    return '<img alt="' . $alt . '" src="' . $default . '" class="avatar avatar-' . $size . ' photo avatar-default" height="' . $size . '" width="' . $size . '" />' ;
}

add_filter('get_avatar', 'remove_gravatar', 1, 5) ;
 
function bp_remove_signup_gravatar ($image) {
    $default = get_bloginfo('home') . '/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg' ;

    if( $image && strpos( $image, 'gravatar.com' ) ) {
        return '<img src="' . $default . '" alt="avatar" class="avatar" width="150" height="150" />' ;
    } else {
        return $image ;
    }
}

add_filter('bp_get_signup_avatar', 'bp_remove_signup_gravatar', 1, 1 ) ;

?>