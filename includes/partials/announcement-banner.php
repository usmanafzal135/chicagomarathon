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
            <div class="flex lg:items-center">
                <i class="mr-[4px]">
                    <svg viewBox="0 0 24 24" width="20" height="20">
                        <g>
                            <path d="M11.5,2.375c-4.97,0-9,4.03-9,9s4.03,9,9,9s9-4.03,9-9S16.47,2.375,11.5,2.375z M13.373,16.323c-0.463,0.183-0.832,0.322-1.109,0.418c-0.276,0.096-0.597,0.144-0.962,0.144c-0.561,0-0.997-0.137-1.308-0.411c-0.311-0.274-0.466-0.62-0.466-1.042c0-0.164,0.011-0.331,0.034-0.502c0.024-0.171,0.061-0.363,0.112-0.578l0.58-2.048c0.051-0.197,0.095-0.383,0.13-0.557c0.035-0.175,0.052-0.336,0.052-0.482c0-0.261-0.054-0.443-0.162-0.546c-0.109-0.103-0.314-0.153-0.619-0.153c-0.149,0-0.303,0.022-0.461,0.069c-0.156,0.048-0.292,0.091-0.403,0.134l0.153-0.631c0.379-0.155,0.743-0.287,1.09-0.397c0.347-0.111,0.674-0.166,0.983-0.166c0.557,0,0.987,0.136,1.289,0.404c0.301,0.269,0.453,0.619,0.453,1.048c0,0.089-0.011,0.246-0.031,0.47c-0.021,0.225-0.059,0.43-0.116,0.618l-0.577,2.042c-0.047,0.164-0.089,0.351-0.127,0.561c-0.037,0.21-0.056,0.37-0.056,0.477c0,0.271,0.06,0.456,0.182,0.555c0.12,0.098,0.331,0.148,0.63,0.148c0.141,0,0.299-0.025,0.477-0.074c0.177-0.049,0.305-0.092,0.386-0.13L13.373,16.323zM13.271,8.035C13.002,8.285,12.678,8.41,12.3,8.41c-0.378,0-0.704-0.125-0.975-0.375c-0.27-0.25-0.406-0.554-0.406-0.909c0-0.354,0.137-0.659,0.406-0.911c0.271-0.253,0.597-0.379,0.975-0.379c0.379,0,0.703,0.126,0.971,0.379c0.269,0.252,0.404,0.557,0.404,0.911C13.675,7.482,13.54,7.785,13.271,8.035z"></path>
                        </g>
                    </svg>
                    <span class="sr-only">Info icon</span>
                </i>
                <p class="text-xs lg:text-sm lg:text-center mb-0 px-qtr"><?php echo $announcement; ?></p>
            </div>
        <?php } ?>

        <?php if ($link) { 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="button hollow !border-white !text-white !text-xs mb-0 mt-[12px] md:mt-0 md:ml-2 text-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
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


