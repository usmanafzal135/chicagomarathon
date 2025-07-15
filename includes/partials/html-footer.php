        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/main.css?v=1.0" type="text/css" as="style" onload="this.onload=null;this.rel='stylesheet';"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400;1,600&display=swap&subset=latin" rel="stylesheet">

        <?php get_template_parts( array( 'includes/partials/interstitial' ) ); ?>
        <?php if (get_field('footer_code', 'option')) { echo get_field('footer_code', 'option'); } ?>
        <?php wp_footer(); ?>
	</body>
</html>
