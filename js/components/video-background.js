const backgroundVideos = document.querySelectorAll('.video-background');
const backgroundVideoBtns = document.querySelectorAll('.video-bg-toggle');
const backgroundVideoTexts = document.querySelectorAll('.video-bg-toggle-text');
const backgroundVideoLoaders = document.querySelectorAll('.video-loader');

backgroundVideos.forEach((backgroundVideo, index) => {

    const backgroundVideoBtn = backgroundVideoBtns[index];
    const backgroundVideoText = backgroundVideoTexts[index];
    const backgroundVideoLoader = backgroundVideoLoaders[index];

    // Check if backgroundVideo element is present in the DOM
    if (backgroundVideo) {

        const playBackgroundVideo = () => {

            backgroundVideo.play();
            backgroundVideoText.innerText = 'Pause';

        };

        const pauseBackgroundVideo = () => {

            backgroundVideo.pause();
            backgroundVideoText.innerText = 'Play';

        };

        backgroundVideo.addEventListener('playing', () => {

            if (backgroundVideo.readyState === 4) {

                backgroundVideo.classList.add('js-loaded');
                backgroundVideoLoader.classList.add('hidden');
                backgroundVideoBtn.classList.remove('hidden');
                backgroundVideoBtn.classList.add('inline-flex');

            }

        });

        backgroundVideoBtn.addEventListener('click', () => {

            if (backgroundVideo.paused) {

                playBackgroundVideo();

            } else {

                pauseBackgroundVideo();

            }

        });

    } else {

        // eslint-disable-next-line
        console.log("Element with class '.video-background' not found in the DOM.");

    }

});
