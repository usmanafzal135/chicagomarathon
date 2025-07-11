<?php get_template_parts(array('includes/partials/html-header', 'includes/partials/header')); ?>
<?php
    $post = get_option('page_for_posts');
    setup_postdata($post);
    wp_reset_postdata();
?>

    <main id="main" class="blog-entry mt-4">
        <section class="js-hidden container max-w-screen-xl">

            <?php if (have_posts()) { ?>
                <?php if (is_archive()) { ?>
                    <?php wp_reset_postdata() ?>
                    <?php if (is_category()) { ?>
                        <h1 class="js-stagger"><?php single_cat_title('Category: '); ?></h1>
                    <?php } elseif (is_tag()) { ?>
                        <h1 class="js-stagger"><?php single_tag_title('Tag: '); ?></h1>
                    <?php } elseif (is_day()) { ?>
                        <h1 class="js-stagger my-2 mt-4">Archive: <?php echo get_the_date('D M Y'); ?></h1>
                    <?php } elseif (is_month()) { ?>
                        <h1 class="js-stagger">Archive: <?php echo get_the_date('M Y'); ?></h1>
                    <?php } elseif (is_year()) { ?>
                        <h1 class="js-stagger">Archive: <?php echo get_the_date('Y'); ?></h1>
                    <?php } else { ?>
                        <?php
                            $post = get_option('page_for_posts');
                            setup_postdata($post);
                        ?>
                        <?php if (get_the_title()) { ?>
                            <h1 class="js-stagger"><?php the_title() ?></h1>
                        <?php } else { ?>
                            <h1 class="js-stagger">Archive</h1>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

                <div class="grid gap-1.5 md:grid-cols-2 mb-2">
                <?php while ( have_posts() ) { the_post(); ?>

                    <div id="post-<?php the_ID(); ?>" class="js-stagger relative mb-2 cursor-pointer group">
                    <figure class="relative aspect-[3/2] mb-1 overflow-hidden bg-gray-100 ui-loader">
                            <img width="672" height="420" 
                                class="lozad absolute-center object-cover w-full h-full group-hover:scale-[1.02] group-hover:ease-in-out duration-300"
                                
                                <?php if (get_field('thumbnail_image')) {
                                    $image = get_field('thumbnail_image')['sizes']['image-carousel-multi'];
                                ?>
                                    data-src="<?php echo $image; ?>"
                                <?php } elseif (get_the_post_thumbnail()) {
                                    $image = get_the_post_thumbnail_url($post, 'image-carousel-multi');
                                ?>
                                    data-src="<?php echo $image; ?>"
                                <?php } else { ?>
                                    data-src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                                <?php } ?>
                                alt=""
                            />
                        </figure>
                        <div>
                            <h2 class="text-2xl group-hover:text-primary">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-xs display-block margin-bottom-1 blog-post-meta tagline">
                                Posted in <?php echo get_the_category_list(', ') ?> 
                                <?php /* Dev Note: Remove this line to include Published Date, Author & Time To Read

                                    | Posted <a href="<?php echo monthly_archive_link(); ?>"><?php echo time_ago(); ?></a> 
                                    | <?php echo posted_by_link(); ?>
                                    <br>
                                    <?php echo minutes_to_read(); ?>

                                 Dev Note: Remove this line to include Published Date, Author & Time To Read */ ?>
                            </p>
                            <?php the_excerpt(); ?>
                            <a href="<?php esc_url( the_permalink() ); ?>" class="absolute-cover" rel="bookmark">
                                <span class="sr-only">Read more about <?php the_title(); ?></span>
                            </a>
                            <span class="link-button text-primary border-primary">Read more</span>
                        </div>
                    </div>
                <?php } ?>
            </div>

                <?php get_template_parts( array( 'includes/partials/pagination/main-loop' )); ?>

            <?php } else { ?>

                <h1 class="js-stagger">No posts to display</h1>

            <?php } ?>
        </section>

        <?php
            $post = get_option('page_for_posts');
            setup_postdata($post);
            wp_reset_postdata();
        ?>

    </main>
</div>

<?php get_template_parts(array('includes/partials/footer', 'includes/partials/html-footer')); ?>
