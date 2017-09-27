@if(isset($wishListProducts) && $wishListProducts != null)
    <ul class="dropdown-menu-list">
        @foreach($wishListProducts as $wishListProduct)
            <li>
                <div class="basket-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 no-margin text-center">
                            <div class="thumb">
                                <a href="{{ url_product($wishListProduct->product->name_slug, $language) }}">
                                    <img alt="{{ $wishListProduct->product->name }}"
                                         src="{{ $wishListProduct->product->images[0]->small }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8">
                            <div class="title">
                                <a href="{{ url_product($wishListProduct->product->name_slug, $language) }}">
                                    {{ $wishListProduct->product->name }}
                                </a>
                            </div>
                            <div class="price">
                                {{ $wishListProduct->product->price }}
                            </div>
                        </div>
                    </div>
                    <a class="close-btn"
                       data-delete-from-wish-list="{{ $wishListProduct->id }}"
                       href="javascript:void(0);"></a>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="checkout">
        <div class="basket-item">
            <div class="row">
                <div class="col-xs-12 col-sm-12 no-margin basket-btn">
                    <a href="{{ url_wish_list($language) }}"
                       class="le-button">Переглянути</a>
                </div>
            </div>
        </div>
    </div>
@endif