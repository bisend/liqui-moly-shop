@component('mail::message')
# Замовлення № {{ $model->order->order_number }}

Вітаємо Вас, {{ $username }}.

@component('mail::table')
| Фото | Ім'я | Ціна | К-сть | Сума |
| :-------------: |:-------------------------------------------|:--------:|:----------:|:-----------:|
@foreach($model->orderProducts as $orderProduct)
| <a href="{{ url_product($orderProduct->name_slug, $model->language) }}"><img height="65px" src="{{ url('/') }}/{{ $orderProduct->images[0]->small }}" alt=""></a> | <a href="{{ url_product($orderProduct->name_slug, $model->language) }}">{{ $orderProduct->name }}</a> | {{ $orderProduct->price }} грн | {{ $orderProduct->productCount }} | {{ set_format_price($orderProduct->price, $orderProduct->productCount) }} грн |
@endforeach
@endcomponent
Всього до оплати: <span style="font-weight: 600; color: #ed1c24">{{ set_format_price($model->order->total_order_amount) }}</span> грн

<ul>
    <li>Замовник:</li>asdasdasdasd
    <li>E-mail:</li>asdasdasdasdasd
    <li>Телефон:</li>asdasdasdasdasd
    <li>Спосіб оплати:</li>asdasdasdasd
    <li>Спосіб доставки:</li>asdasdasdasd
    <li>Адреса:</li>asdasdasdasd
</ul>

Дякуємо,<br>
Інтернет-магазин {{ config('app.name') }}
@endcomponent
