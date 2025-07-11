<?php


/**
 * Add container around the core/table block
 */
function wrap_table_block_with_container($block_content, $block) {
    if ($block['blockName'] === 'core/table') {
        $block_content = preg_replace('/<table/', '<table class="table-auto min-w-full"', $block_content, 1);

        return '<section class="js-hidden max-w-none clearfix"><div class="js-stagger mb-2"><div class="overflow-x-auto">' . $block_content . '</div></div></section>';
    }
    return $block_content;
}
add_filter('render_block', 'wrap_table_block_with_container', 10, 2);


function remove_stripes_styles_from_table() {
    wp_enqueue_script( 'wp-blocks' );

    $inline_script = "
        window.addEventListener('load', function() {
            const { unregisterBlockStyle, registerBlockStyle } = wp.blocks;

            // Unregister 'Stripes' style
            unregisterBlockStyle('core/table', 'stripes');

        });
    ";

    wp_add_inline_script( 'wp-blocks', $inline_script );
}
add_action( 'enqueue_block_editor_assets', 'remove_stripes_styles_from_table' );


function add_table_styles() {

    // Register 'Narrow' style
    register_block_style(
        'core/table',
        array(
            'name'  => 'narrow',
            'label' => 'Narrow'
        )
    );

    // Register 'Wide' style
    register_block_style(
        'core/table',
        array(
            'name'  => 'wide',
            'label' => 'Wide'
        )
    );

    // Register 'Full' style
    register_block_style(
        'core/table',
        array(
            'name'  => 'full',
            'label' => 'Full'
        )
    );
}
add_action( 'init', 'add_table_styles' );
