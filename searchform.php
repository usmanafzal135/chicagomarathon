<?php
    $form_id = wp_unique_id('searchform-');

    // Build a string containing an aria-label to use for the search form.
    if (isset($args['aria_label'])) {
        $aria_label = 'aria-label="' . esc_attr($args['aria_label']) . '" ';
    } else {
        $aria_label = '';
    }

    // Build a string containing an to use for the search input.
    if (isset($args['input_id'])) {
        $input_id = 'id="' . esc_attr($args['input_id']) . '" ';
    } else {
        $input_id = '';
    }
?>

<div class="overflow-auto bg-black/50 transition ease-in-out duration-300" :class="searchOpen ? ' fixed inset-0 z-10 flex items-center justify-center' : 'invisible opacity-0'" @click="searchOpen = false" x-cloak></div>
<div x-trap.noscroll="searchOpen" class="w-full <?php if (!is_user_logged_in()) { ?> top-0 <?php } else { ?> top-[45px] md:top-[30px] <?php } ?> left-0 fixed p-1 xl:py-2 bg-white shadow-2xl z-10 transition ease-in-out duration-300" 
    :class="searchOpen ? '' : 'invisible opacity-0'" tabindex="-1" x-cloak>
    <div class="flex items-center">
        <form id="<?php echo esc_attr($form_id) ?>" role="search" <?php echo $aria_label; ?> method="get" class="flex md:mx-auto w-[85%] xl:w-9/12 justify-center items-center" action="<?php echo esc_url(home_url('/')); ?>">
            
            <label class="grow">
                <span class="sr-only"><?php echo _x('Search for:', 'label'); ?></span>
                <input <?php echo $input_id ?> type="search" class="xl:p-1 xl:text-lg" placeholder="<?php echo esc_attr_x('Enter keywords &hellip;', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            </label>
            
            <input type="submit" class="button mb-0 ml-qtr secondary input-group-button xl:px-2 xl:py-1 xl:text-lg margin-0 shrink-0" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />

        </form>

        <button @click="searchOpen = false" class="absolute top-50 right-1 md:top-auto p-[4px] mb-0 !bg-transparent !border-none !shadow-none transition duration-500 ease-in-out hover:rotate-90">
            <i class="fill-primary">
                <svg viewBox="0 0 20 20" width="18" height="18">
                    <path d="M11.469,10l7.08-7.08c0.406-0.406,0.406-1.064,0-1.469c-0.406-0.406-1.063-0.406-1.469,0L10,8.53l-7.081-7.08
                    c-0.406-0.406-1.064-0.406-1.469,0c-0.406,0.406-0.406,1.063,0,1.469L8.531,10L1.45,17.081c-0.406,0.406-0.406,1.064,0,1.469
                    c0.203,0.203,0.469,0.304,0.735,0.304c0.266,0,0.531-0.101,0.735-0.304L10,11.469l7.08,7.081c0.203,0.203,0.469,0.304,0.735,0.304
                    c0.267,0,0.532-0.101,0.735-0.304c0.406-0.406,0.406-1.064,0-1.469L11.469,10z"></path>
                </svg>
                <span class="sr-only">Close Search</span>
            </i>
        </button>
    </div>
 </div>