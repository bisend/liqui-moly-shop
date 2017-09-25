function Order()
{
    var ctx = this,
        $body = $('body'),
        elems = {
            paymentMenu: {
                select: '[data-payment-select]',
                dropDownMenu: '[data-payment-dropdown-menu]',
                paymentItem: '[data-payment-id]',
                selectedItem: '[data-payment-selected-item]'
            },
            deliveryMenu: {
                select: '[data-delivery-select]',
                dropDownMenu: '[data-delivery-dropdown-menu]',
                deliveryItem: '[data-delivery-id]',
                selectedItem: '[data-delivery-selected-item]'
            },
            order: {
                name: '[data-order-name]',
                email: '[data-order-email]',
                phone: '[data-order-phone]',
                city: '[data-order-city]',
                address: '[data-order-address]',
                submit: '[data-order-submit]'
            }
        },
        $elems = {
            paymentMenu: {
                select: $(elems.paymentMenu.select),
                dropDownMenu: $(elems.paymentMenu.dropDownMenu),
                selectedItem: $(elems.paymentMenu.selectedItem)
            },
            deliveryMenu: {
                select: $(elems.deliveryMenu.select),
                dropDownMenu: $(elems.deliveryMenu.dropDownMenu),
                selectedItem: $(elems.deliveryMenu.selectedItem)
            },
            order: {
                name: $(elems.order.name),
                email: $(elems.order.email),
                phone: $(elems.order.phone),
                city: $(elems.order.city),
                address: $(elems.order.address)
            }
        },
        vars = {
            order: {
                isDataProcessing: false
            }
        },
        // jclient.validation.js instances
        validators = {
            order: {
                name: undefined,
                email: undefined,
                phone: undefined,
                payment: undefined,
                delivery: undefined,
                city: undefined,
                address: undefined
            }
        };

    //functions
    var showPaymentMenu,
        hidePaymentMenu,
        setPaymentSelectedItem;

    var showDeliveryMenu,
        hideDeliveryMenu,
        setDeliverySelectedItem;

    var validate,
        createOrder;

    ctx.init = function () {
        
        // show payment menu select
        showPaymentMenu = function () {
            $elems.paymentMenu.select.attr('tabindex', 1).focus().toggleClass('active');
            $elems.paymentMenu.dropDownMenu.stop(true, true).slideToggle(300);
        };
        
        // hide payment menu select
        hidePaymentMenu = function () {
            $elems.paymentMenu.select.removeClass('active');
            $elems.paymentMenu.dropDownMenu.stop(true, true).slideUp(300);
        };
        
        // set payment selected item
        setPaymentSelectedItem = function (paymentId, paymentText) {
            $elems.paymentMenu.selectedItem.attr('data-payment-selected-item', paymentId).text(paymentText);
        };
        
        // show delivery menu select
        showDeliveryMenu = function () {
            $elems.deliveryMenu.select.attr('tabindex', 1).focus().toggleClass('active');
            $elems.deliveryMenu.dropDownMenu.stop(true, true).slideToggle(300);
        };
        
        // hide delivery menu select
        hideDeliveryMenu = function () {
            $elems.deliveryMenu.select.removeClass('active');
            $elems.deliveryMenu.dropDownMenu.stop(true, true).slideUp(300);
        };
        
        // set delivery selected item
        setDeliverySelectedItem = function (deliveryId, deliveryText) {
            $elems.deliveryMenu.selectedItem.attr('data-delivery-selected-item', deliveryId).text(deliveryText);
        };


        //validators
        validators.order.name = new RegExValidatingInput($elems.order.name, {
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

        validators.order.email = new RegExValidatingInput($elems.order.email, {
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

        validators.order.phone = new RegExValidatingInput($elems.order.phone, {
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

        validators.order.city = new RegExValidatingInput($elems.order.city, {
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

        validators.order.address = new RegExValidatingInput($elems.order.address, {
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
            validators.order.name.Validate();
            if (!validators.order.name.IsValid()) {
                isValid = false;
            }

            validators.order.email.Validate();
            if (!validators.order.email.IsValid()) {
                isValid = false;
            }

            validators.order.phone.Validate();
            if (!validators.order.phone.IsValid()) {
                isValid = false;
            }

            // validators.order.city.Validate();
            // if (!validators.order.city.IsValid()) {
            //     isValid = false;
            // }

            validators.order.address.Validate();
            if (!validators.order.address.IsValid()) {
                isValid = false;
            }
            
            // validating payment
            if ($elems.paymentMenu.selectedItem.attr('data-payment-selected-item') == '')
            {
                $('[data-payment-select-border]').css('border', '1px solid red');
                isValid = false;
            }
            
            // validating delivery
            if ($elems.deliveryMenu.selectedItem.attr('data-delivery-selected-item') == '')
            {
                $('[data-delivery-select-border]').css('border', '1px solid red');
                isValid = false;
            }


            if (vars.order.isDataProcessing) {
                return false;
            }

            return isValid;

        };
        
        // send ajax to create order
        createOrder = function () {
            if (vars.order.isDataProcessing) {
                return false;
            }

            vars.order.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/create-order',
                data: {
                    name: $elems.order.name.val(),
                    email: $elems.order.email.val(),
                    phone: $elems.order.phone.val(),
                    paymentId: $elems.paymentMenu.selectedItem.attr('data-payment-selected-item'),
                    deliveryId: $elems.deliveryMenu.selectedItem.attr('data-delivery-selected-item'),
                    // city: $elems.order.city.val(),
                    address: $elems.order.address.val(),
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.order.isDataProcessing = false;
                    
                    hideLoader();

                    if (data.status == 'success')
                    {
                        redirectEmptyCart();
                    }

                    if (data.status == 'error')
                    {
                        showPopup(ServerError);
                    }
                },
                error: function (data) {
                    showPopup(ServerError);
                    vars.order.isDataProcessing = false;
                    hideLoader();
                }
            });
        };

        
    };
    
    // subscribe functions on event handlers
    ctx.subscribe = function () {
        
        // click on payment select
        $body.on('click', elems.paymentMenu.select, function () {
            showPaymentMenu();
        });

        //focusout of payment menu
        $body.on('focusout', elems.paymentMenu.select, function () {
            hidePaymentMenu();
        });
        
        // click on payment menu item
        $body.on('click', elems.paymentMenu.paymentItem, function () {
            var paymentId = $(this).attr('data-payment-id');
            var paymentText = $(this).text();

            $('[data-payment-select-border]').css('border', '1px solid #ccc');

            setPaymentSelectedItem(paymentId, paymentText);
        });
        
        // click on delivery menu select
        $body.on('click', elems.deliveryMenu.select, function () {
            showDeliveryMenu();
        });

        //focusout of delivery menu
        $body.on('focusout', elems.deliveryMenu.select, function () {
            hideDeliveryMenu();
        });
        
        // click on delivery menu item
        $body.on('click', elems.deliveryMenu.deliveryItem, function () {
            var paymentId = $(this).attr('data-delivery-id');
            var paymentText = $(this).text();

            $('[data-delivery-select-border]').css('border', '1px solid #ccc');

            setDeliverySelectedItem(paymentId, paymentText);
        });
        
        // click on order submit button
        $body.on('click', elems.order.submit, function (e) {
            e.preventDefault();
            if (validate())
            {
                createOrder();
            }
        });
    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}

$(document).ready(function() {
    new Order();
});