<?php 
    /**
     * Image Gallery Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.

    $id = 'image-gallery-' . $block['id'];
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

    $post_gallery_object = get_field('select_gallery'); 
    $show_titles = get_field('show_image_titles');
    $hide_gallery_title = get_field('hide_gallery_title');

?>

<?php if( $post_gallery_object ) { $post = $post_gallery_object; setup_postdata( $post ); ?>

    <section id="<?php echo esc_attr($id); ?>" class="js-hidden block-image-gallery
        <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>
    ">
        <div class="container max-w-screen-xl">
            <?php if (!$hide_gallery_title) { ?>
                <h2 class="js-stagger h3 mb-1.5"><?php echo get_the_title($post); ?></h2>
            <?php } ?>

            <div class="js-stagger typography mb-2 max-w-full">
                <?php echo get_field('content'); ?>
            </div>
        </div>
        <div class="container <?php echo $class_name; ?>">

            <?php if (get_field('gallery', $post)) { $images = get_field('gallery', $post); ?>
                <div class="grid mb-2 gap-1 xl:gap-1.5  
                     md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 <?php if ($show_titles) { echo 'gap-y-3'; } ?>">
                    <?php foreach ($images as $image) { ?>
                        <figure class="js-stagger relative aspect-[3/2]">
                                <div class="relative ui-loader block w-full h-full">
                                    <img 
                                        width="600" height="375"
                                        <?php if ($image['sizes']['gallery-thumb']) { ?>
                                            src="<?php echo $image['sizes']['gallery-thumb']; ?>" 
                                            data-src="<?php echo $image['sizes']['gallery-thumb']; ?>" 
                                        <?php } else { ?>
                                            src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                                            data-src="<?php bloginfo('template_url'); ?>/images/no-image.png" 
                                        <?php } ?>
                                        class="absolute-center object-cover w-full h-full lozad hover:scale-[1.02] hover:ease-in-out duration-30" 
                                        alt="<?php echo $image['alt']; ?>" 
                                    />
                                </div>
                                <figcaption class="text-sm mt-half truncate <?php if (!$show_titles) { echo 'sr-only'; } ?>">
                                    <?php echo $image['title']; ?>
                                </figcaption>

                                <a 
                                    data-group="gallery" 
                                    class="lightbox js-lightbox absolute-cover"
                                    href="<?php echo $image['sizes']['gallery-large']; ?>" 
                                    <?php if ($show_titles) { ?>
                                        title="<?php echo $image['title']; ?>"
                                    <?php } ?>
                                >
                                </a>
                        </figure>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
                $link = get_field('button_link', $post);
                if ($link) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <p class="js-stagger text-center mt-1">
                    <a href="<?php echo esc_url($link_url); ?>" class="button hollow" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </p>
            <?php } ?>
        
        </div>
    </section>

    <?php wp_reset_postdata();?>
<?php } ?>