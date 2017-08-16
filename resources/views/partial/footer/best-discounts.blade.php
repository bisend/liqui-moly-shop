<div class="widget">
    <h2>Найкращі знижки</h2>
    <div class="body">
        <ul>
            @foreach($model->bestDiscountsProducts as $bestDiscountsProduct)
                <li>
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 no-margin">
                            <a href="{{ url_product($bestDiscountsProduct->name_slug, $model->language) }}" class="">
                                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                                <img alt="{{ $bestDiscountsProduct->name }}" src="{{ $bestDiscountsProduct->images[0]->small }}">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-9 ">
                            <a href="{{ url_product($bestDiscountsProduct->name_slug, $model->language) }}">{{ $bestDiscountsProduct->name }}</a>.
                            <div class="price">
                                <div class="price-current">{{ $bestDiscountsProduct->price }} грн</div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div><!-- /.body -->
</div> <!-- /.widget -->