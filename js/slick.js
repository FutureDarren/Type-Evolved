$(document).ready(function() {
    $('.slider')
    .on('afterChange init', function(event, slick) {
        slick.$slides.removeClass('prevdiv').removeClass('nextdiv');
        for (var i = 0; i < slick.$slides.length; i++) {
            var $slide = $(slick.$slides[i]);
            if ($slide.hasClass('slick-current')) {
                $slide.prev().addClass('prevdiv');
                $slide.next().addClass('nextdiv');
                $slide.find('.slide-title').addClass('slide-title-animate');
                $slide.find('.slide-description').addClass('slide-description-animate');
            }
        }
    })
    .on('beforeChange', function(event, slick) {
        slick.$slides.removeClass('prevdiv').removeClass('nextdiv');
        for (var i = 0; i < slick.$slides.length; i++) {
            var $slide = $(slick.$slides[i]);
            if ($slide.hasClass('slick-current')) {
                $slide.find('.slide-title').removeClass('slide-title-animate');
                $slide.find('.slide-description').removeClass('slide-description-animate');
            }
        }
    })
    .slick({
        dots: true,
        autoplay: false,
        infinite: true,
        arrows: false,
        customPaging: function(slider, i) {
            let slide = slider.$slides[i],
                title = $(slide).data('title');
            return '<a class="pager__item" id="'+i+'">'+title+'</label>';
        }
    })
});