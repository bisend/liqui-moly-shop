<div class="widget">
    <h1 class="border">Топ продаж</h1>
    <ul class="product-list">

        @foreach($model->searchTopSalesProducts as $searchTopSalesProduct)
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="{{ url_product($searchTopSalesProduct->name_slug, $model->language) }}" class="">
                            {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                            <img alt="{{ $searchTopSalesProduct->name }}" src="{{ $searchTopSalesProduct->images[0]->small }}">
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="{{ url_product($searchTopSalesProduct->name_slug, $model->language) }}">{{ $searchTopSalesProduct->name }}</a>
                        <div class="price">
                            <div class="price-current">{{ $searchTopSalesProduct->price }} грн</div>
                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
        @endforeach

    </ul><!-- /.product-list -->
</div><!-- /.widget -->