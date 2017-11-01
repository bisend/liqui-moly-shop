@php($user = (auth()->check()) ? auth()->user() : null)
@extends('layout')

@section('content')
    <div class="animate-dropdown">
        <!-- ========================================= BREADCRUMB ========================================= -->
        <div id="top-mega-nav">
            <div class="container">
                <nav>
                    <ul class="inline">

                        {{--BREADCRUMBS--}}
                        @include('partial.order-page.breadcrumbs')

                    </ul><!-- /.inline -->
                </nav>

            </div><!-- /.container -->
        </div><!-- /#top-mega-nav -->
        <!-- ========================================= BREADCRUMB : END ========================================= -->
    </div>


    <div class="checkout-section">
        <div class="container">
            <div class="section-title-checkout">
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{ trans('layout.breadcrumb_order') }}</h1>
                    </div>
                    <div class="col-md-6">
                        <a class="le-button" data-toggle="modal" data-target="#ModalCart">{{ trans('order.edit_order') }}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="login-box login-box-form">
                        <div class="login-box-title">
                            {{ trans('layout.personal_info') }}
                        </div>
                        <div class="row">

                            <form class="form-horizontal" role="form" method="post">
                                {{ csrf_field() }}
                                <div class="col-sm-12">
                                    <input type="text"
                                           name="name"
                                           data-order-name
                                           class="form-control"
                                           id="inputEmail3"
                                           value="{{ $user ? $user->name : '' }}"
                                           placeholder="{{ trans('order.name') }}">
                                </div>
                                <div class="col-sm-6">
                                    <input type="email"
                                           name="email"
                                           data-order-email
                                           class="form-control"
                                           id="inputEmail3"
                                           value="{{ $user ? $user->email : '' }}"
                                           placeholder="{{ trans('order.email') }}">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"
                                           name="phone"
                                           data-order-phone
                                           class="form-control"
                                           id="inputPassword3"
                                           value="{{ $model->profile ? $model->profile->phone_number : '' }}"
                                           placeholder="{{ trans('order.phone_number') }}">
                                </div>

                                <div class="col-sm-12">
                                    <div class="login-box-title">
                                        {{ trans('layout.delivery_payment') }}
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="drop-menu-select" data-payment-select>
                                        <div class="select" data-payment-select-border>
                                            {{--<span data-payment-selected-item>Оплата</span>--}}
                                            @if($model->profile != null && $model->profile->payment_id != null)
                                                @foreach($model->payments as $payment)
                                                    @if($payment->id == $model->profile->payment_id)
                                                        <span data-payment-selected-item="{{ $model->profile->payment_id }}">
                                                            {{ $payment->name }}
                                                        </span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span data-payment-selected-item>
                                                    Оплата
                                                </span>
                                            @endif
                                            <i class="fa fa-chevron-down"></i>
                                        </div>

                                        <ul class="dropeddown" data-payment-dropdown-menu>

                                            @foreach($model->payments as $payment)
                                                <li data-payment-id="{{ $payment->id }}">
                                                    {{ $payment->name }}
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="drop-menu-select" data-delivery-select>
                                        <div class="select" data-delivery-select-border>
                                            {{--<span data-delivery-selected-item>Доставка</span>--}}
                                            @if($model->profile != null && $model->profile->delivery_id != null)
                                                @foreach($model->deliveries as $delivery)
                                                    @if($delivery->id == $model->profile->delivery_id)
                                                        <span data-delivery-selected-item="{{ $model->profile->delivery_id }}">
                                                        {{ $delivery->name }}
                                                    </span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span data-delivery-selected-item>
                                                Доставка
                                            </span>
                                            @endif
                                            <i class="fa fa-chevron-down"></i>
                                        </div>

                                        <ul class="dropeddown" data-delivery-dropdown-menu>

                                            @foreach($model->deliveries as $delivery)
                                                <li data-delivery-id="{{ $delivery->id }}">{{ $delivery->name }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12 nova-poshta no-margin">
                                    {{--<div class="col-md-6">--}}
                                        {{--<input type="text"--}}
                                               {{--name="city"--}}
                                               {{--data-order-city--}}
                                               {{--class="form-control"--}}
                                               {{--id="inputEmail3"--}}
                                               {{--value="Rivne"--}}
                                               {{--placeholder="Введіть місто">--}}

                                    {{--</div>--}}
                                    <div class="col-md-12">

                                        <input type="text"
                                               name="address"
                                               data-order-address
                                               class="form-control"
                                               id="inputEmail3"
                                               value="{{ $model->profile ? $model->profile->address_delivery : '' }}"
                                               placeholder="{{ trans('order.address') }}">
                                    </div>
                                </div>



                                {{--<div class="col-sm-12">--}}
                                    {{--<input type="text" class="form-control" id="inputEmail3" placeholder="Адреса доставки">--}}
                                {{--</div>--}}

                                <div class="col-sm-12">
                                    <button type="submit"
                                            data-order-submit
                                            class="le-button">
                                        {{ trans('order.save') }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="login-box">
                        <div class="login-box-title">
                            {{ trans('order.your_order') }}
                        </div>

                        <div class="main-content wishlist-section" id="main-content">
                            <div class="row">
                                <div class="col-lg-12 center-block page-wishlist style-cart-page">

                                    <div class="items-holder">
                                        <div class="container-fluid wishlist_table">

                                            @foreach($model->orderProducts as $orderProduct)
                                                <div class="row cart-item cart_item" id="yith-wcwl-row-1"
                                                     data-order-product-container="{{ $orderProduct->id }}">
                                                    <div class="col-xs-12 col-sm-2 no-margin">
                                                        <a href="{{ url_product($orderProduct->name_slug, $model->language) }}">
                                                            <img width="93"
                                                                 height="63"
                                                                 alt="{{ $orderProduct->name }}"
                                                                 class="attachment-shop_thumbnail wp-post-image"
                                                                 src="{{ $orderProduct->images[0]->small }}">
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-5">
                                                        <div class="title">
                                                            <a href="{{ url_product($orderProduct->name_slug, $model->language) }}">
                                                                {{ $orderProduct->name }}
                                                            </a>
                                                        </div><!-- /.title -->
                                                        <div class="price">
                                                            <span class="amount">
                                                                {{ set_format_price($orderProduct->price) }}
                                                            </span> <span class="amount">грн</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-1 no-margin">
                                                        x <span data-order-product-count="{{ $orderProduct->id }}">
                                                            {{ $orderProduct->productCount }}</span>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-4 no-margin">
                                                        <div class="text-right">
                                                            <div class="checkout-total-price-product">
                                                                <span data-product-sum="{{ $orderProduct->id }}">
                                                                    {{ set_format_price($orderProduct->price, $orderProduct->productCount) }}
                                                                </span> <span>грн</span>
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
                                <div class="checkout-total-price">
                                    {{ trans('order.order_sum') }} : <span data-cart-total-sum>
                                        {{ set_format_price($model->totalOrderAmount) }}
                                    </span> <span>грн</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script defer src="/js/order/order.js"></script>
@endpush