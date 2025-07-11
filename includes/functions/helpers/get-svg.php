<?php
/**
 * get_svg is a function to use staic .svg ibline without adding svg markup to templtes
 * @param  string $filepath [set file path]
 * @param  string $alttext  [set alt text, if desired]
 * @return markup           
 */

function get_svg($filepath, $alttext='') {

    if (isset($filepath)) {
        $filepath = get_template_directory() . $filepath;
        if (file_exists($filepath)) {
            $filepath = file_get_contents($filepath);
        } else {
            $filepath = '';
        }
    }

    if (isset($alttext)) {
        $alttext = '<span class="show-for-sr">' . $alttext . '</span>';
    }
    
    return $filepath . $alttext;
}