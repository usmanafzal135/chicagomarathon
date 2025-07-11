<?php 
    /**
     * Embed Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'embed-' . $block['id'];
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
        } elseif ($block['className'] == 'is-style-narrow') { 
            $class_name = ' container max-w-screen-md '; 
        } else {
            $class_name = ' container max-w-screen-xl ';
        }
    } else {
        $class_name = ' container max-w-screen-xl ';
    }

    $heading = get_field('heading');
    $embed = get_field('embed');

?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-embed 
    <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <div class="<?php echo $class_name; ?>">
        <?php if ($heading) { ?>
            <h2 class="js-stagger embed-title <?php if ($class_name == " max-w-full ") { ?> container <?php } ?>"><?php echo $heading; ?></h2>
        <?php } ?>
            <div class="js-stagger">
                <?php echo $embed; ?>
            </div>
        </div>
    </div>
</section>
