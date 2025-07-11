<?php
    /**
     * Stats Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'stats-' . $block['id'];
    if(!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    // Check class_name for style variant
    $class_name = '';
    $has_class_name = ! empty($block['className']);

    if ($has_class_name) {
        $class_name .= ' ' . $block['className'];
        if ($block['className'] == 'is-style-full') { 
            $class_name = ' max-w-full ';
        } elseif ($block['className'] == 'is-style-wide') { 
            $class_name = ' container max-w-screen-3xl '; 
        } else {
            $class_name = ' container max-w-screen-xl ';
        }
    } else {
        $class_name = ' container max-w-screen-xl ';
    }

    // Load values and handle defaults.
    $title = get_field('title');
    $tagline = get_field('tagline');
    $stats_items = get_field('stats_items');
    if (is_array($stats_items)) {
        $stats_count = count($stats_items);
    } else {
        $stats_count = 0;
    }
    $html_content = get_field('html_content');
    $layout_type = get_field('layout_type');
    $button_link = get_field('button_link');
    $optional_button_link = get_field('optional_button_link');
    $remove_bottom_margin = get_field('remove_bottom_margin');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-stats <?php get_template_part('includes/partials/block-modifiers/bottom-margin'); ?> ">
    <div class="container <?php echo esc_attr($class_name); ?>">

        <?php if ($title) { ?>
            <h2 class="js-stagger text-center h3 mb-1.5">
                <?php echo $title; ?>
            </h2>
        <?php } ?>

        <?php if ($tagline) { ?>
            <p class="tagline text-center mb-1.5 3xl:mb-2 js-stagger">
                <?php echo $tagline; ?>
            </p>
        <?php } ?>
        
    
        <?php if ( have_rows('stats_items') ) { ?>
    <div class="flex mb-1 lg:mb-2 justify-center flex-col md:flex-row flex-wrap">
        <?php
        $pos = 0;
        while ( have_rows('stats_items') ) {
            the_row();
            $pos++;
            ?>
            <div class="js-stagger relative py-half md:px-half 2xl:p-0.75
            <?php 
                // Check if stats_count is 4, 8, or 12, and block class is not 'is-style-full' or 'is-style-wide'
                if ( in_array($stats_count, [4, 8, 12]) && (!in_array($block['className'], ['is-style-full', 'is-style-wide'])) ) { 
                    echo 'md:basis-1/2 '; 
                } else if ( in_array($stats_count, [4, 8, 12]) && (in_array($block['className'], ['is-style-full', 'is-style-wide'])) ) { 
                    echo 'md:basis-1/2 2xl:basis-1/4'; 
                } else { 
                    echo 'md:basis-1/2 lg:basis-1/3'; 
                } ?>
            ">
                <div class="border p-1 py-1.5 lg:p-2 3xl:py-3 text-center group content-center rounded-lg border-gray-300">
                <h3 class="mb-half xl:mb-1 text-primary text-2xl lg:text-5xl 3xl:text-6xl">
                    <?php echo esc_html(get_sub_field('value_prefix')); ?><strong class="js-jumble font-bold text-primary text-2xl lg:text-5xl 3xl:text-6xl" data-text="<?php echo esc_html(get_sub_field('value')); ?>"><?php echo esc_html(get_sub_field('value')); ?></strong><?php echo esc_html(get_sub_field('value_suffix')); ?>
                </h3>

                <?php if ( get_sub_field('label') ) { ?>
                    <p class="mb-0 text-sm uppercase tracking-widest text-gray-500">
                        <?php echo esc_html(get_sub_field('label')); ?>
                    </p>
                <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>


        <div class="js-stagger typography mb-1.5 container max-w-screen-xl text-center">
            <?php echo wp_kses_post($html_content); ?>
        </div>


        <?php if ($button_link && $optional_button_link) { 
    $button_link_url = $button_link['url'];
    $button_link_title = $button_link['title'];
    $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
    
    $optional_button_link_url = $optional_button_link['url'];
    $optional_button_link_title = $optional_button_link['title'];
    $optional_button_link_target = $optional_button_link['target'] ? $optional_button_link['target'] : '_self';
    ?>

        <p class="js-stagger mb-0 text-center">
            <a href="<?php echo esc_url($optional_button_link_url); ?>" class="button hollow mb-0" target="<?php echo esc_attr($optional_button_link_target); ?>">
                <?php echo esc_html($optional_button_link_title); ?>
            </a>
            <a href="<?php echo esc_url($button_link_url); ?>" class="button primary mb-0" target="<?php echo esc_attr($button_link_target); ?>">
                <?php echo esc_html($button_link_title); ?>
            </a>
        </p>

    <?php } ?>


    </div>
</section>
