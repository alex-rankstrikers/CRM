var app_root = $('#app_url').val();
$(document).ready(function () {
    $('#password_form').validate({
        onkeyup: false,
        errorClass: 'error',
        validClass: 'valid',
        rules: {
            old_password: {
                required: true,
                remote:
                {
                    type: 'POST',
                    url: app_url + "/admin/change_password/password_check",
                    data: {'company_id': '', '_token': $('input[name=_token]').val()},
                    async: false
                }
            },
            new_password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                equalTo: "#new_password"
            }
        },
        messages: {
            old_password: {
                required: 'Old Password is required.',
                remote: 'Old Password mismatch.'
            },
            new_password: {
                required: "Password cannot be blank.",
                minlength: "Please enter at least 6 characters."
            },
            confirm_password: {
                required: "Confirm password cannot be blank.",
                equalTo: "Password mismatch."
            }
        },
        highlight: function (element) {
            $(element).closest('div').addClass("f_error");
        },
        unhighlight: function (element) {
            $(element).closest('div').removeClass("f_error");
        },
        errorPlacement: function (error, element) {
            $(element).closest('div').append(error);
        }
    });



});

$("#btn_password_tab").click(function () {
    $('#password_form').validate();
    var validated = $('#password_form').valid();
    if (validated == true)
    {
        window.password_form.submit();
    }
});