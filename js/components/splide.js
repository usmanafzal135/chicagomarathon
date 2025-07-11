async function init() {

    // eslint-disable-next-line
    const splideConstructor = await import('@splidejs/splide');
    const videoConstructor = await import('@splidejs/splide-extension-video');

    const Splide = splideConstructor.Splide;
    const Video = videoConstructor.Video;

    // Import Video CSS
    await import('@splidejs/splide-extension-video/dist/css/splide-extension-video.min.css');

    const contentSliders = document.querySelectorAll('.splide.js-content-slider');
    const singleSliders = document.querySelectorAll('.splide.js-single-slider');
    const thumbSliders = document.querySelectorAll('.splide.js-single-thumb-slider');
    const miniThumbSliders = document.querySelectorAll('.splide.js-thumb-slider');

    const initContentSlider = (el) => {

        new Splide(el, {
            perPage: 3,
            gap: 25,
            breakpoints: {
                640: {
                    perPage: 1,
                    gap: 15,
                    arrows: false,
                },
                1400: {
                    perPage: 2,
                    gap: 20,
                },
            },
            lazyLoad: 'nearby',
        }).mount();

    };

    const initSingleSlider = (el) => {

        new Splide(el, {
            perPage: 1,
            lazyLoad: 'nearby',
            pagination: true,
            arrows: false,
            video: {
                loop: false,
                mute: false,
                autoplay: false,
                playerOptions: {
                    vimeo: {
                        byline: false,
                        portrait: false,
                        title: false,
                    },
                },
            },
            mediaQuery: 'min',
            breakpoints: {
                1200: {
                    arrows: true,
                },
            },
        }).mount({ Video });

    };

    const initThumbSlider = (el, el2) => {

        const main = new Splide(el, {
            type: 'fade',
            heightRatio: 0.5,
            pagination: false,
            arrows: false,
            lazyLoad: 'nearby',
            mediaQuery: 'min',
            breakpoints: {
                1200: {
                    arrows: true,
                },
            },
        });

        const thumbnails = new Splide(el2, {
            rewind: true,
            fixedWidth: 100,
            fixedHeight: 100,
            isNavigation: true,
            gap: 10,
            focus: 'center',
            pagination: false,
            arrows: false,
            cover: true,
            dragMinThreshold: {
                mouse: 4,
                touch: 10,
            },
            breakpoints: {
                1200: {
                    fixedWidth: 70,
                    fixedHeight: 70,
                },
            },
        });

        main.sync(thumbnails);
        main.mount();
        thumbnails.mount();

    };

    const initSliders = (sliders, initFunction, secondarySliders = miniThumbSliders) => {

        for (let i = 0; i < sliders.length; i++) {

            initFunction(sliders[i], secondarySliders[i]);

        }

    };

    if (contentSliders && contentSliders.length > 0) {

        initSliders(contentSliders, initContentSlider);

    }

    if (singleSliders && singleSliders.length > 0) {

        initSliders(singleSliders, initSingleSlider);

    }

    if (thumbSliders && thumbSliders.length > 0) {

        initSliders(thumbSliders, initThumbSlider);

    }

}

// Initialize the init function when in the gutenberg editor
if (window.acf) {

    window.acf.addAction('render_block_preview/type=content-carousel-slider', init);

}

init();
