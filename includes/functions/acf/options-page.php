<?php

// ACF Options Pages
add_action('acf/init', function() {

    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title'    => 'Options',
            'menu_title'    => 'Options',
            'menu_slug'     => 'theme-settings',
            'redirect'      => true,
            'icon_url'      => 'dashicons-screenoptions',
            'position'      => 22
        ));

        acf_add_options_page(array(
            'page_title'    => 'Global Settings',
            'menu_title'    => 'Global',
            'menu_slug'     => 'global-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'parent'        => 'theme-settings'
        ));

        acf_add_options_page(array(
            'page_title'    => 'Analytics/Social Settings',
            'menu_title'    => 'Analytics/Social',
            'menu_slug'     => 'analytics-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'parent'        => 'theme-settings'
        ));
    }

});
