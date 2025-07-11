<?php

/**
 * get the monthly archive link
 */
function monthly_archive_link() {
    $publish_year = get_the_date('Y');
    $publish_month = get_the_date('m');

    return get_month_link($publish_year, $publish_month);
}
