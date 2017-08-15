<div class="product-grid-holder">

    @foreach($model->topSales as $topSale)
        <div class="col-sm-6 col-md-3  no-margin product-item-holder hover">
            <div class="product-item">
                <div class="ribbon green"><span>Топ продаж</span></div>
                <div class="image">
                    {{--<img alt="" src="/img/blank.gif" data-echo="{{ $topSale->images[0]->small }}" />--}}
                    {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui-moly_3901.jpg" />--}}
                    {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                    <img alt="" src="{{ $topSale->images[0]->small }}">
                </div>
                <div class="body">

                    <div class="title title-product-tabs" >
                        <a href="/product/{{ $topSale->name_slug }}">{{ $topSale->name }} </a>
                    </div>
                    <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                    <div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span></span> Залишити відгук</a></div>

                </div>
                <div class="prices">
                    <div class="price-current">{{ $topSale->price }} грн</div>

                </div>

                <div class="hover-area">
                    <div class="add-cart-button">
                        <a data-toggle="modal" data-target="#ModalCart" class="le-button">В кошик</a>
                    </div>
                    <div class="wish-compare">
                        <a class="btn-add-to-wishlist" href="#">В обране</a>
                        <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach










    {{--<div class="col-sm-6 col-md-3  no-margin product-item-holder hover">--}}
        {{--<div class="product-item">--}}
            {{--<div class="ribbon green"><span>Популярні</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui-moly_3901.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Синтетическое моторное масло  </a>--}}
                {{--</div>--}}
                {{--<div class="star-holder inline"><div class="star" data-score="4"></div></div>--}}
                {{--<div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>--}}

            {{--</div>--}}
            {{--<div class="prices">--}}
                {{--<div class="price-current">1399.00 грн</div>--}}

            {{--</div>--}}

            {{--<div class="hover-area">--}}
                {{--<div class="add-cart-button">--}}
                    {{--<a href="single-product.html" class="le-button-active">В кошику</a>--}}
                {{--</div>--}}
                {{--<div class="wish-compare">--}}
                    {{--<a class="btn-add-to-wishlist" href="#">В обране</a>--}}
                    {{--<!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 col-md-3  no-margin product-item-holder hover">--}}
        {{--<div class="product-item">--}}
            {{--<div class="ribbon green"><span>Популярні</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui-moly_3901.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Синтетическое</a>--}}
                {{--</div>--}}
                {{--<div class="star-holder inline"><div class="star" data-score="4"></div></div>--}}

                {{--<div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span></span> Залишити відгук</a></div>--}}

            {{--</div>--}}
            {{--<div class="prices">--}}
                {{--<div class="price-current">1399.00 грн</div>--}}

            {{--</div>--}}

            {{--<div class="hover-area">--}}
                {{--<div class="add-cart-button">--}}
                    {{--<a href="single-product.html" class="le-button">В кошик</a>--}}
                {{--</div>--}}
                {{--<div class="wish-compare">--}}
                    {{--<a class="btn-add-to-wishlist" href="#">В обране</a>--}}
                    {{--<!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 col-md-3  no-margin product-item-holder hover">--}}
        {{--<div class="product-item">--}}
            {{--<div class="ribbon green"><span>Популярні</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Полусинтетическое моторное </a>--}}
                {{--</div>--}}
                {{--<div class="star-holder inline"><div class="star" data-score="4"></div></div>--}}
                {{--<div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>--}}

            {{--</div>--}}
            {{--<div class="prices">--}}
                {{--<div class="price-current">1399.00 грн</div>--}}

            {{--</div>--}}

            {{--<div class="hover-area">--}}
                {{--<div class="add-cart-button">--}}
                    {{--<a href="single-product.html" class="le-button">В кошик</a>--}}
                {{--</div>--}}
                {{--<div class="wish-compare">--}}
                    {{--<a class="btn-add-to-wishlist" href="#">В обране</a>--}}
                    {{--<!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>