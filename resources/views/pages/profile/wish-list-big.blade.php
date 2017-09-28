{{--@if(isset($wishListProducts) && $wishListProducts->count() > 0)--}}
    {{--@php($model->wishListProducts = $wishListProducts)--}}
{{--@endif--}}
@if($model->wishListProducts->count() > 0)
    @foreach($model->wishListProducts as $wishListProduct)
        <div class="row cart-item cart_item" id="yith-wcwl-row-1">

            <div class="col-xs-12 col-sm-1 no-margin">
                <a title="Видалити цей товар"
                   class="remove_from_wishlist remove-item"
                   data-delete-from-wish-list="{{ $wishListProduct->id }}"
                   href="javascript:void(0);">×</a>
            </div>

            <div class="col-xs-12 col-sm-2 no-margin">
                <a href="{{ url_product($wishListProduct->product->name_slug, $model->language) }}">
                    <img width="93"
                         height="73"
                         alt="{{ $wishListProduct->product->name }}"
                         class="attachment-shop_thumbnail wp-post-image"
                         src="{{ $wishListProduct->product->images[0]->small }}">
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 no-margin">
                <div class="title">
                    <a href="{{ url_product($wishListProduct->product->name_slug, $model->language) }}">
                        {{ $wishListProduct->product->name }}
                    </a>
                </div><!-- /.title -->
                <div class="star-holder inline"><div class="star" data-score="4"></div></div>
            </div>

            <div class="col-xs-12 col-sm-3">
                <div class="price">
                    <span class="amount">{{ $wishListProduct->product->price }} грн</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-2 no-margin">
                <div class="text-right">
                    <div class="add-cart-button">
                        <a class="le-button add_to_cart_button product_type_simple"
                           data-in-cart="false"
                           data-add-to-cart="{{ $wishListProduct->product->id }}"
                           href="javascript:void(0);">В кошик</a>
                    </div>
                </div>
            </div>

        </div><!-- /.cart-item -->
    @endforeach
@else
    Пусто
@endif

@include('pages.profile.pagination-wish-list')