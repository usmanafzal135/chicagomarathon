<?php
// Define Menus
//---------------------------------------------
//---------------------------------------------

register_nav_menus( array(
	'primary' => 'Primary Pages'
 ));

 /**
  * Custom Walker Nav Menu
  */
  class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $submenu = 'dropdown-menu lg:bg-[#0052C2] lg:p-1 pl-1 lg:!w-[180px] lg:transition-opacity lg:duration-300 lg:ease-in-out w-full hide';
        $output .= "\n$indent<ul class=\"$submenu\" id=\"menu-{$args->theme_location}-{$depth}\" aria-labelledby=\"menu-button-{$args->theme_location}-{$depth}\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        if ($args->walker->has_children && $depth > 0) {
            $classes[] = 'dropdown lg:hover:bg-gray-200 flex flex-wrap justify-between';
        } elseif ($args->walker->has_children) {
            $classes[] = 'dropdown flex flex-wrap justify-between';
        } else {
            $classes[] = 'link text';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ($attr === 'href') ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        // Check if the current item is a child
        if ($depth > 0) {
            $link_classes = 'menu-link py-1 lg:py-qtr text-grey lg:text-white lg:text-sm flex border-b border-b-[#eee] lg:border-b-0';
        } else {
            $link_classes = 'menu-link py-1 lg:p-0.75 flex lg:text-lg text-grey lg:text-secondary lg:font-semibold border-b border-b-[#eee] lg:border-b-0';
        }

        $item_output .= '<a' . $attributes . ' class="' . $link_classes . '">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';

        if ($args->walker->has_children) {
            $item_output .= '<button class="dropdown-toggle mb-0 -ml-half absolute top-0.75 right-0 lg:static" aria-label="' . esc_attr($item->title) . '" id="menu-button-' . sanitize_title($item->title) . '-' . $item->ID . '" aria-haspopup="true" aria-expanded="false" aria-controls="menu-' . sanitize_title($item->title) . '-' . $item->ID . '"></button>';
        }

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
