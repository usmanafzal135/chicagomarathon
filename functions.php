<?php
// Includes For...
// CPTs
// Helper Functions
// Widgets
// Shortcodes
// Etc...
//---------------------------------------------
//---------------------------------------------

// include template parts as an array (/incs/)
function get_template_parts( $parts = array() ) {
    foreach( $parts as $part ) {
        get_template_part( $part );
    }
}

get_template_parts(
    array(
        'includes/functions/init',
        'includes/admin/admin-login',
    )
);

/**
 * Register ACF Blocks
 */
add_action( 'init', 'register_acf_blocks' );

function register_acf_blocks() {
    register_block_type_from_metadata( __DIR__ . '/blocks/accordion-tabs' );
    register_block_type_from_metadata( __DIR__ . '/blocks/call-to-action' );
    register_block_type_from_metadata( __DIR__ . '/blocks/content-carousel-slider' );
    register_block_type_from_metadata( __DIR__ . '/blocks/embed' );
    register_block_type_from_metadata( __DIR__ . '/blocks/half-box' );
    register_block_type_from_metadata( __DIR__ . '/blocks/highlight' );
    register_block_type_from_metadata( __DIR__ . '/blocks/html-content' );
    register_block_type_from_metadata( __DIR__ . '/blocks/introduction' );
    register_block_type_from_metadata( __DIR__ . '/blocks/image-gallery' );
    register_block_type_from_metadata( __DIR__ . '/blocks/logos' );
    register_block_type_from_metadata( __DIR__ . '/blocks/pathways' );
    register_block_type_from_metadata( __DIR__ . '/blocks/stats' );
    register_block_type_from_metadata( __DIR__ . '/blocks/related-articles' );
    register_block_type_from_metadata( __DIR__ . '/blocks/separator' );
    register_block_type_from_metadata( __DIR__ . '/blocks/testimonials' );
    register_block_type_from_metadata( __DIR__ . '/blocks/file-download' );
    register_block_type_from_metadata( __DIR__ . '/blocks/button' );
    register_block_type_from_metadata( __DIR__ . '/blocks/toggle-content' );
    register_block_type_from_metadata( __DIR__ . '/blocks/countdown' );
}

/**
 * Disable WordPress Gutenberg blocks and add our own blocks
 */
add_filter( 'allowed_block_types_all', 'allowed_blocks', 25, 2 );

function allowed_blocks( $allowed_blocks, $editor_context ) {
    return array(
        'acf/accordion-tabs',
        'acf/call-to-action',
        'acf/content-carousel-slider',
        'acf/embed',
        'acf/half-box',
        'acf/highlight',
        'acf/html-content',
        'acf/introduction',
        'acf/image-gallery',
        'acf/logos',
        'acf/pathways',
        'acf/stats',
        'acf/related-articles',
        'acf/separator',
        'acf/testimonials',
        'acf/file-download',
        'acf/button',
        'acf/toggle-content',
        'acf/countdown',
        'core/table',
        'core/pattern',
        'core/block',
        'core/columns',
        'dottie/dottie-settings',
    );
}

 /*
Gravity Forms form heading is by default a h2. When the form is inside an embed block that has a title however, we want the gform heading to become a h3. Otherwise, it should be a h2.
*/
add_filter( 'gform_get_form_filter', 'conditional_change_gform_title_based_on_embed_block', 10, 2 );
function conditional_change_gform_title_based_on_embed_block( $form_string, $form ) {
    // Check if the form is being rendered within a section that contains <h2 class="embed-title">
    if ( isset( $GLOBALS['embed_block_has_embed_title'] ) && $GLOBALS['embed_block_has_embed_title'] === true ) {
        // Replace the <h2> with <h3> in the Gravity Form title
        $form_string = str_replace( '<h2 class="gform_title"', '<h3 class="gform_title"', $form_string );
        $form_string = str_replace( '</h2>', '</h3>', $form_string );
    }

    return $form_string;
}

// Add to indicate the presence of the embed-title
function check_for_embed_title_in_block( $block_content, $block ) {
    if ( strpos( $block_content, 'embed-title' ) !== false ) {
        $GLOBALS['embed_block_has_embed_title'] = true;
    } else {
        $GLOBALS['embed_block_has_embed_title'] = false;
    }

    return $block_content;
}
add_filter( 'render_block', 'check_for_embed_title_in_block', 10, 2 );

function add_preload_main_image() {
    global $listing_data;
    if ( isset( $listing_data['mainImage']['largeImageURL'] ) ) {
        $mainImage = $listing_data['mainImage'];
        echo '<link rel="preload" href="' . esc_url( $mainImage['largeImageURL'] ) . '" as="image" imagesrcset="' . esc_url( $mainImage['smallImageURL'] ) . ' 400w, ' . esc_url( $mainImage['mediumImageURL'] ) . ' 900w, ' . esc_url( $mainImage['largeImageURL'] ) . ' 2000w" imagesizes="100vw">';
    }
}

add_action( 'wp_head', 'add_preload_main_image' );