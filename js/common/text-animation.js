/* eslint-disable no-param-reassign */
/* eslint-disable no-shadow */
/* eslint-disable max-len */

// Function to handle the count animation for each element
const countUp = (element, delay) => {

    const startValue = 0;
    const endValue = parseInt(element.dataset.text, 10); // Get the target number from the data attribute
    const duration = 2000; // Animation duration in milliseconds
    const startTime = Date.now() + delay; // Add delay to the start time

    // Function to map time progression to the value
    const map = (n, x1, y1, x2, y2) => Math.min(Math.max(((n - x1) * (y2 - x2)) / (y1 - x1) + x2, x2), y2);

    let frame;

    (function animate() {

        frame = requestAnimationFrame(animate);

        const elapsedTime = Date.now() - startTime;
        if (elapsedTime < 0) return; // Wait until the delay time passes

        const progress = map(elapsedTime, 0, duration, startValue, endValue);

        // Update the element's innerText with the current number (rounded to avoid decimals)
        element.innerText = Math.floor(progress);

        // Stop animation when the value reaches the end value
        if (progress >= endValue) {

            element.innerText = endValue; // Ensure it ends exactly at the target value
            cancelAnimationFrame(frame);

        }

    }());

};

// Create the IntersectionObserver to observe .js-jumble elements
const observer = new IntersectionObserver((entries, observer) => {

    entries.forEach((entry, index) => {

        if (entry.isIntersecting) {

            // Add a staggered delay of 200ms between each element
            const staggerDelay = index * 100;

            // Start the count-up animation with a delay
            setTimeout(() => countUp(entry.target, staggerDelay), staggerDelay);

            // Stop observing the element after the animation starts
            observer.unobserve(entry.target);

        }

    });

}, { threshold: 0.5 }); // Adjust the threshold as needed

// Observe all .js-jumble elements
document.querySelectorAll('.js-jumble').forEach((el) => {

    observer.observe(el);

});
