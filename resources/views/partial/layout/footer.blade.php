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
                                <li>МОТОРНІ ОЛИВИ</li>
                                <li>ПРИСАДКИ</li>
                                <li>АВТОКОСМЕТИКА</li>
                            </ul>
                        </a>
                    </div><!-- /.logo -->
                    <p class="regular-bold">Liqui Moly - німецька компанія, виробник автомобільних масел, смазочних матеріалів та присадок.</p>


                </div>
                <!-- ============================================================= CONTACT INFO : END ============================================================= -->
            </div>

            <div class="col-xs-12 col-md-4">
                <p class="grafworkTitle grafworkTitle-no-margin">Контакти </p>
                <ul class="footer-contacts-adress">
                    <li><i class="fa fa-phone"></i> (+800) 123 456 7890</li>
                    <li><i class="fa fa-envelope"></i> info@<span class="le-color">liquimoly.com</span></li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>
                        Рівне, вулиця Відінська, 9А, 33000
                    </li>
                </ul>
            </div>

            <div class="col-xs-12 col-md-2">
                <p class="grafworkTitle grafworkTitle-no-margin">Графік роботи </p>
                <ul class="grafWork">
                    <li>Пн-Пт: 9:00 - 18:00</li>
                    <li>Субота: вихідний</li>
                    <li>Неділя: вихідний</li>

                </ul>
            </div>

            <div class="col-xs-12 col-md-2">
                <p class="grafworkTitle grafworkTitle-no-margin">Про нас</p>
                <ul class="grafWork">
                    <li><a class="footer-a" href="">Доставка та оплата</a></li>
                    <li><a class="footer-a" href="">Гарантії</a></li>
                    <li><a class="footer-a" href="">Про нас</a></li>
                    <li><a class="footer-a" href="">Контакти</a></li>

                </ul>
            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    LIQUI MOLY - Всі права захищені
                    &copy;
                    2017
                </div><!-- /.copyright -->
            </div>
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="payment-methods ">
                    Розробка та супровід :
                    <a href="http://goldfish-web.com" target="_blank">Web-Studio Gold Fish</a>
                </div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->
</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->