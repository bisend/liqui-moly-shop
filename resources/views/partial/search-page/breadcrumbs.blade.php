<li class="breadcrumb-nav-holder">
    <ul>
        {{--HOME LINK--}}
        <li class="breadcrumb-item">
            <a href="{{ url_home($model->language) }}">
                {{ trans('layout.breadcrumb_home') }}
            </a>
        </li>

        {{--SEARCH--}}
        <li class="breadcrumb-item">
            <a>
                {{ trans('layout.breadcrumb_search') }}
            </a>
        </li>

        {{--CURRENT SEARCH PRODUCT--}}
        <li class="breadcrumb-item current">
            <a>"{{ $model->seriesTitle }}"</a>
        </li>
    </ul>
</li><!-- /.breadcrumb-nav-holder -->