/* eslint-disable no-use-before-define */
/* eslint-disable no-param-reassign */
// eslint-disable-next-line
import lozad from 'lozad';

const lozadObserver = lozad('.lozad', {
    load(el) {

        if (el.nodeName === 'VIDEO') {

            // Load the video source
            el.src = el.dataset.src;

            // Load the poster
            if (el.dataset.poster) {

                el.poster = el.dataset.poster;

            }

            // Load all sources inside the video element (if any)
            const sources = el.querySelectorAll('source');
            sources.forEach((source) => {

                if (source.dataset.src) {

                    source.src = source.dataset.src;

                }

            });

            // Now load the video
            el.load();

            el.onloadeddata = () => {

                el.classList.add('js-loaded');
                observeIsLoaded(el, () => {

                    const uiLoader = el.closest('.ui-loader');
                    if (uiLoader) {

                        uiLoader.classList.add('ui-loaded');

                    }

                });

            };

        } else {

            el.src = el.dataset.src;
            el.onload = () => {

                el.classList.add('js-loaded');
                observeIsLoaded(el, () => {

                    const uiLoader = el.closest('.ui-loader');
                    if (uiLoader) {

                        uiLoader.classList.add('ui-loaded');

                    }

                });

            };

        }

    },
});
lozadObserver.observe();

/**
 * A helper function to observe when an element
 * has been loaded by lozad and run a callback function
 *
 * @param {HTMLElement} target The element to observe
 * @param {Function} callback The callback function
 * @returns {void}
 */
function observeIsLoaded(target, callback) {

    // If the element is already loaded, run the callback
    if (callback && target.classList.contains('js-loaded')) {

        callback();
        return;

    }

    const observerCallback = (mutationList, observer) => {

        mutationList.forEach((mutation) => {

            if (mutation.attributeName === 'class' && mutation.target.classList.contains('js-loaded')) {

                if (callback) {

                    callback();

                }

                observer.disconnect();

            }

        });

    };

    const observer = new MutationObserver(observerCallback);

    observer.observe(target, {
        attributes: true,
    });

}

export default observeIsLoaded;
