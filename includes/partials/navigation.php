
<div class="relative lg:mt-0 lg:flex lg:mb-0 flex-col lg:flex-col-reverse bg-gray-100 rounded lg:bg-transparent lg:p-0" :class="navOpen ? 'max-lg:mt-1 max-lg:p-1' : ''">
    <div class="flex flex-col lg:flex-row">

        <nav aria-label="main-navigation" aria-describedby="main-navigation" class="js-main-nav lg:mb-0" :class="navOpen ? 'max-lg:mb-1' : ''">
            <?php 
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'walker'         => new Primary_Walker_Nav_Menu(),
                        'items_wrap'     => '<ul x-ref="mainMenu" class="menu main-menu flex flex-col lg:flex-row justify-end" aria-labelledby="menu-button-%1$s">%3$s</ul>',
                    ));
                }
            ?>
        </nav>

        <div class="flex items-center" :class="!navOpen ? 'max-lg:hidden max-lg:invisible' : ''">

            <?php if (get_field('is_search_button_enabled', 'option')) { ?>
                <button @click="searchOpen = ! searchOpen;" class="alpine-js search-toggle hidden lg:block bg-transparent border-0 active mb-0 py-half px-qtr lg:ml-1  hover:bg-transparent hover:text-primary-dark hover:shadow-transparent text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-1.5 h-1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                    <span class="sr-only">Search the site</span>
                </button>
            <?php } ?>

            <?php if (get_field('header_button', 'option')) { 
                
                $header_button = get_field('header_button', 'option');
                    if ($header_button) {
                        $target = $header_button['target'];
                    } else {
                        $target = "_parent";
                    }
            ?>
                <div class="mb-1 w-full flex flex-col lg:flex-row lg:justify-end gap-half lg:gap-x-1 lg:mb-0" :class="!navOpen ? 'max-lg:hidden max-lg:invisible' : ''">
                    <a href="<?php echo $header_button['url']; ?>" class="button self-center mb-1 lg:ml-1 lg:mb-0 w-full text-center no-underline" target="<?php echo $target?>"><?php echo $header_button['title']?></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php get_template_parts(array('includes/partials/utility-links')); ?>
</div>

