@if($model->currentCategory->parentCategory != null || $model->currentCategory->childCategories->count() > 0)
    <div class="widget accordion-widget category-accordions">

        @if($model->currentCategory->parentCategory == null)
            {{--IF 1 LVL CATEGORY--}}
            <h2 class="border">{{ $model->currentCategory->name }}</h2>
        @elseif($model->currentCategory->parentCategory->parentCategory == null)
            {{--IF 2 LVL CATEGORY--}}
            <h2 class="border">{{ $model->currentCategory->parentCategory->name }}</h2>
        @elseif($model->currentCategory->parentCategory->parentCategory->parentCategory == null)
            {{--IF 3 LVL CATEGORY--}}
            <h2 class="border">{{ $model->currentCategory->parentCategory->parentCategory->name }}</h2>
        @endif

        <div class="accordion">

            @php($counter = 1)

            @if($model->currentCategory->parentCategory == null)
                {{--IF 1 LVL CATEGORY--}}
                @foreach($model->currentCategory->childCategories as $childCategory)
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            {{--<a class="accordion-toggle" data-toggle="collapse" href="#collapseOne{{ $counter }}">--}}
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseOne{{ $counter }}">
                                {{ $childCategory->name }}
                            </a>
                        </div>
                        {{--<div id="collapseOne{{ $counter }}" class="accordion-body collapse in">--}}
                        <div id="collapseOne{{ $counter }}" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <ul>
                                    @foreach($childCategory->childCategories as $child)
                                        <li>
                                            <a href="{{ url_category($child->name_slug, $model->language) }}">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.accordion-inner -->
                        </div>
                    </div><!-- /.accordion-group -->
                    @php($counter++)
                @endforeach

            {{--IF 2 LVL CATEGORY--}}
            @elseif($model->currentCategory->parentCategory->parentCategory == null)
                @foreach($model->currentCategory->parentCategory->childCategories as $childCategory)
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            {{--<a class="accordion-toggle" data-toggle="collapse" href="#collapseOne{{ $counter }}">--}}
                            <a class="accordion-toggle {{ $model->currentCategory->name_slug == $childCategory->name_slug ? '' : 'collapsed' }}"
                               data-toggle="collapse"
                               href="#collapseOne{{ $counter }}">
                                {{ $childCategory->name }}
                            </a>
                        </div>
                        {{--<div id="collapseOne{{ $counter }}" class="accordion-body collapse in">--}}
                        <div id="collapseOne{{ $counter }}" class="accordion-body collapse {{ $model->currentCategory->name_slug == $childCategory->name_slug ? 'in' : '' }}">
                            <div class="accordion-inner">
                                <ul>
                                    @foreach($childCategory->childCategories as $child)
                                        <li>
                                            <a href="{{ url_category($child->name_slug, $model->language) }}">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.accordion-inner -->
                        </div>
                    </div><!-- /.accordion-group -->
                    @php($counter++)
                @endforeach

            {{--IF 3 LVL CATEGORY--}}
            @elseif($model->currentCategory->parentCategory->parentCategory->parentCategory == null)
                @foreach($model->currentCategory->parentCategory->parentCategory->childCategories as $childCategory)
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            {{--<a class="accordion-toggle" data-toggle="collapse" href="#collapseOne{{ $counter }}">--}}
                            <a class="accordion-toggle {{ $model->currentCategory->parentCategory->name_slug == $childCategory->name_slug ? '' : 'collapsed' }}"
                               data-toggle="collapse"
                               href="#collapseOne{{ $counter }}">
                                {{ $childCategory->name }}
                            </a>
                        </div>
                        {{--<div id="collapseOne{{ $counter }}" class="accordion-body collapse in">--}}
                        <div id="collapseOne{{ $counter }}"
                             class="accordion-body collapse {{ $model->currentCategory->parentCategory->name_slug == $childCategory->name_slug ? 'in' : '' }}">
                            <div class="accordion-inner">
                                <ul>
                                    @foreach($childCategory->childCategories as $child)
                                        <li>
                                            @if($model->currentCategory->name_slug == $child->name_slug)
                                                {{-- TODO not inline style add class--}}
                                                <a style="color: #ed1c24;">
                                                    {{ $child->name }}
                                                </a>
                                            @else
                                                <a href="{{ url_category($child->name_slug, $model->language) }}">
                                                    {{ $child->name }}
                                                </a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.accordion-inner -->
                        </div>
                    </div><!-- /.accordion-group -->
                    @php($counter++)
                @endforeach
            @endif

        </div><!-- /.accordion -->
    </div><!-- /.category-accordions -->
@endif