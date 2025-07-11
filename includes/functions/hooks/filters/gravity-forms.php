<?php 

/**
 * Force gravity forms to load script in footer
 */

add_filter('gform_init_scripts_footer', '__return_true');