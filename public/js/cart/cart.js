function Cart() {
    var ctx = this,
        $body = $('body'),
        IS_DATA_PROCESSING = false,
        timer = undefined,
        //selectors
        elems = {
            addToCartBtn: '[data-add-to-cart]',
            deleteFromCartBtn: '[data-delete-from-cart]',
            totalSum: '[data-cart-total-sum]',
            totalCount: '[data-cart-total-count]',
            bigCart: {
                container: '[data-big-cart-container]',
                openBigCartBtn: '[data-open-big-cart]'
            },
            miniCart: {
                container: '[data-mini-cart-container]',
                openMiniCartBtn: '[data-open-mini-cart]'
            }
        },
        //jquery instances
        $elems = {
            addToCartBtn: $(elems.addToCartBtn),
            deleteFromCartBtn: $(elems.deleteFromCartBtn),
            totalSum: $(elems.totalSum),
            bigCart: {
                container: $(elems.bigCart.container),
                openBigCartBtn: $(elems.bigCart.openBigCartBtn)
            },
            miniCart: {
                container: $(elems.miniCart.container),
                openMiniCartBtn: $(elems.miniCart.openMiniCartBtn)
            }
        };
    // cart functions
    ctx.cartFunctions = {
        initCart: undefined,
        addToCart: undefined,
        deleteFromCart: undefined,
        updateCart: undefined,
        clearCart: undefined,
        renderBigCart: undefined,
        renderMiniCart: undefined,
        showBigCart: undefined,
        closeBigCart: undefined,
        initButtons: undefined,
        initTotalAmount: undefined,
        initProductsCount: undefined,
        initSingleProductSum: undefined,
        redirectEmptyCart: undefined,
        onInitCallback: undefined
    };

    // ctx.onInit = function (callback) {
    //     if (callback) {
    //         ctx.cartFunctions.onInitCallback = callback;
    //     }
    // };

    //initialize functions
    ctx.init = function () {

        //initializing cart on page loading
        ctx.cartFunctions.initCart = function () {
            CART_W_S = new WaitSync(function () {
                $.ajax({
                    type: 'get',
                    url: buildUrlWithLang('/cart/init-cart/'),
                    // cache: false,
                    success: function (data) {
                        ctx.cartFunctions.renderBigCart(data.bigCartView);
                        ctx.cartFunctions.renderMiniCart(data.miniCartView);
                        ctx.cartFunctions.initButtons(data.inCartIds);
                        ctx.cartFunctions.initTotalAmount(data.totalProductsAmount);
                        ctx.cartFunctions.initProductsCount(data.totalProductsCount);

                        // if (ctx.cartFunctions.onInitCallback) {
                        //     ctx.cartFunctions.onInitCallback();
                        // }
                    },
                    error: function (data) {
                        // showPopup(ServerError);
                    }
                });
            });

        };

        //add to cart handler
        ctx.cartFunctions.addToCart = function (productId, productCount) {

            if (IS_DATA_PROCESSING){
                return false;
            }

            IS_DATA_PROCESSING = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/cart/add-to-cart',
                data: {
                    productId: productId,
                    productCount: productCount,
                    language: LANGUAGE
                },
                success: function (data) {
                    ctx.cartFunctions.renderBigCart(data.bigCartView);
                    ctx.cartFunctions.renderMiniCart(data.miniCartView);
                    ctx.cartFunctions.initTotalAmount(data.totalProductsAmount);
                    ctx.cartFunctions.initProductsCount(data.totalProductsCount);
                    ctx.cartFunctions.showBigCart();
                    IS_DATA_PROCESSING = false;
                    hideLoader();
                },
                error: function (data) {
                    showPopup(ServerError);
                    IS_DATA_PROCESSING = false;
                    hideLoader();
                }
            });
        };
        
        //delete from cart handler
        ctx.cartFunctions.deleteFromCart = function (productId) {

            if (IS_DATA_PROCESSING){
                return false;
            }

            IS_DATA_PROCESSING = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/cart/delete-from-cart',
                data: {
                    productId: productId,
                    language: LANGUAGE
                },
                success: function (data) {
                    if (data.inCartIds < 1)
                    {
                        ctx.cartFunctions.closeBigCart();
                        redirectEmptyCart();
                    }

                    $('[data-cart-product-id="' + productId + '"]').slideUp();
                    
                    $('[data-cart-product-id="' + productId + '"]').remove();

                    $('[data-order-product-container="' + productId + '"]').slideUp();

                    ctx.cartFunctions.initButtons(data.inCartIds);
                    ctx.cartFunctions.initTotalAmount(data.totalProductsAmount);
                    ctx.cartFunctions.initProductsCount(data.totalProductsCount);
                    ctx.cartFunctions.initSingleProductSum(productId, 1);
                    IS_DATA_PROCESSING = false;
                    hideLoader();
                },
                error: function (data) {
                    showPopup(ServerError);
                    IS_DATA_PROCESSING = false;
                    hideLoader();
                }
            });
        };

        //update cart
        ctx.cartFunctions.updateCart = function (productId, productCount) {

            if (IS_DATA_PROCESSING){
                return false;
            }

            IS_DATA_PROCESSING = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/cart/update-cart',
                data: {
                    productId: productId,
                    productCount: productCount,
                    language: LANGUAGE
                },
                success: function (data) {
                    ctx.cartFunctions.initButtons(data.inCartIds);
                    ctx.cartFunctions.initTotalAmount(data.totalProductsAmount);
                    ctx.cartFunctions.initProductsCount(data.totalProductsCount);
                    ctx.cartFunctions.initSingleProductSum(productId, productCount);
                    IS_DATA_PROCESSING = false;
                    hideLoader();
                },
                error: function (data) {
                    showPopup(ServerError);
                    IS_DATA_PROCESSING = false;
                    hideLoader();
                }
            });
        };

        //initializing big cart with html
        ctx.cartFunctions.renderBigCart = function (view) {
            $elems.bigCart.container.html(view);
        };

        //initializing mini cart with html
        ctx.cartFunctions.renderMiniCart = function (view) {
            $elems.miniCart.container.html(view);
        };

        //open big cart
        ctx.cartFunctions.showBigCart = function () {
            $elems.bigCart.container.modal('show');
        };

        //close big cart
        ctx.cartFunctions.closeBigCart = function () {
            $elems.bigCart.container.modal('hide');
        };

        //init buttons that checked for IN cart or NOT
        ctx.cartFunctions.initButtons = function (inCartIds) {
            //check if we have ids of products in cart. var inCartIds arr
            if (inCartIds)
            {
                $.each(inCartIds, function( index, productId ) {
                    $('[data-add-to-cart="' + productId + '"').attr('data-in-cart', true)
                        .text(InCart)
                        .removeClass('le-button')
                        .addClass('le-button-active');
                });
            }
            else
            {
                $('[data-add-to-cart]').each(function (index) {
                    if ($('#addto-cart').length > 0)
                    {
                        $(this).attr('data-in-cart', false)
                            .text(ADD_TO_CART_PRODUCT)
                            .removeClass('le-button-active')
                            .addClass('le-button');
                    }
                    else {
                        $(this).attr('data-in-cart', false)
                            .text(AddToCart)
                            .removeClass('le-button-active')
                            .addClass('le-button');
                    }
                });
            }
        };
        
        //init Total Amount for cart
        ctx.cartFunctions.initTotalAmount = function (totalProductsAmount) {
            $(elems.totalSum).text(totalProductsAmount.toFixed(2));
        };

        //init Products Count for cart
        ctx.cartFunctions.initProductsCount = function (totalProductsCount) {
            $(elems.totalCount).text(totalProductsCount);
        };


        // init SUM of single product in cart and product page and order page
        ctx.cartFunctions.initSingleProductSum = function (productId, productCount) {
            var $cartElem = $('[data-cart-product-price="' + productId + '"]');
            var $singleProductElem = $('[data-single-product-price="' + productId + '"]');
            
            var productPrice = 0;
            
            if ($cartElem.length > 0)
            {
                productPrice = parseFloat($cartElem.text()).toFixed(2);
            }

            if ($singleProductElem.length > 0)
            {
                productPrice = parseFloat($singleProductElem.text()).toFixed(2);
            }

            var productSum = parseInt(productCount) * productPrice;
            
            $('[data-product-sum="' + productId + '"]').text(productSum.toFixed(2));
        };

    };


    // subscribing cart functions to event handlers
    ctx.subscribe = function () {

        // click on add to cart button
        $body.on('click', elems.addToCartBtn, function (e) {
            var isInCart = $(this).attr('data-in-cart');
            var productId = $(this).attr('data-add-to-cart');
            var $addToCartBtn = $('[data-add-to-cart="' + productId + '"]');
            var productCount = 1;

            if ($('[data-single-poduct-id]').attr('data-single-poduct-id') == productId)
            {
                productCount = parseInt($('[data-single-poduct-id]').find('[data-product-count]').val());
                if (productCount < 1)
                {
                    productCount = 1;
                }
            }

            if (isInCart == 'false')
            {
                $(this).attr('data-in-cart', true)
                    .text(InCart)
                    .removeClass('le-button')
                    .addClass('le-button-active');
                
                $addToCartBtn.attr('data-in-cart', true)
                    .text(InCart)
                    .removeClass('le-button')
                    .addClass('le-button-active');
                ctx.cartFunctions.addToCart(productId, productCount);
            }
            else
            {
                ctx.cartFunctions.showBigCart();
            }
        });

        //click on delete from cart button
        $body.on('click', elems.deleteFromCartBtn, function (e) {
            var productId = $(this).closest('[data-cart-product-id]').attr('data-cart-product-id');

            ctx.cartFunctions.deleteFromCart(productId);

            if ($('#addto-cart').length > 0)
            {
                $('[data-add-to-cart="' + productId + '"]').attr('data-in-cart', false)
                    .text(ADD_TO_CART_PRODUCT)
                    .removeClass('le-button-active')
                    .addClass('le-button');
            }
            else
            {
                $('[data-add-to-cart="' + productId + '"]').attr('data-in-cart', false)
                    .text(AddToCart)
                    .removeClass('le-button-active')
                    .addClass('le-button');
            }



            // $('[data-cart-product-id="' + productId + '"]').slideUp();

            $('[data-product-count="' + productId + '"]').val(1);
        });

        // click on open big cart btn
        $body.on('click', elems.bigCart.openBigCartBtn, function (e) {
            ctx.cartFunctions.showBigCart();
        });

        //click on open mini cart btn
        $body.on('click', elems.miniCart.openMiniCartBtn, function (e) {
            if ($('[data-cart-total-count]').text() == 0)
            {
                e.preventDefault();
                e.stopPropagation();
            }
        });

        //click on decrement btn
        $body.on('click', '[data-cart-minus]', function (e) {
            e.preventDefault();
            var productId = $(this).siblings('[data-product-count]').attr('data-product-count');
            var $productCountElem = $('[data-product-count="' + productId + '"]');
            var currentCount = parseInt($productCountElem.val());
            var productCount = currentCount - 1;
            if (productCount < 1)
            {
                productCount = 1;
            }

            $productCountElem.val(productCount);

            $('[data-order-product-count="' + productId + '"]').text(productCount);

            if ($('[data-cart-product-id="' + productId +'"]').length > 0)
            {
                if (!IS_DATA_PROCESSING && currentCount > 1){
                    if (timer) {
                        clearTimeout(timer);
                        timer = undefined;
                    }
                    timer = setTimeout(function () {
                        ctx.cartFunctions.updateCart(productId, productCount);
                    }, 400);
                }
            }
            else
            {
                ctx.cartFunctions.initSingleProductSum(productId, productCount);
            }
        });


        //click on increment btn
        $body.on('click', '[data-cart-plus]', function (e) {
            e.preventDefault();
            var productId = $(this).siblings('[data-product-count]').attr('data-product-count');
            var $productCountElem = $('[data-product-count="' + productId + '"]');
            var currentCount = parseInt($productCountElem.val());
            var productCount = currentCount + 1;
            $productCountElem.val(productCount);

            $('[data-order-product-count="' + productId + '"]').text(productCount);

            if ($('[data-cart-product-id="' + productId +'"]').length > 0)
            {
                if (!IS_DATA_PROCESSING){
                    if (timer) {
                        clearTimeout(timer);
                        timer = undefined;
                    }
                    timer = setTimeout(function () {

                        ctx.cartFunctions.updateCart(productId, productCount);

                    }, 400);
                }
            }
            else
            {
                ctx.cartFunctions.initSingleProductSum(productId, productCount);
            }
        });

    };

    //launcher
    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
        ctx.cartFunctions.initCart();
    };

    ctx.launch();
}

// (new Cart()).onInit(Launch);

// $(window).load(function () {
//
// });


new Cart();

$(document).ready(function()
{
});