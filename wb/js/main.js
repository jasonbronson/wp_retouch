(function($) {
    $(document).ready(function() {
        $(".search-btn").on("click", function() {
            $('body').toggleClass("is-visible-search-box");
        });

        $('.to-top').toTop({
            right: 50,
            bottom: 50,
        });

        $('.magnific-popup-image').magnificPopup({
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
        });

        $('.lightbox-gallery').magnificPopup({
            delegate: '.magnific-popup-gallery',
            type: 'image',
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true
            },
            removalDelay: 300,
        });

        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 300,
            preloader: false,
            fixedContentPos: false
        });
    });

    $(window).load(function() {
        // Run code
        myVar = setTimeout(showPage, 1000);
    });

    function showPage() {
        $('.loader').fadeOut(); // will first fade out the loading animation
        $('.loader-utter').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        // $('body').delay(350).css({'overflow':'visible'});
    }

    $('.chart').easyPieChart({
        onStep: function(from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
        }
    });
})(jQuery);
