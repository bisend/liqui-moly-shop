@if(isset($model->cartProducts) && $model->cartProducts)
    <ul class="dropdown-menu-list">
        @foreach($model->cartProducts as $cartProduct)
            <li data-cart-product-id="{{ $cartProduct->id }}" >
                <div class="basket-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 no-margin text-center">
                            <div class="thumb">
                                <a href="{{ url_product($cartProduct->name_slug, $model->language) }}">
                                    <img alt="{{ $cartProduct->name }}" src="{{ $cartProduct->images[0]->small }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8">
                            <div class="title"><a href="{{ url_product($cartProduct->name_slug, $model->language) }}">
                                    {{ $cartProduct->name }}
                                </a>
                            </div>
                            <div class="price">{{ $cartProduct->price }} грн</div>
                        </div>
                    </div>
                    <a class="close-btn"
                       data-delete-from-cart
                       href="javascript:void(0);"></a>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="checkout">

        <div class="basket-item">
            <div class="row dropdown-total-count">
                <div class="col-md-6 no-margin-left">
                    Кількісь: <span data-cart-total-count>0</span>
                </div>

                <div class="col-md-6 no-margin-right dropdown-total-price">
                    Сума: <span data-cart-total-sum>0.00</span> грн
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 no-margin-left">
                    <a href="javascript:void(0);"
                       data-open-big-cart
                       class="le-button inverse">Відкрити кошик</a>
                </div>
                <div class="col-xs-12 col-sm-6 no-margin-right">
                    <a href="javascript:void(0);" class="le-button">Оформити</a>
                </div>
            </div>
        </div>
    </div>
@endif