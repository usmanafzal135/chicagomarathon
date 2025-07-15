<footer class="js-hidden footer">
    <div class="js-stagger p-2 lg:pt-3">
        <div class="container">
            <div class="max-w-[700px] mx-auto">
                <?php 
                $footer_gallery = get_field('footer_gallery', 'option');
                if (!empty($footer_gallery)){
                ?>
                <div class="supponcers flex flex-wrap gap-x-3 gap-y-3 md:gap-y-2 justify-center items-center mb-3">
                    <?php 
                    foreach($footer_gallery as $image){
                        echo '<div class="w-[100%] md:w-auto"><img src="'.$image['url'].'" class="h-[54px] mx-auto" alt="'.$image['alt'].'" /></div>';
                    }
                    ?>
                </div>
                <?php 
                }
                if ( has_nav_menu( 'footer' ) ) {
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
                    $privacy_policy_code = get_field('privacy_policy_code', 'option');
                    $privacy_policy_link = get_field('privacy_policy_link', 'option');
                    $contactEmail = get_field('contact_email', 'option');
                    $contactEmail = get_field('contact_email', 'option');
                    $contactEmail = get_field('contact_email', 'option');
                    $contactNumber = get_field('contact_number', 'option');
                    $contactAddress = get_field('contact_address', 'option');
                    $contactInfo = get_field('contact_information', 'option');
                    $download_button_title = get_field('download_button', 'option');
                    $is_file = get_field('is_file', 'option');
                    $upload_file = get_field('upload_file', 'option');
                    $file_url = get_field('file_url', 'option');
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
                    <?php if ($privacy_policy_link) { echo $privacy_policy_code .' '.'<a href="'.$privacy_policy_link['url'].'" target="'.$privacy_policy_link['target'].'" class="font-semibold text-primary">Privacy notice</a>';  } ?>
                </p>

                <p class="text-center font-semibold">
                    <?php if ($is_file && !empty($upload_file)) { 
                        echo '<img src="'.get_template_directory_uri().'/images/icons/pdf-icon.png" alt="img" width="24" class="mr-qtr inline-block" />';
                        echo '<a href="#" class="text-primary underline">'.$download_button_title.'</a>';
                     } elseif (!$is_file && $file_url) {
                        echo '<img src="'.get_template_directory_uri().'/images/icons/pdf-icon.png" alt="img" width="24" class="mr-qtr inline-block" />';
                        echo '<a href="'.$file_url.'" class="text-primary underline">'.$download_button_title.'</a>';
                     }
                     ?>
                </p>
            </div>
        </div>
    </div>
</footer>