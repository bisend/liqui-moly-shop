function PersonalInfo() {
    var ctx = this,
        $body = $('body'),
        elems = {
            pInfo: {
                name: '[data-personal-info-name]',
                email: '[data-personal-info-email]',
                phoneNumber: '[data-personal-info-phone-number]',
                address: '[data-personal-info-address]',
                submit: '[data-personal-info-submit]'
            },
            deliveryMenu: {
                menuSelect: '[data-delivery-select]',
                spanSelected: '[data-delivery-span-selected]',
                dropDownContainer: '[data-delivery-dropdown-container]',
                item: '[data-delivery-item]'
            },
            paymentMenu: {
                menuSelect: '[data-payment-select]',
                spanSelected: '[data-payment-span-selected]',
                dropDownContainer: '[data-payment-dropdown-container]',
                item: '[data-payment-item]'
            }
        },
        $elems = {
            pInfo: {
                name: $(elems.pInfo.name),
                email: $(elems.pInfo.email),
                phoneNumber: $(elems.pInfo.phoneNumber),
                delivery: $(elems.pInfo.delivery),
                payment: $(elems.pInfo.payment),
                address: $(elems.pInfo.address),
                submit: $(elems.pInfo.submit)
            },
            deliveryMenu: {
                menuSelect: $(elems.deliveryMenu.menuSelect),
                spanSelected: $(elems.deliveryMenu.spanSelected),
                dropDownContainer: $(elems.deliveryMenu.dropDownContainer),
                item: $(elems.deliveryMenu.item)
            },
            paymentMenu: {
                menuSelect: $(elems.paymentMenu.menuSelect),
                spanSelected: $(elems.paymentMenu.spanSelected),
                dropDownContainer: $(elems.paymentMenu.dropDownContainer),
                item: $(elems.paymentMenu.item)
            }
        },
        vars = {
            pInfo: {
                isDataProcessing: false
            }
        },
        validators = {
            pInfo: {
                name: undefined,
                email: undefined,
                phoneNumber: undefined,
                address: undefined
            }
        };

    /**
     * functions
     */
    var showDeliveryMenu,
        hideDeliveryMenu,
        setDeliverySelectedItem;

    var showPaymentMenu,
        hidePaymentMenu,
        setPaymentSelectedItem;

    var validate,
        savePersonalInfo;

    ctx.init = function () {
        showDeliveryMenu = function () {
            $elems.deliveryMenu.menuSelect.attr('tabindex', 1).focus();
            $elems.deliveryMenu.menuSelect.toggleClass('active');
            $elems.deliveryMenu.dropDownContainer.stop(true, true).slideToggle(300);
        };
        
        showPaymentMenu = function () {
            $elems.paymentMenu.menuSelect.attr('tabindex', 1).focus();
            $elems.paymentMenu.menuSelect.toggleClass('active');
            $elems.paymentMenu.dropDownContainer.stop(true, true).slideToggle(300);
        };

        hideDeliveryMenu = function () {
            $elems.deliveryMenu.menuSelect.removeClass('active');
            $elems.deliveryMenu.dropDownContainer.stop(true, true).slideUp(300);
        };

        hidePaymentMenu = function () {
            $elems.paymentMenu.menuSelect.removeClass('active');
            $elems.paymentMenu.dropDownContainer.stop(true, true).slideUp(300);
        };

        // set delivery selected item
        setDeliverySelectedItem = function (deliveryId, deliveryText) {
            $elems.deliveryMenu.spanSelected.attr('data-delivery-span-selected', deliveryId).text(deliveryText);
        };

        // set payment selected item
        setPaymentSelectedItem = function (paymentId, paymentText) {
            $elems.paymentMenu.spanSelected.attr('data-payment-span-selected', paymentId).text(paymentText);
        };

        //validators
        validators.pInfo.name = new RegExValidatingInput($elems.pInfo.name, {
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

        validators.pInfo.email = new RegExValidatingInput($elems.pInfo.email, {
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

        validators.pInfo.phoneNumber = new RegExValidatingInput($elems.pInfo.phoneNumber, {
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

        validators.pInfo.address = new RegExValidatingInput($elems.pInfo.address, {
            expression: RegularExpressions.MIN_TEXT,
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
            validators.pInfo.name.Validate();
            if (!validators.pInfo.name.IsValid()) {
                isValid = false;
            }

            validators.pInfo.email.Validate();
            if (!validators.pInfo.email.IsValid()) {
                isValid = false;
            }

            validators.pInfo.phoneNumber.Validate();
            if (!validators.pInfo.phoneNumber.IsValid()) {
                isValid = false;
            }

            validators.pInfo.address.Validate();
            if (!validators.pInfo.address.IsValid()) {
                isValid = false;
            }

            // validating payment
            if ($elems.paymentMenu.spanSelected.attr('data-payment-span-selected') == '')
            {
                $('[data-payment-select-border]').css('border', '1px solid red');
                isValid = false;
            }

            // validating delivery
            if ($elems.deliveryMenu.spanSelected.attr('data-delivery-span-selected') == '')
            {
                $('[data-delivery-select-border]').css('border', '1px solid red');
                isValid = false;
            }


            if (vars.pInfo.isDataProcessing) {
                return false;
            }

            return isValid;

        };

        savePersonalInfo = function () {
            if (vars.pInfo.isDataProcessing) {
                return false;
            }
            
            vars.pInfo.isDataProcessing = true;
            
            showLoader();
            
            $.ajax({
                url: '/profile/save-personal-info',
                type: 'post',
                data: {
                    name: $elems.pInfo.name.val(),
                    email: $elems.pInfo.email.val(),
                    phoneNumber: $elems.pInfo.phoneNumber.val(),
                    deliveryId: $elems.deliveryMenu.spanSelected.attr('data-delivery-span-selected'),
                    paymentId: $elems.paymentMenu.spanSelected.attr('data-payment-span-selected'),
                    address: $elems.pInfo.address.val(),
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.pInfo.isDataProcessing = false;
                    
                    hideLoader();

                    if (data.status == 'success')
                    {
                        $('[data-action-profile]').text($elems.pInfo.name.val());

                        if (data.emailChanged == true)
                        {
                            showPopup(EMAIL_CHANGED_MESSAGE);
                        }
                        else
                        {
                            showPopup(PERSONAL_INFO_SAVED);
                        }
                    }

                    if (data.status == 'error')
                    {
                        if (data.userExists == true)
                        {
                            showPopup(EmailNotValid);
                        }

                        if (data.failed == 'server')
                        {
                            showPopup(ServerError);
                        }
                    }
                },
                error: function (error) {
                    vars.pInfo.isDataProcessing = false;
                    hideLoader();
                    console.log(error);
                    showPopup(ServerError);
                }
            });
        };
    };

    ctx.subscribe = function () {

        //click on delivery menu
        $body.on('click', elems.deliveryMenu.menuSelect, function () {
            showDeliveryMenu();
        });

        //focusout of delivery menu
        $body.on('focusout', elems.deliveryMenu.menuSelect, function () {
            hideDeliveryMenu();
        });

        //click on payment menu
        $body.on('click', elems.paymentMenu.menuSelect, function () {
            showPaymentMenu();
        });

        //focusout of payment menu
        $body.on('focusout', elems.paymentMenu.menuSelect, function () {
            hidePaymentMenu();
        });

        // click on delivery menu item
        $body.on('click', elems.deliveryMenu.item, function () {
            var paymentId = $(this).attr('data-delivery-id');
            var paymentText = $(this).text();

            $('[data-delivery-select-border]').css('border', '1px solid #ccc');

            setDeliverySelectedItem(paymentId, paymentText);
        });

        // click on payment menu item
        $body.on('click', elems.paymentMenu.item, function () {
            var paymentId = $(this).attr('data-payment-id');
            var paymentText = $(this).text();

            $('[data-payment-select-border]').css('border', '1px solid #ccc');

            setPaymentSelectedItem(paymentId, paymentText);
        });

        // click on personal-info submit button
        $body.on('click', elems.pInfo.submit, function (e) {
            e.preventDefault();
            if (validate())
            {
                savePersonalInfo();
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
    new PersonalInfo();
});