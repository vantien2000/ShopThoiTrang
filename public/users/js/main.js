$(function(){
    $('.datepicker').datepicker({
       format: 'mm-dd-yyyy'
     });
 });
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
    $('.top-navbar .nav-item').on('click', function (e) {
        $('.top-navbar .nav-item').removeClass('active');
        $(this).addClass('active');
        $('.top .product-wrapper').addClass('d-none');
        if ($(this).hasClass('new_link')) {
            $('.new_product_top').removeClass('d-none');
        }
        if ($(this).hasClass('sale_link')) {
            $('.sale_product_top').removeClass('d-none');
        }
        if ($(this).hasClass('rate_link')) {
            $('.rate_product_top').removeClass('d-none');
        }
    });
    $('.middle-right .menu-category .nav-link').on('click', function (e) {
        $('.middle-right .menu-category .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.middle .middle-left').addClass('d-none');
        $('.middle .middle-right .product-category').addClass('d-none');
        if ($(this).hasClass('female_link')) {
            $('.female_image_first').removeClass('d-none');
            $('.female_category_products').removeClass('d-none');
        }
        if ($(this).hasClass('male_link')) {
            $('.male_image_first').removeClass('d-none');
            $('.male_category_products').removeClass('d-none');
        }
    });
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
    $('.upload-avatar #avatar').on('change', function(e) {
        $('.avatar_image').attr('src', URL.createObjectURL(e.target.files[0]));
    });
    $('#category_filter').on('change', function(e) {
        $('.btn-reset').removeClass('d-none');
    });
    $('.btn-reset').on('click', function(e) {
        $('.btn-reset').addClass('d-none');
        $('.type-filter-element > label').removeClass('active');
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