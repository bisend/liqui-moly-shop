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



    <div class="link-list-row">
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

                    <ul class="footer-contacts-adress">
                        <li><i class="fa fa-phone"></i> (+800) 123 456 7890</li>
                        <li><i class="fa fa-envelope"></i> info@<span class="le-color">liquimoly.com</span></li>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{ trans('footer.address') }}
                        </li>
                    </ul>

                    <p class="grafworkTitle">{{ trans('footer.work_schedule') }} :</p>
                    <ul class="grafWork">
                        <li>{{ trans('footer.work1') }}</li>
                        <li>{{ trans('footer.work2') }}</li>
                        <li>{{ trans('footer.work3') }}</li>

                    </ul>

                </div>
                <!-- ============================================================= CONTACT INFO : END ============================================================= -->
            </div>

            <div class="col-xs-12 col-md-8 no-margin">
                <div class="googlemapsMoly">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.875750041383!2d26.274598715366114!3d50.6108462794978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472f13689324753f%3A0x1429d8fcff8fd36a!2sLIQUI+MOLY!5e0!3m2!1suk!2sua!4v1500730334506" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
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