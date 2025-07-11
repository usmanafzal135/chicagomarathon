<?php
// Define CPTs
//---------------------------------------------
//---------------------------------------------

function testimonial_cpt_tzo() {

    /**
     * Post Type: Testimonials.
     */

    $labels = array(
        "name" => __( "Testimonials", "tzo-cpt" ),
        "singular_name" => __( "Testimonial", "tzo-cpt" ),
    );

    $args = array(
        "label" => __( "Testimonials", "tzo-cpt" ),
        "labels" => $labels,
        'menu_icon' => 'dashicons-format-quote',
        "description" => "",
        "public" => false,
        "publicly_queryable" => false,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "testimonials", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "thumbnail" ),
    );

    register_post_type( "testimonials", $args );
}

add_action( 'init', 'testimonial_cpt_tzo' );

// function quote_types_tax_tzo() {

//     /**
//      * Taxonomy: Quote Types for testimonials
//      */

//     $labels = array(
//         "name" => __( "Quote Types", "tzo-cpt" ),
//         "singular_name" => __( "Quote Type", "tzo-cpt" ),
//     );

//     $args = array(
//         "label" => __( "Quote Types", "tzo-cpt" ),
//         "labels" => $labels,
//         "public" => true,
//         "publicly_queryable" => true,
//         "hierarchical" => false,
//         "show_ui" => true,
//         "show_in_menu" => true,
//         "show_in_nav_menus" => true,
//         "query_var" => true,
//         "rewrite" => array( 'slug' => 'quote_type', 'with_front' => true, ),
//         "show_admin_column" => false,
//         "show_in_rest" => true,
//         "rest_base" => "quote_type",
//         "rest_controller_class" => "WP_REST_Terms_Controller",
//         "show_in_quick_edit" => false,
//         );
//     register_taxonomy( "quote_type", array( "testimonials" ), $args );
// }
// add_action( 'init', 'quote_types_tax_tzo' );
