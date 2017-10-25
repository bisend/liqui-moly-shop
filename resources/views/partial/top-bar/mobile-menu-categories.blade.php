<div id="mySidenav" class="sidenav">
    <div class="nav-header">
        <p>Категорії</p>
        <div class="closebtn" data-menu-close-link>
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
    <div class="nav-slide-body">
        <ul>
            @foreach($model->allCategories as $category)
                <li>
                    @if(count($category->childCategories) > 0)
                        <div class="dropdown-div">
                            <div class="dropdown-div-header">
                                <a href="{{ url_category($category->name_slug, $model->language) }}">
                                    {{ $category->name }}
                                </a>
                                <div class="dropdown-div-btn">
                                    <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="dropdown-div-content">

                                @foreach($category->childCategories as $childCategory)
                                    <div class="dropdown-div-second">
                                        @if(count($childCategory->childCategories) > 0)
                                            <div class="dropdown-div-header-second">
                                                <a href="{{ url_category($childCategory->name_slug, $model->language) }}">
                                                    {{ $childCategory->name }}
                                                </a>
                                                <div class="dropdown-div-btn-second">
                                                    <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="dropdown-div-content-second">
                                                <ul class="dropdown-mob-nav">
                                                    @foreach($childCategory->childCategories as $child)
                                                        <li>
                                                            <a href="{{ url_category($child->name_slug, $model->language) }}">
                                                                {{ $child->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <div class="dropdown-div-header-second">
                                                <a href="{{ url_category($childCategory->name_slug, $model->language) }}">
                                                    {{ $childCategory->name }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ url_category($category->name_slug, $model->language) }}">{{ $category->name }}</a>
                    @endif
                </li>
            @endforeach

            <li>
                <a href="">Доставка і оплата</a>
            </li>
            <li>
                <a href="">Гарантії</a>
            </li>
            <li>
                <a href="">Про нас</a>
            </li>
            <li>
                <a href="">Контакти</a>
            </li>
        </ul>
    </div>

</div>