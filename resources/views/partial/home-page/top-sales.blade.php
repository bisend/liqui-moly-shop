<div class="product-grid-holder">
    @if($model->topSales)
        @foreach($model->topSales as $topSale)
            <div class="col-sm-6 col-md-3  no-margin product-item-holder hover">
                <div class="product-item">
                    <div class="ribbon green"><span>Топ продаж</span></div>
                    <div class="image">
                        <a href="{{ url_product($topSale->name_slug, $model->language) }}">
                            <img alt="" src="{{ $topSale->images[0]->small }}">
                            {{--<img alt="" src="/img/900.jpg">--}}
                        </a>
                    </div>
                    <div class="body">

                        <div class="title title-product-tabs" >
                            <a href="{{ url_product($topSale->name_slug, $model->language) }}">{{ $topSale->name }} </a>
                        </div>
                        <div class="star-holder inline">
                            <div class="star" data-score="4">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($topSale->avg_rating != null)
                                        @if($i <= $topSale->avg_rating)
                                            <img src="/img/star-on.png" alt="{{  $i }}">
                                        @else
                                            <img src="/img/star-off.png" alt="{{  $i }}">
                                        @endif
                                    @else
                                        <img src="/img/star-on.png" alt="{{  $i }}">
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <div class="product-comments">
                            @if($topSale->avg_rating != null)
                                <a href="javascript:void(0);"
                                   data-go-to-review-id="{{ $topSale->id }}"
                                   data-go-to-review-slug="{{ $topSale->name_slug }}"
                                   title="Відгуки">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <span></span>
                                    {{ $topSale->reviews->count() }}
                                </a>
                            @else
                                <a href="javascript:void(0);" title="Відгуки"
                                   data-set-review-slug="{{ $topSale->name_slug }}"
                                   data-set-review-id="{{ $topSale->id }}">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <span></span>
                                    Залишити відгук
                                </a>
                            @endif
                        </div>

                    </div>
                    <div class="prices">
                        <div class="price-current">{{ $topSale->price }} грн</div>
                    </div>

                    <div class="hover-area">
                        <div class="add-cart-button">
                            {{--<a data-toggle="modal" data-target="#ModalCart" class="le-button">В кошик</a>--}}
                            <a href="javascript:void(0);" class="le-button"
                               data-in-cart="false"
                               data-add-to-cart="{{ $topSale->id }}">В кошик</a>
                        </div>
                        <div class="wish-compare">
                            <a class="btn-add-to-wishlist"
                               data-in-wish-list="false"
                               data-add-to-wish-list="{{ $topSale->id }}"
                               href="javascript:void(0);">В обране</a>
                            <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif









    {{--<div class="col-sm-6 col-md-3  no-margin product-item-holder hover">--}}
        {{--<div class="product-item">--}}
            {{--<div class="ribbon green"><span>Популярні</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui-moly_3901.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Синтетическое моторное масло  </a>--}}
                {{--</div>--}}
                {{--<div class="star-holder inline"><div class="star" data-score="4"></div></div>--}}
                {{--<div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>--}}

            {{--</div>--}}
            {{--<div class="prices">--}}
                {{--<div class="price-current">1399.00 грн</div>--}}

            {{--</div>--}}

            {{--<div class="hover-area">--}}
                {{--<div class="add-cart-button">--}}
                    {{--<a href="single-product.html" class="le-button-active">В кошику</a>--}}
                {{--</div>--}}
                {{--<div class="wish-compare">--}}
                    {{--<a class="btn-add-to-wishlist" href="#">В обране</a>--}}
                    {{--<!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 col-md-3  no-margin product-item-holder hover">--}}
        {{--<div class="product-item">--}}
            {{--<div class="ribbon green"><span>Популярні</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui-moly_3901.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Синтетическое</a>--}}
                {{--</div>--}}
                {{--<div class="star-holder inline"><div class="star" data-score="4"></div></div>--}}

                {{--<div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span></span> Залишити відгук</a></div>--}}

            {{--</div>--}}
            {{--<div class="prices">--}}
                {{--<div class="price-current">1399.00 грн</div>--}}

            {{--</div>--}}

            {{--<div class="hover-area">--}}
                {{--<div class="add-cart-button">--}}
                    {{--<a href="single-product.html" class="le-button">В кошик</a>--}}
                {{--</div>--}}
                {{--<div class="wish-compare">--}}
                    {{--<a class="btn-add-to-wishlist" href="#">В обране</a>--}}
                    {{--<!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 col-md-3  no-margin product-item-holder hover">--}}
        {{--<div class="product-item">--}}
            {{--<div class="ribbon green"><span>Популярні</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Полусинтетическое моторное </a>--}}
                {{--</div>--}}
                {{--<div class="star-holder inline"><div class="star" data-score="4"></div></div>--}}
                {{--<div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>--}}

            {{--</div>--}}
            {{--<div class="prices">--}}
                {{--<div class="price-current">1399.00 грн</div>--}}

            {{--</div>--}}

            {{--<div class="hover-area">--}}
                {{--<div class="add-cart-button">--}}
                    {{--<a href="single-product.html" class="le-button">В кошик</a>--}}
                {{--</div>--}}
                {{--<div class="wish-compare">--}}
                    {{--<a class="btn-add-to-wishlist" href="#">В обране</a>--}}
                    {{--<!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>