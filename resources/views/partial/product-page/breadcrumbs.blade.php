@if($model->currentCategory->parentCategory)
    @php($parentCategoryFirst = $model->currentCategory->parentCategory)
@endif
@if(isset($parentCategoryFirst) && $parentCategoryFirst->parentCategory)
    @php($parentCategoryLast = $parentCategoryFirst->parentCategory)
@endif
<li class="breadcrumb-nav-holder">
    <ul>
        {{--HOME LINK--}}
        <li class="breadcrumb-item">
            <a href="{{ url_home($model->language) }}">
                {{ trans('layout.breadcrumb_home') }}
            </a>
        </li>

        {{--1 LVL CATEGORY--}}
        @if(isset($parentCategoryLast) && $parentCategoryLast != null)
            <li class="dropdown breadcrumb-item">
                <a href="{{ url_category($parentCategoryLast->name_slug, $model->language) }}"
                   class="dropdown-toggle"
                   data-hover="dropdown">
                    {{ $parentCategoryLast->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        @foreach($parentCategoryLast->childCategories as $childCategory)
                            @if($childCategory->name_slug != $model->currentCategory->name_slug)
                                <a href="{{ url_category($childCategory->name_slug, $model->language) }}">
                                    {{ $childCategory->name }}
                                </a>
                            @endif
                        @endforeach
                    </li>
                </ul>
            </li><!-- /.breadcrumb-item -->
        @endif

        {{--2 LVL CATEGORY--}}
        @if(isset($parentCategoryFirst) && $parentCategoryFirst != null)
            <li class="dropdown breadcrumb-item">
                <a href="{{ url_category($parentCategoryFirst->name_slug, $model->language) }}"
                   class="dropdown-toggle"
                   data-hover="dropdown">
                    {{ $parentCategoryFirst->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        @foreach($parentCategoryFirst->childCategories as $childCategory)
                            @if($childCategory->name_slug != $model->currentCategory->name_slug)
                                <a href="{{ url_category($childCategory->name_slug, $model->language) }}">
                                    {{ $childCategory->name }}
                                </a>
                            @endif
                        @endforeach
                    </li>
                </ul>
            </li><!-- /.breadcrumb-item -->
        @endif

        {{--CURRENT CATEGORY--}}
        <li class="dropdown breadcrumb-item">
            @php($currentCategoryChilds = $model->currentCategory->childCategories)
            @if($currentCategoryChilds->count() > 0)
                <a href="{{ url_category($model->currentCategory->name_slug, $model->language) }}" class="dropdown-toggle" data-hover="dropdown">
                    {{ $model->currentCategory->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        @foreach($currentCategoryChilds as $childCategory)
                            @if($childCategory->name_slug != $model->currentCategory->name_slug)
                                <a href="{{ url_category($childCategory->name_slug, $model->language) }}">
                                    {{ $childCategory->name }}
                                </a>
                            @endif
                        @endforeach
                    </li>
                </ul>
            @else
                <a href="{{ url_category($model->currentCategory->name_slug, $model->language) }}">{{ $model->currentCategory->name }}</a>
            @endif
        </li><!-- /.breadcrumb-item -->

        {{--CURRENT PRODUCT--}}
        <li class="breadcrumb-item current">
            <a>{{ $model->product->name }}</a>
        </li>
    </ul>
</li><!-- /.breadcrumb-nav-holder -->