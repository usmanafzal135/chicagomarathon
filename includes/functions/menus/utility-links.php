<?php
// Define Menus
//---------------------------------------------
//---------------------------------------------

register_nav_menus( array(
	'utility' => 'Utility Links'
));
class Utility_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // No submenus
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        // No submenus
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';
        $attributes .= ' class="py-qtr text-sm"';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            $title,
            $args->link_after,
            $args->after
        );

        $output .= $item_output . ' '; // Added space after each link
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        // No closing tags necessary
    }
}
