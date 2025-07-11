<?php get_template_parts(array('includes/partials/html-header', 'includes/partials/header')); ?>
<div class="grid-container">

    <main id="main" class="<?php if (get_field('remove_margin_bottom')) { echo 'mt-0'; } ?>">
        <div class="js-hidden container max-w-screen-xl typography mb-4">

        <h1 class="js-stagger mt-4">Page not found.</h1>
        <p class="js-stagger text-xl lg:text-2xl">You may not be able to visit this page because of:</p>
        <ul class="js-stagger">
            <li> an out-of-date bookmark/favorite</li>
            <li> a search engine that has an out-of-date listing for this site</li>
            <li> a mistyped address</li>
            <li> you have no access to this page</li>
            <li> The requested resource was not found.</li>
            <li> An error has occurred while processing your request.</li>
        </ul>
        </div>
    </main>
</div>
<?php get_template_parts(array('includes/partials/footer', 'includes/partials/html-footer')); ?>
