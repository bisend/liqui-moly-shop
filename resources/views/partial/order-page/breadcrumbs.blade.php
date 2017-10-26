<li class="breadcrumb-nav-holder">
    <ul>
        {{--HOME LINK--}}
        <li class="breadcrumb-item">
            <a href="{{ url_home($model->language) }}">{{ trans('layout.breadcrumb_home') }}</a>
        </li>

        {{--ORDER--}}
        <li class="breadcrumb-item current">
            <a>{{ trans('layout.breadcrumb_order') }}</a>
        </li>

    </ul>
</li><!-- /.breadcrumb-nav-holder -->