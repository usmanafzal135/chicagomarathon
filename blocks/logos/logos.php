<?php /**
     * Logos Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.

    $id = 'logos-' . $block['id'];
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

    $title = get_field('title');
    $button_link = get_field('button_link');

    if ($button_link) {
        $button_link_url = $button_link['url'];
        $button_link_title = $button_link['title'];
        $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
    }

?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-grid-logos <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <div class="container <?php echo $class_name; ?>">

        <?php if ($title) { ?>
            <h2 class="js-stagger h3 mb-1.5">
                <?php echo $title; ?>
            </h2>
        <?php } ?>
        <?php if (have_rows('logo_items')) { ?>
            <div class="flex flex-row flex-wrap justify-center mb-2">
                <?php while (have_rows('logo_items')) { the_row(); ?>
                    <?php
                    $link = get_sub_field('logo_link');

                    if ($link) {
                        $link_url = $link['url'];
                        $link_title = get_sub_field('logo_title');
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    }
                    ?>
                    <div class="js-stagger p-1 basis-1/2 md:basis-1/3 lg:basis-1/4 logo-item relative text-center mb-1 <?php if ($link) { echo 'group'; } ?>">
                        <figure
                            class="relative aspect-[4/3] ui-loader relative mx-auto mb-1"
                        >
                            <?php if (get_sub_field('logo_image')) {
                                $image = get_sub_field('logo_image');
                                $alt = $image['alt'];
                                $image_url = $image['sizes']['small-thumbnail'];
                            ?>
                                <img
                                    width="300"
                                    height="300"
                                    class="lozad absolute-center w-fit <?php if ($link) { echo 'group-hover:opacity-70 group-hover:ease-in-out duration-300'; } ?>"
                                    src="<?php echo $image_url ?>"
                                    data-src="<?php echo $image_url ?>"
                                    alt="<?php echo $alt ?>"
                                />
                            <?php } else { ?>
                                <img
                                    width="300"
                                    height="300"
                                    class="lozad absolute-center object-cover w-full h-full <?php if ($link) { echo 'group-hover:opacity-70 group-hover:ease-in-out duration-300'; } ?>"
                                    src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                                    data-src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                                    alt=""
                                />
                            <?php } ?>
                        </figure>
                        <div class="mx-auto w-[250px]">
                            <?php if (get_sub_field('logo_title')) { ?>
                                <p class="mb-0 font-bold <?php if ($link) { echo 'group-hover:text-primary'; } ?>">
                                    <?php echo get_sub_field('logo_title'); ?>
                                </p>
                            <?php } ?>
                            <?php if (get_sub_field('logo_desc')) { ?>
                                <p class="text-sm text-gray-500">
                                    <?php echo get_sub_field('logo_desc'); ?>
                                </p>
                            <?php } ?>
                            <?php if ($link) { ?>

                                <a class="absolute-cover" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                    <span class="sr-only"><?php echo esc_html($link_title); ?></span>
                                </a>

                            <?php } ?>
                        </div>
                    </div><!-- end item -->
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($button_link) { ?>
            <p class="js-stagger text-center">
                <a href="<?php echo esc_url($button_link_url); ?>" class="button hollow" target="<?php echo esc_attr($button_link_target); ?>"><?php echo esc_html($button_link_title); ?></a>
            </p>
        <?php } ?>

    </div>
</section>