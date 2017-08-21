<div class="search-result-products">
    @foreach($model->searchProducts as $searchProduct)
        <div class="product-item product-item-holder">
            <div class="row">
                <div class="col-xs-12 col-sm-3 image-holder">
                    <div class="image">
                        <a href="{{ url_product($searchProduct->name_slug, $model->language) }}">
                            <img class="mini-size-img" alt="{{ $searchProduct->name }}" src="{{ $searchProduct->images[0]->small }}">
                        </a>
                    </div>
                </div>
                <div class="no-margin col-xs-12 col-sm-5 body-holder">
                    <div class="body">
                        <div class="title">
                            <a href="{{ url_product($searchProduct->name_slug, $model->language) }}">{{ $searchProduct->name }}</a>
                        </div>
                    </div>
                </div>
                <div class="no-margin col-xs-12 col-sm-3 price-area">
                    <div class="right-clmn">
                        <div class="price-current">{{ $searchProduct->price }} грн</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="seeAllSearchProduct">
        <a href="{{ url_search($model->series, $model->language) }}"
           class="seeAllProdSearch">Переглянути усі результати пошуку ({{ $model->countSearchProducts }})</a>
    </div>
</div>