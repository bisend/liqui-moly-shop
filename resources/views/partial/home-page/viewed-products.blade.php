<section id="recently-reviewd" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder hover">

            <div class="title-nav">
                <h2 class="h1">Переглянуті товари</h2>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->

            <div id="owl-recently-viewed" class="owl-carousel product-grid-holder owl-carousel-smoll-products-reviewd">
                @foreach(($model->visitedProducts) as $visitedProduct)
                    <div class="no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            {{--<div class="ribbon red"><span>sale</span></div>--}}
                            <div class="image">
                                {{--<img alt="" src="/img/blank.gif" data-echo="/img/products/liqui-moly_3901.jpg" />--}}
                                <img alt="" src="{{ $visitedProduct->images[0]->small }}">
                            </div>
                            <div class="body">
                                <div class="title title-product-carousel">
                                    <a href="{{ url_product($visitedProduct->name_slug, $model->language) }}">{{ $visitedProduct->name }}</a>
                                </div>
                                <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                                <div class="product-comments product-comments-smoll"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i> <span>10</span> відгуків</a></div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">{{ $visitedProduct->price }} грн</div>
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
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->
                @endforeach
            </div><!-- /#recently-carousel -->

        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section><!-- /#recently-reviewd -->