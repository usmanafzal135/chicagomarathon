<!doctype html>
<html class="no-js" lang="en">
	<head>

        <?php if (get_field('gtm', 'option')) { ?>
            <script>
                //Google Tag Manager
                (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','<?php echo get_field('gtm', 'option'); ?>');
            </script>
        <?php } ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="application-name" content="<?php bloginfo('name'); ?>"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php get_template_parts(array('includes/partials/favicons', 'includes/partials/critical' )); ?>
		<?php wp_head(); ?>
        <?php if (get_field('header_code', 'option')) { echo get_field('header_code', 'option'); } ?>

	</head>
	<body <?php body_class('js-scroll-animate'); ?> x-data="headerState" x-init="init()" @keydown.escape="searchOpen = false;">

        <a href="#main" class="sr-only">Skip to main content</a>

        <?php get_template_parts(array('includes/partials/announcement-banner')); ?>

        <?php if (get_field('gtm', 'option')) { ?>
            <!-- Google Tag Manager -->
            <noscript><iframe src='//www.googletagmanager.com/ns.html?id=<?php echo get_field('gtm', 'option'); ?>' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
        <?php } ?>

