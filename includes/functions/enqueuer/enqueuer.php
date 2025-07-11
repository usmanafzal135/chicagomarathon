<?php
// Load Styles/Scripts
// User to overwride out of the box enqueue scripes/styles. Example being to load jQuery and wether to include in footer
//---------------------------------------------
//---------------------------------------------

// Load styles in footer
function footer_scripts_tzo() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'classic-theme-styles' );
    wp_register_script( 'site', get_template_directory_uri().'/dist/build/build.js', array(), '1.0.0', true );
    wp_enqueue_script( 'site' );
}
add_action( 'wp_enqueue_scripts', 'footer_scripts_tzo' );

/* 
    Load scripts in admin
*/
function tzo_load_admin_scripts( $hook ) {

    wp_enqueue_script('site', get_template_directory_uri() . '/dist/build/build.js', array(), '1.0.0', true);

}
add_action('admin_enqueue_scripts', 'tzo_load_admin_scripts');


/* 
    Inject the css theme variables into the front end and admin block editor (back end)
*/ 
function include_css_theme() {
    // Capture the CSS variables from the CSS file
    $css_file = get_template_directory() . '/scss/css-themes.css';
    if (file_exists($css_file)) {
        $css_variables = file_get_contents($css_file);
    } else {
        $css_variables = '';
    }

    // Function to add inline styles
    function add_inline_css($css_variables) {
        // Enqueue the CSS file
        wp_enqueue_style('css-themes', get_template_directory_uri() . '/scss/css-themes.css');
        // Add the inline CSS variables
        wp_add_inline_style('css-themes', $css_variables);
    }

    // Add inline styles for the front-end
    add_action('wp_enqueue_scripts', function() use ($css_variables) {
        wp_register_style('custom-inline-css', false);
        wp_enqueue_style('custom-inline-css');
        add_inline_css($css_variables);
    });

    // Add inline styles for the block editor (back-end)
    add_action('enqueue_block_editor_assets', function() use ($css_variables) {
        add_inline_css($css_variables);
    });
}

add_action('init', 'include_css_theme');
