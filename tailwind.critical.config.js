/* eslint-disable global-require */
const themeConfig = require('./_tailwind.core.config');

module.exports = {
    content: [
        './searchform.php',
        './includes/partials/header.php',
        './includes/partials/hero.php',
        './includes/partials/hero-overlay.php',
        './includes/partials/hero-title.php',
        './includes/partials/footer.php',
        './includes/partials/navigation.php',
        './includes/partials/utility-links.php',
        './includes/partials/announcement-banner.php',
    ],
    safelist: themeConfig.safelist, // Import safelist from _tailwind.core.config.js
    theme: themeConfig.theme, // Import theme from _tailwind.core.config.js
    plugins: themeConfig.plugins, // Import plugins from _tailwind.core.config.js
};
