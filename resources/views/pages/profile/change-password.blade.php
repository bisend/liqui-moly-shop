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
                                    <a href="{{ url_home($model->language) }}">{{ trans('layout.breadcrumb_home') }}</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item">
                                    <a>{{ trans('layout.breadcrumb_profile') }}</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item current">
                                    <a>{{ trans('layout.change_password') }}</a>
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
                                {{ trans('layout.personal_info') }}
                            </a>
                        </li>
                        <li role="presentation" class="active">
                            <a>
                                {{ trans('layout.change_password') }}
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_my_orders($model->language) }}">{{ trans('layout.my_orders') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_wish_list($model->language) }}">{{ trans('layout.wish_list') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0);" data-action-logout>
                                {{ trans('layout.exit') }}
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="login-box">
                        <div class="login-box-title">
                            {{ trans('layout.change_password') }}
                        </div>
                        <form class="form-horizontal" role="form">
                            <div class="form-group">

                                <div class="col-sm-4">
                                    <input type="password"
                                           class="form-control"
                                           id="inputEmail3"
                                           data-change-password-old
                                           placeholder="{{ trans('change-password.old_password') }}">
                                </div>



                                <div class="col-sm-4">
                                    <input type="password"
                                           class="form-control"
                                           id="inputEmail3"
                                           data-change-password-new
                                           placeholder="{{ trans('change-password.new_password') }}">
                                </div>



                                <div class="col-sm-4">
                                    <input type="password"
                                           class="form-control"
                                           id="inputPassword3"
                                           data-change-password-repeat
                                           placeholder="{{ trans('change-password.repeat_new_password') }}">
                                </div>



                                <div class="col-sm-12">
                                    <button type="submit"
                                            data-change-password-submit
                                            class="le-button">
                                        {{ trans('change-password.save') }}
                                    </button>
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