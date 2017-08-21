<div class="widget">
    <h1 class="border">Новинки</h1>
    <ul class="product-list">

        @foreach($model->searchNoveltyProducts as $searchNoveltyProduct)
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="{{ url_product($searchNoveltyProduct->name_slug, $model->language) }}" class="">
                            {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                            <img alt="{{ $searchNoveltyProduct->name }}" src="{{ $searchNoveltyProduct->images[0]->small }}">
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="{{ url_product($searchNoveltyProduct->name_slug, $model->language) }}">{{ $searchNoveltyProduct->name }}</a>
                        <div class="price">

                            <div class="price-current">{{ $searchNoveltyProduct->price }}</div>

                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
        @endforeach
    </ul><!-- /.product-list -->
</div><!-- /.widget -->