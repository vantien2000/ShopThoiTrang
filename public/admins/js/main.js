$(document).ready(function() {
    $(".icon-eyes").on('click', function() {
        $(this).toggleClass('fa-eye fa-eye-slash');
        if ($(".inputPass").attr("type") === "password") {
            $(".inputPass").attr("type", "type");
        } else {
            $(".inputPass").attr("type", "password");
        }
    })
});

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
});

$.validator.addMethod("validateEmail", function (value, element) {
    return this.optional(element) || /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value);
});