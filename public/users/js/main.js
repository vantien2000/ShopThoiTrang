var length = $('.product-category .product').length;
var current = 0;
$(document).on('click', '.btn-next-middle' , '.btn-prev-middle', function() {
    if (current >= length - 3) {
        current = length - 3;
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
    slides.eq(index+2).removeClass('d-none');
}

function slideShowPrev(index) {
    slides = $('.product-category .product');
    slides.eq(index).removeClass('d-none');
    slides.eq(index+2).addClass('d-none');
}

$(document).ready(function() {
    $('.sizes').on('click', '.size-element input', function(e) {
        $('.size-element label').removeClass('active');
        if ($('.size-element input').is(':checked')) {
            val = $(this).val();
            $('.size-element .size-'+val).addClass('active');
        }
    });
    $('.type-filter-element > input').on('click', function(e) {
        $('.type-filter-element label').removeClass('active');
        if ($('.type-filter-element > input').is(':checked')) {
            let val = $(this).val();
            $('.type-' + val + '-filter').addClass('active');
        }
    });
    $('.btn-addition-infor').on('click', function() {
        $('.additional-information').toggleClass('d-block d-none');
        $(this).toggleClass('fa-minus fa-plus');
    });
});

$(function() {  
    $("#rangeslider").slider({
        range: true,
        min: 100000,
        max: 1000000,
        values: [ 75, 300 ],
        slide: function( event, ui ) {
            $("label.min_price").text(formatNumber(ui.values[0]));
            $("#min_price").attr("value" ,ui.values[0]);
            $("label.max_price").text(formatNumber(ui.values[1]));
            $("#max_price").attr("value", ui.values[1]);
        }
    });
    $("label.min_price").text(formatNumber($("#rangeslider").slider("values",0)));
    $("#min_price").attr("value", $("#rangeslider").slider("values",0));
    $("label.max_price").text(formatNumber($("#rangeslider").slider("values",1)));
    $("#max_price").attr("value", $("#rangeslider").slider("values",1));
    function formatNumber(number) {
        return number.toLocaleString('it-IT') + 'vnđ';
    }
})