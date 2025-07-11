<?php 

/**
 * Disables comments
 */
function disable_comments_post_types_support_tzo() {
    $post_types = get_post_types();
    foreach ( $post_types as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}
add_action( 'admin_init', 'disable_comments_post_types_support_tzo' );

/**
 * Close comments on front end
 */
function disable_comments_status_tzo() {
    return false;
}
add_filter( 'comments_open', 'disable_comments_status_tzo', 20, 2 );
add_filter( 'pings_open', 'disable_comments_status_tzo', 20, 2 );

/**
 * Hide existing comments
 */
function hide_existing_comments_tzo( $comments ) {
    $comments = array();
    return $comments;
}
add_filter( 'comments_array', 'hide_existing_comments_tzo', 10, 2 );

/**
 * Remove comments page in menu.
 */
function disable_comments_admin_menu_tzo() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'disable_comments_admin_menu_tzo' );

/**
 * Redirect user
 */
function admin_comments_redirect_tzo() {
    global $pagenow;
    if ( 'edit-comments.php' === $pagenow ) {
        wp_redirect( admin_url() );
        exit;
    }
}
add_action( 'admin_init', 'admin_comments_redirect_tzo' );

/**
 * Remove comments metabox
 */
function disable_comments_dashboard_tzo() {
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'disable_comments_dashboard_tzo' );

/**
 *  Remove comments from admin bar.
 */
function disable_comments_admin_bar_tzo() {
    if ( is_admin_bar_showing() ) {
        remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    }
}
add_action( 'init', 'disable_comments_admin_bar_tzo' );
