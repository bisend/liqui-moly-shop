<div class="container">
    @if($model->seasonalGoods)
        <h1 class="section-title">Сезонні товари</h1>

        <div class="product-grid-holder medium">
            <div class="col-xs-12 col-md-7 no-margin">

                {{--TOP 3 PRODUCTS BEGIN--}}
                <div class="row no-margin">
                    @php($counter = 0)
                    @if($model->seasonalGoods)
                        @foreach($model->seasonalGoods as $seasonalGood)
                            @if($counter < 3)
                                <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                                    <div class="product-item">
                                        {{--<div class="ribbon green"><span>Сезонні товари</span></div>--}}
                                        <div class="image">
                                            <a href="{{ url_product($seasonalGood->name_slug, $model->language) }}">
                                                <img alt="" src="{{ $seasonalGood->images[0]->small }}">
                                                {{--<img alt="" src="/img/900.jpg">--}}
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="label-discount clear"></div>
                                            <div class="title title-BestSellers">
                                                <a href="{{ url_product($seasonalGood->name_slug, $model->language) }}">{{ $seasonalGood->name }}</a>
                                            </div>

                                            <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                                            <div class="product-comments product-comments-smoll"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>

                                        </div>
                                        <div class="prices">

                                            <div class="price-current text-right">{{ $seasonalGood->price }} грн</div>
                                        </div>
                                        <div class="hover-area">
                                            <div class="add-cart-button">
                                                <a href="javascript:void(0);"
                                                   data-in-cart="false"
                                                   data-add-to-cart="{{ $seasonalGood->id }}"
                                                   class="le-button">В кошик</a>
                                            </div>
                                            <div class="wish-compare">
                                                <a class="btn-add-to-wishlist" href="#">В обране</a>
                                                <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.product-item-holder -->
                            @endif
                            @php($counter++)
                        @endforeach
                    @endif

                </div><!-- /.row -->
                {{--TOP 3 PRODUCTS END--}}

                {{--BOTTOM 3 PRODUCTS BEGIN--}}
                <div class="row no-margin">
                    @php($counter = 0)
                    @if($model->seasonalGoods)
                        @foreach($model->seasonalGoods as $seasonalGood)
                            @if($counter > 2)
                                <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                                    <div class="product-item">
                                        {{--<div class="ribbon green"><span>Сезонні товари</span></div>--}}
                                        <div class="image">
                                            <a href="{{ url_product($seasonalGood->name_slug, $model->language) }}">
                                                <img alt="{{ $seasonalGood->name }}" src="{{ $seasonalGood->images[0]->small }}">
                                                {{--<img alt="{{ $seasonalGood->name }}" src="/img/900.jpg">--}}
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="label-discount clear"></div>
                                            <div class="title title-BestSellers">
                                                <a href="{{ url_product($seasonalGood->name_slug, $model->language) }}">{{ $seasonalGood->name }}</a>
                                            </div>
                                            <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                                            <div class="product-comments product-comments-smoll"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span></span> Залишити відгук</a></div>
                                        </div>
                                        <div class="prices">
                                            <div class="price-current text-right">{{ $seasonalGood->price }} грн</div>
                                        </div>
                                        <div class="hover-area">
                                            <div class="add-cart-button">
                                                <a href="javascript:void(0);"
                                                   data-in-cart="false"
                                                   data-add-to-cart="{{ $seasonalGood->id }}"
                                                   class="le-button">В кошик</a>
                                            </div>
                                            <div class="wish-compare">
                                                <a class="btn-add-to-wishlist" href="#">В обране</a>
                                                <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.product-item-holder -->
                            @endif
                            @php($counter++)
                        @endforeach
                    @endif
                </div><!-- /.row -->
                {{--BOTTOM 3 PRODUCTS END--}}

            </div><!-- /.col -->

            {{--Promotional product BEGIN--}}
            <div class="col-xs-12 col-md-5 no-margin">
                <div class="product-item-holder size-big single-product-gallery small-gallery">
                    {{--<div class="ribbon green"><span>Топ продаж</span></div>--}}

                    <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
                        @if(count($model->promotionalProduct->images) > 1)
    {{--                        @php($data_slide = 0)--}}
                            @php($href_slide = 1)
                            @foreach($model->promotionalProduct->images as $image)
                                <div class="single-product-gallery-item" id="slide{{ $href_slide }}">
                                    <a data-rel="prettyphoto"
                                       href="{{ url_product($model->promotionalProduct->name_slug, $model->language) }}">
                                        <img alt="{{ $model->promotionalProduct->name }}" src="{{ $image->medium }}">
{{--                                        <img alt="{{ $model->promotionalProduct->name }}" src="/img/900.jpg">--}}
                                    </a>
                                </div><!-- /.single-product-gallery-item -->
    {{--                            @php($data_slide++)--}}
                                @php($href_slide++)
                            @endforeach

                        @else
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="{{ url_product($model->promotionalProduct->name_slug, $model->language) }}">
                                    <img alt="{{ $model->promotionalProduct->name }}" src="{{ $model->promotionalProduct->images[0]->medium }}">
{{--                                    <img alt="{{ $model->promotionalProduct->name }}" src="/img/900.jpg">--}}
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                        @endif

                    </div><!-- /.single-product-slider -->

                    <div class="gallery-thumbs clearfix">
                        <ul>
                            @if(count($model->promotionalProduct->images) > 1)

                                @php($data_slide = 0)
                                @php($href_slide = 1)

                                @foreach($model->promotionalProduct->images as $image)
                                    <li>
                                        <a class="horizontal-thumb
                                           {{ $data_slide == 0 ? 'active' : '' }}"
                                           data-target="#best-seller-single-product-slider"
                                           data-slide="{{ $data_slide }}"
                                           href="#slide{{ $href_slide }}">

                                            <img alt=""
                                                 src="{{ $image->small }}">
                                                 {{--src="/img/900.jpg">--}}
                                        </a>
                                    </li>
                                    @php($data_slide++)
                                    @php($href_slide++)
                                @endforeach
                            @else
                                <li>
                                    <a class="horizontal-thumb active"
                                       data-target="#best-seller-single-product-slider"
                                       data-slide="0"
                                       href="#slide1">
                                        <img alt="" src="{{ $model->promotionalProduct->images[0]->small }}">
                                        {{--<img alt="" src="/img/900.jpg">--}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div><!-- /.gallery-thumbs -->

                    <div class="body">
                        <div class="label-discount clear"></div>
                        <div class="title">
                            <a href="{{ url_product($model->promotionalProduct->name_slug, $model->language) }}">
                                {{ $model->promotionalProduct->name }}</a>
                        </div>
                        <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                        <div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>
                    </div>
                    <div class="prices text-right">
                        {{--<div class="price-prev" style="text-decoration: line-through;">{{ $model->promotionalProduct->old_price }}</div>--}}
                        <div class="price-current inline">{{ $model->promotionalProduct->price }} грн</div>
                        <a href="javascript:void(0);"
                           data-in-cart="false"
                           data-add-to-cart="{{ $model->promotionalProduct->id }}"
                           class="le-button big inline">В кошик</a>
                    </div>
                </div><!-- /.product-item-holder -->
            </div><!-- /.col -->
            {{--Promotional product END--}}

        </div><!-- /.product-grid-holder -->
    @endif
</div><!-- /.container -->