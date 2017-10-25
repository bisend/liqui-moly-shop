<!-- ============================================================= TOP NAVIGATION ============================================================= -->

@include('partial.top-bar.mobile-menu-categories')

<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin left-side">
            <div class="mobile_nav">
                <a class="open-nav"
                   href="javascript:void(0);"
                   data-menu-open-link>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </div>
            <a class="phone-coll-mobile">
                <i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
            </a>
            <ul class="top-header-about-info">
                <li>
                    <a href="{{ url_delivery_payments($model->language) }}">
                        {{ trans('header.delivery_payments') }}
                    </a>
                </li>
                <li>
                    <a href="{{ url_guarantees($model->language) }}">
                        {{ trans('header.guarantees') }}
                    </a>
                </li>
                <li>
                    <a href="{{ url_about($model->language) }}">
                        {{ trans('header.about') }}
                    </a>
                </li>
                <li>
                    <a href="{{ url_contact($model->language) }}">
                        {{ trans('header.contact') }}
                    </a>
                </li>

            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-6 no-margin right-side">
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