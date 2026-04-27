$(document).ready(function(){
    var nav = $('#main-nav');
    var topBar = $('.top-bar');

    if (nav.length) {
        var navTop = topBar.outerHeight();

        $(window).scroll(function () {
            if ($(this).scrollTop() > navTop) {
                nav.addClass("sticky-nav");
            } else {
                nav.removeClass("sticky-nav");
            }
        });
    }

});
window.onscroll = function() {
    let nav = document.getElementById("main-nav");
    if (window.scrollY > 100) {
        nav.classList.add("sticky-nav");
    } else {
        nav.classList.remove("sticky-nav");
    }
};
$('.hero-slider').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    nav: false,
    dots: true,
    smartSpeed: 1000,
    animateOut: 'fadeOut', 
    animateIn: 'fadeIn',
    mouseDrag: true,
    touchDrag: true
});

$(document).ready(function(){
    var owl = $(".testimonial-slider-3");

    owl.owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"],
        responsive: {
            0: { items: 1 },
            1024: { items: 2 } 
        },
        
        onInitialized: highlightSecond,
        onTranslated: highlightSecond
    });

    function highlightSecond(event) {
        $('.testimonial-slider-3 .owl-item').removeClass('active-highlight');
        $('.testimonial-slider-3 .owl-item.active').eq(1).addClass('active-highlight');
    }
});

$(document).ready(function(){
    $(".brand-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        responsive: {
            0: {
                items: 2 
            },
            576: {
                items: 3
            },
            768: {
                items: 4
            },
            1024: {
                items: 5
            }
        }
    });
});


$(document).ready(function(){
  $(".event-carousel").owlCarousel({
    loop: true,
    margin: 30,
    nav: false, 
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"],
    responsive:{
        0:{
            items: 1
        },
        768:{
            items: 2
        },
        1000:{
            items: 3
        }
    }
  });
});

window.onscroll = function() {
    updateScrollProgress();
};

function updateScrollProgress() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    const progressBar = document.querySelector(".scroll-progress-bar");
    if (progressBar) {
        progressBar.style.height = scrolled + "%";
    }
    const floatText = document.querySelector(".float-text");
    if (winScroll > 200) {
        floatText.style.opacity = "1";
        floatText.style.visibility = "visible";
    } else {
        floatText.style.opacity = "0";
        floatText.style.visibility = "hidden";
    }
}

document.querySelector('.float-text a').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

