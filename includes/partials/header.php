<div class="js-hidden header z-10 relative py-1.5 lg:pt-0 lg:pb-[37px]">

    <!-- Header Top -->
    <div class="header-top hidden lg:flex flex-wrap justify-end gap-half px-3">
        <a href="#" class="button text-sm inline-flex items-center justify-center gap-x-half min-h-[2.5rem] mb-0 rounded-none border-0 bg-acent1 text-primary font-normal hover:bg-acent1 hover:shadow-none">
            EN
            <img src="<?php bloginfo('template_url'); ?>/images/icons/translation-icon.png" width="16" alt="img" />
        </a>
        <?php if (get_field('is_search_button_enabled', 'option')) { ?>
            <button @click="searchOpen = ! searchOpen;" class="alpine-js search-toggle inline-flex items-center justify-center gap-x-half min-h-[2.5rem] mb-0 rounded-none font-normal border-0 bg-acent1 active mb-0 text-primary text-sm hover:bg-acent1 hover:shadow-none">
                Search
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-1 h-1">
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
            <a href="<?php echo $header_button['url']; ?>" class="button inline-flex items-center justify-center gap-x-half min-h-[2.5rem] text-sm font-normal mb-0 rounded-none self-center text-center no-underline hover:bg-primary" target="<?php echo $target?>">
                <?php echo $header_button['title']?>
                <img src="<?php bloginfo('template_url'); ?>/images/icons/user-icon-desktop.png" alt="img" width="13" />
            </a>
        <?php } ?>
    </div>

    <!-- Header (logo & navigation) -->
    <div class="flex flex-col lg:flex-row lg:px-3">
        <div class="lg:shrink flex items-center justify-between mb-0 px-1 lg:px-0">
            
            <div class="logo-box w-[146px] lg:w-[250px] 2xl:w-[310px]">
                <?php if (is_front_page()) { ?>
                    <img src="<?php bloginfo('template_url'); ?>/images/chicagomarathon-logo.png" alt="<?php echo esc_html(get_bloginfo('name')); ?>" class="max-w-full max-h-4" />
                <?php } else { ?>
                    <a href="<?php echo home_url(); ?>" class="lg:w-5 lg:h-5">
                        <img src="<?php bloginfo('template_url'); ?>/images/chicagomarathon-logo.png" alt="<?php echo esc_html(get_bloginfo('name')); ?>" class="max-w-full max-h-4" />
                    </a>
                <?php } ?>
                <?php 
                $countdown_to_date = strtotime(get_field('countdown_to_date', 'option'));
                if ( $countdown_to_date){
                ?>
                <div class="text-primary text-right text-2xs lg:text-xs"><?php echo  date('F j, Y', $countdown_to_date); ?></div>
                <?php 
                }
                ?>
            </div>

            <div class="action flex items-center gap-1">

                <?php if (get_field('is_search_button_enabled', 'option')) { ?>
                    <button @click="searchOpen = ! searchOpen;" class="search-toggle p-0 bg-transparent border-0 active lg:hidden mb-0 hover:bg-white text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" class="w-1.5 h-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <span class="sr-only">Search</span>
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
                    <a href="<?php echo $header_button['url']; ?>" class="text-primary text-[22px] lg:hidden" target="<?php echo $target?>">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                    </a>  
                <?php } ?>

                <button id="menu-toggle" class="menu-toggle p-0 bg-transparent border-0 active lg:hidden mb-0 hover:bg-white text-primary" aria-label="Main menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-1.5 h-1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <span class="sr-only">Menu</span>
                </button>

            </div>

        </div>

        <div class="lg:grow lg:flex lg:justify-end lg:items-end">
           <?php get_template_parts(array('includes/partials/navigation')); ?>
        </div>

        <?php if (get_field('is_search_button_enabled', 'option')) { ?>
            <?php get_search_form(); ?>
        <?php } ?>

    </div>
</div>
