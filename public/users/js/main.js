var length = $('.product-category .product').length;
var current = 0;
$(document).on('click', '.btn-next-middle' , '.btn-prev-middle', function() {
    if (current >= length - 4) {
        current = length - 4;
    }
    slideShowNext(current++);
});

$(document).on('click', '.btn-prev-middle' , '.btn-next-middle' , function() {
    current = current - 1;
    if (current <= 0) {
        current = 0;
    }
    slideShowPrev(current);
});

function slideShowNext(index) {
    slides = $('.product-category .product');
    slides.eq(index).addClass('d-none');
    slides.eq(index+3).removeClass('d-none');
}

function slideShowPrev(index) {
    slides = $('.product-category .product');
    slides.eq(index).removeClass('d-none');
    slides.eq(index+3).addClass('d-none');
}

$(document).ready(function() {
    $('.sizes').on('click', '.size-element input', function(e) {
        $('.size-element label').removeClass('active');
        if ($('.size-element input').is(':checked')) {
            val = $(this).val();
            $('.size-element .size-'+val).addClass('active');
        }
    });
});