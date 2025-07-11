<div class="js-hidden header z-10 relative py-half">
    <div class="px-1 flex flex-col lg:flex-row  lg:px-2">
        <div class="lg:shrink flex items-center justify-between mb-0">
            
            <?php if (is_front_page()) { ?>
                <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="<?php echo esc_html(get_bloginfo('name')); ?>" width="60" height="60" class="lg:w-5 lg:h-5" />
            <?php } else { ?>
                <a href="<?php echo home_url(); ?>" class="lg:w-5 lg:h-5">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="<?php echo esc_html(get_bloginfo('name')); ?>" width="60" height="60" class="lg:w-5 lg:h-5" />
                </a>
            <?php } ?>

            <div class="action">

                <?php if (get_field('is_search_button_enabled', 'option')) { ?>
                    <button @click="searchOpen = ! searchOpen;" class="search-toggle p-qtr bg-transparent border-0 active lg:hidden mb-0 mr-half hover:bg-white text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" class="w-2 h-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                <?php } ?>

                <button id="menu-toggle" class="menu-toggle p-qtr bg-transparent border-0 active lg:hidden mb-0 hover:bg-white text-primary" aria-label="Main menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-2 h-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <span class="sr-only">Menu</span>
                </button>

            </div>

        </div>

        <div class="lg:grow lg:flex lg:justify-end lg:items-center">
           <?php get_template_parts(array('includes/partials/navigation')); ?>
        </div>

        <?php if (get_field('is_search_button_enabled', 'option')) { ?>
            <?php get_search_form(); ?>
        <?php } ?>

    </div>
</div>
