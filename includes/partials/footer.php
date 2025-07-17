<footer class="js-hidden footer">
    <div class="js-stagger p-2 lg:pt-3">
        <div class="container">
            <div class="max-w-[700px] mx-auto">
                <?php 
                $footer_gallery = get_field('footer_gallery', 'option');
                if (!empty($footer_gallery)){
                ?>
                <div class="sponsors flex flex-wrap gap-x-3 gap-y-3 md:gap-y-2 justify-center items-center mb-3">
                    <?php 
                    foreach($footer_gallery as $image){
                        ?>
                        <div class="w-[100%] md:w-auto">
                            <?php if (!empty($image['url'])): ?>
                                <a href="<?php echo esc_url($image['url']); ?>" target="_blank" rel="noopener">
                            <?php endif; ?>
                                <img src="<?php echo esc_url($image['sizes']['footer-logos']); ?>" class="h-[54px] mx-auto" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php if (!empty($image['url'])): ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php
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
                    $contactNumber = get_field('contact_number', 'option');
                    $contactAddress = get_field('contact_address', 'option');
                    $contactInfo = get_field('contact_information', 'option');
                ?>

                <div class="js-stagger text-center mb-2">
                    <?php if ($contactAddress) { echo '<address class="mb-1">' . $contactAddress . '</address>' ; } ?>
                    <?php if ($contactEmail) { echo '<p>Email: <a class="text-primary-dark hover:text-primary" href="mailto:' . $contactEmail . '">' . $contactEmail . '</a></p>' ; } ?>
                    <?php if ($contactNumber) { echo '<p>Phone: <a class="text-primary-dark hover:text-primary" href="tel:' . $contactNumber . '">' . $contactNumber . '</a></p>' ; } ?>
                    <?php if ($contactInfo) { echo '<div class="text-center text-secondary font-normal mb-3 text-xl">' . $contactInfo . '</div>' ; } ?>
                </div>

                <?php get_template_parts(array('includes/partials/social-links')); ?>

                <p class="js-stagger text-center text-gray-600 leading-6 mb-3">
                    <?php if ($copyrightText) { echo '&copy; ' . $copyrightText . '<br />'; } ?>
                    <?php if ($privacy_policy_link) { echo esc_html($privacy_policy_code) .' '.'<a href="'.esc_url($privacy_policy_link['url']).'" target="'.esc_attr($privacy_policy_link['target']).'" class="font-semibold text-primary">Privacy notice</a>';  } ?>
                </p>

                <p class="text-center font-semibold flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-half" width="23.996" height="23.996" viewBox="0 0 23.996 23.996"><path d="M148.361-829.576H150.1a1.052,1.052,0,0,0,.774-.312,1.051,1.051,0,0,0,.312-.774V-832.4a1.051,1.051,0,0,0-.312-.774,1.052,1.052,0,0,0-.774-.312h-2.28a.521.521,0,0,0-.38.163.521.521,0,0,0-.163.38v5.646a.521.521,0,0,0,.163.38.521.521,0,0,0,.38.163.521.521,0,0,0,.38-.163.522.522,0,0,0,.163-.38Zm0-1.086V-832.4H150.1v1.738Zm7,3.909a1.052,1.052,0,0,0,.774-.312,1.051,1.051,0,0,0,.312-.773V-832.4a1.051,1.051,0,0,0-.312-.774,1.052,1.052,0,0,0-.774-.312h-2.171a.521.521,0,0,0-.38.163.521.521,0,0,0-.163.38v5.646a.521.521,0,0,0,.163.38.521.521,0,0,0,.38.163Zm-1.629-1.085V-832.4h1.629v4.561Zm5.537-1.738h1.412a.521.521,0,0,0,.38-.163.521.521,0,0,0,.163-.38.521.521,0,0,0-.163-.38.521.521,0,0,0-.38-.163h-1.412V-832.4h1.412a.521.521,0,0,0,.38-.163.521.521,0,0,0,.163-.38.521.521,0,0,0-.163-.38.521.521,0,0,0-.38-.163H158.73a.522.522,0,0,0-.38.163.521.521,0,0,0-.163.38v5.646a.521.521,0,0,0,.163.38.522.522,0,0,0,.38.163.522.522,0,0,0,.38-.163.522.522,0,0,0,.163-.38Zm-12.758,9.338a2.209,2.209,0,0,1-1.628-.653,2.209,2.209,0,0,1-.653-1.628v-15.2a2.209,2.209,0,0,1,.653-1.628,2.209,2.209,0,0,1,1.628-.653h15.2a2.209,2.209,0,0,1,1.628.653A2.209,2.209,0,0,1,164-837.72v15.2a2.209,2.209,0,0,1-.653,1.628,2.209,2.209,0,0,1-1.628.653Zm0-1.412h15.2a.83.83,0,0,0,.6-.271.83.83,0,0,0,.271-.6v-15.2a.83.83,0,0,0-.271-.6.83.83,0,0,0-.6-.271h-15.2a.83.83,0,0,0-.6.271.83.83,0,0,0-.271.6v15.2a.83.83,0,0,0,.271.6A.83.83,0,0,0,146.515-821.65ZM142.28-816a2.209,2.209,0,0,1-1.628-.653,2.208,2.208,0,0,1-.653-1.627v-15.907a.682.682,0,0,1,.2-.5.684.684,0,0,1,.5-.2.681.681,0,0,1,.5.2.684.684,0,0,1,.2.5v15.907a.83.83,0,0,0,.271.6.83.83,0,0,0,.6.271h15.907a.682.682,0,0,1,.5.2.685.685,0,0,1,.2.5.681.681,0,0,1-.2.5.684.684,0,0,1-.5.2Zm3.366-22.584v0Z" transform="translate(-140 840)" fill="#0052C2"/></svg>
                    <a href="#" class="text-primary underline">Download Acrobat Reader</a>
                </p>
            </div>
        </div>
    </div>
</footer>