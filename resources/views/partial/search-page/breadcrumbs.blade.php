<li class="breadcrumb-nav-holder">
    <ul>
        {{--HOME LINK--}}
        <li class="breadcrumb-item">
            <a href="{{ url_home($model->language) }}">Головна</a>
        </li>

        {{--SEARCH--}}
        <li class="breadcrumb-item">
            <a>Пошук</a>
        </li>

        {{--CURRENT SEARCH PRODUCT--}}
        <li class="breadcrumb-item current">
            <a>"{{ $model->seriesTitle }}"</a>
        </li>
    </ul>
</li><!-- /.breadcrumb-nav-holder -->