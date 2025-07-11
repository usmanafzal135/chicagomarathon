<?php 

/**
 * Disable wp-json api if not logged in.
 */

add_filter( 'rest_authentication_errors', function( $result ) {

    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }
 
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }
 
    return $result;
});

/**
 * Define editor support and editor stylesheet location
 */

// Gutenberg custom stylesheet
add_theme_support('editor-styles');
add_editor_style('scss/core-blocks/table.css');
add_editor_style('scss/core-blocks/file.css');
add_editor_style('dist/editor.css');
add_editor_style('dist/_carousel.cfb26a57.css');

/**
 * Add Wordpress Feature Support
 */

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption',) );
add_theme_support( 'title-tag' );

/**
 * Define TinyMCE editor styles
 */

add_editor_style('editorstyle.css');

/**
 * Clean up WP Header
 */

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

/**
 * Remove pattern support
 */
// remove_theme_support('core-block-patterns');

/**
 * [disable_emojis description]
 * @return [type] [description]
 */

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

add_action( 'init', 'disable_emojis' );

/**
 * [disable_emojis_tinymce description]
 * @param  [type] $plugins [description]
 * @return [type]          [description]
 */

function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Prevent XMLRPC Hack 
 */
add_filter( 'xmlrpc_methods', function( $methods ) {
   unset( $methods['pingback.ping'] );
   unset( $methods['pingback.extensions.getPingbacks'] );
   return $methods;
});

/**
 * Add container around the core/freeform block
 */
add_filter( 'render_block', 'wrap_classic_block', 10, 2 );

    function wrap_classic_block( $block_content, $block ) {
        if ( null === $block['blockName'] && ! empty( $block_content ) && ! ctype_space( $block_content ) ) {
            $block_content = '<section class="block-html-content typography max-w-none clearfix"><div class="container max-w-screen-l p-0 mb-3">' . $block_content . '</div></section>';
        }
    return $block_content;
}
