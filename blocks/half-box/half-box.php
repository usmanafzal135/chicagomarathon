<?php
    /**
     * Half Box Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'half-box-' . $block['id'];
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
    $tagline = get_field('tagline');
    //$image = get_field('image');
    //$image_medium_url = $image['sizes']['halfbox-medium'];

    $image = get_field('image'); // or however you retrieve your image
    $image_medium_url = '';

    if (is_array($image) && isset($image['sizes']['halfbox-medium'])) {
        $image_medium_url = $image['sizes']['halfbox-medium'];
    } 
    $background_video_url = get_field('background_video_url');
    $html_content = get_field('html_content');
    $caption_alignment = get_field('caption_alignment');
    $box_mode = get_field('box_mode');
    $optional_button_link = get_field('optional_button_link');
    $button_link = get_field('button_link');
    $remove_bottom_margin = get_field('remove_bottom_margin');

    // Check if the image is in the WordPress Library
    $image_exists_in_library = false;
    if ($image) {
        $image_exists_in_library = attachment_url_to_postid($image['url']) ? true : false;
    }
?>

<section id="<?php echo esc_attr($id); ?>" 
    class="js-hidden block-halfbox <?php get_template_part('includes/partials/block-modifiers/bottom-margin'); ?> ">

    <div class="flex flex-col <?php if ($caption_alignment) { echo "lg:flex-row-reverse"; } else { echo "lg:flex-row"; } ?> <?php echo esc_attr( $class_name ); ?>">

    <?php if ($background_video_url || $image && $image_exists_in_library) { ?>
        <?php if ($background_video_url) { ?>
            <div class="relative aspect-[3/2] ui-loader js-video-background js-stagger basis-full lg:basis-1/2 mb-1 lg:mb-0">
                <!-- Show image in admin as ACF Preview doens't allow video -->
                <?php if (is_admin()) { ?>
                    <img src="<?php echo esc_url($image_medium_url); ?>" alt="Video Placeholder" class="w-full lozad lg:object-cover lg:h-full">
                <?php } else { ?>
                    <video
                        class="video-background lozad object-cover w-full h-full"
                        autoplay
                        muted
                        loop
                        playsinline
                        data-src="<?php echo $background_video_url; ?>"
                        data-poster="<?php echo $image_medium_url; ?>"
                    >
                    </video>
                
                    <button class="video-bg-toggle small clear white absolute left-1 bottom-1 lg:left-2 lg:bottom-2 flex items-center mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[1.5em] h-[1.5em]">
                            <path d="M15 6.75a.75.75 0 00-.75.75V18a.75.75 0 00.75.75h.75a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75H15zM20.25 6.75a.75.75 0 00-.75.75V18c0 .414.336.75.75.75H21a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75h-.75zM5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256L5.055 7.061z" />
                        </svg>
                        <span class="video-bg-toggle-text ml-0.75">Pause</span><span class="sr-only"> background video</span>
                    </button>

                    <div class="video-loader absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 block">
                        <div class="inline-block h-2 w-2 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] text-white motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                
                <?php } ?>
            </div>
        <?php } elseif ($image && $image_exists_in_library) { 
            $url = $image['url'];
            $alt = $image['alt'];
            $caption = $image['caption'];
            $image_small_url = $image['sizes']['halfbox-small'];
            $image_large_boxed_url = $image['sizes']['halfbox-large-boxed'];
            $image_large_url = $image['sizes']['halfbox-large'];
        ?>
            <figure class="relative ui-loader js-stagger basis-full lg:basis-1/2 mb-1 <?php if ($box_mode) { ?> lg:flex  <?php } else { ?> aspect-[3/2]  <?php } ?>">
                <img 
                    width="960"
                    height="600"
                    sizes="(max-width: 640px) 640px, (max-width: 960px) 960px, 1024px"
                    class="lozad <?php if ($box_mode) { ?> lg:self-center w-full <?php } else { ?> lg:object-cover absolute-center object-cover w-full h-full  <?php } ?>"
                    <?php if (is_admin()) { ?> src="<?php echo $image_medium_url; ?>" <?php } ?>
                    data-src="<?php echo $image_medium_url; ?>"
                    alt="<?php echo $alt; ?>"
                    <?php if ($box_mode) { ?>
                        data-srcset="<?php echo $image_small_url; ?> 640w, <?php echo $image_large_boxed_url; ?> 960w"
                    <?php } else { ?>
                        data-srcset="<?php echo $image_small_url; ?> 640w, <?php echo $image_large_url; ?> 960w"
                    <?php } ?>
                >
            </figure>
        <?php } ?>
        <?php } else { ?>
            <figure class="relative ui-loader js-stagger basis-full lg:basis-1/2 mb-1 <?php if ($box_mode) { ?> lg:flex  <?php } else { ?> aspect-[3/2]  <?php } ?>">
                <img 
                    width="960"
                    height="600"
                    class="lozad <?php if ($box_mode) { ?> lg:self-center w-full <?php } else { ?> lg:object-cover absolute-center object-cover w-full h-full  <?php } ?>"
                    data-src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                    <?php if (is_admin()) { ?>
                        src="<?php bloginfo('template_url'); ?>/images/no-image.png"
                    <?php } else { ?>
                        src="<?php bloginfo('template_url'); ?>/images/px.png"
                    <?php } ?>
                    alt=""
                >
            </figure>
    <?php } ?>
   
        <div class="relative basis-full lg:basis-1/2 lg:flex lg:justify-center lg:flex-col lg:flex-nowrap
            <?php if ($has_class_name && $block['className'] == 'is-style-full') { ?>  p-1 pt-0 <?php } ?>
        ">
            <div class="lg:flex-col lg:flex-nowrap lg:py-3 lg:w-9/12 lg:mx-auto">

                <?php if ($tagline) { ?>
                    <p class="js-stagger tagline mb-half">
                        <?php echo $tagline; ?>
                    </p>
                <?php } ?>

                <?php if ($title) { ?>
                    <h2 class="js-stagger"> 
                        <?php echo $title; ?>
                    </h2>
                <?php } ?>

                <?php if ($html_content) { ?>
                    <div class="js-stagger typography mb-1 max-w-full">
                        <?php echo $html_content; ?>
                    </div>
                <?php } ?>


                <?php if ($button_link || $optional_button_link) { ?>
                    <div class="js-stagger flex flex-wrap gap-[0.5rem]">

                        <?php if ($button_link) {
                            $button_link_url = $button_link['url'];
                            $button_link_title = $button_link['title'];
                            $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
                        ?>
                            <div class="js-stagger inline-block">
                                <a href="<?php echo esc_url($button_link_url); ?>" class="button mb-0" target="<?php echo esc_attr($button_link_target); ?>"><?php echo esc_html($button_link_title); ?></a>
                            </div>
                        <?php } ?>


                        <?php if ($optional_button_link) {
                            $optional_button_link_url = $optional_button_link['url'];
                            $optional_button_link_title = $optional_button_link['title'];
                            $optional_button_link_target = $optional_button_link['target'] ? $optional_button_link['target'] : '_self';
                        ?>
                            <div class="js-stagger inline-block">
                                <a href="<?php echo esc_url($optional_button_link_url); ?>" class="button hollow mb-0" target="<?php echo esc_attr($optional_button_link_target); ?>"><?php echo esc_html($optional_button_link_title); ?></a>
                            </div>
                        <?php } ?>

                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</section>
