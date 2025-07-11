/* eslint-disable global-require */
const themeConfig = require('./_tailwind.core.config');

module.exports = {
    content: [
        './*.{html,js,php}', // Wordpress Includes
        './blocks/**/*.{html,php}',
        './includes/**/*.{html,js,php}', // Wordpress Includes
        './templates/**/*.{html,js,php}', // Wordpress Templates
        '!./node_modules/**/*', // Exclude Node Modules
        '!./includes/partials/critical.php',
        '!./includes/partials/critical-temp.php',
    ],
    safelist: themeConfig.safelist, // Import safelist from _tailwind.core.config.js
    theme: themeConfig.theme, // Import theme from _tailwind.core.config.js
    plugins: themeConfig.plugins, // Import plugins from _tailwind.core.config.js
};
