function RestorePassword() {
    var ctx = this,
        $body = $('body'),
        elems = {
            restore: {
                form: '[data-restore-password-form]',
                email: '[data-restore-password-email]',
                close: '[data-restore-password-close]',
                submit: '[data-restore-password-submit]'
            }
        },
        $elems = {
            restore: {
                form: $(elems.restore.form),
                email: $(elems.restore.email),
                close: $(elems.restore.close),
                submit: $(elems.restore.submit)
            }
        },
        validators = {
            restore: {
                email: undefined
            }
        },
        vars = {
            restore: {
                isDataProcessing: false
            }
        };

    //functions
    var restore,
        validate;

    ctx.init = function () {
        // Email
        validators.restore.email = new RegExValidatingInput($elems.restore.email, {
            expression: RegularExpressions.EMAIL,
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

        validate = function () {
            var isValid = true;

            // Validates email
            validators.restore.email.Validate();
            if (!validators.restore.email.IsValid()) {
                isValid = false;
            }

            if (vars.restore.isDataProcessing) {
                return false;
            }

            return isValid;

        };

        restore = function () {
            vars.restore.isDataProcessing = true;
            $.ajax({
                type: 'post',
                url: '/restore-password',
                data: $elems.restore.form.serialize() + '&language' + LANGUAGE,
                success: function (data) {
                    if (data.status == 'success')
                    {
                        $elems.restore.close.click();
                        showPopup(RestoreSuccess);
                    }

                    if (data.status == 'error')
                    {
                        if (data.failed == 'email')
                        {
                            showPopup(EmailNotExists);
                        }
                        
                        if (data.failed == 'server')
                        {
                            showPopup(ServerError);
                        }
                    }

                    vars.restore.isDataProcessing = false;

                },
                error: function (data) {
                    $elems.restore.close.click();
                    
                    showPopup(ServerError);
                    
                    vars.restore.isDataProcessing = false;
                }
            });
        };

    };

    ctx.subscribe = function () {
        $body.on('click', elems.restore.submit, function (e) {
            e.preventDefault();

            if (validate())
            {
                restore();
            }
        });
    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}
var restorePassword = new RestorePassword();