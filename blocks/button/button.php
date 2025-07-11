<?php
    /**
     * HTML Content Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'button-' . $block['id'];
    if( !empty($block['anchor']) ) {
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

    // Load values.
    $heading = get_field('heading');
    $button = get_field('button');
    $button_size = get_field('button_size');
    $button_style = get_field('button_style');
    $button_alignment = get_field('button_alignment');
    $secondary_button = get_field('secondary_button');
    $secondary_button_size = get_field('secondary_button_size');
    $secondary_button_style = get_field('secondary_button_style');
    $remove_bottom_margin = get_field('remove_bottom_margin');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-button clearfix <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <div class="container <?php echo esc_attr( $class_name ); ?>">
        <?php if ($heading) { ?>
            <h2 class="js-stagger h3 mb-1.5 <?php if ($button_alignment === 'justify-end') { echo 'text-right';} elseif($button_alignment === 'justify-center') {echo 'text-center';} else {echo 'text-left';} ?>">
                <?php echo $heading; ?>
            </h2>
        <?php } ?>
        <div class="flex flex-wrap gap-half items-center <?php echo $button_alignment; ?>">
            <?php 
                if ($button) {
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
            ?>

                <div class="js-stagger">
                    <a href="<?php echo esc_url($button_url); ?>" class="button <?php echo $button_style; ?> <?php echo $button_size; ?> mb-0" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                </div>

            <?php } ?>

            <?php 
                if ($secondary_button) {
                    $secondary_button_url = $secondary_button['url'];
                    $secondary_button_title = $secondary_button['title'];
                    $secondary_button_target = $secondary_button['target'] ? $secondary_button['target'] : '_self';
            ?>
                
                <div class="js-stagger">
                    <a href="<?php echo esc_url($secondary_button_url); ?>" class="button <?php echo $secondary_button_style; ?> <?php echo $secondary_button_size; ?> mb-0" target="<?php echo esc_attr($secondary_button_target); ?>"><?php echo esc_html($secondary_button_title); ?></a>
                </div>

            <?php } ?>
        </div>
    </div>
</section>
