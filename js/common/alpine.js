import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import persist from '@alpinejs/persist';
import focus from '@alpinejs/focus';

Alpine.store('interstitial', {

    open: false,
    href: '',
    returnEl: null,

    show(linkEl, href) {

        this.href = href;
        this.returnEl = linkEl;
        this.open = true;

        Alpine.nextTick(() => {

            const dialog = document.querySelector('#standard-notice [x-ref="dialog"]');
            if (dialog) dialog.focus();

        });

    },

    close() {

        this.open = false;

        if (this.returnEl) {

            this.returnEl.focus();
            this.returnEl = null;

        }

    },

});

function announcementData() {

    return {
        open: Alpine.$persist(true).using(sessionStorage),
    };

}

function headerState() {

    return {
        searchOpen: false,
        navOpen: false,
        init() {

            // Initial check for the menu state
            this.navOpen = this.$refs.mainMenu.classList.contains('show');

            // Setup mutation observer
            this.$nextTick(() => {

                const menu = this.$refs.mainMenu;
                const observer = new MutationObserver(() => {

                    this.navOpen = menu.classList.contains('show');

                });
                observer.observe(menu, { attributes: true, attributeFilter: ['class'] });

                // Cleanup observer when the component is destroyed
                this.$watch('$el', (el) => {

                    if (!el) {

                        observer.disconnect();

                    }

                });

            });

        },
    };

}

window.announcementData = announcementData;
window.headerState = headerState;

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.plugin(persist);
Alpine.plugin(focus);

Alpine.start();
