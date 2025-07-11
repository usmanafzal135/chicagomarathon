<?php
    /**
     * HTML Content Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'html-content-' . $block['id'];
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
    $title = get_field('title');
    $html_content = get_field('html_content');
    $link = get_field('link');
    $remove_bottom_margin = get_field('remove_bottom_margin');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-html-content clearfix <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <div class="container <?php echo esc_attr( $class_name ); ?>">
        <?php if ($title) { ?>
            <h2 class="js-stagger">
                <?php echo $title; ?>
            </h2>
        <?php } ?>

        <div class="js-stagger typography mb-1 max-w-full">
            <?php echo $html_content; ?>
        </div>

        <?php 
            if ($link) {
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="js-stagger mb-1">
                <a href="<?php echo esc_url($link_url); ?>" class="button" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php } ?>
    </div>
</section>
