<?php
    /**
     * Call to Action Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'call-to-action-' . $block['id'];
    if( !empty($block['anchor']) ) {
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
    $html_content = get_field('html_content');
    $optional_button_link = get_field('optional_button_link');
    $button_link = get_field('button_link');
    $alt_mode = get_field('alt_mode');
    $remove_bottom_margin = get_field('remove_bottom_margin');
?>

<section id="<?php echo esc_attr($id); ?>" 
    class="js-hidden block-cta p-1.5 lg:py-2 <?php if ($alt_mode) { ?> bg-gray-100 <?php } else { ?> bg-secondary <?php } ?> <?php get_template_part('includes/partials/block-modifiers/bottom-margin'); ?> ">

    <div class="flex flex-wrap items-center <?php echo esc_attr( $class_name ); ?>">
        
        <div class="basis-full lg:basis-2/3 <?php if ($html_content) { ?> lg:mx-auto lg:pr-1   <?php } ?>">
            <?php if ($title) { ?>
                <h2 class="js-stagger text-center lg:text-left <?php if (!$html_content) { echo 'text-center'; } ?> <?php if (!$alt_mode) { ?> text-white <?php } ?>"><?php echo $title; ?></h2>
            <?php } ?>
            <?php if ($html_content) { ?>
                <div class="js-stagger typography max-w-full mb-1 text-center lg:text-left <?php if (!$alt_mode) { ?> text-white <?php } ?>">
                    <?php echo $html_content; ?>
                </div>
            <?php } ?>
        </div>

        <?php if ($button_link || $optional_button_link) { ?>
            <div class="basis-full lg:basis-1/3 text-center">
                <?php if ($optional_button_link) {
                    $optional_button_link_url = $optional_button_link['url'];
                    $optional_button_link_title = $optional_button_link['title'];
                    $optional_button_link_target = $optional_button_link['target'] ? $optional_button_link['target'] : '_self';
                ?>
                    <div class="js-stagger mb-half inline-block">
                        <a href="<?php echo esc_url($optional_button_link_url); ?>" class="button hollow <?php if (!$alt_mode) { ?> white <?php } ?> large mb-0" target="<?php echo esc_attr($optional_button_link_target); ?>"><?php echo esc_html($optional_button_link_title); ?></a>
                    </div>
                <?php } ?>

                <?php if ($button_link) {
                    $button_link_url = $button_link['url'];
                    $button_link_title = $button_link['title'];
                    $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
                ?>
                    <div class="js-stagger mb-half inline-block">
                        <a href="<?php echo esc_url($button_link_url); ?>" class="button primary large mb-0" target="<?php echo esc_attr($button_link_target); ?>"><?php echo esc_html($button_link_title); ?></a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

    </div>
</section>
