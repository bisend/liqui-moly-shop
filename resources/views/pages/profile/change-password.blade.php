@extends('layout')

@section('content')
    <div class="animate-dropdown">
        <!-- ========================================= BREADCRUMB ========================================= -->
        <div id="top-mega-nav">
            <div class="container">
                <nav>
                    <ul class="inline">
                        <li class="breadcrumb-nav-holder">
                            <ul>
                                <li class="dropdown breadcrumb-item">
                                    <a href="{{ url_home($model->language) }}">Головна</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item">
                                    <a>Особистий кабінет</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item current">
                                    <a>Зміна пароля</a>
                                </li><!-- /.breadcrumb-item -->
                            </ul>
                        </li><!-- /.breadcrumb-nav-holder -->

                    </ul><!-- /.inline -->
                </nav>

            </div><!-- /.container -->
        </div><!-- /#top-mega-nav -->
        <!-- ========================================= BREADCRUMB : END ========================================= -->
    </div>


    <div class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation">
                            <a href="{{ url_personal_info($model->language) }}">
                                Особисті дані
                            </a>
                        </li>
                        <li role="presentation" class="active">
                            <a>
                                Зміна пароля
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_my_orders($model->language) }}">Мої замовлення</a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_wish_list($model->language) }}">Список бажань</a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0);" data-action-logout>
                                Вихід
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="login-box">
                        <div class="login-box-title">
                            Зміна пароля
                        </div>
                        <form class="form-horizontal" role="form">
                            <div class="form-group">

                                <div class="col-sm-4">
                                    <input type="password"
                                           class="form-control"
                                           id="inputEmail3"
                                           data-change-password-old
                                           placeholder="Старий пароль">
                                </div>



                                <div class="col-sm-4">
                                    <input type="password"
                                           class="form-control"
                                           id="inputEmail3"
                                           data-change-password-new
                                           placeholder="Новий пароль">
                                </div>



                                <div class="col-sm-4">
                                    <input type="password"
                                           class="form-control"
                                           id="inputPassword3"
                                           data-change-password-repeat
                                           placeholder="Повторіть новий пароль">
                                </div>



                                <div class="col-sm-12">
                                    <button type="submit"
                                            data-change-password-submit
                                            class="le-button">Зберегти</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script defer src="/js/profile/change-password.js"></script>
@endpush