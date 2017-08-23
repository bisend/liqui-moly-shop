<!-- ============================================================= TOP NAVIGATION ============================================================= -->
<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <li><a href="javascript:void(0);">Доставка та оплата</a></li>
                <li><a href="javascript:void(0);">Гарантії</a></li>
                <li><a href="javascript:void(0);">Про нас</a></li>
                <li><a href="javascript:void(0);">Контакти</a></li>

            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-6 no-margin">
            <ul class="right">
                {{--Languages--}}
                @include('partial.top-bar.languages')

                {{--Auth part--}}
                @if(auth()->check())
                    @include('partial.top-bar.logged')
                @else
                    @include('partial.top-bar.not-logged')
                @endif
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->