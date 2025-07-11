<?php

$big = 999999999;
    $paginationLinks = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'type' => 'list',
        'total' => $wp_query->max_num_pages
    ));
?>

<?php if ($paginationLinks) { ?>

    <br />
    <nav aria-label="Pagination" class="js-stagger mb-2 text-center">
        <?php echo $paginationLinks; ?>
    </nav>

<?php } ?>

