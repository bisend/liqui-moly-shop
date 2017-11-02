@if(isset($model->visitedProducts) && $model->visitedProducts != null )
    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">

                <div class="title-nav">
                    <h2 class="h1">{{ trans('layout.viewed_products') }}</h2>
                    <div class="nav-holder">
                        <a href="#prev"
                           data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next"
                           data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-recently-viewed"
                     class="owl-carousel product-grid-holder owl-carousel-smoll-products-reviewd">
                    @foreach(($model->visitedProducts) as $visitedProduct)
                        <div class="no-margin carousel-item product-item-holder size-small hover">
                            <div class="product-item">
                                {{--<div class="ribbon red"><span>sale</span></div>--}}
                                <div class="image">
                                    <a href="{{ url_product($visitedProduct->name_slug, $model->language) }}">
                                        <img alt="{{ $visitedProduct->name }}"
                                             src="{{ $visitedProduct->images[0]->medium }}">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="title title-product-carousel">
                                        <a href="{{ url_product($visitedProduct->name_slug, $model->language) }}">
                                            {{ $visitedProduct->name }}
                                        </a>
                                    </div>

                                    <div class="star-holder inline">
                                        <div class="star" data-score="4">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($visitedProduct->avg_rating != null)
                                                    @if($i <= $visitedProduct->avg_rating)
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
                                    <div class="product-comments product-comments-smoll">
                                        @if($visitedProduct->avg_rating != null && $visitedProduct->reviews->count() > 0)
                                            <a href="javascript:void(0);"
                                               data-go-to-review-id="{{ $visitedProduct->id }}"
                                               data-go-to-review-slug="{{ $visitedProduct->name_slug }}"
                                               title="{{ trans('layout.title_reviews') }}">
                                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                <span></span>
                                                {{ $visitedProduct->reviews->count() }}
                                            </a>
                                        @else
                                            <a href="javascript:void(0);"
                                               title="{{ trans('layout.title_reviews') }}"
                                               data-set-review-slug="{{ $visitedProduct->name_slug }}"
                                               data-set-review-id="{{ $visitedProduct->id }}">
                                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                <span></span>
                                                {{ trans('layout.leave_review') }}
                                            </a>
                                        @endif
                                    </div>

                                </div>
                                <div class="prices">
                                    <div class="price-current text-right">{{ $visitedProduct->price }} грн</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="javascript:void(0);"
                                           data-in-cart="false"
                                           data-add-to-cart="{{ $visitedProduct->id }}"
                                           class="le-button">{{ trans('layout.add_to_cart') }}</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist"
                                           data-in-wish-list="false"
                                           data-add-to-wish-list="{{ $visitedProduct->id }}"
                                           href="javascript:void(0);">{{ trans('layout.add_to_wish_list') }}</a>
                                        <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                                    </div>
                                </div>
                            </div><!-- /.product-item -->
                        </div><!-- /.product-item-holder -->
                    @endforeach
                </div><!-- /#recently-carousel -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->
@endif