
<div class="relative lg:mt-0 lg:flex lg:mb-0 flex-col lg:flex-col-reverse rounded lg:p-0" :class="navOpen ? 'max-lg:mt-1 max-lg:p-1' : ''">
    <div class="flex flex-col lg:flex-row">

        <nav aria-label="main-navigation" aria-describedby="main-navigation" class="js-main-nav lg:mb-0" :class="navOpen ? 'max-lg:mb-1' : ''">
            <?php 
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'walker'         => new Primary_Walker_Nav_Menu(),
                        'items_wrap'     => '<ul x-ref="mainMenu" class="menu main-menu flex flex-col lg:flex-row justify-end lg:gap-x-2 2xl:gap-x-[40px] lg:gap-y-1" aria-labelledby="menu-button-%1$s">%3$s</ul>',
                    ));
                }
            ?>
        </nav>

        <div class="flex items-center" :class="!navOpen ? 'max-lg:hidden max-lg:invisible' : ''">
            
                <?php if (get_field('header_button', 'option')) { 
                    $header_button = get_field('header_button', 'option');
                        if ($header_button) {
                            $target = $header_button['target'];
                        } else {
                            $target = "_parent";
                        }
                ?>
                    <div class="mb-1 w-full flex flex-col lg:hidden" :class="!navOpen ? 'max-lg:hidden max-lg:invisible' : ''">
                        <a href="<?php echo $header_button['url']; ?>" class="button self-center mb-1 lg:ml-1 lg:mb-0 w-full text-center no-underline" target="<?php echo $target?>"><?php echo $header_button['title']?></a>
                    </div>
                <?php } ?>
            
        </div>
    </div>

    <?php get_template_parts(array('includes/partials/utility-links')); ?>
</div>

