<div
    x-show="$store.interstitial.open"
    x-trap.noscroll="$store.interstitial.open"
    x-cloak
    id="standard-notice"
    class="js-interstitial alpine-js fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 px-1"
>
    <div 
        x-data 
        x-ref="dialog"
        role="dialog"
        aria-modal="true"
        aria-labelledby="interstitial-title"
        tabindex="-1"
        @keydown.escape.window="$store.interstitial.close()"
        class="bg-white max-w-[600px] w-full p-2 rounded shadow-lg"
    >
        <div class="boa-modal-title">
            <img 
                src="<?php bloginfo('template_url'); ?>/images/logo.svg" 
                alt="<?php echo esc_html(get_bloginfo('name')); ?>" 
                class="w-4 h-4 mb-1"
                width="64"
                height="64"
            />
        </div>
        <div class="boa-modal-content">
            <span class="sr-only">Beginning of dialog message</span>
            <h1 id="interstitial-title" class="h4 text-primary">
                You are now leaving the Bank of America Chicago Marathon website
            </h1>
            <p class="mb-2">
                By clicking <strong>Continue</strong>, you will be taken to a third party website. Bank of America’s privacy policy and level of security do not apply to their site as they may have their own privacy policy and security practices. You can click the <strong>Cancel</strong> button to return to the previous page, or you can use the back button on your browser after you leave.
            </p>
            <a 
                :href="$store.interstitial.href" 
                class="standard-continue button mb-0"
            >
                Continue
            </a>
            <button 
                type="button" 
                class="boa-modal-close button secondary mb-0" 
                @click="$store.interstitial.close()"
            >
                Cancel
            </button>
            <span class="sr-only">End of dialog message</span>
        </div>
    </div>
</div>
