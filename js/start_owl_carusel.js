$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            775:{
                items:2
            },
            1100:{
                items:3
            },
            1400:{
                items:4
            }
        }
    })
});


