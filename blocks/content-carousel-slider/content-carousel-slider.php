<?php
    /**
     * Content Carousel/Slider Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'content-carousel-slider-' . $block['id'];
    if(!empty($block['anchor'])) {
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
    $display_as_slider = get_field('display_as_slider');
    $thumbnail_nav = get_field('thumbnail_nav');
    $title = get_field('title');
    $button_link = get_field('button_link');
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden js-splide <?php if ($thumbnail_nav && $display_as_slider) { echo 'relative js-block-thumb-slider';} elseif ($display_as_slider) { echo 'relative js-block-single-slider';} else {echo 'js-block-content-slider';} ?> <?php get_template_part('includes/partials/block-modifiers/bottom-margin'); ?> ">
    <div class="container <?php echo esc_attr($class_name); ?>">

        <?php if ($title) { ?>
            <h2 class="js-stagger mb-1">
                <?php echo $title; ?>
            </h2>
        <?php } ?>

        <?php if( have_rows('carousel_items') ) { ?>
            <div class="js-stagger splide <?php if ($thumbnail_nav && $display_as_slider) { echo 'js-single-thumb-slider';} elseif ($display_as_slider) { echo 'mb-0 js-single-slider';} else {echo 'js-content-slider';} ?>">
                <div class="splide__track">
                    <ul class="splide__list">
                        
                        <?php while ( have_rows('carousel_items') ) { the_row(); ?>
                            <?php
                            $link = get_sub_field('item_link');
                            $vimeo_id = get_sub_field('item_vimeo_id');

                            if ($link) {
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            }
                            ?>
                            <li class="splide__slide !h-full" <?php if ($display_as_slider && $vimeo_id) { echo 'data-splide-vimeo="https://vimeo.com/' . $vimeo_id . '"';} ?>>
                                <?php 
                                    $additional_class = ($display_as_slider == '1' && trim($class_name) === 'max-w-full') ? 'xl:aspect-video' : '';
                                ?>
                                <figure class="carousel-figure w-full relative aspect-[3/2] ui-loader <?php echo $additional_class; ?>">
                                    <?php if (get_sub_field('item_image')) {
                                        $image = get_sub_field('item_image');
                                        $url = $image['url'];
                                        $title = $image['title'];
                                        $alt = $image['alt'];
                                        $image_multi_url = $image['sizes']['image-carousel-multi'];
                                        $image_single_url = $image['sizes']['image-carousel-single'];
                                        $image_thumbnail_url = $image['sizes']['image-carousel-thumbnail'];
                                    ?>
                                        <?php if ($display_as_slider) { ?>
                                            <?php if ($link) { ?>
                                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                            <?php } ?>
                                            
                                            <img 
                                                loading="lazy"
                                                width="1900"
                                                height="1100"
                                                class="absolute-center object-cover w-full h-full"
                                                src="<?php echo $image_single_url; ?>"
                                                data-splide-lazy="<?php echo $image_single_url; ?>"
                                                alt="<?php $alt; ?>"  
                                            />
                                            
                                            <?php if ($link) { ?>
                                                <span class="sr-only"><?php echo esc_html($link_title); ?></span></a>
                                            <?php } ?>

                                        <?php } else { ?>

                                            <img 
                                                loading="lazy"
                                                width="800"
                                                height="500"
                                                class="max-w-full absolute-center object-cover w-full h-full"
                                                src="<?php echo $image_multi_url; ?>"
                                                data-splide-lazy="<?php echo $image_multi_url; ?>" 
                                                alt="<?php echo $alt; ?>" 
                                            />

                                        <?php } ?>

                                    <?php } else { ?>
                                        <img 
                                            loading="lazy"
                                            class="<?php if ($display_as_slider) { echo ' ';} else {echo 'max-w-full';} ?> absolute-center object-cover w-full h-full"
                                            src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                                            data-splide-lazy="<?php bloginfo('template_url'); ?>/images/no-image.png" alt="" />
                                    <?php } ?>
                                </figure>
                                
                                <div class="w-full py-1">
                                    <div class="lg:align-bottom lg:align-text-bottom">
                                        <?php if ($display_as_slider) { ?>
                                            <?php if ($link) { ?>
                                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                            <?php } ?>
                                                <h3 class="h6 mb-0">
                                                    <?php echo get_sub_field('item_title') ?>
                                                </h3>
                                            <?php if ($link) { ?>
                                                </a>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <h3 class="h5 mb-0.75">
                                                <?php echo get_sub_field('item_title') ?>
                                            </h3>
                                        <?php } ?>
                                        
                                       
                                            <p class="mt-qtr mb-0">
                                                <?php echo get_sub_field('item_description') ?>
                                            </p>
                                     
                                        
                                        <?php if (!$display_as_slider && $link) { ?>
                                            <a href="<?php echo esc_url($link_url); ?>" class="absolute-cover" target="<?php echo esc_attr($link_target); ?>">
                                                <span class="sr-only"><?php echo esc_html($link_title); ?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>

                        <?php } ?>
                    </ul>
                </div>

            </div>
        <?php } ?>

        <?php if ($thumbnail_nav && $display_as_slider) { ?>
            <?php if( have_rows('carousel_items') ) { ?>
                <div class="js-stagger js-splide js-thumb-slider splide mb-2 p-[10px] border-y-[1px] border-gray-300">
			        <div class="splide__track">
				        <ul class="splide__list">
                            <?php while ( have_rows('carousel_items') ) { the_row(); ?>
                                <li class="splide__slide">
                                    <?php if (get_sub_field('item_image')) { ?>
                                        <?php
                                            $image = get_sub_field('item_image');
                                            $url = $image['url'];
                                            $alt = $image['alt'];
                                            $image_thumbnail_url = $image['sizes']['image-carousel-thumbnail'];
                                        ?>
                                        <img 
                                            width="100" 
                                            height="100"
                                            data-splide-lazy="<?php echo $image_thumbnail_url ?>" 
                                            src="<?php echo $image_thumbnail_url ?>" 
                                            alt="<?php echo $alt ?>"
                                        />
                                    <?php } else { ?>
                                        <img 
                                            width="100" 
                                            height="100"
                                            data-splide-lazy="<?php bloginfo('template_url'); ?>/images/no-image.png" 
                                            src="<?php bloginfo('template_url'); ?>/images/no-image.png" 
                                            alt=""
                                        />
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <?php if ($button_link) {
            $button_link_url = $button_link['url'];
            $button_link_title = $button_link['title'];
            $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
        ?>
            <p class="js-stagger text-center">
                <a href="<?php echo esc_url($button_link_url); ?>" class="button hollow" target="<?php echo esc_attr($button_link_target); ?>"><?php echo esc_html($button_link_title); ?></a>
            </p>
        <?php } ?>

    </div>
</section>

