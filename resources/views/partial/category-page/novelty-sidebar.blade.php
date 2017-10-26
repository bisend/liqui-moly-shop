<div class="widget top-new-widget">
    <h2 class="border">Новинки</h2>
    <ul class="product-list">

        @foreach($model->categoryNoveltyProducts as $categoryNoveltyProduct)
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="{{ url_product($categoryNoveltyProduct->name_slug, $model->language) }}" class="">
                            {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                            <img alt="{{ $categoryNoveltyProduct->name }}" src="{{ $categoryNoveltyProduct->images[0]->small }}">
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="{{ url_product($categoryNoveltyProduct->name_slug, $model->language) }}">{{ $categoryNoveltyProduct->name }}</a>
                        <div class="price">

                            <div class="price-current">{{ $categoryNoveltyProduct->price }}</div>

                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
        @endforeach
    </ul><!-- /.product-list -->
</div><!-- /.widget -->