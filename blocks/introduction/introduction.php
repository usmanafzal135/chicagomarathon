<?php
    /**
     * Introduction Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'introduction-' . $block['id'];
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
        $class_name = ' container max-w-screen-md  ';
    }

    // Load values.
    $title = get_field('title');
    $tagline = get_field('tagline');
    $html_content = get_field('html_content');
    $link = get_field('link');
    $optionallink = get_field('optional_link');
    $remove_bottom_margin = get_field('remove_bottom_margin');
    $align_center = get_field('align_center');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-introduction clearfix <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <div class="container <?php echo esc_attr( $class_name ); ?>    <?php if ($align_center) { ?> text-center <?php } ?> ">
        <?php if ($title) { ?>
            <h2 class="h3 js-stagger">
                <?php echo $title; ?>
            </h2>
        <?php } ?>

        <?php if ($tagline) { ?>
            <p class="tagline mb-1.5 js-stagger">
                <?php echo $tagline; ?>
            </p>
        <?php } ?>

        <div class="js-stagger typography mb-1.5 max-w-full">
            <?php echo $html_content; ?>
        </div>

        <div class="js-stagger mb-1">
        <?php 
            if ($optionallink) {
                $link_url = $optionallink['url'];
                $link_title = $optionallink['title'];
                $link_target = $optionallink['target'] ? $optionallink['target'] : '_self';
            ?>
                <a href="<?php echo esc_url($link_url); ?>" class="button hollow" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php } ?>
        <?php 
            if ($link) {
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a href="<?php echo esc_url($link_url); ?>" class="button" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php } ?>
        </div>
    </div>
</section>
