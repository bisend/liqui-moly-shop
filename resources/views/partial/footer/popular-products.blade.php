<div class="widget">
    <h2>Найпопулярніші товари</h2>
    <div class="body">
        <ul>
            @foreach($model->popularProducts as $popularProduct)
                <li>
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 no-margin">
                            <a href="{{ url_product($popularProduct->name_slug, $model->language) }}" class="">
                                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                                <img alt="{{ $popularProduct->name }}" src="{{ $popularProduct->images[0]->small }}">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-9 ">
                            <a href="{{ url_product($popularProduct->name_slug, $model->language) }}">{{ $popularProduct->name }}</a>.
                            <div class="price">
                                <div class="price-current">{{ $popularProduct->price }} грн</div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div><!-- /.body -->
</div><!-- /.widget -->