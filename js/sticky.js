$(document).ready(function() {
    var stickyNavTop = $('#sticky-nav').offset().top;
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            $('#sticky-nav').addClass('sticky');
            $('#sticky-nav').removeClass('non-sticky');
            $('#sticky-nav a').css('color', 'rgb(25,25,25)');
        } else {
            $('#sticky-nav').addClass('non-sticky');
            $('#sticky-nav').removeClass('sticky');
            $('#sticky-nav a').css('color', 'rgb(235,235,235)');
        }
    };
    stickyNav();
        $(window).scroll(function() {
        stickyNav();
    });

        $('#sticky-nav a').on('click', function(){

        });
});