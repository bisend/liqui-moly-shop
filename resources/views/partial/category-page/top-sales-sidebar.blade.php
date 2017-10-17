<div class="widget top-sales-widget">
    <h1 class="border">Топ продаж</h1>
    <ul class="product-list">

        @foreach($model->categoryTopSalesProducts as $categoryTopSalesProduct)
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="{{ url_product($categoryTopSalesProduct->name_slug, $model->language) }}" class="">
                            {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                            <img alt="{{ $categoryTopSalesProduct->name }}" src="{{ $categoryTopSalesProduct->images[0]->small }}">
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="{{ url_product($categoryTopSalesProduct->name_slug, $model->language) }}">{{ $categoryTopSalesProduct->name }}</a>
                        <div class="price">
                            <div class="price-current">{{ $categoryTopSalesProduct->price }} грн</div>
                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
        @endforeach

    </ul><!-- /.product-list -->
</div><!-- /.widget -->