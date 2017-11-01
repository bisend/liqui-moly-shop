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
                                    <a>{{ trans('layout.personal_info') }}</a>
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
                        <li role="presentation" class="active">
                            <a>
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
                        <li role="presentation">
                            <a href="{{ url_wish_list($model->language) }}">
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
                            {{ trans('layout.personal_info') }}
                        </div>

                        <form class="form-horizontal" role="form" method="post">
                            {{csrf_field()}}
                            <div class="form-group">

                                <div class="col-sm-4">
                                    <input type="text"
                                           class="form-control"
                                           id="inputEmail3"
                                           data-personal-info-name
                                           value="{{ $user->name }}"
                                           placeholder="{{ trans('personal-info.name') }}">
                                </div>



                                <div class="col-sm-4">
                                    <input type="email"
                                           class="form-control"
                                           id="inputEmail3"
                                           data-personal-info-email
                                           value="{{ $user->email }}"
                                           placeholder="{{ trans('personal-info.email') }}">
                                </div>



                                <div class="col-sm-4">
                                    <input type="text"
                                           class="form-control"
                                           id="inputPassword3"
                                           data-personal-info-phone-number
                                           value="{{ ($model->profile != null && $model->profile->phone_number != null) ? $model->profile->phone_number : '' }}"
                                           placeholder="{{ trans('personal-info.phone') }}">
                                </div>




                                <div class="col-sm-12">
                                    <div class="login-box-title">
                                        {{ trans('layout.delivery_payment') }}
                                    </div>
                                </div>


                                <div class="col-sm-4">

                                    <div class="drop-menu-select" data-delivery-select>
                                        <div class="select" data-delivery-select-border>
                                            @if($model->profile != null && $model->profile->delivery_id != null)
                                                @foreach($model->deliveries as $delivery)
                                                    @if($delivery->id == $model->profile->delivery_id)
                                                        <span data-delivery-span-selected="{{ $model->profile->delivery_id }}">
                                                        {{ $delivery->name }}
                                                    </span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span data-delivery-span-selected>
                                                Доставка
                                            </span>
                                            @endif
                                            <i class="fa fa-chevron-down"></i>
                                        </div>
                                        <ul class="dropeddown" data-delivery-dropdown-container>

                                            @foreach($model->deliveries as $delivery)
                                                <li data-delivery-item="{{ $delivery->id }}"
                                                    data-delivery-id="{{ $delivery->id }}">
                                                    {{ $delivery->name }}
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="drop-menu-select" data-payment-select>
                                        <div class="select" data-payment-select-border>
                                            @if($model->profile != null && $model->profile->payment_id != null)
                                                @foreach($model->payments as $payment)
                                                    @if($payment->id == $model->profile->payment_id)
                                                        <span data-payment-span-selected="{{ $model->profile->payment_id }}">
                                                            {{ $payment->name }}
                                                        </span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span data-payment-span-selected>
                                                    Оплата
                                                </span>
                                            @endif
                                            <i class="fa fa-chevron-down"></i>
                                        </div>
                                        <ul class="dropeddown" data-payment-dropdown-container>

                                            @foreach($model->payments as $payment)
                                                <li data-payment-item="{{ $payment->id }}"
                                                    data-payment-id="{{ $payment->id }}">
                                                    {{ $payment->name }}
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <input type="text"
                                           class="form-control"
                                           id="inputEmail3"
                                           data-personal-info-address
                                           value="{{ ($model->profile != null && $model->profile->address_delivery != null) ? $model->profile->address_delivery : '' }}"
                                           placeholder="{{ trans('personal-info.address') }}">
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit"
                                            data-personal-info-submit
                                            class="le-button">
                                        {{ trans('personal-info.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script defer src="/js/profile/personal-info.js"></script>
@endpush