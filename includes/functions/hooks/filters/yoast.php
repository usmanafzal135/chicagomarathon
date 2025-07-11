<?php 

/**
 * Move Yoast SEO to bottom of admin pages
 * @return [string] [move the Yoast meta box to lower on the admin add/edit page]
 */

function move_yoast_to_bottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'move_yoast_to_bottom');
