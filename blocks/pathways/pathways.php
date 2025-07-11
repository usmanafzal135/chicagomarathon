<?php
    /**
     * Pathways Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'pathways-' . $block['id'];
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
    $pathways_items = get_field('pathways_items');
    if (is_array($pathways_items)) {
        $pathways_count = count($pathways_items);
    } else {
        $pathways_count = 0;
    }
    $show_more_loader = get_field('show_more_loader');
    $layout_type = get_field('layout_type');
    $button_link = get_field('button_link');
    $remove_bottom_margin = get_field('remove_bottom_margin');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-grid-pathways <?php get_template_part('includes/partials/block-modifiers/bottom-margin'); ?> ">
    <div class="container <?php echo esc_attr($class_name); ?>">

        <?php if ($title) { ?>
            <h2 class="js-stagger h3 mb-1.5">
                <?php echo $title; ?>
            </h2>
        <?php } ?>
        
        <script>
            function pathwaysData() {
                return {
                    items: [],
                    visibleItems: <?php echo $show_more_loader ? '8' : $pathways_count; ?>
                };
            }
        </script>
        <div x-data="pathwaysData()">
            <?php if ( have_rows('pathways_items') ) { ?>
                <div class="grid mb-1 gap-1 xl:gap-1.5 <?php if ($pathways_count == 2) { echo ' md:grid-cols-2 '; } else if ($pathways_count >= 3) { echo ' md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 '; }
                ?> <?php echo $layout_type; ?>">

                    <?php
                    $pos=0;
                    while ( have_rows('pathways_items') ) {
                        the_row();
                        $pos++;
                        $link = get_sub_field('link');

                        if ($link) {
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        }
                        ?>
                        <div x-show=" <?php echo $pos; ?> <= visibleItems" class="js-stagger relative <?php if ($link) { echo 'cursor-pointer'; } ?> group">
                            <figure class="mb-0.75 overflow-hidden relative aspect-[3/2] ui-loader">
                                <?php if (get_sub_field('image')) {
                                    $image = get_sub_field('image');
                                    $url = $image['url'];
                                    $title = $image['title'];
                                    $alt = $image['alt'];
                                    $caption = $image['caption'];
                                    $image_default_url = $image['sizes']['pathways-default'];
                                ?>
                                    <img 
                                        width="500" height="300"
                                        class="absolute-center object-cover w-full h-full lozad <?php if ($link) { echo 'group-hover:scale-[1.02] group-hover:ease-in-out duration-300'; } ?>" 
                                        src="<?php echo $image_default_url; ?>" 
                                        data-src="<?php echo $image_default_url; ?>"
                                        alt="<?php echo esc_html($alt); ?>" 
                                    />
                                <?php } else { ?>
                                    <img 
                                        class="absolute-center object-cover w-full h-full lozad <?php if ($link) { echo 'group-hover:scale-[1.02] group-hover:ease-in-out duration-300'; } ?>" 
                                        width="500" height="300"
                                        src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                                        data-src="<?php bloginfo('template_url'); ?>/images/no-image.png" 
                                        alt="" 
                                    />
                                <?php } ?>
                            </figure>
                            <div class="<?php if ($layout_type === 'is-feature') { echo ' text-center'; } ?>">
                                <h3 class="<?php if ($link) { echo 'group-hover:text-primary'; } ?> text-base">
                                    <?php echo get_sub_field('title'); ?>
                                </h3>

                                <?php if (get_sub_field('description')) { ?>
                                    <p class="mb-1">
                                        <?php echo get_sub_field('description'); ?>
                                    </p>
                                <?php } ?>

                                <?php if ($link) { ?>

                                    <a class="absolute-cover" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <strong class="sr-only"><?php echo esc_html($link_title); ?></strong>
                                    </a>
                                    <strong class="link-button text-primary border-primary">
                                        <?php echo esc_html($link_title); ?>
                                    </strong>

                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($show_more_loader) { ?>
                <div class="js-stagger text-center" x-show="visibleItems < <?php echo $pathways_count; ?>"
                >
                    <button class="hollow mb-0" x-on:click="visibleItems += 8">Show More</button>
                </div>
            <?php } ?>
        </div>

        <?php if ($button_link) {
            $button_link_url = $button_link['url'];
            $button_link_title = $button_link['title'];
            $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
        ?>

            <p class="js-stagger mb-0 <?php if ($pathways_count != 1) { echo ' text-center ';} ?>">
                <a href="<?php echo esc_url($button_link_url); ?>" class="button hollow mb-0" target="<?php echo esc_attr($button_link_target); ?>">
                    <?php echo esc_html($button_link_title); ?>
                </a>
            </p>

        <?php } ?>

    </div>
</section>
