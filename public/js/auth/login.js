function Login() {
    var ctx = this,
        $body = $('body'),
        elems = {
            login: {
                form: '[data-login-form]',
                email: '[data-login-email]',
                password: '[data-login-password]',
                remember: '[data-login-remember]',
                close: '[data-login-close]',
                submit: '[data-login-submit]'
            }
        },
        $elems = {
            login: {
                form: $(elems.login.form),
                email: $(elems.login.email),
                password: $(elems.login.password),
                remember: $(elems.login.remember),
                close: $(elems.login.close),
                submit: $(elems.login.submit)
            }
        },
        // Additional variables
        vars = {
            login: {
                isDataProcessing: false
            }
        },
        // jclient.validation.js instances
        validators = {
            login: {
                email: undefined,
                password: undefined
            }
        };


    //functions
    var login,
        validate;

    ctx.init = function (e) {


        // Login Email
        validators.login.email = new RegExValidatingInput($elems.login.email, {
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

        // Login Password
        validators.login.password = new RegExValidatingInput($elems.login.password, {
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


        validate = function () {
            var isValid = true;

            // Validates email
            validators.login.email.Validate();
            if (!validators.login.email.IsValid()) {
                isValid = false;
            }

            // Validate password
            validators.login.password.Validate();
            if (isValid && !validators.login.password.IsValid()) {
                isValid = false;
            }

            if (vars.login.isDataProcessing) {
                return false;
            }

            return isValid;

        };

        login = function () {

            vars.login.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/login',
                data: $elems.login.form.serialize(),
                success: function (data) {

                    if (data.status == 'success')
                    {
                        window.location.reload(true);
                    }

                    if (data.status == 'error')
                    {

                        if (data.failed == 'email')
                        {
                            showPopup(EmailNotExists);
                            $elems.login.email.val('').addClass(IncorrectFieldClass).attr("placeholder", IncorrectFieldText);
                            $elems.login.password.val('');
                        }

                        if (data.failed == 'active')
                        {
                            showPopup(EmailConfirmNotValid);
                        }

                        if (data.failed == 'password')
                        {
                            $elems.login.password.val('').addClass(IncorrectFieldClass).attr("placeholder", IncorrectFieldText);
                        }
                    }

                    vars.login.isDataProcessing = false;

                    hideLoader();
                },
                error: function (data) {
                    $elems.login.close.click();

                    showPopup(ServerError);

                    vars.login.isDataProcessing = false;

                    hideLoader();
                }
            });
        };

    };

    ctx.subscribe = function (e) {

        $body.on('click', elems.login.submit, function (e) {
            e.preventDefault();

            if (validate())
            {
                login();
            }
        });

    };

    ctx.launch = function (e) {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}
var login = new Login();