var REVIEW_PAGE = 1;
function Review() {
    var ctx = this,
        $body = $('body'),
        elems = {
            review: {
                slug: '[data-product-slug]',
                productId: '[data-product-id]',
                reviewContainer: '[data-product-reviews-container]',

                name: '[data-add-review-name]',
                email: '[data-add-review-email]',
                rating: '[data-add-review-rating]',
                text: '[data-add-review-text]',
                star: '[data-rating-star]',
                submit: '[data-add-review-submit]'
            }
        },
        $elems = {
            review: {
                slug: $(elems.review.slug),
                productId: $(elems.review.productId),
                reviewContainer: $(elems.review.reviewContainer),

                name: $(elems.review.name),
                email: $(elems.review.email),
                rating: $(elems.review.rating),
                text: $(elems.review.text),
                star: $(elems.review.star),
                submit: $(elems.review.submit)
            }
        },
        validators = {
            review: {
                name: undefined,
                email: undefined,
                text: undefined
            }
        },
        vars = {
            review: {
                isDataProcessing: false
            }
        };

    //functions
    var initAjaxReviewsView,
        validate,
        initStars,
        addReview;
    
    ctx.init = function () {

        initStars = function () {
            if ($elems.review.rating.length > 0) {
                $elems.review.rating.each(function(){
                    var $star = $(this);

                    if($star.hasClass('big')){
                        $star.raty({
                            starOff: '/img/star-big-off.png',
                            starOn: '/img/star-big-on.png',
                            space: false,
                            score: function() {
                                return $(this).attr('data-score');
                            }
                        });
                    }else{
                        $star.raty({
                            starOff: '/img/star-off.png',
                            starOn: '/img/star-on.png',
                            space: false,
                            score: function() {
                                return $(this).attr('data-score');
                            }
                        });
                    }
                });
            }
        };

        //validators
        validators.review.name = new RegExValidatingInput($elems.review.name, {
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

        validators.review.email = new RegExValidatingInput($elems.review.email, {
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

        validators.review.text = new RegExValidatingInput($elems.review.text, {
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
            validators.review.name.Validate();
            if (!validators.review.name.IsValid()) {
                isValid = false;
            }

            validators.review.email.Validate();
            if (!validators.review.email.IsValid()) {
                isValid = false;
            }

            validators.review.text.Validate();
            if (!validators.review.text.IsValid()) {
                isValid = false;
            }

            // if ($elems.review.rating.attr('data-add-review-rating') == '0')
            if ($elems.review.rating.find('input').val() == '')
            {
                if ($elems.review.rating.find('p').length == 0)
                {
                    $elems.review.rating.append("<p class='inline' style='color: red; margin: 0 0 0 15px;'>" + PLEASE_RATE_PRODUCT + "</p>");
                }
                isValid = false;
            }

            if (vars.review.isDataProcessing) {
                return false;
            }

            return isValid;
        };







        initAjaxReviewsView = function (page) {
            if (vars.review.isDataProcessing)
            {
                return false;
            }

            vars.review.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/init-product-reviews',
                data: {
                    productId: $elems.review.productId.val(),
                    page: page
                },
                success: function (data) {
                    vars.review.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        $elems.review.reviewContainer.html(data.view);
                    }
                },
                error: function (error) {
                    vars.review.isDataProcessing = false;

                    hideLoader();

                    showPopup(ServerError);
                }

            });
        };

        addReview = function () {
            if (vars.review.isDataProcessing)
            {
                return false;
            }

            vars.review.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/add-review',
                data: {
                    productId: $elems.review.productId.val(),
                    review: $elems.review.text.val(),
                    userName: $elems.review.name.val(),
                    email: $elems.review.email.val(),
                    rating: $elems.review.rating.find('input').val()
                },
                success: function (data) {
                    vars.review.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {

                        showPopup(REVIEW_ADDED);
                        $elems.review.text.val('');
                        $elems.review.rating.find('input').val('');
                        $elems.review.rating.find('img').attr('src', '/img/star-off.png');
                    }

                    if (data.status == 'error')
                    {
                        showPopup(ServerError);
                    }
                },
                error: function (error) {
                    vars.review.isDataProcessing = false;

                    hideLoader();

                    showPopup(ServerError);
                }

            });

        };

    };

    ctx.subscribe = function () {
        $body.on('click', '[data-product-review-pagination]', function (e) {
            e.preventDefault();
            e.stopPropagation();

            REVIEW_PAGE = $(this).attr('data-product-review-pagination');

            initAjaxReviewsView(REVIEW_PAGE);
        });

        $body.on('click', elems.review.submit, function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (validate())
            {
                addReview();
            }
        });

        // $body.on('mouseenter', elems.review.star, function (e) {
        //     var countStars = $(this).attr('data-rating-star');
        //     var setStars = $elems.review.rating.attr('data-add-review-rating');
        //
        //     $elems.review.star.each(function (i, elem) {
        //         if (setStars == 0 && i + 1 <= countStars)
        //         {
        //             $(this).attr('src', '/img/star-on.png');
        //         }
        //
        //         if (setStars > 0 && i + 1 <= countStars)
        //         {
        //             $(this).attr('src', '/img/star-on.png');
        //         }
        //     });
        // });
        //
        // $body.on('mouseleave', elems.review.star, function (e) {
        //     var countStars = $(this).attr('data-rating-star');
        //     var setStars = $elems.review.rating.attr('data-add-review-rating');
        //     $elems.review.star.each(function (i, elem) {
        //         if (setStars == 0)
        //         {
        //             $(this).attr('src', '/img/star-off.png');
        //         }
        //
        //         if (setStars > 0 && countStars > setStars)
        //         {
        //             $(this).attr('src', '/img/star-off.png');
        //         }
        //
        //         if (setStars > 0 && setStars > countStars)
        //         {
        //             $(this).attr('src', '/img/star-off.png');
        //         }
        //
        //         if (setStars > 0 && i + 1 <= setStars)
        //         {
        //             $(this).attr('src', '/img/star-on.png');
        //         }
        //         console.log(setStars);
        //     });
        // });

        initStars();

        $elems.review.rating.on('click', 'img', function (e) {
            $elems.review.rating.find('p').remove();
        });

        // $body.on('click', '[data-add-review-rating]', function (e) {
        //     var countStars = $(this).attr('data-rating-star');
        //     $elems.review.rating.attr('data-add-review-rating', countStars);
        //     var setStars = $elems.review.rating.attr('data-add-review-rating');
        //     $elems.review.star.each(function (i, elem) {
        //         if (i + 1 <= setStars)
        //         {
        //             $(this).attr('src', '/img/star-on.png');
        //         }
        //         else
        //         {
        //             $(this).attr('src', '/img/star-off.png');
        //         }
        //     });
        // });


        $body.on('click', '[data-set-review-id]', function (e) {
            var productId = $(this).attr('data-set-review-id');
            var productSlug = $(this).attr('data-set-review-slug');
            var lang = (LANGUAGE == DEFAULT_LANGUAGE) ? '' : LANGUAGE;
            localStorage.setItem('goToReviews', true);
            location.href = '/product/' + productSlug + '/' + lang;
        });

        $body.on('click', '[data-go-to-review-id]', function (e) {
            var productId = $(this).attr('data-go-to-review-id');
            var productSlug = $(this).attr('data-go-to-review-slug');
            var lang = (LANGUAGE == DEFAULT_LANGUAGE) ? '' : LANGUAGE;
            localStorage.setItem('goToReviewsTab', true);
            location.href = '/product/' + productSlug + '/' + lang;
        });
    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}

$(document).ready(function () {
    new Review();
});
