$(document).ready(function(){
	$('#nav').slicknav();
});

$('.slider_list').owlCarousel({
    loop:true,
	autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
$('.new_car_list').owlCarousel({
    loop:true,
	autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})


