<?php

/**
 * [get post ID by path]
 * @param  [string] $path
 * @return [int]
 */

function get_page_id_from_path( $path ) {
    $page = get_page_by_path( $path );
    if( $page ) {
        return $page->ID;
    } else {
        return null;
    };
}