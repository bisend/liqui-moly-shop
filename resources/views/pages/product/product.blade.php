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


    <div id="single-product" data-single-poduct-id="{{ $model->product->id }}">
        <input type="hidden" value="{{ $model->product->name_slug }}" data-product-slug>
        <input type="hidden" value="{{ $model->product->id }}" data-product-id>
        <div class="container">

            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">

                    <div id="owl-single-product" class="owl-carousel">

                        {{--MEDIUM IMAGES--}}
                        @if($model->product->images->count() > 1)
                            @php($counter = 1)
                            @foreach($model->product->images as $image)
                                <div class="single-product-gallery-item" id="slide{{ $counter }}">
                                    <a rel="prettyPhoto" href="{{ $image->medium }}">
                                        <img class="img-responsive" alt="{{ $model->product->name }}"
                                             src="{{ $image->medium }}">
                                             {{--src="/img/900.jpg">--}}
                                    </a>
                                </div><!-- /.single-product-gallery-item -->
                            @php($counter++)
                            @endforeach
                        @else
                            <div class="single-product-gallery-item" id="slide1">
                                <a rel="prettyPhoto" href="{{ $model->product->images[0]->medium }}">
                                    <img class="img-responsive" alt="{{ $model->product->name }}"
                                         src="{{ $model->product->images[0]->medium }}">
                                         {{--src="/img/900.jpg">--}}
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
                                        {{--<img width="67" alt="{{ $model->product->name }}" src="/img/900.jpg">--}}
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
                        <label></label><span class="available">
                            {{ $model->product->in_stock == 0 ? trans('product.in_stock_false') : trans('product.in_stock_true') }}
                        </span>
                    </div>

                    <div class="article-product">
                        Артикул : <span>{{ $model->product->vendor_code }}</span>
                    </div>

                    <div class="star-holder inline">
                        <div class="star" data-score="4" style="cursor: pointer; width: 80px;">
                            @for($i = 1; $i <= 5; $i++)
                                @if($model->product->avg_rating != null)
                                    @if($i <= $model->product->avg_rating)
                                        <img src="/img/star-on.png" alt="{{  $i }}">
                                    @else
                                        <img src="/img/star-off.png" alt="{{  $i }}">
                                    @endif
                                @else
                                    <img src="/img/star-on.png" alt="{{  $i }}">
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div class="prices">
                        <div class="price-current">
                            {{ trans('product.price') }} : <span data-single-product-price="{{ $model->product->id }}">
                                {{ $model->product->price }}</span> грн
                        </div>
                    </div>

                    <div class="qnt-holder">
                        <div class="le-quantity">
                            <form>
                                <a class="minus"
                                   data-cart-minus
                                   href="javascript:void(0);"></a>

                                <input name="quantity"
                                       readonly="readonly"
                                       type="text"
                                       data-product-count="{{ $model->product->id }}"
                                       value="{{ isset($model->product->productCount) ? $model->product->productCount : 1 }}">
                                <a class="plus"
                                   data-cart-plus
                                   href="javascript:void(0);"></a>
                            </form>
                        </div>

                        <div class="total-price-single-prod">
                            {{ trans('product.sum') }} : <span data-product-sum="{{ $model->product->id }}">
                                {{ set_format_price($model->product->price,
                            isset($model->product->productCount) ? $model->product->productCount : 1) }}</span> грн
                        </div>

                        <a id="addto-cart"
                           href="javascript:void(0);"
                           data-in-cart="false"
                           data-add-to-cart="{{ $model->product->id }}"
                           class="le-button huge">
                            {{ trans('layout.add_to_cart') }}
                        </a>

                        <a id="addto-cart"
                           data-toggle="modal"
                           data-target="#buy-one-click"
                           class="le-button-red huge">
                            {{ trans('product.buy_one_click') }}
                        </a>

                        <div class="buttons-holder">
                            <a class="btn-add-to-wishlist"
                               data-in-wish-list="false"
                               data-add-to-wish-list="{{ $model->product->id }}"
                               href="javascript:void(0);">
                                {{ trans('layout.add_to_wish_list') }}
                            </a>
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
                        <a href="#reviews" data-review-scroll-tab data-toggle="tab">{{ trans('product.reviews') }}</a>
                    </li>
                    <li>
                        <a href="#description" data-toggle="tab">{{ trans('product.description') }}</a>
                    </li>
                    {{--<li>--}}
                    {{--<a href="#additional-info" data-toggle="tab">Характеристики</a>--}}
                    {{--</li>--}}
                </ul><!-- /.nav-tabs -->

                <div class="tab-content">
                    {{--REVIEWS TAB--}}
                    @include('partial.product-page.reviews-tab')

                    {{--DESCRIPTION TAB--}}
                    @include('partial.product-page.description-tab')

                    {{--PROPERTIES TAB--}}
                    {{--@include('partial.product-page.properties-tab')--}}



                </div><!-- /.tab-content -->

            </div><!-- /.tab-holder -->
        </div><!-- /.container -->
    </section><!-- /#single-product-tab -->
    <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->

    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    @include('partial.viewed-products')
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->

@endsection

@push('js')
<script defer src="/js/product/product.js"></script>
@endpush