<div class="js-hidden header z-10 relative py-1.5 lg:pt-0 lg:pb-[37px]">

    <!-- Header Top -->
    <div class="header-top hidden lg:flex flex-wrap justify-end gap-half px-3">
        <a href="#" class="button text-sm inline-flex items-center justify-center gap-x-half min-h-[2.5rem] mb-0 rounded-none border-0 bg-acent1 text-primary font-normal hover:bg-acent1 hover:shadow-none">
            EN
            <svg xmlns="http://www.w3.org/2000/svg" width="15.66" height="15.66" viewBox="0 0 17.27 17.062">
                <path d="M9.527,18.664,14.1,8.874l4.569,9.79m-7.832-2.611h6.527M3,5.281a42.184,42.184,0,0,1,5.221-.323m0,0q1.462,0,2.9.1m-2.9-.1V3m2.9,2.057A15.687,15.687,0,0,1,3,15.62M11.123,5.057q1.17.08,2.32.224M9.449,12.673a15.684,15.684,0,0,1-3.33-5.049" transform="translate(-2.192 -2.4)" fill="none" stroke="#0052c2" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" />
            </svg>
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
            <a href="<?php echo esc_url($header_button['url']); ?>" class="button inline-flex items-center justify-center gap-x-half min-h-[2.5rem] text-sm font-normal mb-0 rounded-none self-center text-center no-underline hover:bg-primary" target="<?php echo esc_attr($target); ?>">
                <?php echo $header_button['title'] ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="10.66" height="13.85" viewBox="0 0 18.057 21.742">
                    <path d="M16.543,6.047a3.91,3.91,0,0,1-4.014,3.8,3.91,3.91,0,0,1-4.014-3.8,3.91,3.91,0,0,1,4.014-3.8,3.91,3.91,0,0,1,4.014,3.8ZM4.5,20.34a7.818,7.818,0,0,1,8.028-7.593,7.82,7.82,0,0,1,8.029,7.593,20.331,20.331,0,0,1-16.057,0Z" transform="translate(-3.501 -1.25)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </a>
        <?php } ?>
    </div>

    <!-- Header (logo & navigation) -->
    <div class="flex flex-col lg:flex-row lg:px-3">
        <div class="lg:shrink flex items-center justify-between mb-0 px-1 lg:px-0">

            <div class="logo-box w-[146px] lg:w-[250px] 2xl:w-[310px]">
                <?php if (is_front_page()) { ?>
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="<?php echo esc_html(get_bloginfo('name')); ?>" class="max-w-full max-h-4" />
                <?php } else { ?>
                    <a href="<?php echo home_url(); ?>" class="lg:w-5 lg:h-5">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="<?php echo esc_html(get_bloginfo('name')); ?>" class="max-w-full max-h-4" />
                    </a>
                <?php } ?>
                <?php
                $countdown_to_date = get_field('countdown_to_date', 'option');
                if ($countdown_to_date !== null) {
                    $timestamp = strtotime($countdown_to_date);
                }
                if ($countdown_to_date) {
                ?>
                    <div class="text-primary text-right text-2xs lg:text-xs"><?php echo  date('F j, Y', $timestamp); ?></div>
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
                    <a href="<?php echo esc_url($header_button['url']); ?>" class=" lg:hidden" target="<?php echo esc_attr($target); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" viewBox="0 0 18.057 21.742">
                            <path d="M16.543,6.047a3.91,3.91,0,0,1-4.014,3.8,3.91,3.91,0,0,1-4.014-3.8,3.91,3.91,0,0,1,4.014-3.8,3.91,3.91,0,0,1,4.014,3.8ZM4.5,20.34a7.818,7.818,0,0,1,8.028-7.593,7.82,7.82,0,0,1,8.029,7.593,20.331,20.331,0,0,1-16.057,0Z" transform="translate(-3.501 -1.25)" fill="none" stroke="#0052c2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </a>
                <?php } ?>

                <button id="menu-toggle" class="menu-toggle p-0 bg-transparent border-0 active lg:hidden mb-0 hover:bg-white text-primary" aria-label="Main menu">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.5 8.75" class="w-1.5 h-1.5">
                        <path d="M3.75,9h16.5M3.75,15.75h16.5" transform="translate(-2.75 -8)" fill="none" stroke="#0052c2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
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