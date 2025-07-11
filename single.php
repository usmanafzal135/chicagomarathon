<?php get_template_parts( array( 'includes/partials/html-header', 'includes/partials/header' ) ); ?>
<?php get_template_parts( array( 'includes/partials/hero' ) ); ?>


    <main id="main" class="container max-w-full blog-entry  
        <?php if (get_field('remove_margin_bottom')) {
            echo 'padding-top-0';
        } ?>
    ">
    <?php if ( post_password_required() ) { ?>

            <?php echo get_the_password_form(); ?>

        <?php } else { ?>
            <section class="js-hidden container max-w-screen-xl">
                <?php if ( have_posts() ) while ( have_posts() ) { the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('js-stagger'); ?>>

                        <?php if (!get_the_post_thumbnail()) { ?>
                       
                            <h1 class="my-1 mt-4">
                                <?php if (get_field('hero_title')) {
                                    echo get_field('hero_title');
                                } else {
                                    the_title();
                                }?>
                            </h1>
                  
                        <?php } ?>

                        <?php /* Dev Note: Time/date options for this template... Published Date, Time Ago, Author & Time To Read

                                <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate class="display-block margin-bottom-2">
                                    <p class="text-center">Posted on <?php the_date(); ?>, <?php the_time(); ?></p>
                                </time> 
                                <?php echo time_ago(); ?>
                                <?php echo posted_by_link(); ?>
                                <?php echo minutes_to_read(); ?>

                            */ 
                        ?>

                        <?php //comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
                    </article>
                <?php } ?>

                <?php the_content(); ?>

                <p class="js-stagger text-center mb-3">
                    <a class="button hollow" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Back to Latest News</a>
                </p>

                <?php //comments_template( '', true ); ?>
            </section>
        <?php } ?>
    </main>

<?php get_template_parts( array( 'includes/partials/footer','includes/partials/html-footer' ) ); ?>
