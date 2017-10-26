@component('mail::message')
# {{ trans('email.your_order') }} № {{ $model->order->order_number }}

{{ trans('email.welcome') }}, {{ $username }}.

@component('mail::table')
| Фото | {{ trans('email.product_name') }} | {{ trans('email.price') }} | {{ trans('email.count') }} | {{ trans('email.sum') }} |
| :-------------: |:-------------------------------------------|:--------:|:----------:|:-----------:|
@foreach($model->orderProducts as $orderProduct)
| <a href="{{ url_product($orderProduct->name_slug, $model->language) }}"><img height="65px" src="{{ url('/') }}/{{ $orderProduct->images[0]->small }}" alt=""></a> | <a href="{{ url_product($orderProduct->name_slug, $model->language) }}">{{ $orderProduct->name }}</a> | {{ $orderProduct->price }} грн | {{ $orderProduct->productCount }} | {{ set_format_price($orderProduct->price, $orderProduct->productCount) }} грн |
@endforeach
@endcomponent
{{ trans('email.to_pay') }}: <span style="font-weight: 600; color: #ed1c24">{{ set_format_price($model->order->total_order_amount) }}</span> грн

<table>
    <tr>
        <td>{{ trans('email.customer') }}:</td>
        <td>{{ $username }}</td>
    </tr>
    <tr>
        <td>E-mail:</td>
        <td>{{ $model->order->email }}</td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td>{{ $model->order->phone_number }}</td>
    </tr>
    <tr>
        <td>{{ trans('email.payment') }}:</td>
        <td>
            @foreach ($model->payments as $payment)
                @if($payment->id == $model->order->payment_id)
                    {{ $payment->name }}
                @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td>{{ trans('email.delivery') }}:</td>
        <td>
            @foreach ($model->deliveries as $delivery)
                @if($delivery->id == $model->order->delivery_id)
                    {{ $delivery->name }}
                @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td>{{ trans('email.address') }}:</td>
        <td>{{ $model->order->address_delivery }}</td>
    </tr>
</table>

<br>
{{ trans('email.thanks') }},<br>
{{ trans('email.shop') }} {{ config('app.name') }}
@endcomponent