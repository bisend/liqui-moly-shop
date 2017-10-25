@extends('layout')
@php($user = (auth()->check()) ? auth()->user() : null )
@section('content')
    <div class="animate-dropdown">
        <!-- ========================================= BREADCRUMB ========================================= -->
        <div id="top-mega-nav">
            <div class="container">
                <nav>
                    <ul class="inline">
                        <li class="breadcrumb-nav-holder">
                            <ul>
                                <li class="dropdown breadcrumb-item">
                                    <a href="{{ url_home($model->language) }}">{{ trans('layout.breadcrumb_home') }}</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item">
                                    <a>{{ trans('layout.breadcrumb_profile') }}</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item current">
                                    <a>{{ trans('layout.wish_list') }}</a>
                                </li><!-- /.breadcrumb-item -->
                            </ul>
                        </li><!-- /.breadcrumb-nav-holder -->

                    </ul><!-- /.inline -->
                </nav>

            </div><!-- /.container -->
        </div><!-- /#top-mega-nav -->
        <!-- ========================================= BREADCRUMB : END ========================================= -->
    </div>


    <div class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation">
                            <a href="{{ url_personal_info($model->language) }}">
                                {{ trans('layout.personal_info') }}
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_change_password($model->language) }}">
                                {{ trans('layout.change_password') }}
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_my_orders($model->language) }}">
                                {{ trans('layout.my_orders') }}
                            </a>
                        </li>
                        <li role="presentation" class="active">
                            <a>
                                {{ trans('layout.wish_list') }}
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0);" data-action-logout>
                                {{ trans('layout.exit') }}
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="login-box">
                        <div class="login-box-title">
                            {{ trans('layout.wish_list') }}
                        </div>

                        <div class="main-content wishlist-section" id="main-content">
                            <div class="row">
                                <div class="col-lg-12 center-block page-wishlist style-cart-page">

                                    <div class="items-holder">
                                        <div class="container-fluid wishlist_table" data-wish-list-container>
                                            @if($model->wishListProducts->count() > 0)
                                                @foreach($model->wishListProducts as $wishListProduct)
                                                    <div class="row cart-item cart_item" id="yith-wcwl-row-1">

                                                        <div class="col-xs-12 col-sm-1 no-margin">
                                                            <a title="{{ trans('wish-list.delete') }}"
                                                               class="remove_from_wishlist remove-item"
                                                               data-delete-from-wish-list="{{ $wishListProduct->id }}"
                                                               data-delete-from-wish-list-product-id="{{ $wishListProduct->product_id }}"
                                                               href="javascript:void(0);">×</a>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-2 no-margin">
                                                            <a href="{{ url_product($wishListProduct->product->name_slug, $model->language) }}">
                                                                <img width="93"
                                                                     height="73"
                                                                     alt="{{ $wishListProduct->product->name }}"
                                                                     class="attachment-shop_thumbnail wp-post-image"
                                                                     src="{{ $wishListProduct->product->images[0]->small }}">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-3 no-margin">
                                                            <div class="title">
                                                                <a href="{{ url_product($wishListProduct->product->name_slug, $model->language) }}">
                                                                    {{ $wishListProduct->product->name }}
                                                                </a>
                                                            </div><!-- /.title -->
                                                            <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-3">
                                                            <div class="price">
                                                                <span class="amount">{{ $wishListProduct->product->price }} грн</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-2 no-margin">
                                                            <div class="text-right">
                                                                <div class="add-cart-button">
                                                                    <a class="le-button add_to_cart_button product_type_simple"
                                                                       data-in-cart="false"
                                                                       data-add-to-cart="{{ $wishListProduct->product->id }}"
                                                                       href="javascript:void(0);">{{ trans('layout.add_to_cart') }}</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div><!-- /.cart-item -->
                                                @endforeach
                                            @else
                                                Пусто
                                            @endif

                                            @include('pages.profile.pagination-wish-list')

                                        </div><!-- /.wishlist-table -->
                                    </div><!-- /.items-holder -->

                                </div><!-- .large-->
                            </div><!-- .row-->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection