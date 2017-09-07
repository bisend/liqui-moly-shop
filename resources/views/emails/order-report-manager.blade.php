@component('mail::message')
# Замовлення № {{ $model->order->order_number }}

Нове замовлення від {{ $username }}.

@component('mail::table')
| Фото | Ім'я | Ціна | К-сть | Сума |
| :-------------: |:-------------------------------------------|:--------:|:----------:|:-----------:|
@foreach($model->orderProducts as $orderProduct)
    | <a href="{{ url_product($orderProduct->name_slug, $model->language) }}"><img height="65px" src="{{ url('/') }}/{{ $orderProduct->images[0]->small }}" alt=""></a> | <a href="{{ url_product($orderProduct->name_slug, $model->language) }}">{{ $orderProduct->name }}</a> | {{ $orderProduct->price }} грн | {{ $orderProduct->productCount }} | {{ set_format_price($orderProduct->price, $orderProduct->productCount) }} грн |
@endforeach
@endcomponent
Всього до оплати: <span style="font-weight: 600; color: #ed1c24">{{ set_format_price($model->order->total_order_amount) }}</span> грн

<table>
    <tr>
        <td>Замовник:</td>
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
        <td>Спосіб оплати:</td>
        <td>
            @foreach ($model->payments as $payment)
                @if($payment->id == $model->order->payment_id)
                    {{ $payment->name }}
                @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td>Спосіб доставки:</td>
        <td>
            @foreach ($model->deliveries as $delivery)
                @if($delivery->id == $model->order->delivery_id)
                    {{ $delivery->name }}
                @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td>Адреса:</td>
        <td>{{ $model->order->address_delivery }}</td>
    </tr>
</table>

<br>
Дякуємо,<br>
Інтернет-магазин {{ config('app.name') }}
@endcomponent