<?php 
/**
 * Tailwind Column Class
 * 
 * @param int $count
 * @return string
 */
function tailwind_column_class($count) {
    switch ($count) {
        case 1: return 'grid grid-cols-1';
        case 2: return 'grid grid-cols-1 md:grid-cols-2';
        case 3: return 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3';
        case 4: return 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4';
        default: return 'grid grid-cols-1';
    }
}
