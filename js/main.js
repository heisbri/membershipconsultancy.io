(function ($) {
    "use strict";
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });
    
    
    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.navbar').addClass('nav-sticky');
        } else {
            $('.navbar').removeClass('nav-sticky');
        }
    });
    
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

    
    // Main carousel
    $(".carousel .owl-carousel").owlCarousel({
        autoplay: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 1,
        smartSpeed: 300,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ]
    });
    
    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });
    
    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonials carousel
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        animateIn: 'slideInDown',
        animateOut: 'slideOutDown',
        items: 1,
        smartSpeed: 450,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
    
    // Blogs carousel
    $(".blog-carousel").owlCarousel({
        autoplay: true,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            }
        }
    });

    
    const filterButtons = document.querySelectorAll('#portfolio-filters li');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    filterButtons.forEach(button => {button.addEventListener('click', () => { 
        filterButtons.forEach(btn => btn.classList.remove('filter-active'));
        button.classList.add('filter-active');
        const filter = button.getAttribute('data-filter');
        portfolioItems.forEach(item => {
            if (filter === 'all' || item.classList.contains(filter)) {item.classList.add('show');}else{item.classList.remove('show');}
        });
    });});

    portfolioItems.forEach(item => item.classList.add('show'));

    /*document.addEventListener('DOMContentLoaded', function() {
        const contactModal = document.getElementById('contactmodal');
        contactModal.addEventListener('show.bs.modal' , function(event) {
            const button = event.relatedTarget;
            const serviceId = button.getAttribute('data-service-id');
            const serviceName = button.getAttribute('data-service-name');

            const serviceIdInput = contactModal.querySelector('#service_id');
            const subjectInput = contactModal.querySelector('#subject');

            subjectInput.value = 'Support for ' + serviceName;
            serviceIdInput.value = serviceId;

            const modal = new bootrap.Modal(document.getElementById('contactModal'));
            modal.show;
        });
    });
   /* document.addEventListener('DOMContentLoaded', function() {
        const contactButtons = document.querySelectorAll('.contactModalBtn');
        const subjectInput = document.getElementById('modalSubject');
        const serviceIdInput = document.getElementById('modalServiceId');

        contactButtons.forEach(button => {
            button.addEventListener('click', function() {
                const serviceId = this.getAttribute('data-service-id');
                const serviceName =this.getAttribute('data-service-name');
                subjectInput.value = 'Support for ${serviceName}';
                serviceIdInput.value = serviceId;
            });
        });
    });*/
    /*document.addEventListener('DOMContentLoaded', function() {
        const modalTriggerButtons = document.querySelectorAll('.open-contact-modal');
        modalTriggerButtons.forEach(button => {
            button.addEventListener('click', () => {
                const serviceId = this.getAttribute('data-service-id');
                const serviceName = this.getAttribute('data-service-name');   

                const serviceIdInput = contactModal.querySelector('#service_id');
                const subjectInput = contactModal.querySelector('#subject');

                const modal = new bootrap.Modal(document.getElementById('contactModal'));
                modal.show;
            });
        });
    });*/
    document.addEventListener("DOMContentLoaded", function () {
        const contactModal = document.getElementById("contactModal");
        contactModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const serviceId = button.getAttribute("data-service-id");
            const serviceName = button.getAttribute("data-service-name");

            const serviceIdInput = contactModal.querySelector("#service_id");
            const subjectInput = contactModal.querySelector("#subject");

            serviceIdInput.value = serviceId;
            subjectInput.value = 'Support for ${serviceName}', serviceName;
        });
    });
    
    
})(jQuery);


