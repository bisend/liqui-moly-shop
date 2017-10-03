function OrderCall()
{
    var ctx = this,
        $body = $('body'),
        elems = {
            orderCall: {
                close: '[data-call-close]',

                name: '[data-call-name]',
                phoneNumber: '[data-call-phone-number]',
                submit: '[data-call-submit]'
            }
        },
        $elems = {
            orderCall: {
                close: $(elems.orderCall.close),

                name: $(elems.orderCall.name),
                phoneNumber: $(elems.orderCall.phoneNumber),
                submit: $(elems.orderCall.submit)
            }
        },
        validators = {
            orderCall: {
                name: undefined,
                phoneNumber: undefined
            }
        },
        vars = {
            orderCall: {
                isDataProcessing: false
            }
        };

    //functions
    var orderCall,
        validate;

    ctx.init = function () {

        //validators
        validators.orderCall.name = new RegExValidatingInput($elems.orderCall.name, {
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

        validators.orderCall.phoneNumber = new RegExValidatingInput($elems.orderCall.phoneNumber, {
            expression: RegularExpressions.PHONE_NUMBER,
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

            // Validates name
            validators.orderCall.name.Validate();
            if (!validators.orderCall.name.IsValid()) {
                isValid = false;
            }
            //validates phone number
            validators.orderCall.phoneNumber.Validate();
            if (!validators.orderCall.phoneNumber.IsValid()) {
                isValid = false;
            }

            if (vars.orderCall.isDataProcessing) {
                return false;
            }

            return isValid;
        };

        orderCall = function () {
            if (vars.orderCall.isDataProcessing) {
                return false;
            }

            vars.orderCall.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/order-call',
                data: {
                    name: $elems.orderCall.name.val(),
                    phoneNumber: $elems.orderCall.phoneNumber.val(),
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.orderCall.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        $elems.orderCall.close.click();
                        $elems.orderCall.name.val('');
                        $elems.orderCall.phoneNumber.val('');
                        showPopup(CALL_ORDERED);
                    }

                    if (data.status == 'error')
                    {
                        showPopup(ServerError);
                    }
                },
                error: function (error) {
                    showPopup(ServerError);

                    vars.orderCall.isDataProcessing = false;

                    hideLoader();
                }
            });
        };
    };

    ctx.subscribe = function () {
        $body.on('click', elems.orderCall.submit, function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (validate())
            {
                orderCall();
            }
        });
    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}

new OrderCall();