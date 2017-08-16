<div class="product-grid-holder">

    @foreach($model->novelty as $novelty)
        <div class="col-sm-6 col-md-3  no-margin product-item-holder hover">
            <div class="product-item">
                <div class="ribbon blue"><span>Новинки</span></div>
                <div class="image">
                    {{--<img alt="" src="/img/blank.gif" data-echo="{{ $novelty->images[0]->small }}" />--}}
                    {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/a5e5942s-960.jpg" />--}}
                    {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
                    <a href="{{ url_product($novelty->name_slug, $model->language) }}">
                        <img alt="{{ $novelty->name }}" src="{{ $novelty->images[0]->small }}">
                    </a>
                </div>
                <div class="body">

                    <div class="title title-product-tabs">
                        <a href="{{ url_product($novelty->name_slug, $model->language) }}">{{ $novelty->name }} </a>
                    </div>
                    <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                    <div class="product-comments"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>

                </div>
                <div class="prices">
                    <div class="price-current">{{ $novelty->price }} грн</div>

                </div>

                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">В кошик</a>
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
            {{--<div class="ribbon blue"><span>Новинка</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Полусинтетическое моторное масло -  л.</a>--}}
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
            {{--<div class="ribbon blue"><span>Новинка</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Противоизносная присадка для</a>--}}
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

    {{--<div class="col-sm-6 col-md-3  no-margin product-item-holder hover">--}}
        {{--<div class="product-item">--}}
            {{--<div class="ribbon blue"><span>Новинка</span></div>--}}
            {{--<div class="image">--}}
                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui_moly_diesel_.jpg" />--}}
            {{--</div>--}}
            {{--<div class="body">--}}

                {{--<div class="title title-product-tabs">--}}
                    {{--<a href="single-product.html">Противоизносная присадка для двигателя0,5 л.</a>--}}
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