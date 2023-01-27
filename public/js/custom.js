$(document).ready(function () {

    $('#dismiss, .overlay').on('click', function () {
        // hide sidebar
        $('#sidebar').removeClass('active');
        // hide overlay
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        // open sidebar
        $('#sidebar').addClass('active');
        // fade in the overlay
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    // Dropdown menu - Css (Dropdown effect CSS)
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
    // Dropdown menu - Css (Dropdown effect CSS)

});

$(document).ready(function () {

    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }




});

// $(document).ready(function () {
//     $('#sidebarCollapse').on('click', function () {
//         $('#sidebar').toggleClass('active');
//         $(this).toggleClass('active');
//     });
// });

$(document).ready(function () {

    $('.slider-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots: true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
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
    });

    $('.latest-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        dots: false,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $('.offer-coursel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots: false,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
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
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Scripts Like and Unlike
    $('#Scriptlikebtn').click(function(){

        if($(this).is(":checked")){
            // console.log("Checkbox is checked.");
            var userid = $('#jhgadfuykiasgdfsfgsfiiyueiwr').text();
            var sprod_id = $('#lkijfgusakulfgfgsbdsgbagfas').val();
            var likecount = parseInt($('.like-count').text());
            var tt = (likecount + 1);
            $('.like-count').text(tt);
            // console.log(tt);

            $.ajax({
                type: "POST",
                url: "/script/likes",
                data: {
                    'user_id': userid,
                    'sprod_id': sprod_id,
                },
                success: function (response) {
                    // Nothing to show now
                }
            });
        }
        else if($(this).is(":not(:checked)")){
            // console.log("Checkbox is unchecked.");
            var userid = $('#jhgadfuykiasgdfsfgsfiiyueiwr').text();
            var sprod_id = $('#lkijfgusakulfgfgsbdsgbagfas').val();
            var likecount = parseInt($('.like-count').text());
            var tt = (likecount - 1);
            $('.like-count').text(tt);
            $.ajax({
                type: "POST",
                url: "/script/dislike",
                data: {
                    'user_id': userid,
                    'sprod_id': sprod_id,
                },
                success: function (response) {
                    // Nothing to show now
                }
            });
        }
    });
    // Scripts Like and Unlike

    // Template Like and Unlike
    $('#likebtn').click(function(){

        if($(this).is(":checked")){
            // console.log("Checkbox is checked.");
            var userid = $('#jhgadfuykiasgdfsfgsfiiyueiwr').text();
            var tprod_id = $('#lkijfgusakulfgfgsbdsgbagfas').val();
            var likecount = parseInt($('.like-count').text());
            var tt = (likecount + 1);
            $('.like-count').text(tt);
            // console.log(tt);

            $.ajax({
                type: "POST",
                url: "/template/likes",
                data: {
                    'user_id': userid,
                    'tprod_id': tprod_id,
                },
                success: function (response) {
                    // Nothing to show now
                }
            });
        }
        else if($(this).is(":not(:checked)")){
            // console.log("Checkbox is unchecked.");
            var userid = $('#jhgadfuykiasgdfsfgsfiiyueiwr').text();
            var tprod_id = $('#lkijfgusakulfgfgsbdsgbagfas').val();
            var likecount = parseInt($('.like-count').text());
            var tt = (likecount - 1);
            $('.like-count').text(tt);
            $.ajax({
                type: "POST",
                url: "/template/dislike",
                data: {
                    'user_id': userid,
                    'tprod_id': tprod_id,
                },
                success: function (response) {
                    // Nothing to show now
                }
            });
        }
    });
    // Template Like and Unlike



});
