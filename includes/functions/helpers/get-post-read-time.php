<?php

/**
 * Get post's 'how long ago this was published' time
 */
function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}

/**
 * Get post's 'how long to read' time
 */
function minutes_to_read() {
    $word_count = str_word_count(get_the_content());
    $wpm = 200;
    $minutes_to_read = $word_count / $wpm;

    if ($minutes_to_read < 1) {
        return 'Less than a minute to read';
    } else {
        return  $minutes_to_read . ' Minute(s) to read';
    }
}
