@if($model->cartProducts)
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLOGIN">КОШИК</h4>

            </div>
            <div class="modal-body">
                <div class="row modalCart-row">
                    <div class="col-xs-12 col-md-12 items-holder no-margin">

                        @foreach($model->cartProducts as $cartProduct)
                            {{--PRODUCT--}}
                            <div class="row no-margin cart-item" data-cart-product-id="{{ $cartProduct->id }}">
                                <div class="col-xs-12 col-sm-2 no-margin">
                                    <a href="{{ url_product($cartProduct->name_slug, $model->language) }}"
                                       class="thumb-holder">
                                        <img class="lazy"
                                             alt="{{ $cartProduct->name }}"
                                             src="{{ $cartProduct->images[0]->small }}">
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-5">
                                    <div class="title">
                                        <a href="{{ url_product($cartProduct->name_slug, $model->language) }}">
                                            {{ $cartProduct->name }}</a>
                                    </div>
                                    <div class="price-current"><span data-cart-product-price="{{ $cartProduct->id }}">
                                            {{ $cartProduct->price }}</span> грн</div>
                                </div>

                                <div class="col-xs-12 col-sm-2 no-margin">
                                    <div class="quantity">
                                        <div class="le-quantity">
                                            <form>
                                                <a class="minus"
                                                   data-cart-minus
                                                   href="javascript:void(0);"></a>
                                                <input name="quantity" readonly="readonly" type="text"
                                                       data-product-count="{{ $cartProduct->id }}"
                                                       value="{{ $cartProduct->productCount }}">
                                                <a class="plus"
                                                   data-cart-plus
                                                   href="javascript:void(0);"></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 no-margin">
                                    <div class="total-product-price">
                                        <span data-product-sum="{{ $cartProduct->id }}">
                                            {{ set_format_price($cartProduct->price, $cartProduct->productCount) }}
                                        </span> грн
                                    </div>
                                    <a class="close-btn"
                                       data-delete-from-cart
                                       href="javascript:void(0);"></a>
                                </div>
                            </div><!-- /.cart-item -->
                            {{--PRODUCT--}}
                        @endforeach

                    </div>

                </div>

                <div class="row modalCart-row">
                    <div class="col-md-12 no-margin">
                        <div class="cart-total-price">
                            Загальна сума : <span data-cart-total-sum>
                                {{ set_format_price($model->totalProductsAmount) }} </span> грн
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="le-button-active" data-dismiss="modal">Продовжити покупки</button>

                <a href="{{ url_order($model->language) }}" class="le-button">Оформити замовлення</a>
            </div>
        </div>
    </div>
@endif