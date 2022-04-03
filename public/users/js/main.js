$(document).ready(function() {
    var html = $('.image-preview');   
    $('.image-preview-block').html(html);

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
        $('#form-cate .sbm-cate').text('Edit');
    });

    $('.table-types .edit-btn').click(function(e) {
        let status = $(this).data('status') == 1;
        $('#form-type').attr('action', $(this).data('edit-url'));
        $('#form-type .type-title').text('Sửa loại');
        $('#form-type #type_name').val($(this).data('type-name'));
        $('#form-type #category_name').val($(this).data('cate-id'));
        $('#form-type .switch-toggle').prop('checked', status);
        $('#form-type .sbm-type').text('Edit');
    });

    $('.img-preview').on('click', function() {
        let src_img = $(this).attr('src');
        $('.modal').addClass('d-flex');
        $('.modal img').attr('src', src_img);
        $('.modal .close-img-modal').removeClass('d-none');
    });

    $(document).on('click', '.modal .close-img-modal', function() {
        $('.modal').removeClass('d-flex');
        $('.modal').addClass('d-none');
    });

    ckeditor('test');
    ckeditor('add_infor');
});

function previewImage(file, image) {
    file.on('change', function() {
        let image_file = this.files[0];
        let url = URL.createObjectURL(image_file);
        image.attr('src', url);
    });
};

function ckeditor(textarea) {
    CKEDITOR.replace(textarea, {
        filebrowserBrowseUrl     : location.origin + '/admin/ckfinder/browser',
        filebrowserImageBrowseUrl: location.origin + '/admin/ckfinder/browser?type=Images&token=123',
        filebrowserFlashBrowseUrl: location.origin + '/admin/ckfinder/browser?type=Images&token=123', 
        filebrowserUploadUrl     : location.origin + '/ckfinder/connector?command=QuickUpload&type=Files', 
        filebrowserImageUploadUrl: location.origin + '/ckfinder/connector?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: location.origin + '/ckfinder/connector?command=QuickUpload&type=Flash',
    });
};