<?php

/** 
 * Filters the ACF text field to setup iframes for lazy loading and set max-width.
 */

 function tzo_setup_embed_block_lazy_loading( $value ) {
    // Add the loading and class attributes to <iframe> tags and remove width and height attributes
    $value = preg_replace_callback(
        '/<iframe[^>]*(\s+(?:width|height)\s*=\s*["\']?\d+["\']?\s*)[^>]*>/i',
        function($matches) {
            return str_replace($matches[1], ' loading="lazy" class="w-full aspect-video" title="Embedded Content" ', $matches[0]);
        },
        $value
    );
    
    return $value;
}
add_filter('acf/format_value/type=textarea', 'tzo_setup_embed_block_lazy_loading', 10, 1);

/**
 * [filter content and add a title to iframes]
 * @param [string] $iframe [description]
 */

function add_iframe_title($iframe){
    if($iframe) {
        $attributes = 'title="Embedded Content"';
        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

        return $iframe;
    }

    return false;
}

add_filter('embed_oembed_html', 'tzo_add_title_to_embeded_iframes', 99, 4);

/**
 * [tzo_add_title_to_embeded_iframes description]
 * @param  [string] $html
 * @param  [string] $url 
 * @param  [string] $attr
 * @param  [int] $post_id
 * @return [string]
 */

function tzo_add_title_to_embeded_iframes($html, $url, $attr, $post_id) {
    if ($html) {
        return add_iframe_title($html);
    }

    return false;
}
