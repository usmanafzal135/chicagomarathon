// import shared css
// import('./scss/shared.scss');

// we need splide on the front-end, and in the wp editor
if (document.querySelector('.js-splide') || document.querySelector('.wp-admin')) {

    import('@splidejs/splide/dist/css/splide-core.min.css');
    import('./scss/components/_carousel.scss');
    import('./scss/components/blocks/_block-content-slider.scss');
    import('./js/components/splide.js');

}

if (document.querySelector('.js-main-nav')) {
    import('./js/modules/navigation.js');
}

if (document.querySelector('.js-lightbox')) {

    import('@midzer/tobii/dist/tobii.min.css');
    import('./js/common/tobii.js');
    document.body.classList.add('tobii-library');

}

if (document.querySelector('.js-jumble')) {

    import('./js/common/text-animation.js');

}

if (document.querySelector('.js-interstitial')) {

    import('./js/common/interstitial.js');

}

if (document.querySelector('.lozad')) {

    import('./js/common/lozad.js');
    document.body.classList.add('lozad-library');

}

// we need alpine on the front-end, and in the wp editor
if (document.querySelector('.alpine-js') || document.querySelector('.wp-admin')) {

    import('./js/common/alpine.js');
    document.body.classList.add('alpine-library');

}

if (document.querySelector('.js-scroll-animate')) {

    import('./js/common/scroll-animation.js');
    document.body.classList.add('scroll-animation-library');

}

if (document.querySelector('.js-video-hero')) {

    import('./js/components/hero-video.js');

}

if (document.querySelector('.js-video-background')) {

    import('./js/components/video-background.js');

}
