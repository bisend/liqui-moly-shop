<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="color-bg">
    <div class="container">
        <div class="row no-margin widgets-row">
            <div class="col-xs-12  col-sm-4 no-margin-left">
                <!-- ============================================================= FEATURED PRODUCTS ============================================================= -->
                @include('partial.footer.recommended-products')
                <!-- ============================================================= FEATURED PRODUCTS : END ============================================================= -->
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                <!-- ============================================================= ON SALE PRODUCTS ============================================================= -->
                @include('partial.footer.best-discounts')
                <!-- ============================================================= ON SALE PRODUCTS : END ============================================================= -->
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                <!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
                @include('partial.footer.popular-products')
                <!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->
            </div><!-- /.col -->
        </div><!-- /.widgets-row-->
    </div><!-- /.container -->



    <div class="link-list-row footer-parallax">

        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">
                <!-- ============================================================= CONTACT INFO ============================================================= -->
                <div class="contact-info">
                    <div class="logo">
                        <a href="{{ url_home($model->language) }}">
                            <img src="/img/logo.png">

                            <ul>
                                <li>{{ trans('footer.logo_name_1') }}</li>
                                <li>{{ trans('footer.logo_name_2') }}</li>
                                <li>{{ trans('footer.logo_name_3') }}</li>
                            </ul>
                        </a>
                    </div><!-- /.logo -->

                    <p class="regular-bold">
                        {{ trans('footer.company_description') }}
                    </p>


                </div>
                <!-- ============================================================= CONTACT INFO : END ============================================================= -->
            </div>

            <div class="col-xs-12 col-md-4">
                <p class="grafworkTitle grafworkTitle-no-margin">{{ trans('header.contact') }} </p>
                <ul class="footer-contacts-adress">
                    <li><i class="fa fa-phone"></i> (+800) 123 456 7890</li>
                    <li><i class="fa fa-envelope"></i> info@<span class="le-color">liquimoly.com</span></li>
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        {{ trans('footer.address') }}
                    </li>
                </ul>
            </div>

            <div class="col-xs-12 col-md-2">
                <p class="grafworkTitle grafworkTitle-no-margin">Графік роботи </p>
                <ul class="grafWork">
                    <li>{{ trans('footer.work1') }}</li>
                    <li>{{ trans('footer.work2') }}</li>
                    <li>{{ trans('footer.work3') }}</li>

                </ul>
            </div>

            <div class="col-xs-12 col-md-2">
                <p class="grafworkTitle grafworkTitle-no-margin">{{ trans('header.about') }}</p>
                <ul class="grafWork">
                    <li>
                        <a class="footer-a" href="{{ url_delivery_payments($model->language) }}">
                            {{ trans('header.delivery_payments') }}
                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a class="footer-a" href="{{ url_guarantees($model->language) }}">--}}
                            {{--{{ trans('header.guarantees') }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li>
                        <a class="footer-a" href="{{ url_about($model->language) }}">
                            {{ trans('header.about') }}
                        </a>
                    </li>
                    <li>
                        <a class="footer-a" href="{{ url_contact($model->language) }}">
                            {{ trans('header.contact') }}
                        </a>
                    </li>

                </ul>
            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    {{ trans('footer.rights_reserved') }}
                    &copy;
                    {{ date("Y") }}
                </div><!-- /.copyright -->
            </div>
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="payment-methods ">
                    {{ trans('footer.development') }} :
                    <a href="http://goldfish-web.com" target="_blank">Web-Studio Gold Fish</a>
                </div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->
</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->