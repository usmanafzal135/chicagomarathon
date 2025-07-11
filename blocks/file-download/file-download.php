<?php
    /**
     * File Download Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'file-download-' . $block['id'];
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

    // Load values and handle defaults.
    $title = get_field('title');
    $file_link = get_field('file_link');
    $file_custom_filename = get_field('custom_filename');
    $open_window = get_field('opens_new_window');
    $show_button = get_field('show_download_button');
    $remove_bottom_margin = get_field('remove_bottom_margin');

    // Initialize file link variables
    $file_link_url = '';
    $file_link_title = '';

    // Check if file_link is an array or a string
    if (is_array($file_link)) {
        $file_link_url = $file_link['url'];
        $file_link_title = !empty($file_custom_filename) ? $file_custom_filename : $file_link['title'];
    } elseif (is_string($file_link)) {
        $file_link_url = $file_link;
        $file_link_title = !empty($file_custom_filename) ? $file_custom_filename : basename($file_link);
    }
?>

<section id="<?php echo esc_attr($id); ?>" 
    class="js-hidden block-file-download <?php get_template_part('includes/partials/block-modifiers/bottom-margin'); ?> ">
    <div class="container <?php echo esc_attr($class_name); ?>">
        <?php if ($title) { ?>
            <h2 class="js-stagger"><?php echo $title; ?></h2>
        <?php } ?>
        <div class="js-stagger flex gap-1 items-center mb-1">
            <?php if ($file_link_url) { ?>
                <?php if ($show_button) { ?>
                    <strong><?php echo esc_html($file_link_title); ?></strong>
                    <a href="<?php echo esc_url($file_link_url); ?>" class="button hollow mb-0" download <?php if ($open_window) { ?> target="_blank" <?php } ?>>
                        Download
                    </a>
                <?php } else { ?> 
                    <a href="<?php echo esc_url($file_link_url); ?>" class="underline text-primary hover:text-primary-dark font-bold mb-0" download <?php if ($open_window) { ?> target="_blank" <?php } ?>>
                        <?php echo esc_html($file_link_title); ?>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
