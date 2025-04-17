(function($) {
    $(window).on('load', function() {
        var $slider = $('.slider-container');
        var totalSlides = $slider.find('.slider-item').length;
        
        // Function to get slides per page based on screen width
        function getSlidesPerPage() {
            var width = $(window).width();
            if (width >= 992) return 8; // Desktop: 4×2
            if (width >= 768) return 4; // Tablet: 2×2
            return 2; // Mobile: 1×2
        }

        // Clone slides based on current screen size
        function updateSlides() {
            var slidesPerPage = getSlidesPerPage();
            $slider.find('.slider-item.cloned').remove(); // Remove any previously cloned slides
            
            if (totalSlides < slidesPerPage) {
                var slidesToClone = $slider.find('.slider-item').not('.cloned').slice(0, slidesPerPage - totalSlides);
                var $clones = slidesToClone.clone().addClass('cloned');
                $slider.append($clones);
            }
        }

        // Initialize slider
        $slider.slick({
            dots: true,
            infinite: true,
            speed: 500,
            rows: 2,
            slidesPerRow: 4,
            adaptiveHeight: false,
            autoplay: true,
            autoplaySpeed: 3000,
            wrap: true,
            fill: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        rows: 2,
                        slidesPerRow: 3,
                        wrap: true,
                        fill: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        rows: 2,
                        slidesPerRow: 2,
                        wrap: true,
                        fill: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        rows: 2,
                        slidesPerRow: 1,
                        wrap: true,
                        fill: true
                    }
                }
            ]
        });

        // Initial update
        updateSlides();

        // Update on window resize
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                updateSlides();
                $slider.slick('refresh');
            }, 250);
        });
    });
})(jQuery); 