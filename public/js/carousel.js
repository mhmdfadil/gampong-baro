$(document).ready(function() {
    const $heroCarousel = $('#heroCarousel');
    const carousel = new bootstrap.Carousel($heroCarousel[0], {
        interval: 5000,
        pause: false,
        wrap: true
    });
    
    // Add animation to carousel items
    $heroCarousel.on('slide.bs.carousel', function(e) {
        const $nextItem = $(e.relatedTarget);
        const $caption = $nextItem.find('.carousel-caption');
        const $heading = $caption.find('h1');
        const $paragraph = $caption.find('p');
        const $button = $caption.find('.btn');
        
        // Reset animations
        $heading.css('animation', 'none');
        $paragraph.css('animation', 'none');
        $button.css('animation', 'none');
        
        // Trigger reflow
        void $caption[0].offsetWidth;
        
        // Apply animations with jQuery
        $heading.css('animation', 'fadeInUp 1s ease');
        $paragraph.css('animation', 'fadeInUp 1s ease 0.3s forwards');
        $button.css('animation', 'fadeInUp 1s ease 0.6s forwards');
    });
});