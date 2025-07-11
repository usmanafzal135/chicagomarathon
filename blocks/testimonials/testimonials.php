<?php
    /**
     * Testimonial Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.

    $id = 'testimonials-' . $block['id'];
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

    $testimonial = get_field('testimonials');

    if ($testimonial) {
        // Get a random testimonial from the selected posts
        
        $rand_testimonial = $testimonial[array_rand($testimonial)];
        $title = get_field('title');
        $quote = get_field('quote', $rand_testimonial->ID);
        $author = get_field('author', $rand_testimonial->ID);
        $video_url = get_field('video_url', $rand_testimonial->ID);
        $embed_url = get_video_embed_url($video_url);


        $button_link = get_field('button_link', $rand_testimonial->ID);

        if ($button_link) {
            $button_link_url = $button_link['url'];
            $button_link_title = $button_link['title'];
            $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
        }

        $image = get_field('image', $rand_testimonial->ID);
        
        if ($image) {
            $image_url = $image['sizes']['medium-thumbnail'];
            $alt = $image['alt'];
        } else {
            $image_url = '';
            $alt = '';
        }
?>

    <section id="<?php echo esc_attr($id); ?>" class="js-hidden block-testimonial mb-2 xl:mb-3 bg-gray-100 py-1.5 xl:py-2">
        <div class="container <?php echo $class_name; ?>">
            <?php if ($title) { ?>
                <h2 class="js-stagger h3 mb-1.5 text-center">
                    <?php echo $title; ?>
                </h2>
            <?php } ?>
            <div class="js-stagger mb-1">
                <?php if ($image) { ?>
                    <figure class="relative ui-loader mx-auto aspect-square h-[80px] w-[80px] lg:h-[120px] lg:w-[120px] xl:h-[180px] xl:w-[180px] rounded-full mb-1">
                        <img
                            width="200"
                            height="200"
                            class="lozad absolute-center object-cover"
                            src="<?php bloginfo('template_url'); ?>/images/no-image-square.png"
                            data-src="<?php echo $image_url ?>"
                            alt="<?php echo $alt ?>"
                        />
                    </figure>
                <?php } ?>

                <div class="typography max-w-full text-center">
                    <blockquote class="font-serif !bg-transparent !border-none">
                        <p class="mt-0 mb-0 lg:text-lg xl:text-xl">
                            <?php echo $quote; ?>
                        </p>
                    </blockquote>

                    <figcaption class="mb-1 block">
                        - <?php echo $author; ?>
                    </figcaption>

                    <?php if ($embed_url) { ?>
                        <a href="<?php echo $embed_url; ?>" class="link-button no-underline lightbox js-lightbox" data-type="iframe" data-group="single"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-1.5 h-1.5 inline-block ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                                  </svg> Play Video</a>
                    <?php } ?>
                </div>

            </div>

            <?php if ($button_link) { ?>
                <hr class="js-stagger my-2 mx-auto block">
                <p class="js-stagger  text-center">
                    <a href="<?php echo esc_url($button_link_url); ?>" class="button hollow" target="<?php echo esc_attr($button_link_target); ?>"><?php echo esc_html($button_link_title); ?></a>
                </p>
            <?php } ?>

        </div>
    </section>

<?php } ?>
