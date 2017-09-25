function Register()
{
    var ctx = this,
        $body = $('body'),
        elems = {
            register: {
                form: '[data-register-form]',
                email: '[data-register-email]',
                name: '[data-register-name]',
                password: '[data-register-password]',
                passwordConfirmation: '[data-register-password-confirmation]',
                close: '[data-register-close]',
                submit: '[data-register-submit]'
            }
        },
        $elems = {
            register: {
                form: $(elems.register.form),
                email: $(elems.register.email),
                name: $(elems.register.name),
                password: $(elems.register.password),
                passwordConfirmation: $(elems.register.passwordConfirmation),
                close: $(elems.register.close),
                submit: $(elems.register.submit)
            }
        },
        // jclient.validation.js instances
        validators = {
            register: {
                email: undefined,
                name: undefined,
                password: undefined,
                passwordConfirmation: undefined
            }
        },
        // Additional variables
        vars = {
            register: {
                isDataProcessing: false
            }
        };

    //functions
    var register,
        validate;



    ctx.init = function () {

        //REGISTER VALIDATORS BEGIN
        // Register Email
        validators.register.email = new RegExValidatingInput($elems.register.email, {
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

        // Register Full name
        validators.register.name = new RegExValidatingInput($elems.register.name, {
            expression: RegularExpressions.FULL_NAME,
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

        // Register Password
        validators.register.password = new RegExValidatingInput($elems.register.password, {
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

        // Register Password Confirm
        validators.register.passwordConfirmation = new RegExValidatingInput($elems.register.passwordConfirmation, {
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
            validators.register.email.Validate();
            if (!validators.register.email.IsValid()) {
                isValid = false;
            }

            // Validates Name
            validators.register.name.Validate();
            if (isValid && !validators.register.name.IsValid()) {
                isValid = false;
            }

            // Validates password
            validators.register.password.Validate();
            if (isValid && !validators.register.password.IsValid()) {
                isValid = false;
            }

            // Validates password confirm
            validators.register.passwordConfirmation.Validate();
            if (isValid && !validators.register.passwordConfirmation.IsValid()) {
                isValid = false;
            }

            if ($elems.register.password.val() !== $elems.register.passwordConfirmation.val()) {
                $elems.register.password.addClass(IncorrectFieldClass);
                $elems.register.passwordConfirmation.addClass(IncorrectFieldClass);
                isValid = false;
            }

            if (vars.register.isDataProcessing)
            {
                return false;
            }

            return isValid;
        };

        register = function () {

            vars.register.isDataProcessing = true;
            
            showLoader();
            
            $.ajax({
                type: 'post',
                url: '/register',
                data: $elems.register.form.serialize() + '&language=' + LANGUAGE,
                success: function (data) {
                    if (data.status == 'success')
                    {
                        $elems.register.close.click();
                        showPopup(RegisterSuccess);
                    }
                    
                    if (data.status == 'error')
                    {
                        if (data.failed == 'email')
                        {
                            $elems.register.close.click();
                            showPopup(EmailNotValid);
                        }

                        if (data.failed == 'server')
                        {
                            $elems.register.close.click();
                            showPopup(ServerError);
                        }
                    }

                    vars.register.isDataProcessing = false;
                    hideLoader();
                },
                error: function (data) {
                    $elems.register.close.click();

                    showPopup(ServerError);
                    
                    vars.register.isDataProcessing = false;

                    hideLoader();
                }
            });
        };

    };

    ctx.subscribe = function (e) {

        $body.on('click', elems.register.submit, function (e) {
            e.preventDefault();

            if (validate())
            {
                register();
            }
        });

    };

    ctx.launch = function (e) {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}
var register = new Register();