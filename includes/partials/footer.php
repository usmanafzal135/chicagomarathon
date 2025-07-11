<footer class="js-hidden footer">
    <div class="js-stagger bg-gray-100 p-2 lg:pt-3">
        <div class="container">
        
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

            <p class="js-stagger text-center text-sm text-gray-600 leading-6">
                <?php if ($copyrightText) { echo '&copy; ' . $copyrightText . '<br />'; } ?>
                Designed &amp; developed by <a href="https://timezoneone.com/" class="text-primary-dark" target="_blank" rel="noopener noreferrer">TimeZoneOne</a>
            </p>

        </div>
    </div>
</footer>