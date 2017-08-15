<!-- ============================================================= HEADER ============================================================= -->

<header class="no-padding-bottom header-alt">
    <div class="container no-padding">
        <div class="col-xs-12 col-md-4 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo">
                <a href="{{ url_home($model->language) }}">
                    <img src="/img/logo.png">
                    <ul>
                        <li>МОТОРНІ ОЛИВИ</li>
                        <li>ПРИСАДКИ</li>
                        <li>АВТОКОСМЕТИКА</li>
                    </ul>
                </a>
            </div><!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= -->
        </div><!-- /.logo-holder -->

        <div class="col-xs-12 col-md-5 top-search-holder no-margin">
            <div class="contact-row">
                <div class="phone inline">
                    <i class="fa fa-phone"></i> (+800) 123 456 7890
                </div>
                <div class="contact inline">
                    <i class="fa fa-envelope"></i> info@<span class="le-color">liquimoly.com</span>
                </div>
                <div class="order-a-calll inline">

                    <a data-toggle="modal" data-target="#ModalCall">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>Замовити дзвінок</span>
                    </a>

                </div>
            </div><!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->

            <form class="search-form">
                <input class="search-field" placeholder="Пошук..." />
                <a class="search-form-btn" href="">Пошук</a>
                <!-- <a class="search-form-btn-close" href=""><i class="fa fa-times" aria-hidden="true"></i></a> -->
            </form>

            {{--SEARCH RESULT CONTAINER BEGIN--}}
            {{--<div class="result_search">--}}
                {{--<div class="empty-search">--}}
                    {{--<b>По вашому запиту результати відсутні</b>--}}
                {{--</div>--}}
                {{--<div class="search-result-products">--}}
                    {{--<div class="product-item product-item-holder">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-12 col-sm-3 image-holder">--}}
                                {{--<div class="image">--}}
                                    {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/product-01.jpg" />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="no-margin col-xs-12 col-sm-5 body-holder">--}}
                                {{--<div class="body">--}}
                                    {{--<div class="title">--}}
                                        {{--<a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="no-margin col-xs-12 col-sm-3 price-area">--}}
                                {{--<div class="right-clmn">--}}
                                    {{--<div class="price-current">1199.00 грн</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="product-item product-item-holder">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-12 col-sm-3 image-holder">--}}
                                {{--<div class="image">--}}
                                    {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/product-01.jpg" />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="no-margin col-xs-12 col-sm-5 body-holder">--}}
                                {{--<div class="body">--}}
                                    {{--<div class="title">--}}
                                        {{--<a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="no-margin col-xs-12 col-sm-3 price-area">--}}
                                {{--<div class="right-clmn">--}}
                                    {{--<div class="price-current">1199.00 грн</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="seeAllSearchProduct">--}}
                        {{--<a href="" class="seeAllProdSearch">Переглянути усі результати пошуку</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--SEARCH RESULT CONTAINER END--}}
            <!-- ============================================================= SEARCH AREA : END ============================================================= -->

        </div><!-- /.top-search-holder -->

        <div class="col-xs-12 col-md-3 top-cart-row no-margin">
            <div class="top-cart-row-container">
                {{--<div class="wishlist-compare-holder">--}}
                    {{--<div class="wishlist ">--}}
                        {{--<a href="#"><i class="fa fa-heart"></i> Закладки <span class="value">(21)</span> </a>--}}
                    {{--</div>--}}
                    {{--<div class="compare">--}}
                        {{--<a href="#"><i class="fa fa-exchange"></i> Порівняння <span class="value">(2)</span> </a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="wish-block dropdown animate-dropdown">
                    <div class="wish-basket">
                        <a data-toggle="dropdown" href="">
                            <div class="wish-block-img">
                                <span class="count">3</span>
                                <img src="/img/heart2.png">
                            </div>
                        </a>
                        {{--wish drpdwn--}}
                        <div class="dropdown-menu">
                            <ul class="dropdown-menu-list">
                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"><a href="">PAG AIR CONDITIONING OIL 100</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"><a href="">PAG AIR CONDITIONING OIL</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"> <a href="">Blueberry</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"> <a href="">Blueberry</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>



                            </ul>
                            <div class="checkout">
                                <div class="basket-item">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 no-margin basket-btn">
                                            <a href="checkout.html" class="le-button">Переглянути</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <div class="top-cart-holder dropdown animate-dropdown">
                    <div class="basket">

                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <div class="basket-item-count">
                                <span class="count">3</span>
                                <img src="/img/icon-cart.png" alt="" />
                            </div>

                            <div class="total-price-basket">
                                <span class="lbl">Ваш кошик:</span>
						                    <span class="total-price">
						                        <span class="value">3219,00</span><span class="sign">грн</span>
						                    </span>
                            </div>
                        </a>
                        {{--cart drpdwn--}}
                        <div class="dropdown-menu">
                            <ul class="dropdown-menu-list">
                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"><a href="">PAG AIR CONDITIONING OIL 100 R-1234 YF</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"><a href="">PAG AIR CONDITIONING OIL 100 R-1234 YF</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"> <a href="">Blueberry</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <a href="">
                                                        <img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8">
                                                <div class="title"> <a href="">Blueberry</a></div>
                                                <div class="price">$270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>



                            </ul>
                            <div class="checkout">

                                <div class="basket-item">
                                    <div class="row dropdown-total-count">
                                        <div class="col-md-6 no-margin-left">
                                            Кількісь : <span>5</span>
                                        </div>

                                        <div class="col-md-6 no-margin-right dropdown-total-price">
                                            Сума : <span>1000</span> грн
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 no-margin-left">
                                            <a href="cart.html" class="le-button inverse">Відкрити кошик</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 no-margin-right">
                                            <a href="checkout.html" class="le-button">Оформити</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.basket -->
                </div><!-- /.top-cart-holder -->
            </div><!-- /.top-cart-row-container -->
            <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->
        </div><!-- /.top-cart-row -->
    </div><!-- /.container -->

    <!-- ========================================= NAVIGATION ========================================= -->
    <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
        <div class="container">
            <div class="yamm navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div><!-- /.navbar-header -->

                @include('partial.header.categories-menu')

            </div><!-- /.navbar -->
        </div><!-- /.container -->
    </nav><!-- /.megamenu-vertical -->
    <!-- ========================================= NAVIGATION : END ========================================= -->
</header>
<!-- ============================================================= HEADER : END ============================================================= -->