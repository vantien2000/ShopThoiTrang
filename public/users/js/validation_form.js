$(document).ready(function() {
    $("#login_form_users").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            email: {
                required: true,
                email: true,
                minlength: 10
            },
            password: {
                required: true,
                minlength: 6
            },
        },

        messages: {
            email: {
                required: "Vui lòng nhập email!!!",
                minlength: "Email không đủ ký tự cho phép!!!",
                email: "Email không đúng định dạng!!!"
            },
            password: {
                required: "Vui lòng nhập password!!!",
                minlength: "Password không không ít hơn 6 ký tự!!!"
            },
        }
    });

    $("#register_form_users").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            user_name: {
                required: true,
                maxlength: 100
            },
            age : {
                required: true,
                max: 100,
                min: 12
            },
            email: {
                required: true,
                email: true,
                minlength: 10
            },
            password: {
                required: true,
                minlength: 6
            },
            phone_number: {
                required: true,
                validatePhone: true,
                minlength: 10
            },
            address: {
                required: true
            },
            confirm : {
                required: true,
                minlength: 6
            }
        },

        messages: {
            user_name: {
                required: "Vui lòng nhập tên người dùng!!!",
                minlength: "Tên người dùng vượt quá ký tự cho phép!!!",
            },
            email: {
                required: "Vui lòng nhập email!!!",
                minlength: "Email không đủ ký tự cho phép!!!",
                email: "Email không đúng định dạng!!!"
            },
            age : {
                required: "Vui lòng nhập tuổi!!!",
                max: "Tuổi quá lớn!!",
                min: "Tuổi quá nhỏ!!"
            },
            password: {
                required: "Vui lòng nhập password!!!",
                minlength: "Password không không ít hơn 6 ký tự!!!"
            },
            phone_number: {
                required: "Vui lòng nhập số điện thoại!!!",
                validatePhone: "Số điện thoại không hợp lệ!!!",
                minlength: "Số điện thoại không quá 10 chữ số!!!"
            },
            address: {
                required: "Vui lòng nhập địa chỉ !!!"
            },
            confirm: {
                required: "Vui lòng xác nhận lại mật khẩu!!!",
                minlength: "mật khẩu không không ít hơn 6 ký tự!!!"
            },
        }
    });

    $.validator.addMethod("validatePhone", function (value, element) {
        return this.optional(element) || /(84|0[3|5|7|8|9])+([0-9]{8})\b/i.test(value);
    });
})