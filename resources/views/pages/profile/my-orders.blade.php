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
                                    <a href="{{ url_home($model->language) }}">Головна</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item">
                                    <a>Особистий кабінет</a>
                                </li><!-- /.breadcrumb-item -->

                                <li class="breadcrumb-item current">
                                    <a>Мої замовлення</a>
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
                                Особисті дані
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_change_password($model->language) }}">
                                Зміна пароля
                            </a>
                        </li>
                        <li role="presentation"  class="active">
                            <a>
                                Мої замовлення
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url_wish_list($model->language) }}">
                                Список бажань
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0);" data-action-logout>
                                Вихід
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="login-box">
                        <div class="login-box-title">
                            Мої замовлення
                        </div>

                        <div class="main-content wishlist-section" id="main-content">
                            <div class="row">
                                <div class="col-lg-12 center-block page-wishlist style-cart-page myOrders">

                                    <div class="items-holder myOrders-item">
                                        <div class="container-fluid wishlist_table">

                                            @if($model->orders->count() > 0)
                                                <div class="row cart-item cart_item cart_item-header">

                                                    <div class="col-xs-12 col-sm-3 no-margin">
                                                        Номер
                                                    </div>

                                                    <div class="col-xs-12 col-sm-3 no-margin">
                                                        К-сть товарів
                                                    </div>

                                                    <div class="col-xs-12 col-sm-3 no-margin">
                                                        Сума
                                                    </div>
                                                </div><!-- /.cart-item -->


                                                @foreach($model->orders as $order)
                                                    <div class="row cart-item cart_item" id="yith-wcwl-row-1">

                                                        <div class="col-xs-12 col-sm-3 no-margin">
                                                            <a data-toggle="modal"
                                                               data-target="#order-detail-{{ $order->order_number }}">№ {{ $order->order_number }}</a>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-3 no-margin">
                                                            <span>{{ $order->total_products_count }}</span>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-3 no-margin">
                                                            <div class="price">
                                                                <span class="amount">{{ $order->total_order_amount }} грн</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-3 no-margin">
                                                            <div class="text-right">
                                                                <div class="add-cart-button">
                                                                    <a class="le-button"
                                                                       data-toggle="modal"
                                                                       data-target="#order-detail-{{ $order->order_number }}">
                                                                        Переглянути
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.cart-item -->

                                                    <div class="modal fade" id="order-detail-{{ $order->order_number }}"
                                                         tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="order-detail-{{ $order->order_number }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title">
                                                                        Деталі замовлення №{{ $order->order_number }}
                                                                    </h4>

                                                                </div>
                                                                <div class="modal-body">

                                                                    {{------------  ДЕТАЛІ ЗАМОВЛЕННЯ ---------------}}
                                                                    <div class="order-deteil">
                                                                        <div class="main-content wishlist-section" id="main-content">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 center-block page-wishlist style-cart-page">

                                                                                    <div class="items-holder">
                                                                                        <div class="container-fluid wishlist_table">

                                                                                            @foreach($order->order_products as $order_product)
                                                                                                <div class="row cart-item cart_item" id="yith-wcwl-row-1">
                                                                                                    <div class="col-xs-12 col-sm-2 no-margin">
                                                                                                        <a href="{{ url_product($order_product->product->name_slug, $model->language) }}">
                                                                                                            <img width="93"
                                                                                                                 height="63"
                                                                                                                 alt="Canon PowerShot Elph 115 IS"
                                                                                                                 class="attachment-shop_thumbnail wp-post-image"
                                                                                                                 src="{{ $order_product->product->images[0]->small }}">
                                                                                                        </a>
                                                                                                    </div>
                                                                                                    <div class="col-xs-12 col-sm-5">
                                                                                                        <div class="title">
                                                                                                            <a href="{{ url_product($order_product->product->name_slug, $model->language) }}">
                                                                                                                {{ $order_product->product->name }}
                                                                                                            </a>
                                                                                                        </div><!-- /.title -->
                                                                                                        <div class="price">
                                                                                                            <span class="amount">
                                                                                                                {{ set_format_price($order_product->price) }} грн
                                                                                                            </span>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-xs-12 col-sm-1 no-margin">
                                                                                                        x <span>{{ $order_product->product_count }}</span>
                                                                                                    </div>

                                                                                                    <div class="col-xs-12 col-sm-4 no-margin">
                                                                                                        <div class="text-right">
                                                                                                            <div class="checkout-total-price-product">
                                                                                                                <span>
                                                                                                                    {{ set_format_price($order_product->price, $order_product->product_count) }} грн
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div><!-- /.cart-item -->
                                                                                            @endforeach


                                                                                        </div><!-- /.wishlist-table -->
                                                                                    </div><!-- /.items-holder -->

                                                                                </div><!-- .large-->
                                                                            </div><!-- .row-->

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="order-detali-info">
                                                                                    <ul>
                                                                                        @foreach($model->deliveries as $delivery)
                                                                                            @if($delivery->id == $order->delivery_id)
                                                                                                <li>Спосіб доставки : {{ $delivery->name }}</li>
                                                                                            @endif
                                                                                        @endforeach
                                                                                        @foreach($model->payments as $payment)
                                                                                            @if($payment->id == $order->payment_id)
                                                                                                <li>Спосіб оплати : {{ $payment->name }}</li>
                                                                                            @endif
                                                                                        @endforeach
                                                                                        {{--<li>Статус : <span>Оплачено</span></li>--}}
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="checkout-total-price">
                                                                                    Сума замовлення : <span>{{ $order->total_order_amount }}</span> грн
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{---------------------  ДЕТАЛІ ЗАМОВЛЕННЯ  END------------------------}}

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @else
                                                Пусто
                                            @endif






                                        </div><!-- /.wishlist-table -->
                                    </div><!-- /.items-holder -->

                                </div><!-- .large-->
                            </div><!-- .row-->

                            @include('pages.profile.pagination')

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection