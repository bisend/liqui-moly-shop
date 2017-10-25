<div class="widget">
    <h2>{{ trans('footer.recommended_products') }}</h2>
    <div class="body">
        <ul>
            @if($model->recommendedProducts)
                @foreach($model->recommendedProducts as $recommendedProduct)
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 no-margin">
                                <a href="{{ url_product($recommendedProduct->name_slug, $model->language) }}" class="">
                                    <img alt="{{ $recommendedProduct->name }}" src="{{ $recommendedProduct->images[0]->small }}">
{{--                                    <img alt="{{ $recommendedProduct->name }}" src="/img/900.jpg">--}}
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-9 ">
                                <a href="{{ url_product($recommendedProduct->name_slug, $model->language) }}">{{ $recommendedProduct->name }}</a>.
                                <div class="price">
                                    <div class="price-current">{{ $recommendedProduct->price }} грн</div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div><!-- /.body -->
</div> <!-- /.widget -->