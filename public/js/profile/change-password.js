function ChangePassword() {
    var ctx = this,
        $body = $('body'),
        elems = {
            changePassword: {
                oldPassword: '[data-change-password-old]',
                newPassword: '[data-change-password-new]',
                repeatNewPassword: '[data-change-password-repeat]',
                submit: '[data-change-password-submit]'
            }
        },
        $elems = {
            changePassword: {
                oldPassword: $(elems.changePassword.oldPassword),
                newPassword: $(elems.changePassword.newPassword),
                repeatNewPassword: $(elems.changePassword.repeatNewPassword),
                submit: $(elems.changePassword.submit)
            }
        },
        vars = {
            changePassword: {
                isDataProcessing: false
            }
        },
        validators = {
            changePassword: {
                oldPassword: undefined,
                newPassword: undefined,
                repeatNewPassword: undefined
            }
        };

    //functions
    var validate,
        changePassword;

    ctx.init = function () {
        
        //validators
        validators.changePassword.oldPassword = new RegExValidatingInput($elems.changePassword.oldPassword, {
            expression: RegularExpressions.PASSWORD,
            ChangeOnValid: function (input) {
                input.removeClass(IncorrectFieldClass);
            },
            ChangeOnInvalid: function (input) {
                input.addClass(IncorrectFieldClass);
            },
            showErrors: true,
            requiredErrorMessage: RequiredFieldText,
            regExErrorMessage: IncorrectFieldText
        });

        validators.changePassword.newPassword = new RegExValidatingInput($elems.changePassword.newPassword, {
            expression: RegularExpressions.PASSWORD,
            ChangeOnValid: function (input) {
                input.removeClass(IncorrectFieldClass);
            },
            ChangeOnInvalid: function (input) {
                input.addClass(IncorrectFieldClass);
            },
            showErrors: true,
            requiredErrorMessage: RequiredFieldText,
            regExErrorMessage: IncorrectFieldText
        });

        validators.changePassword.repeatNewPassword = new RegExValidatingInput($elems.changePassword.repeatNewPassword, {
            expression: RegularExpressions.PASSWORD,
            ChangeOnValid: function (input) {
                input.removeClass(IncorrectFieldClass);
            },
            ChangeOnInvalid: function (input) {
                input.addClass(IncorrectFieldClass);
            },
            showErrors: true,
            requiredErrorMessage: RequiredFieldText,
            regExErrorMessage: IncorrectFieldText
        });

        // validating inputs
        validate = function () {
            var isValid = true;

            // Validates old pass
            validators.changePassword.oldPassword.Validate();
            if (!validators.changePassword.oldPassword.IsValid()) {
                isValid = false;
            }
            //validates new pass
            validators.changePassword.newPassword.Validate();
            if (!validators.changePassword.newPassword.IsValid()) {
                isValid = false;
            }
            //validates repeat new pass
            validators.changePassword.repeatNewPassword.Validate();
            if (!validators.changePassword.repeatNewPassword.IsValid()) {
                isValid = false;
            }

            if ($elems.changePassword.newPassword.val() !== $elems.changePassword.repeatNewPassword.val())
            {
                $elems.changePassword.newPassword.addClass(IncorrectFieldClass);
                $elems.changePassword.repeatNewPassword.addClass(IncorrectFieldClass);
                isValid = false;
            }

            if (vars.changePassword.isDataProcessing) {
                return false;
            }

            return isValid;
        };

        changePassword = function () {
            if (vars.changePassword.isDataProcessing) {
                return false;
            }

            vars.changePassword.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/profile/change-password',
                data: {
                    oldPassword: $elems.changePassword.oldPassword.val(),
                    newPassword: $elems.changePassword.newPassword.val(),
                    repeatNewPassword: $elems.changePassword.repeatNewPassword.val()
                },
                success: function (data) {
                    vars.changePassword.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        if (data.message == 'goodPass')
                        {
                            showPopup(PASSWORD_CHANGED_MESSAGE);

                            location.reload(true);
                        }
                    }
                    if (data.status == 'error')
                    {
                        if (data.message == 'badPass')
                        {
                            showPopup(WRONG_OLD_PASSWORD);
                        }
                    }
                },
                error: function (error) {
                    console.log(error);

                    showPopup(ServerError);

                    vars.changePassword.isDataProcessing = false;

                    hideLoader();
                }
            });

        };
    };

    ctx.subscribe = function () {
        $body.on('click', elems.changePassword.submit, function (e) {
            e.preventDefault();
            if (validate())
            {
                changePassword();
            }
        });
    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}

$(document).ready(function () {
    new ChangePassword();
});