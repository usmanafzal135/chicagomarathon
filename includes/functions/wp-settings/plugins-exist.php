<?php
/**
 * Check if ACF is activeated.
 * 
 */
function acf_check() {
    ob_start();
        if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) { ?>

            <div class="error">
                <p><strong>Error</strong>: Advanced Custom Fields Pro is required with WP Baseline theme.</p>
            </div>

       <?php }
    echo ob_get_clean();
}

add_action('admin_notices', 'acf_check');