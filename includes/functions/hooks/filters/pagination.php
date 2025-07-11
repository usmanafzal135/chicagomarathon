<?php

/**
 * Convert the pagination to use the foundation pagination component.
 *
 * @param string $r    HTML output.
 * @param array  $args An array of arguments. See paginate_links()
 *                     for information on accepted arguments.
 *
 * @return string
 */
function foundation_pagination($r, $args)
{
    // Defaults from paginate_links() to compare against.
    $defaults = array(
        'prev_text' => __('&laquo; Previous'),
        'next_text' => __('Next &raquo;'),
    );

    $total      = (int) $args['total'];
    $current    = (int) $args['current'];
    $end_size   = (int) $args['end_size'];
    $mid_size   = (int) $args['mid_size'];
    $add_args   = $args['add_args'];
    $prev_text  = $args['prev_text'] === $defaults['prev_text'] ? 'Previous' : $args['prev_text'];
    $next_text  = $args['next_text'] === $defaults['next_text'] ? 'Next' : $args['next_text'];
    $r          = '';
    $page_links = array();
    $dots       = false;

    if ($args['prev_next'] && $current && 1 < $current) {
        $link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
        $link = str_replace('%#%', $current - 1, $link);
        if ($add_args) {
            $link = add_query_arg($add_args, $link);
        }
        $link .= $args['add_fragment'];

        $page_links[] = sprintf(
            '<li class="mr-[0.5rem] pagination-previous"><a class="flex items-center py-[0.3rem] pr-[0.55rem] ml-0 leading-tight text-black border border-transparent rounded-md hover:bg-gray-100" href="%s"><svg aria-hidden="true" class="w-2 h-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> %s <span class="sr-only">page</span></a></li>',
            esc_url(apply_filters('paginate_links', $link)),
            $prev_text
        );
    }

    for ($n = 1; $n <= $total; $n++) {
        if ($n == $current) {
            $page_links[] = sprintf(
                '<li class="mr-[0.5rem] current"><span class="sr-only">You\'re on page</span> <span class="px-1 py-[0.7rem] leading-tight text-white bg-primary border border-primary rounded-md">%s</span></li>',
                $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number']
            );

            $dots = true;
        } else {
            if ($args['show_all'] || ($n <= $end_size || ($current && $n >= $current - $mid_size && $n <= $current + $mid_size) || $n > $total - $end_size)) {
                $link = str_replace('%_%', 1 == $n ? '' : $args['format'], $args['base']);
                $link = str_replace('%#%', $n, $link);
                if ($add_args) {
                    $link = add_query_arg($add_args, $link);
                }
                $link .= $args['add_fragment'];

                $page_links[] = sprintf(
                    '<li class="mr-[0.5rem]"><a href="%s" class="px-1 py-[0.7rem] text-black border border-transparent rounded-md hover:bg-gray-100" aria-label="Page %s">%s</a></li>',
                    esc_url(apply_filters('paginate_links', $link)),
                    number_format_i18n($n),
                    $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number']
                );

                $dots = true;
            } elseif ($dots && ! $args['show_all']) {
                $page_links[] = '<li class="ellipsis"></li>';

                $dots = false;
            }
        }
    }

    if ($args['prev_next'] && $current && $current < $total) {
        $link = str_replace('%_%', $args['format'], $args['base']);
        $link = str_replace('%#%', $current + 1, $link);
        if ($add_args) {
            $link = add_query_arg($add_args, $link);
        }
        $link .= $args['add_fragment'];

        $page_links[] = sprintf(
            '<li class="mr-[0.5rem] pagination-next"/><a class="flex items-center py-[0.3rem] pl-[0.55rem] ml-0 leading-tight text-black border border-transparent rounded-md hover:bg-gray-100" href="%s" aria-label="Next page">%s <span class="sr-only">page</span><svg aria-hidden="true" class="w-2 h-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></a></li>',
            esc_url(apply_filters('paginate_links', $link)),
            $next_text
        );
    }

    $page_links_html = implode("\n\t", $page_links);

    $r = <<<PAGINATION
    
    <ul class="mb-4 inline-flex items-center text-center -space-x-px">
        $page_links_html
    </ul>
  
    PAGINATION;

    return $r;
}

add_filter('paginate_links_output', 'foundation_pagination', 10, 2);