<div class="product-grid-holder">
    @if($model->topSales)
        @foreach($model->topSales as $topSale)
            <div class="col-sm-6 col-md-3  no-margin product-item-holder hover">
                <div class="product-item">
                    <div class="ribbon green"><span>Топ продаж</span></div>
                    <div class="image">
                        <a href="{{ url_product($topSale->name_slug, $model->language) }}">
                            <img alt="{{ $topSale->name }}" src="{{ $topSale->images[0]->medium }}">
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
                            @if($topSale->avg_rating != null && $topSale->reviews->count() > 0)
                                <a href="javascript:void(0);"
                                   data-go-to-review-id="{{ $topSale->id }}"
                                   data-go-to-review-slug="{{ $topSale->name_slug }}"
                                   title="{{ trans('layout.title_reviews') }}">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <span></span>
                                    {{ $topSale->reviews->count() }}
                                </a>
                            @else
                                <a href="javascript:void(0);"
                                   title="{{ trans('layout.title_reviews') }}"
                                   data-set-review-slug="{{ $topSale->name_slug }}"
                                   data-set-review-id="{{ $topSale->id }}">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <span></span>
                                    {{ trans('layout.leave_review') }}
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
                               data-add-to-cart="{{ $topSale->id }}">{{ trans('layout.add_to_cart') }}</a>
                        </div>
                        <div class="wish-compare">
                            <a class="btn-add-to-wishlist"
                               data-in-wish-list="false"
                               data-add-to-wish-list="{{ $topSale->id }}"
                               href="javascript:void(0);">{{ trans('layout.add_to_wish_list') }}</a>
                            <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>