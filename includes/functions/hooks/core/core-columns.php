<?php


/**
 * Add container around the core/columns block
 */
function wrap_columns_block_with_container($block_content, $block) {
    if ($block['blockName'] === 'core/columns') {
        return '<section class="js-hidden max-w-none clearfix"><div class="js-stagger mb-2">' . $block_content . '</div></section>';
    }
    return $block_content;
}
add_filter('render_block', 'wrap_columns_block_with_container', 10, 2);


function add_columns_styles() {

    // Register 'Narrow' style
    register_block_style(
        'core/columns',
        array(
            'name'  => 'narrow',
            'label' => 'Narrow'
        )
    );

    // Register 'Wide' style
    register_block_style(
        'core/columns',
        array(
            'name'  => 'wide',
            'label' => 'Wide'
        )
    );

    // Register 'Full' style
    register_block_style(
        'core/columns',
        array(
            'name'  => 'full',
            'label' => 'Full'
        )
    );
}
add_action( 'init', 'add_columns_styles' );
