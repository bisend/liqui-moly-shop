function BuyOneClick()
{
    var ctx = this,
        $body = $('body'),
        elems = {
            buyOneClick: {
                close: '[data-buy-one-click-close]',
                
                name: '[data-buy-one-click-name]',
                phoneNumber: '[data-buy-one-click-phone-number]',
                submit: '[data-buy-one-click-submit]',
                productId: '[data-buy-one-click-product-id]'
            }
        },
        $elems = {
            buyOneClick: {
                close: $(elems.buyOneClick.close),
                
                name: $(elems.buyOneClick.name),
                phoneNumber: $(elems.buyOneClick.phoneNumber),
                submit: $(elems.buyOneClick.submit),
                productId: $(elems.buyOneClick.productId)
            }
        },
        validators = {
            buyOneClick: {
                name: undefined,
                phoneNumber: undefined
            }
        },
        vars = {
            buyOneClick: {
                isDataProcessing: false
            }
        };

    //functions
    var buyOneClick,
        validate;

    ctx.init = function () {

        //validators
        validators.buyOneClick.name = new RegExValidatingInput($elems.buyOneClick.name, {
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

        validators.buyOneClick.phoneNumber = new RegExValidatingInput($elems.buyOneClick.phoneNumber, {
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
            validators.buyOneClick.name.Validate();
            if (!validators.buyOneClick.name.IsValid()) {
                isValid = false;
            }
            //validates phone number
            validators.buyOneClick.phoneNumber.Validate();
            if (!validators.buyOneClick.phoneNumber.IsValid()) {
                isValid = false;
            }

            if (vars.buyOneClick.isDataProcessing) {
                return false;
            }

            return isValid;
        };

        buyOneClick = function () {
            if (vars.buyOneClick.isDataProcessing)
            {
                return false;
            }

            vars.buyOneClick.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/buy-one-click',
                data: {
                    productId: $elems.buyOneClick.productId.val(),
                    name: $elems.buyOneClick.name.val(),
                    phoneNumber: $elems.buyOneClick.phoneNumber.val(),
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.buyOneClick.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        $elems.buyOneClick.close.click();
                        $elems.buyOneClick.name.val('');
                        $elems.buyOneClick.phoneNumber.val('');
                        showPopup(BUY_ONE_CLICK_CREATED);
                    }

                    if (data.status == 'error')
                    {
                        showPopup(ServerError);
                    }
                },
                error: function (error) {
                    showPopup(ServerError);

                    vars.buyOneClick.isDataProcessing = false;

                    hideLoader();
                }
            });
        };
    };

    ctx.subscribe = function () {
        $body.on('click', elems.buyOneClick.submit, function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (validate())
            {
                buyOneClick();
            }
        });
    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}

new BuyOneClick();

$(window).load(function () {
    if (localStorage.getItem('goToReviews'))
    {
        $('html, body').animate({
            scrollTop: $("[data-review-scroll]").offset().top
        }, 1000);
        localStorage.removeItem('goToReviews');
    }
    
    if (localStorage.getItem('goToReviewsTab'))
    {
        $('html, body').animate({
            scrollTop: $("[data-review-scroll-tab]").offset().top
        }, 1000);
        localStorage.removeItem('goToReviewsTab');
    }
});