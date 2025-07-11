/* eslint-disable no-param-reassign */
/* eslint-disable max-len */
/* eslint-disable no-use-before-define */
// Function to add animation class on scroll
function addClassOnScroll(targetSelector, animateClass, threshold) {

    const observer = new IntersectionObserver((entries) => {

        entries.forEach((entry) => {

            if (entry.isIntersecting) {

                entry.target.classList.add(animateClass);
                addStaggeredClass(entry.target);

            }

        });

    }, {
        threshold: threshold || 0.1, // Threshold of the element when scrolling to trigger the animation
    });

    const targetElements = document.querySelectorAll(targetSelector);
    targetElements.forEach((el) => observer.observe(el));

}

// Function to add "js-staggered" class to elements with "js-stagger" class inside target element.
// Copy this function to your project if you need to add staggered or non-staggered animation to elements.
function addStaggeredClass(targetElement) {

    const staggeredElements = targetElement.querySelectorAll('.js-stagger');
    staggeredElements.forEach((staggeredEl, index) => {

        staggeredEl.classList.add('js-staggered');
        staggeredEl.style.transitionDelay = `${0.1 + index * 0.15}s`; // Start at half second second and adjust the delay as needed.

    });

}

// Call the main function
addClassOnScroll('.js-hidden', 'js-animate');
