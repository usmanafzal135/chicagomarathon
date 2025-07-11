<?php
// Define Sidebars, side bars use WP widgets
//---------------------------------------------
//---------------------------------------------

function widgets_init_tzo() {

    register_sidebar(array(
        'name' => __( 'Pages Sidebar' ),
        'id' => 'pages-widget-area',
        'description' => __( 'The sub nav widget area' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => __( 'Blog Sidebar' ),
        'id' => 'blog-widget-area',
        'description' => __( 'The blog widget area' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));
}
add_action( 'widgets_init', 'widgets_init_tzo' );
