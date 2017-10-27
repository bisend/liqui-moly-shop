function Contact() {
    var ctx = this,
        $body = $('body'),
        elems = {
            contact: {
                email: '[data-contact-email]',
                name: '[data-contact-name]',
                message: '[data-contact-message]',
                submit: '[data-contact-submit]'
            }
        },
        $elems = {
            contact: {
                email: $(elems.contact.email),
                name: $(elems.contact.name),
                message: $(elems.contact.message),
                submit: $(elems.contact.submit)
            }
        },
        validators = {
            contact: {
                email: undefined,
                name: undefined,
                message: undefined
            }
        },
        vars = {
            contact: {
                isDataProcessing: false
            }
        };

    //functions
    var validate,
        sendContact;

    ctx.init = function () {
        //validators
        validators.contact.email = new RegExValidatingInput($elems.contact.email, {
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

        validators.contact.name = new RegExValidatingInput($elems.contact.name, {
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

        validators.contact.message = new RegExValidatingInput($elems.contact.message, {
            expression: RegularExpressions.SIMPLE_TEXT,
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

            // Validates email
            validators.contact.email.Validate();
            if (!validators.contact.email.IsValid()) {
                isValid = false;
            }

            // Validates name
            validators.contact.name.Validate();
            if (!validators.contact.name.IsValid()) {
                isValid = false;
            }

            // Validates message
            validators.contact.message.Validate();
            if (!validators.contact.message.IsValid()) {
                isValid = false;
            }

            if (vars.contact.isDataProcessing) {
                return false;
            }

            return isValid;

        };


        sendContact = function () {
            if (vars.contact.isDataProcessing) {
                return false;
            }

            vars.contact.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/contact',
                data: {
                    email: $elems.contact.email.val(),
                    name: $elems.contact.name.val(),
                    message: $elems.contact.message.val(),
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.contact.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        $elems.contact.email.val('');
                        $elems.contact.name.val('');
                        $elems.contact.message.val('');
                        showPopup(CONTACT_FORM_SENDED);
                    }

                    if (data.status == 'error')
                    {
                        showPopup(ServerError);
                    }
                },
                error: function (data) {
                    showPopup(ServerError);
                    vars.contact.isDataProcessing = false;
                    hideLoader();
                }
            });
        };

    };

    ctx.subscribe = function () {
        $body.on('click', elems.contact.submit, function (e) {
            e.preventDefault();
            if (validate())
            {
                sendContact();
            }
            // alert('submit');
        });
    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}

new Contact();