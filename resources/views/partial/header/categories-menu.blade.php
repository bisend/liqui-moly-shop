<div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
    <ul class="nav navbar-nav">
        @foreach($model->allCategories as $category)
            <li class="dropdown yamm-fw">
                @if(count($category->childCategories) > 0)
                    <a href="{{ url_category($category->name_slug, $model->language) }}"
                       class="dropdown-toggle"
                       data-hover="dropdown">{{ $category->name }}</a>

                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">

                                    @foreach($category->childCategories as $childCategory)
                                        <div class="col-xs-12 col-sm-4">
                                            <h2><a href="{{ url_category($childCategory->name_slug, $model->language) }}">
                                                    {{ $childCategory->name }}
                                                </a>
                                            </h2>
                                            <ul>
                                                @foreach($childCategory->childCategories as $child)
                                                    <li>
                                                        <a href="{{ url_category($child->name_slug, $model->language) }}">
                                                            {{ $child->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div><!-- /.col -->
                                    @endforeach

                                </div><!-- /.row -->
                            </div><!-- /.yamm-content -->
                        </li>
                    </ul>
                @else
                    <a href="{{ url_category($category->name_slug, $model->language) }}" >
                        {{ $category->name }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul><!-- /.navbar-nav -->
</div><!-- /.navbar-collapse -->