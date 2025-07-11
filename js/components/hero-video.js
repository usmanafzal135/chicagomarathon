// eslint-disable-next-line
import { tobii } from '../common/tobii';

const heroVideo = document.querySelector('#hero-video-background');
const heroVideoBtn = document.querySelector('#hero-video-bg-toggle');
const heroVideoText = document.querySelector('#hero-video-bg-toggle-text');
const heroPopUpBtn = document.querySelector('#hero-popup-btn');

const playHeroVideo = () => {

    heroVideo.play();
    heroVideoText.innerText = 'Pause';

};

const pauseHeroVideo = () => {

    heroVideo.pause();
    heroVideoText.innerText = 'Play';

};

if (heroVideo) {

    heroVideo.addEventListener('playing', () => {

        if (heroVideo.readyState === 4) {

            heroVideo.classList.add('js-loaded');

            const heroVideoLoader = document.getElementById('hero-video-loader');
            heroVideoLoader.classList.add('hidden');

            const heroVideoPlayToggle = document.getElementById('hero-video-bg-toggle');
            heroVideoPlayToggle.classList.remove('hidden');
            heroVideoPlayToggle.classList.add('inline-flex');

        }

    });

}

if (heroVideoBtn) {

    heroVideoBtn.addEventListener('click', () => {

        // Pause Button Active
        if (heroVideoText.innerText === 'Pause') {

            pauseHeroVideo();

        } else {

            // Play Button Active
            playHeroVideo();

        }

    });

}

if (heroPopUpBtn && heroVideo) {

    tobii.on('open', pauseHeroVideo);
    tobii.on('close', playHeroVideo);

}
