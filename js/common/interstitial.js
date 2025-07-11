/* eslint-disable-next-line */
const apexdomain = new RegExp(location.host);

document.querySelectorAll('a:not([href^="mailto:"], [href^="/"], [href^="#"])').forEach((link) => {

    const href = link.getAttribute('href');

    if (!href || apexdomain.test(href) || link.classList.contains('standard-continue')) return;

    link.classList.add('boa-modal-open');
    link.setAttribute('data-href', href);

    const srText = document.createElement('span');
    srText.classList.add('sr-only');
    srText.textContent = 'Opens a Dialog';
    link.appendChild(srText);

    link.addEventListener('click', (e) => {

        e.preventDefault();

        /* eslint-disable-next-line */
        Alpine.store('interstitial').show(link, href);

    });

});
