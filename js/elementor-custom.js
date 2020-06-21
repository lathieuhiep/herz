(function ($) {

    /* Start Carousel slider */
    let ElementCarouselSlider   =   function( $scope, $ ) {

        let element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );

    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/herz-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/herz-post-carousel.default', ElementCarouselSlider );

        /* Element product carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/herz-product-carousel.default', ElementCarouselSlider );

        /* Element testimonial carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/herz-testimonial-carousel.default', ElementCarouselSlider );

        /* Element partners-carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/herz-partners-carousel.default', ElementCarouselSlider );

    } );

})( jQuery );