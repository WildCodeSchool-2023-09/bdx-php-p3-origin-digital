document.addEventListener('DOMContentLoaded', function () {
    var currentSlide = 0;
    var videos = document.querySelectorAll('.video-slider .video');
    var totalSlides = videos.length;

    function updateSlidePosition()
    {
        for (var i = 0; i < videos.length; i++) {
            videos[i].style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
        }
    }

    document.querySelector('.left-btn').addEventListener('click', function () {
        currentSlide = Math.max(currentSlide - 1, 0);
        updateSlidePosition();
    });

    document.querySelector('.right-btn').addEventListener('click', function () {
        currentSlide = Math.min(currentSlide + 1, totalSlides - 1);
        updateSlidePosition();
    });
});