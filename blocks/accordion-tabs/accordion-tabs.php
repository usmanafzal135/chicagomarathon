<?php
    /**
     * Accordion/Tabs Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'accordion-tabs-' . $block['id'];
    if(!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    // Check class_name for style variant
    $class_name = '';
    $has_class_name = ! empty($block['className']);

    if ($has_class_name) {
        $class_name .= ' ' . $block['className'];
        if ($block['className'] == 'is-style-narrow') { 
            $class_name = ' container max-w-screen-md ';
        } elseif ($block['className'] == 'is-style-full') { 
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
    $the_heading = get_field('the_heading');
    $link = get_field('link');
    $open_first_item = get_field('open_first_item');
    $is_tab = get_field('display_as_tabs');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-accordion-tabs alpine-js <?php get_template_part('includes/partials/block-modifiers/bottom-margin'); ?> ">
    <div class="container <?php echo esc_attr($class_name); ?>">

        <?php if ($the_heading) { ?>
            <h2 class="js-stagger mb-1 lg:mb-1.5">
                <?php echo $the_heading; ?>
            </h2>
        <?php } ?>

        <?php if ( have_rows('accordion_items') ) { $accordion_count = 0; $accordion_inside_count = 0; ?>
            
            <?php if ($is_tab) { ?>
                
                <!-- Tabs Mode -->
                <div x-data="{ tab: 'tab-0' }" >
                    <div class="overflow-x-auto">
                        <ul
                            class="js-stagger whitespace-nowrap lg:whitespace-wrap lg:flex lg:flex-row lg:flex-wrap w-full border-b border-gray-200" 
                            id="accordion-tabs-<?php echo get_row_index(); ?>" 
                        >
                            <?php while ( have_rows('accordion_items') ) { the_row(); ?>
                                <li class="inline-block">
                                    <a href="#"
                                        :class="{ 'active bg-gray-100 border-b-4 border-primary': tab === 'tab-<?php echo $accordion_count; ?>' }"
                                        class="inline-block py-0.75 px-1 lg:px-1.5 xl:py-1 font-bold lg:text-lg text-primary-dark hover:text-primary-dark cursor-pointer"
                                        @click.prevent="tab = 'tab-<?php echo $accordion_count; ?>'"
                                        >
                                            <?php echo get_sub_field('title'); ?>
                                    </a>
                                </li>
                            <?php $accordion_count++; } ?>
                        </ul>
                    </div>

                    <?php while ( have_rows('accordion_items') ) { the_row(); ?>
                        <div class="js-stagger my-1">
                            <div 
                                x-show="tab === 'tab-<?php echo $accordion_inside_count; ?>'"
                                id="accordion-tabs-content-{<?php echo get_row_index(); ?>}"
                            >
                                <div class="typography max-w-full pt-half lg:pt-1 pb-1.5 lg:pb-2 pr-2">
                                    <?php echo get_sub_field('content'); ?>
                                </div>
                            </div>
                        </div>   
                    <?php $accordion_inside_count++; } ?>

                </div>

            <?php } else { ?>
                
                <!-- Default Mode (Accordion) -->
                <ul class="mb-[1.5rem]">
                    <?php while ( have_rows('accordion_items') ) { the_row(); ?>

                        <li
                            x-data="{ expanded: <?php if ($accordion_count == 0 && $open_first_item) { echo "true"; }  else { echo "false"; } ?> }"
                            class="js-stagger border-b border-gray-200"
                            id="heading-<?php echo $accordion_count; ?>"
                        >
                            <a 
                                @click.prevent="expanded = ! expanded" 
                                class="flex justify-between items-center relative cursor-pointer py-1 xl:py-[1.25rem] group"
                                aria-controls="collapse-<?php echo $accordion_count; ?>"
                                x-bind:aria-expanded="expanded"
                                aria-label="<?php echo get_sub_field('title'); ?>"
                                tabindex="0"
                                role="button"
                            >
                                
                                <h3 class="text-base lg:text-lg mb-0 text-primary group-hover:text-primary-dark pr-3">
                                    <?php echo get_sub_field('title'); ?>
                                </h3>

                                <div class="h-[1.25rem] w-[1.25rem] absolute right-1">
                                    <img 
                                        class="lozad"
                                        alt="Expand item" height="20" width="20"
                                        x-show="!expanded" 
                                        data-src="<?php bloginfo('template_url'); ?>/images/icons/icon-plus.svg" 
                                        src="<?php bloginfo('template_url'); ?>/images/icons/icon-plus.svg"
                                    />
                                    <img
                                        class="lozad"
                                        alt="Collapse item" width="20" height="20"
                                        x-show="expanded" 
                                        data-src="<?php bloginfo('template_url'); ?>/images/icons/icon-minus.svg" 
                                        src="<?php bloginfo('template_url'); ?>/images/icons/icon-minus.svg"
                                    />
                                </div>
                            
                            </a>
                            
                            <div
                                id="collapse-<?php echo $accordion_count; ?>" 
                                x-collapse 
                                x-show="expanded"
                            >
                                <div class="js-stagger typography max-w-full pt-half lg:pt-1 pb-1.5 lg:pb-2 pr-2">
                                    <?php echo get_sub_field('content'); ?>
                                </div>
                            </div>
                        </li>

                    <?php $accordion_count++; } ?>

                </ul>
            <?php } ?>

        <?php } ?>

        <?php

            if ($link) {
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <div class="js-stagger">
                <a href="<?php echo esc_url($link_url); ?>" class="button mb-0" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>
        <?php } ?>

    </div>
</section>
