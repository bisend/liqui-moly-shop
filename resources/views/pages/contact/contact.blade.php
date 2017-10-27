@extends('layout')

@section('content')
    <main id="contact-us" class="inner-bottom-md contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 contact-page-contact-info">
                    <section class="section leave-a-message">
                        <h1 class="bordered">Контакти</h1>

                            <ul class="footer-contacts-adress contact-page-inform">
                                <li><i class="fa fa-phone"></i> (+800) 123 456 7890</li>
                                <li><i class="fa fa-envelope"></i> info@<span class="le-color">liquimoly.com</span></li>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Рівне, вулиця Відінська, 9А, 33000
                                </li>
                            </ul>

                        <h2 class="bordered">Написати лист</h2>
                        <form id="contact-form" class="contact-form contact-form-page" method="post" >
                            <div class="row field-row">
                                <div class="col-xs-12 col-sm-6">
                                    <input class="form-control" placeholder="Електронна адреса">
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <input class="form-control" placeholder="Ім'я">
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <textarea class="form-control" placeholder="Повідомлення"></textarea>
                                </div>
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button type="submit" class="le-button huge">Відправити</button>
                            </div><!-- /.buttons-holder -->
                        </form><!-- /.contact-form -->
                    </section><!-- /.leave-a-message -->
                </div><!-- /.col -->

                <div class="col-md-6 contact-page-map">
                    <h2 class="bordered">Як нас найти?</h2>
                    <div class="googlemapsMoly">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.875750041383!2d26.274598715366114!3d50.6108462794978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472f13689324753f%3A0x1429d8fcff8fd36a!2sLIQUI+MOLY!5e0!3m2!1suk!2sua!4v1500730334506" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                </div><!-- /.col -->

            </div><!-- /.row -->

    </main>
@endsection