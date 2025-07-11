<?php /**
     * Related Articles Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.

    $id = 'related-articles-' . $block['id'];
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

    $title = get_field('title');
    $articles_list = get_field('articles');
    $count = get_field('count');
    $categories = get_field('categories');
    $tags = get_field('tags');
    $button_link = get_field('button_link');
    $layout_type = get_field('layout_type');

    if ($button_link) {
        $button_link_url = $button_link['url'];
        $button_link_title = $button_link['title'];
        $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
    }

    if ($articles_list) {

        $articles = $articles_list;

    } else {

        $args = array(
            'post_status' => 'publish',
            'posts_per_page' => $count,
            'category__in' => $categories,
            'tag__in' => $tags,

        );
    
        $query = new WP_Query();
        $articles = $query->query($args);
    }

    $articles_count = count($articles);

?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden block-related-articles <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <div class="container <?php echo $class_name; ?>">

        <?php if ($title) { ?>
            <h2 class="js-stagger h3 mb-1.5">
                <?php echo $title; ?>
            </h2>
        <?php } ?>

        <?php if ($articles) { ?>

            <div class="grid mb-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 <?php echo $class_name; ?> 
                <?php echo $layout_type; ?> 
                
                <?php if ($class_name == 'is-style-narrow') { 
                    echo 'lg:grid-cols-2 xl:grid-cols-2';
                } elseif ($layout_type == 'is-feature' || $layout_type == 'is-gallery') { 
                    echo 'text-center xl:gap-2';
                } else {
                    echo 'xl:grid-cols-4 xl:gap-1.5';
                } ?>
            ">

                <?php foreach ($articles as $post) { ?>

                    <?php
                        setup_postdata($post);
                        $link = get_the_permalink($post);
                    ?>
                 

                    <article class="js-stagger group relative <?php if ($layout_type != 'is-gallery') { echo 'mb-1'; } ?>">
                        <figure class="overflow-hidden relative aspect-[3/2] ui-loader 
                        <?php if ($layout_type === 'is-gallery') { echo 'bg-black relative with-overlay before:bg-opacity-30 group-hover:before:bg-opacity-50'; } else { echo 'mb-1'; } ?>">
                            <img
                                width="500"
                                height="300"
                                alt=""
                                class="lozad absolute-center object-cover w-full h-full 
                                    <?php if ($layout_type == 'is-gallery') { echo ' opacity-60 duration-300 group-hover:scale-[1.02] group-hover:ease-in-out aspect-[4/3]'; } else { echo ' aspect-video'; } ?> 
                                    <?php if ($layout_type != 'is-gallery' && $link) { echo ' group-hover:scale-[1.02] group-hover:ease-in-out duration-300'; } ?>
                                "

                                <?php if (get_field('thumbnail_image', $post)) {
                                    $image = get_field('thumbnail_image', $post)['sizes']['pathways-default'];
                                ?>
                                    src="<?php echo $image; ?>"
                                    data-src="<?php echo $image; ?>"
                                <?php } elseif (get_the_post_thumbnail($post)) {
                                    $image = get_the_post_thumbnail_url($post, 'pathways-default');
                                ?>
                                    src="<?php echo $image; ?>"
                                    data-src="<?php echo $image; ?>"
                                <?php } else { ?>
                                    src="<?php echo bloginfo('template_url'); ?>/images/no-image.png"
                                    data-src="<?php echo bloginfo('template_url'); ?>/images/no-image.png"
                                <?php } ?>

                            />
                        </figure>
                        
                        <?php if ($layout_type == 'is-gallery') { ?>
                            <div class="absolute-center text-center text-white">
                        <?php } ?>
                        
                        <h3 class="
                            <?php if ($layout_type == 'is-feature') { 
                                echo 'h5 group-hover:text-primary  mb-half';
                            } elseif ($layout_type == 'is-gallery') { 
                                echo 'h4 text-white group-hover:text-white mb-0';
                            } else {
                                echo 'text-base group-hover:text-primary';
                            } ?>
                        ">
                            <?php echo get_the_title($post); ?>
                        </h3>

                        <?php if (get_the_category($post) && $layout_type != 'is-gallery') {
                            $categories = get_the_category($post);
                            $last = end($categories);
                        ?>

                            <p class="relative uppercase text-sm text-gray-500 tracking-wide mb-0">
                                <?php foreach ($categories as $category) { ?>

                                    <a href="<?php echo get_term_link($category); ?>" class="inline-block hover:text-primary hover:underline relative z-20 pt-qtr pb-1.5">
                                        <strong class="sr-only">Show more in category of </strong><strong><?php echo acf_get_term_title($category); ?></strong>
                                    </a><?php if ($category !== $last) { echo ', '; } ?>
    
                                <?php } ?>
                            </p>

                        <?php } ?>
                        <?php if ($layout_type !== 'is-gallery') { ?>
                            <?php if (!empty(strip_tags(get_the_excerpt($post)))) { ?>
                                <?php echo get_the_excerpt($post); ?>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($layout_type !== 'is-gallery' && $link) { ?>
                            <strong class="link-button group-hover:text-primary-dark">
                                Read More
                            </strong>
                        <?php } ?>

                        <?php if ($layout_type == 'is-gallery') { ?>
                            </div>
                        <?php } ?>

                        <?php if ($link) { ?>
                            <a href="<?php echo $link ?>" class="absolute-cover">
                                <span class="sr-only">
                                    <?php echo 'Read More About' . get_the_title($post); ?>
                                </span>
                            </a>
                        <?php } ?>
                        
                    </article>

                <?php } ?>

            </div>

            <?php wp_reset_postdata(); ?>
        <?php } ?>

        <?php if ($button_link) { ?>

            <p class="js-stagger <?php if ($articles_count != 1) { echo ' text-center ';} ?>">
                <a href="<?php echo esc_url($button_link_url); ?>" class="button hollow" target="<?php echo esc_attr($button_link_target); ?>">
                    <?php echo esc_html($button_link_title); ?>
                </a>
            </p>

        <?php } ?>
    </div>
</section>