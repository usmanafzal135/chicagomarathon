import Tobii from '@midzer/tobii/dist/tobii.min.js';

// eslint-disable-next-line
export const tobii = new Tobii({
    zoom: false,
});

// Expose Tobii globally
window.tobii = tobii;
