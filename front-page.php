<?php get_template_parts( array( 'includes/partials/html-header', 'includes/partials/header' ) ); ?>
<?php get_template_parts( array( 'includes/partials/hero' ) ); ?>

    <main id="main" class="<?php if (get_field('remove_margin_bottom')) { echo 'mt-0'; } ?>">
        
        <?php if ( post_password_required() ) { ?>
            
            <?php echo get_the_password_form(); ?>

        <?php } else { ?>
        
            <?php if ( have_posts() ) while ( have_posts() ) { the_post(); ?>

                <?php the_content(); ?>

            <?php } ?>

        <?php } ?>
    </main>
    
<?php get_template_parts( array( 'includes/partials/footer','includes/partials/html-footer' ) ); ?>
