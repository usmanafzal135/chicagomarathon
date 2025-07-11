<form id="basic-search" role="search" method="get" class="js-stagger flex w-full mb-2 justify-center items-center" action="<?php echo esc_url(home_url('/')); ?>">
    
    <label class="grow">
        <span class="sr-only"><?php echo _x('Search for:', 'label'); ?></span>
        <input type="search" class="" placeholder="<?php echo esc_attr_x('Enter keywords &hellip;', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    
    <input type="submit" class="button mb-0 ml-qtr secondary input-group-button margin-0 shrink-0" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />

</form>
