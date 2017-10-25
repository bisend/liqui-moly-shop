<div class="product-grid-holder">
    @if($model->novelty)
        @foreach($model->novelty as $novelty)
            <div class="col-sm-6 col-md-3  no-margin product-item-holder hover">
                <div class="product-item">
                    <div class="ribbon blue"><span>Новинки</span></div>
                    <div class="image">
                        <a href="{{ url_product($novelty->name_slug, $model->language) }}">
                            <img alt="{{ $novelty->name }}" src="{{ $novelty->images[0]->small }}">
                        </a>
                    </div>
                    <div class="body">

                        <div class="title title-product-tabs">
                            <a href="{{ url_product($novelty->name_slug, $model->language) }}">
                                {{ $novelty->name }}
                            </a>
                        </div>

                        <div class="star-holder inline">
                            <div class="star" data-score="4">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($novelty->avg_rating != null)
                                        @if($i <= $novelty->avg_rating)
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
                            @if($novelty->avg_rating != null)
                                <a href="javascript:void(0);"
                                   data-go-to-review-id="{{ $novelty->id }}"
                                   data-go-to-review-slug="{{ $novelty->name_slug }}"
                                   title="{{ trans('layout.title_reviews') }}">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <span></span>
                                    {{ $novelty->reviews->count() }}
                                </a>
                            @else
                                <a href="javascript:void(0);"
                                   title="{{ trans('layout.title_reviews') }}"
                                   data-set-review-slug="{{ $novelty->name_slug }}"
                                   data-set-review-id="{{ $novelty->id }}">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <span></span>
                                    {{ trans('layout.leave_review') }}
                                </a>
                            @endif
                        </div>

                    </div>
                    <div class="prices">
                        <div class="price-current">{{ $novelty->price }} грн</div>

                    </div>

                    <div class="hover-area">
                        <div class="add-cart-button">
                            <a href="javascript:void(0);"
                               data-in-cart="false"
                               data-add-to-cart="{{ $novelty->id }}"
                               class="le-button">{{ trans('layout.add_to_cart') }}</a>
                        </div>
                        <div class="wish-compare">
                            <a class="btn-add-to-wishlist"
                               data-in-wish-list="false"
                               data-add-to-wish-list="{{ $novelty->id }}"
                               href="javascript:void(0);">{{ trans('layout.add_to_wish_list') }}</a>
                            <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>