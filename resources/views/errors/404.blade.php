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
                                {{--HOME LINK--}}
                                <li class="breadcrumb-item">
                                    <a href="{{ url_home($model->language) }}">{{ trans('layout.breadcrumb_home') }}</a>
                                </li>

                                {{--CURRENT CATEGORY--}}
                                <li class="dropdown breadcrumb-item current">
                                    <a>{{ trans('layout.page_not_found') }}</a>
                                </li><!-- /.breadcrumb-item -->
                            </ul>
                        </li><!-- /.breadcrumb-nav-holder -->
                    </ul><!-- /.inline -->
                </nav>

            </div><!-- /.container -->
        </div><!-- /#top-mega-nav -->
        <!-- ========================================= BREADCRUMB : END ========================================= -->
    </div>
    <main id="faq" class="inner error-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 center-block">
                    <div class="info-404 text-center">
                        <h2 class="primary-color inner-bottom-xs">404</h2>
                        <p class="lead">{{ trans('layout.page_not_found') }}</p>
                        <div class="text-center">
                            <a href="{{ url_home($model->language) }}" class="btn-lg huge"><i class="fa fa-home"></i>{{ trans('layout.go_home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection