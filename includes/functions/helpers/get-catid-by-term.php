<?php

/**
 * get category/term id by name
 * @param  string $cat_name
 * @return int
 */

function get_category_id( $cat_name ){
    $term = get_term_by( 'name', $cat_name, 'category' );
    return $term->term_id;
}
