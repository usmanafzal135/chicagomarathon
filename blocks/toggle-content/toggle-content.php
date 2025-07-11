<?php
    /**
     * HTML Content Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'toggle-content-' . $block['id'];
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

    // Load values
    $heading = get_field('heading');
    $content = get_field('content');
    $remove_bottom_margin = get_field('remove_bottom_margin');
    $display_as_link = get_field('display_as_link');
    $custom_button_link_text_show = get_field('custom_button_link_text_show');
    $custom_button_link_text_hide = get_field('custom_button_link_text_hide');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden alpine-js block-toggle-content clearfix <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <script>
        function toggleData() {
            return {
                showContent: false,
                showText: '<?php echo $custom_button_link_text_show; ?>' || 'Show Content',
                hideText: '<?php echo $custom_button_link_text_hide; ?>' || 'Hide Content',
            };
        }
    </script>
    <div class="container <?php echo esc_attr( $class_name ); ?>" x-data="toggleData">
        <?php if ($heading) { ?>
            <h2 class="js-stagger h3 mb-1.5">
                <?php echo $heading; ?>
            </h2>
        <?php } ?>
        <div class="js-stagger mb-1">
            <a 
                @click.prevent="showContent = !showContent" 
                class="mb-0 <?php if (!$display_as_link) { echo 'button hollow'; } else { echo 'link-button'; } ?>"
                x-bind:aria-expanded="showContent"
                x-bind:aria-label="showContent ? hideText : showText"
                aria-controls="collapse-<?php echo esc_attr( $block['id'] ); ?>"
                tabindex="0"
                role="button"
            >
                <span x-text="showContent ? hideText : showText"></span>
            </a>
        </div>
        
        <div id="collapse-<?php echo esc_attr( $block['id'] ); ?>" x-collapse x-show="showContent">
            <div class="typography max-w-full bg-gray-100 p-1 rounded">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</section>
