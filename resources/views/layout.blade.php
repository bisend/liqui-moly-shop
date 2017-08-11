{{--{{ dd($model) }}--}}
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <!--Meta with title BEGIN-->
    @include('partial.layout.head-meta')
    <!--Meta with title END-->

    <!--Head CSS and JS BEGIN-->
    @include('partial.layout.head-css-js')
    <!--Head CSS and JS END-->
</head>
<body>
    {{--Modals BEGIN--}}
    @include('partial.modals.big-cart')
    @include('partial.modals.login')
    @include('partial.modals.restore-password')
    @include('partial.modals.call')
    @include('partial.modals.register')
    {{--Modals END--}}

    <div class="wrapper">

        {{--Top bar BEGIN--}}
        @include('partial.layout.top-bar')
        {{--Top bar END--}}

        {{--Header BEGIN--}}
        @include('partial.layout.header')
        {{--Header END--}}

        {{--Content BEGIN--}}
        @yield('content')
        {{--Content END--}}

        {{--Footer BEGIN--}}
        @if($model->view == 'home')
            @include('partial.layout.home-footer')
        @else
            @include('partial.layout.footer')
        @endif
        {{--Footer END--}}

    </div><!-- /.wrapper -->

    {{--JS BEGIN--}}
    @include('partial.layout.body-js')
    {{--JS END--}}
{{--{{ \Debugbar::disable() }}--}}
</body>
</html>