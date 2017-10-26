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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="font-size: 192px; height: 192px">404</h1>
                </div>
            </div>
        </div>
@endsection