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

    $('.table-categiories .edit-btn').click(function(e) {
        $('#form-cate').attr('action', $(this).data('edit-url'));
        $('#form-cate .cate-title').text('Sửa danh mục');
        $('#form-cate #category_name').val($(this).data('cate-name'));
        $('#form-cate .sbm-cate').text('Edit');
    });
});

function previewImage(file, image) {
    file.on('change', function() {
        let image_file = this.files[0];
        image.attr('src', URL.createObjectURL(image_file));
    });
}