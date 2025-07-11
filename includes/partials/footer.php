<footer class="js-hidden footer">
    <div class="js-stagger p-2 lg:pt-3">
        <div class="container">
            <div class="max-w-[700px] mx-auto">
                <div class="supponcers mb-3">
                    <img src="<?php bloginfo('template_url'); ?>/images/companies.png" alt="supponcers" class="mx-auto" />
                </div>

                <?php if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'js-stagger flex flex-col justify-center text-center md:space-x-2 md:flex-row mb-2 text-lg',
                        'li_class_0' => 'text-primary-dark hover:text-primary font-bold',
                        'depth'          => 1
                    ));
                } ?>

                <?php
                    $copyrightText = get_field('copyright', 'option');
                    $contactEmail = get_field('contact_email', 'option');
                    $contactNumber = get_field('contact_number', 'option');
                    $contactAddress = get_field('contact_address', 'option');
                    $contactInfo = get_field('contact_information', 'option');
                ?>

                <div class="js-stagger text-center mb-2">
                    <?php if ($contactAddress) { echo '<address class="mb-1">' . $contactAddress . '</address>' ; } ?>
                    <?php if ($contactEmail) { echo '<p>Email: <a class="text-primary-dark hover:text-primary" href="mailto:' . $contactEmail . '">' . $contactEmail . '</a></p>' ; } ?>
                    <?php if ($contactNumber) { echo '<p>Phone: <a class="text-primary-dark hover:text-primary" href="tel:' . $contactNumber . '">' . $contactNumber . '</a></p>' ; } ?>
                    <?php if ($contactInfo) { echo '<div class="mb-1">' . $contactInfo . '</div>' ; } ?>
                </div>

                <?php get_template_parts(array('includes/partials/social-links')); ?>

                <p class="js-stagger text-center text-gray-600 leading-6 mb-3">
                    <?php if ($copyrightText) { echo '&copy; ' . $copyrightText . '<br />'; } ?>
                    ARFN3S44 <a href="#" class="font-semibold text-primary">Privacy notice</a>
                    <!-- Designed &amp; developed by <a href="https://timezoneone.com/" class="text-primary-dark" target="_blank" rel="noopener noreferrer">TimeZoneOne</a> -->
                </p>
                <p class="text-center font-semibold">
                    <img src="<?php bloginfo('template_url'); ?>/images/icons/pdf-icon.png" alt="img" width="24" class="mr-qtr inline-block" />
                    <a href="<?php bloginfo('url')?>" class="text-primary underline">Download Acrobat Reader</a>
                </p>
            </div>
        </div>
    </div>
</footer>