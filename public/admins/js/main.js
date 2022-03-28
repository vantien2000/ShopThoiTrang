$(document).ready(function() {
    $(".icon-eyes").on('click', function() {
        $(this).toggleClass('fa-eye fa-eye-slash');
        if ($(".inputPass").attr("type") === "password") {
            $(".inputPass").attr("type", "type");
        } else {
            $(".inputPass").attr("type", "password");
        }
    })
    //preview image_profile
    let file_avatar_profile = $('.file-upload-avatar');
    let image_preview_profile = $('.img-profile');
    previewImage(file_avatar_profile, image_preview_profile);

    $(".cate-add-btn").on('click', function() {
        $('.cate-form-add').removeClass('d-none');
        $('.cate-add-btn').addClass('d-none');
    });

    $(".type-add-btn").on('click', function() {
        $('.type-form-add').removeClass('d-none');
        $('.type-add-btn').addClass('d-none');
    });

    $('.cate-form-edit .close-cate-form').on('click', function () {
        $('.cate-form-edit').addClass('d-none');
        $('.cate-add-btn').removeClass('d-none');
    });

    $('.cate-form-add .close-cate-form').on('click', function () {
        $('.cate-form-add').addClass('d-none');
        $('.cate-add-btn').removeClass('d-none');
    });

    $('.type-form-edit .close-type-form').on('click', function () {
        $('.type-form-edit').addClass('d-none');
        $('.type-add-btn').removeClass('d-none');
    });

    $('.type-form-add .close-type-form').on('click', function () {
        $('.type-form-add').addClass('d-none');
        $('.type-add-btn').removeClass('d-none');
    });


    $('.table-data-cate .edit-btn').on('click', function() {
        $('.cate-form-edit').removeClass('d-none');
        $('#form-cate-edit').attr('action', $(this).data("edit-url"));
        $('.cate-add-btn').removeClass('d-none');
    });

    $('.table-data-type .edit-btn').on('click', function() {
        $('.type-form-edit').removeClass('d-none');
        $('#form-type-edit').attr('action', $(this).data("edit-url"));
        $('.type-add-btn').removeClass('d-none');
    })
});

function previewImage(file, image) {
    file.on('change', function() {
        let image_file = this.files[0];
        image.attr('src', URL.createObjectURL(image_file));
    });
}