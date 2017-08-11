{{--Layout BEGIN--}}
@extends('layout')
{{--Layout END--}}

@section('content')

    <div id="top-banner-and-menu">
        <div class="container">
            <div class="row no-margin">
                <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">

                    {{--top banner BEGIN--}}
                    @include('partial.home-page.top-banner')
                    {{--top banner END--}}

                    {{--bottom banner BEGIN--}}
                    @include('partial.home-page.bottom-banner')
                    {{--bottom banner END--}}

                </div><!-- /.sidemenu-holder -->

                {{--main slider BEGIN--}}
                @include('partial.home-page.main-slider')
                {{--main slider END--}}
            </div>
        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->


    <div id="products-tab" class="wow fadeInUp">
        <div class="container">
            <div class="tab-holder">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" >
                    <li class="active"><a href="#featured" data-toggle="tab">Топ продаж</a></li>
                    <li><a href="#new-arrivals" data-toggle="tab">Новинки</a></li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="featured">

                        {{--top sales BEGIN--}}
                        @include('partial.home-page.top-sales')
                        {{--top sales END--}}

                    </div>
                    <div class="tab-pane" id="new-arrivals">

                        {{--novelty BEGIN--}}
                        @include('partial.home-page.novelty')
                        {{--novelty END--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================================= BEST SELLERS ========================================= -->

    <section id="bestsellers" class="color-bg wow fadeInUp">

        {{--seasonal goods BEGIN--}}
        @include('partial.home-page.seasonal-goods')
        {{--seasonal goods END--}}

    </section><!-- /#bestsellers -->
    <!-- ========================================= BEST SELLERS : END ========================================= -->

    <!-- ========================================= RECENTLY VIEWED ========================================= -->
        @include('partial.home-page.viewed-products')
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->

@endsection