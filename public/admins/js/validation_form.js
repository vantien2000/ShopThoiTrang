$(document).ready(function() {
    $("#login-form-admin").validate({
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

    $("#profile-form-admin").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            user_name: {
                required: true,
                maxlength: 100
            },
            email: {
                required: true,
                valdiateEmail: true,
                minlength: 10
            },
            password: {
                required: true,
                minlength: 6
            },
            phone_number: {
                required: true,
                validatePhone: true
            },
            address: {
                required: true
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
                validateEmail: "Email không đúng định dạng!!!"
            },
            password: {
                required: "Vui lòng nhập password!!!",
                minlength: "Password không không ít hơn 6 ký tự!!!"
            },
            phone_number: {
                required: "Vui lòng nhập số điện thoại!!!",
                validatePhone: "Số điện thoại không hợp lệ!!!"
            },
            address: {
                required: "Vui lòng nhập địa chỉ !!!"
            }
        }
    });

    $.validator.addMethod('validateEmail', function (value, element) {
        return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i.test(value);
    });

    $.validator.addMethod("validatePhone", function (value, element) {
        return this.optional(element) || /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value);
    });
})