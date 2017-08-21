{{--{{ dd($model) }}--}}
@extends('layout')

@section('content')
    {{--MODAL BUY IN ONE CLICK--}}
    @include('partial.modals.buy-one-click')

    <div class="animate-dropdown">

        <!-- ========================================= BREADCRUMB ========================================= -->
        <div id="top-mega-nav">
            <div class="container">
                <nav>
                    <ul class="inline">
                        {{--BREADCRUMBS--}}
                        @include('partial.product-page.breadcrumbs')

                    </ul><!-- /.inline -->
                </nav>

            </div><!-- /.container -->
        </div><!-- /#top-mega-nav -->
        <!-- ========================================= BREADCRUMB : END ========================================= -->
    </div>


    <div id="single-product">
        <div class="container">

            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">

                    <div id="owl-single-product" class="owl-carousel">

                        {{--MEDIUM IMAGES--}}
                        @if($model->product->images->count() > 1)
                            @php($counter = 1)
                            @foreach($model->product->images as $image)
                                <div class="single-product-gallery-item" id="slide{{ $counter }}">
                                    <a data-rel="prettyphoto" href="{{ $image->medium }}">
                                        <img class="img-responsive" alt="{{ $model->product->name }}" src="{{ $image->medium }}">
                                    </a>
                                </div><!-- /.single-product-gallery-item -->
                            @php($counter++)
                            @endforeach
                        @else
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="{{ $model->product->images[0]->medium }}">
                                    <img class="img-responsive" alt="{{ $model->product->name }}" src="{{ $model->product->images[0]->medium }}">
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                        @endif
                    </div><!-- /.single-product-slider -->

                    @if($model->product->images->count() > 1)
                        <div class="single-product-gallery-thumbs gallery-thumbs">

                            {{--SMALL IMAGES--}}
                            <div id="owl-single-product-thumbnails" class="owl-carousel owl-singlProd-slider">
                                @php($counter = 1)
                                @php($counterSlide = 0)
                                @foreach($model->product->images as $image)
                                    <a class="horizontal-thumb active"
                                       data-target="#owl-single-product"
                                       data-slide="{{ $counterSlide }}"
                                       href="#slide{{ $counter }}">
                                        <img width="67" alt="{{ $model->product->name }}" src="{{ $image->small }}">
                                    </a>
                                @php($counter++)
                                @php($counterSlide++)
                                @endforeach
                            </div>

                            <div class="nav-holder left hidden-xs">
                                <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                            </div>

                            <div class="nav-holder right hidden-xs">
                                <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                            </div>

                        </div>
                    @endif

                </div>
            </div>
            <div class="no-margin col-xs-12 col-sm-7 body-holder">
                <div class="body">

                    <div class="title">
                        <h1>{{ $model->product->name }}</h1>
                    </div>

                    <div class="availability">
                        <label></label><span class="available">  В наявності</span>
                    </div>

                    <div class="article-product">
                        Артикул : <span>QWEF1235</span>
                    </div>

                    <div class="star-holder inline">
                        <div class="star" data-score="4"></div>
                    </div>

                    <div class="prices">
                        <div class="price-current">
                            Ціна : <span>{{ $model->product->price }}</span> грн
                        </div>
                    </div>

                    <div class="qnt-holder">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce"></a>
                                <input name="quantity" readonly="readonly" type="text" value="1">
                                <a class="plus" href="#add"></a>
                            </form>
                        </div>

                        <div class="total-price-single-prod">
                            Сума : <span>{{ $model->product->price }}</span> грн
                        </div>
                        <a id="addto-cart" href="cart.html" class="le-button huge">Додати в кошик</a>
                        <a id="addto-cart" data-toggle="modal" data-target="#buy-one-click" class="le-button-red huge">Купити в 1 клік</a>
                        <div class="buttons-holder">
                            <a class="btn-add-to-wishlist" href="#">У список бажань</a>
                            <!-- <a class="btn-add-to-compare" href="#">Додати до порівняння</a> -->
                        </div>
                    </div><!-- /.qnt-holder -->
                </div><!-- /.body -->

            </div><!-- /.body-holder -->
        </div><!-- /.container -->
    </div><!-- /.single-product -->

    <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
    <section id="single-product-tab">
        <div class="container">
            <div class="tab-holder">

                <ul class="nav nav-tabs simple" >
                    <li class="active">
                        <a href="#description" data-toggle="tab">Опис</a>
                    </li>
                    <li>
                        <a href="#additional-info" data-toggle="tab">Характеристики</a>
                    </li>
                    <li>
                        <a href="#reviews" data-toggle="tab">Відгуки</a>
                    </li>
                </ul><!-- /.nav-tabs -->

                <div class="tab-content">

                    {{--DESCRIPTION TAB--}}
                    @include('partial.product-page.description-tab')

                    {{--PROPERTIES TAB--}}
                    @include('partial.product-page.properties-tab')

                    {{--REVIEWS TAB--}}
                    @include('partial.product-page.reviews-tab')

                </div><!-- /.tab-content -->

            </div><!-- /.tab-holder -->
        </div><!-- /.container -->
    </section><!-- /#single-product-tab -->
    <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->

    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    @include('partial.product-page.viewed-products')
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->

@endsection