<?php
/* 
 * Add add styles to the WYSIWYG editor
 */
function add_wysiwyg_formats( $init_array ) {
    $style_formats = array(
        array(
            'title' => 'Leading Paragraph',
            'selector' => 'p,div',
            'classes' => 'lead'
        ),
    );
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'add_wysiwyg_formats' );

function add_style_format_button( $buttons ) {
    if (!in_array('styleselect', $buttons)) {
        array_unshift($buttons, 'styleselect');
    }
    return $buttons;
}
add_filter( 'mce_buttons', 'add_style_format_button' );

