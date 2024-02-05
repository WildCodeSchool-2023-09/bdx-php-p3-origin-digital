import './styles/app.scss';

document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.getElementById('menu-icon');
    const links = document.getElementById('links');

    menuIcon.addEventListener('click', function () {
        links.style.display = links.style.display === 'flex' ? 'none' : 'flex';
    });
});

// start the Stimulus application
import './bootstrap';

// Slider JS
import './src/slider';

//Play Video JS
import './src/playVideo';

//Carousel
import './src/carousel-auto-slide'


