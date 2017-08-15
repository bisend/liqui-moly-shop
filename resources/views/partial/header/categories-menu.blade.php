<div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
    <ul class="nav navbar-nav">
        @foreach($model->allCategories as $category)
            <li class="dropdown yamm-fw">
                @if(count($category->childCategories) > 0)
                    <a href="{{ url_category($category->name_slug, $model->language) }}" class="dropdown-toggle" data-hover="dropdown">{{ $category->name }}</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">

                                    @foreach($category->childCategories as $childCategory)
                                        <div class="col-xs-12 col-sm-4">
                                            <h2><a href="{{ url_category($childCategory->name_slug, $model->language) }}">{{ $childCategory->name }}</a></h2>
                                            <ul>
                                                @foreach($childCategory->childCategories as $child)
                                                    <li><a href="{{ url_category($child->name_slug, $model->language) }}">{{ $child->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div><!-- /.col -->
                                    @endforeach

                                    {{--<div class="col-xs-12 col-sm-4">--}}
                                    {{--<h2>Computers &amp; Laptops</h2>--}}
                                    {{--<ul>--}}
                                    {{--<li><a href="#">Computer Cases &amp; Accessories</a></li>--}}
                                    {{--<li><a href="#">CPUs, Processors</a></li>--}}
                                    {{--<li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>--}}
                                    {{--<li><a href="#">Graphics, Video Cards</a></li>--}}
                                    {{--<li><a href="#">Interface, Add-On Cards</a></li>--}}
                                    {{--<li><a href="#">Laptop Replacement Parts</a></li>--}}
                                    {{--<li><a href="#">Memory (RAM)</a></li>--}}
                                    {{--<li><a href="#">Motherboards</a></li>--}}
                                    {{--<li><a href="#">Motherboard &amp; CPU Combos</a></li>--}}
                                    {{--<li><a href="#">Motherboard Components &amp; Accs</a></li>--}}
                                    {{--</ul>--}}
                                    {{--</div><!-- /.col -->--}}

                                    {{--<div class="col-xs-12 col-sm-4">--}}
                                    {{--<h2>Dekstop Parts</h2>--}}
                                    {{--<ul>--}}
                                    {{--<li><a href="#">Power Supplies Power</a></li>--}}
                                    {{--<li><a href="#">Power Supply Testers Sound</a></li>--}}
                                    {{--<li><a href="#">Sound Cards (Internal)</a></li>--}}
                                    {{--<li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>--}}
                                    {{--<li><a href="#">Other</a></li>--}}
                                    {{--</ul>--}}
                                    {{--</div><!-- /.col -->--}}
                                </div><!-- /.row -->
                            </div><!-- /.yamm-content -->
                        </li>
                        @else
{{--                            <a href="{{ url($category->name_slug) }}" >{{ $category->name }}</a>--}}
{{--                            <a href="{{ route('category', [$category->name_slug, $model->language == 'uk' ? '' : 'ru']) }}" >{{ $category->name }}</a>--}}
                        <a href="{{ url_category($category->name_slug, $model->language) }}" >{{ $category->name }}</a>
                @endif
                    </ul>
            </li>
        @endforeach
    </ul><!-- /.navbar-nav -->
</div><!-- /.navbar-collapse -->