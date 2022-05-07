$(document).ready(function() {
    $("#login_form_users").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            email: {
                required: true,
                validate: true,
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
                maxlength: 32
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

    $("#order_custom").validate({
        rules: {
            email: {
                required: true,
                validateEmail: true,
                minlength: 10
            },
            phone_number: {
                required: true,
                validatePhone: true
            },
            provinces: {
                required: true
            },
            districts: {
                required: true
            },
            wards: {
                required: true
            },
            home_number: {
                required: true
            }
        },

        messages: {
            email: {
                required: "Vui lòng nhập email!!!",
                minlength: "Email không đủ ký tự cho phép!!!",
                validateEmail: "Email không đúng định dạng!!!"
            },
            phone_number: {
                required: "Vui lòng nhập số điện thoại!!!",
                validatePhone: "Số điện thoại không hợp lệ!!!"
            },
            provinces: {
                required: "Tỉnh thành không được để trống!!!"
            },
            districts: {
                required: "Quận huyện không được để trống!!!"
            },
            wards: {
                required: "Xã phường không được để trống!!!"
            },
            home_number: {
                required: "Vui lòng nhập số nhà/thôn xóm !!!"
            }
        }
    });

    $("#profile_user_form").validate({
        rules: {
            username: {
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
            confirm: {
                required: true,
                minlength: 6
            },
            phone_number: {
                required: true,
                validatePhone: true
            },
            address: {
                required: true
            },
            "g-recaptcha-response": {
                required: true
            }
        },

        messages: {
            username: {
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
            confirm: {
                required: "Vui lòng nhập password!!!",
                minlength: "Password không không ít hơn 6 ký tự!!!"
            },
            phone_number: {
                required: "Vui lòng nhập số điện thoại!!!",
                validatePhone: "Số điện thoại không hợp lệ!!!"
            },
            address: {
                required: "Vui lòng nhập địa chỉ !!!"
            },
            "g-recaptcha-response": {
                required: "Vui lòng chọn Captcha!!!"
            }
        }
    });

    $.validator.addMethod('validateEmail', function (value, element) {
        return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i.test(value);
    });

    $.validator.addMethod("validatePhone", function (value, element) {
        return this.optional(element) || /(84|0[3|5|7|8|9])+([0-9]{8})\b/i.test(value);
    });
})