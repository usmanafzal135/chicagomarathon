<?php if (get_field('enable_announcement_bar', 'option')) {
    $announcement = get_field('announcement', 'option');
    $link = get_field('annc_button_optional', 'option');
?>

    <div 
        class="js-hidden announcement-bar delay-500 alpine-js flex flex-col md:flex-row justify-center lg:items-center relative block bg-lightgrey pr-2 pl-1 lg:pr-3 lg:pl-2 py-1"
        x-data="announcementData()"
        x-show="open"
    >
        <?php if ($announcement) { ?>
            <div class="flex items-start lg:items-center">
                <img src="<?php bloginfo('template_url'); ?>/images/icons/info-icon.png" class="mr-qtr" alt="img" width="18" height="18" />
                <p class="text-xs lg:text-sm lg:text-center mb-0 px-qtr"><?php echo $announcement; ?></p>
            </div>
        <?php } ?>

        <?php if ($link) { 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="text-primary font-semibold underline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php } ?>

        <button 
            x-on:click="open = ! open"
            class="absolute <?php  if ($link) { ?> top-half <?php } else {  ?> top-1 <?php } ?>right-1 md:top-auto p-[4px] mb-0 !bg-transparent !border-none !shadow-none transition duration-500 ease-in-out hover:rotate-90"
        >
            <i class="fill-primary">
                <svg viewBox="0 0 20 20" width="12" height="12">
                    <path d="M11.469,10l7.08-7.08c0.406-0.406,0.406-1.064,0-1.469c-0.406-0.406-1.063-0.406-1.469,0L10,8.53l-7.081-7.08
                    c-0.406-0.406-1.064-0.406-1.469,0c-0.406,0.406-0.406,1.063,0,1.469L8.531,10L1.45,17.081c-0.406,0.406-0.406,1.064,0,1.469
                    c0.203,0.203,0.469,0.304,0.735,0.304c0.266,0,0.531-0.101,0.735-0.304L10,11.469l7.08,7.081c0.203,0.203,0.469,0.304,0.735,0.304
                    c0.267,0,0.532-0.101,0.735-0.304c0.406-0.406,0.406-1.064,0-1.469L11.469,10z"></path>
                </svg>
                <span class="sr-only">Close Announcement</span>
            </i>
        </button>

    </div>
<?php } ?>


