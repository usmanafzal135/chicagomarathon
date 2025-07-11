<?php get_template_parts( array( 'includes/partials/html-header', 'includes/partials/header' ) ); ?>
 
<div class="container max-w-screen-lg">
    <main id="main" class="js-hidden non-critical">
        
        <?php if ( have_posts() ) { ?>
            <h1 class="js-stagger mt-4 mb-2">Search results for '<?php echo get_search_query(); ?>'.</h1>

            <?php get_template_parts( array( 'searchform-basic' )); ?>

            <hr class="js-stagger my-2">

            <?php while ( have_posts() ) { the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('js-stagger'); ?>>
                    <h2 class="text-2xl"><a class="text-primary hover:text-secondary" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(100); ?>
                </article>

                <hr class="my-2">

            <?php } ?>

            <?php get_template_parts( array( 'includes/partials/pagination/main-loop' )); ?>

        <?php } else { ?>

            <h1 class="js-stagger mt-4">No results found for '<?php echo get_search_query(); ?>'</h1>
            <p class="js-stagger">Search again?</p>
            <?php get_template_parts( array( 'searchform-basic' )); ?>

        <?php } ?>

    </main>
</div>
<?php get_template_parts( array( 'includes/partials/footer','includes/partials/html-footer' ) ); ?>
