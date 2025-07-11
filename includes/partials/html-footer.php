        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/main.css?v=1.0" type="text/css" as="style" onload="this.onload=null;this.rel='stylesheet';"/>
        <!-- <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Merriweather:ital@0;1&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap">
        <link media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Merriweather:ital@0;1&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <?php get_template_parts( array( 'includes/partials/interstitial' ) ); ?>

        <?php if (get_field('footer_code', 'option')) { echo get_field('footer_code', 'option'); } ?>
        <?php wp_footer(); ?>
	</body>
</html>
