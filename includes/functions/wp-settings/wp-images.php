<?php
/**
 * Define image sizes used within the site...
 * add_image_size( $name, $width, $height, $crop );
 * add_image_size( 'featured-image', '700', '225', true );
 *
 * Default images sizes for blocks.
 */

add_image_size( 'hero-small', '900');
add_image_size( 'hero-medium', '1200');
add_image_size( 'hero-large', '1920');

add_image_size( 'gallery-thumb', '600', '375', true );
add_image_size( 'gallery-large', '1200', '900', false );

add_image_size( 'halfbox-blur', '6', '0', false );
add_image_size( 'halfbox-small', '640', '0', false );
add_image_size( 'halfbox-medium', '1024', '0', false );
add_image_size( 'halfbox-large', '960', '600', true );
add_image_size( 'halfbox-large-boxed', '960', '600', false );

add_image_size( 'highlight-small', '640', '400', true );
add_image_size( 'highlight-medium', '1024', '500', true );
add_image_size( 'highlight-large', '1920', '850', true );

add_image_size( 'pathways-default', '500', '300', true );

add_image_size( 'image-carousel-multi', '800', '500', true );
add_image_size( 'image-carousel-single', '1900', '1100', true );
add_image_size( 'image-carousel-thumbnail', '200', '200', true );

add_image_size( 'medium-thumbnail', '250', '250', true ); /** Testimonials Block Thumbnail Size */
add_image_size( 'small-thumbnail', '200', '200', false ); /** Logo Block Thumbnail Size */

add_image_size( 'footer-logos', '250', '80', false ); /** Footer Logo Block Thumbnail Size */

/**
 * Compress jpegs further, to accomodate google page speed/performance.
 */

function compress_images_tzo() {
    return 70;
}
add_filter( 'jpeg_quality', 'compress_images_tzo', 10, 2 );