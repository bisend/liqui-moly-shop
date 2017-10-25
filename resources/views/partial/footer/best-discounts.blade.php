<div class="widget">
    <h2>{{ trans('footer.best_prices') }}</h2>
    <div class="body">
        <ul>
            @if($model->bestDiscountsProducts)
                @foreach($model->bestDiscountsProducts as $bestDiscountsProduct)
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 no-margin">
                                <a href="{{ url_product($bestDiscountsProduct->name_slug, $model->language) }}" class="">
                                    <img alt="{{ $bestDiscountsProduct->name }}" src="{{ $bestDiscountsProduct->images[0]->small }}">
{{--                                    <img alt="{{ $bestDiscountsProduct->name }}" src="/img/900.jpg">--}}
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
            @endif
        </ul>
    </div><!-- /.body -->
</div> <!-- /.widget -->