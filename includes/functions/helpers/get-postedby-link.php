<?php
/**
 * Get the author's link
 */
function posted_by_link() {
    $author_id = get_the_author_meta('ID');
    $author_archive_link = get_author_posts_url($author_id);
    return 'by <a href="' . $author_archive_link . '">' . get_the_author() . '</a>';
}
