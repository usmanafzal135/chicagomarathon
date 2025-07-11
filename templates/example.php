<?php /* Template Name: Example Template */ ?>

<?php get_template_parts( array( 'includes/partials/html-header', 'includes/partials/header' ) ); ?>
<?php get_template_parts( array( 'includes/partials/hero' ) ); ?>

    <main id="main" class="<?php if (get_field('remove_margin_bottom')) { echo 'mt-0'; } ?>">

        <?php if ( post_password_required() ) { ?>

            <?php echo get_the_password_form(); ?>

        <?php } else { ?>
        
            <?php if ( have_posts() ) while ( have_posts() ) { the_post(); ?>

                <?php if (!get_the_post_thumbnail()) { ?>
                    <div class="container max-w-screen-xl">
                        <h1 class="mt-4">
                            <?php if (get_field('hero_title')) {
                                echo get_field('hero_title');
                            } else {
                                the_title();
                            }?>
                        </h1>
                    </div>

                <?php } ?>
                
                <?php the_content(); ?>

            <?php } ?>

        <?php } ?>

    </main>
<?php get_template_parts( array( 'includes/partials/footer','includes/partials/html-footer' ) ); ?>
