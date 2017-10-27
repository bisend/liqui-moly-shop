var WISH_LIST_PAGE = 1;
function WishList() {
    var ctx = this,
        $body = $('body'),
        elems = {
            wishList: {
                addToWishList: '[data-add-to-wish-list]',
                deleteFromWishList: '[data-delete-from-wish-list]',
                wishListTotalCount: '[data-wish-list-mini-total-count]',
                wishListOpenBtn: '[data-open-wish-list-mini]',
                wishListMiniContainer: '[data-wish-list-mini-container]',
                wishListContainer: '[data-wish-list-container]'
            }
        },
        $elems = {
            wishList: {
                addToWishList: $(elems.wishList.addToWishList),
                deleteFromWishList: $(elems.wishList.deleteFromWishList),
                wishListTotalCount: $(elems.wishList.wishListTotalCount),
                wishListOpenBtn: $(elems.wishList.wishListOpenBtn),
                wishListMiniContainer: $(elems.wishList.wishListMiniContainer),
                wishListContainer: $(elems.wishList.wishListContainer)
            }
        },
        vars = {
            wishList: {
                isDataProcessing: false
            }
        };
    
    var initWishList,
        addToWishList,
        deleteFromWishList,
        initButtons,
        initAjaxWishView;
    
    ctx.init = function () {
        initButtons = function (inWishIds) {
            $.each(inWishIds, function (i, productId) {
                $('[data-add-to-wish-list="' + productId + '"]').text(IN_WISH).attr('data-in-wish-list', 'true')
                    .removeClass('btn-add-to-wishlist')
                    .addClass('btn-add-to-wish-list-active');
            });
        };

        initWishList = function (productId) {
            WISH_W_S = new WaitSync(function () {
                $.ajax({
                    type: 'post',
                    url: '/profile/init-wish-list',
                    data: {
                        productId: productId,
                        language: LANGUAGE
                    },
                    success: CART_W_S.wrap(
                        'initWish',
                        function (data)
                        {
                            if (data.status == 'success' && data.inWishIds)
                            {
                                initButtons(data.inWishIds);
                            }

                            if (IS_USER_AUTH)
                            {
                                $elems.wishList.wishListTotalCount.text(data.wishListTotalCount);
                                $elems.wishList.wishListMiniContainer.html(data.miniWishListView);
                            }
                        }
                    ),
                    error: CART_W_S.wrap(
                        'initWish',
                        function (error)
                        {

                        }
                    )
                });
            });
        };

        addToWishList = function (productId) {
            if (vars.wishList.isDataProcessing)
            {
                return false;
            }

            vars.wishList.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/profile/add-to-wish-list-product',
                data: {
                    productId: productId,
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.wishList.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        $('[data-add-to-wish-list="' + productId + '"]').text(IN_WISH)
                            .removeClass('btn-add-to-wishlist')
                            .addClass('btn-add-to-wish-list-active');

                        $elems.wishList.wishListTotalCount.text(data.wishListTotalCount);

                        $elems.wishList.wishListMiniContainer.html(data.miniWishListView);
                    }
                },
                error: function (error) {
                    vars.wishList.isDataProcessing = false;

                    hideLoader();

                    showPopup(ServerError);
                }
            });
        };


        deleteFromWishList = function (wishListProductId, page, productId) {
            if (vars.wishList.isDataProcessing)
            {
                return false;
            }

            vars.wishList.isDataProcessing = true;

            showLoader();
            
            $.ajax({
                type: 'post',
                url: '/profile/delete-wish-list-product',
                data: {
                    wishListProductId: wishListProductId,
                    page: page,
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.wishList.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        if ($('#add-to-wish').length > 0)
                        {
                            $('[data-add-to-wish-list="' + productId + '"]').text(ADD_TO_WISH_PRODUCT)
                                .attr('data-in-wish-list', 'false')
                                .removeClass('btn-add-to-wish-list-active')
                                .addClass('btn-add-to-wishlist');
                        }
                        else
                        {
                            $('[data-add-to-wish-list="' + productId + '"]').text(ADD_TO_WISH)
                                .attr('data-in-wish-list', 'false')
                                .removeClass('btn-add-to-wish-list-active')
                                .addClass('btn-add-to-wishlist');
                        }

                        $elems.wishList.wishListTotalCount.text(data.wishListTotalCount);

                        $elems.wishList.wishListMiniContainer.html(data.miniWishListView);

                        $elems.wishList.wishListContainer.html(data.bigWishListView);
                    }
                },
                error: function (error) {
                    vars.wishList.isDataProcessing = false;

                    hideLoader();

                    showPopup(ServerError);
                }
            });
        };

        initAjaxWishView = function (page) {
            if (vars.wishList.isDataProcessing)
            {
                return false;
            }

            vars.wishList.isDataProcessing = true;

            showLoader();

            $.ajax({
                type: 'post',
                url: '/profile/init-wish-list-view',
                data: {
                    page: page,
                    language: LANGUAGE
                },
                success: function (data) {
                    vars.wishList.isDataProcessing = false;

                    hideLoader();

                    if (data.status == 'success')
                    {
                        // location.reload();
                        $elems.wishList.wishListContainer.html(data.bigWishListView);
                    }
                },
                error: function (error) {
                    vars.wishList.isDataProcessing = false;

                    hideLoader();

                    showPopup(ServerError);
                }

            });
        };
    };
    
    ctx.subscribe = function () {
        $('body').on('click', '[data-wish-list-pagination]', function (e) {
            e.preventDefault();
            e.stopPropagation();

            WISH_LIST_PAGE = $(this).attr('data-wish-list-pagination');

            initAjaxWishView(WISH_LIST_PAGE);

            // alert(WISH_LIST_PAGE);
            // setProfileContent('orders');
        });
        
        $body.on('click', elems.wishList.addToWishList, function (e) {

            if (IS_USER_AUTH)
            {
                var productId = $(this).attr('data-add-to-wish-list');

                if ($(this).attr('data-in-wish-list') == 'false')
                {
                    addToWishList(productId);

                    $(this).attr('data-in-wish-list', 'true');
                }
                else {
                    window.location.href = buildUrlWithLang('/profile/wish-list/');
                }
            }
            else
            {
                $('#ModalLogin').modal();
            }
        });
        
        $body.on('click', elems.wishList.deleteFromWishList, function (e) {
            var wishListProductId = $(this).attr('data-delete-from-wish-list');
            var productId = $(this).attr('data-delete-from-wish-list-product-id');
            deleteFromWishList(wishListProductId, WISH_LIST_PAGE, productId);
        });

        $body.on('click', elems.wishList.wishListOpenBtn, function (e) {
            if ($elems.wishList.wishListTotalCount.text() == '0')
            {
                e.preventDefault();
                e.stopPropagation();
            }
        });
    };
    
    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
        initWishList();
    };
    
    ctx.launch();
}

new WishList();
$(document).ready(function () {
});