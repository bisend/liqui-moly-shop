<!-- ============================================================= HEADER ============================================================= -->

<header class="no-padding-bottom header-alt">


    {{--LOADER--}}
    <div class="sk-circle-background" data-big-loader>
        <div class="sk-circle-container">
            <div class="sk-circle">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
            </div>
        </div>
    </div>
    {{--LOADER--}}



    <div class="container no-padding">
        <div class="col-xs-12 col-md-4 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo">
                <a href="{{ url_home($model->language) }}">
                    <img src="/img/logo.png">
                    <ul>
                        <li>{{ trans('header.logo_name_1') }}</li>
                        <li>{{ trans('header.logo_name_2') }}</li>
                        <li>{{ trans('header.logo_name_3') }}</li>
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
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <span>
                            {{ trans('header.order_call') }}
                        </span>
                    </a>

                </div>
            </div><!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->

            <form class="search-form" action="/search/_SERIES_"
                  method="GET"
                  autocomplete="off"
                  accept-charset="UTF-8"
                  data-desktop-search-form>

                <input type="text" class="search-field"
                       placeholder="{{ trans('header.search_placeholder') }}"
                       data-desktop-search-input
                       data-desktop-series-param="_SERIES_">
                {{--<a class="search-form-btn" href="">Пошук</a>--}}
                <button class="search-form-btn" type="submit" data-desktop-search-submit>
                    <span data-desktop-search-text>
                        {{ trans('header.search_btn') }}
                    </span>
                    <div class="sk-fading-circle" data-desktop-search-loader>
                        <div class="sk-circle1 sk-circle"></div>
                        <div class="sk-circle2 sk-circle"></div>
                        <div class="sk-circle3 sk-circle"></div>
                        <div class="sk-circle4 sk-circle"></div>
                        <div class="sk-circle5 sk-circle"></div>
                        <div class="sk-circle6 sk-circle"></div>
                        <div class="sk-circle7 sk-circle"></div>
                        <div class="sk-circle8 sk-circle"></div>
                        <div class="sk-circle9 sk-circle"></div>
                        <div class="sk-circle10 sk-circle"></div>
                        <div class="sk-circle11 sk-circle"></div>
                        <div class="sk-circle12 sk-circle"></div>
                    </div>
                </button>
                <!-- <a class="search-form-btn-close" href=""><i class="fa fa-times" aria-hidden="true"></i></a> -->
            </form>

            {{--SEARCH RESULT CONTAINER BEGIN--}}
            <div class="result_search" data-desktop-async-search-result>

            </div>
            {{--SEARCH RESULT CONTAINER END--}}
            <!-- ============================================================= SEARCH AREA : END ============================================================= -->

        </div><!-- /.top-search-holder -->

        <div class="col-xs-12 col-md-3 top-cart-row no-margin">
            <div class="top-cart-row-container">
                <div class="wish-block dropdown animate-dropdown">
                    <div class="wish-basket">
                        <a data-toggle="dropdown"
                           data-open-wish-list-mini
                           href="javascript:void(0);">
                            <div class="wish-block-img">
                                <span class="count"
                                      data-wish-list-mini-total-count>0</span>
                                <img src="/img/heart2.png">
                            </div>
                        </a>
                        {{--wish drpdwn--}}
                        <div class="dropdown-menu" data-wish-list-mini-container>

                        </div>
                    </div>
                </div>

                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <div class="top-cart-holder dropdown animate-dropdown">
                    <div class="basket">
                        <a class="dropdown-toggle"
                           data-open-mini-cart
                           data-toggle="dropdown"
                           href="javascript:void(0);">
                            <div class="basket-item-count">
                                <span class="count" data-cart-total-count>0</span>
                                <img src="/img/icon-cart.png" alt="" />
                            </div>

                            <div class="total-price-basket">
                                <span class="lbl">
                                    {{ trans('header.your_cart') }}:
                                </span>
                                <span class="total-price">
                                    <span class="value" data-cart-total-sum>0.00</span><span class="sign"> грн</span>
                                </span>
                            </div>
                        </a>
                        {{--cart drpdwn--}}
                        <div class="dropdown-menu" data-mini-cart-container>

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