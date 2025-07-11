<?php

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function adjust_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'adjust_excerpt_more' );

/**
 * Add support for excerpt in archives.
 * @param  string $excerpt
 * @return strng
 */
function generate_excerpt_based_on_acf_blocks($post_excerpt, $post) {
    // If excerpt is not empty, return it
    if (!empty($post_excerpt)) {
        return '<p>' . $post_excerpt . '</p>';
    }

    // Get the content of the post
    $content = $post->post_content;

    // Parse the content to get the blocks
    $blocks = parse_blocks($content);

    $excerpt_content = '';

    // Loop through the blocks and look for the acf/html-content block
    foreach ($blocks as $block) {
        if ($block['blockName'] === 'acf/html-content') {
            // Extract the 'html_content' field
            if (isset($block['attrs']['data']['html_content'])) {
                $excerpt_content .= $block['attrs']['data']['html_content'];
            }
        }
    }

    // If no content was found in the ACF block, return the original excerpt
    if (empty($excerpt_content)) {
        return '<p>' . $post_excerpt . '</p>';
    }

    // Strip HTML tags and trim the content to create the excerpt
    $excerpt = wp_trim_words(wp_strip_all_tags($excerpt_content), 20);

    return '<p>' . $excerpt . '</p>';
}

add_filter('get_the_excerpt', 'generate_excerpt_based_on_acf_blocks', 10, 2);

/**
 * Add support for excerpt in archives.
 * @param  string $excerpt
 * @return strng
 */
function custom_excerpt_length($length) {
    return 20; // Change this number to the number of words you want
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);
