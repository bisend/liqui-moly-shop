@component('mail::message')
# Швидке замовлення № {{ $fastOrder->number }}

Нове швидке замовлення від {{ $fastOrder->name }}.

@component('mail::table')
| Фото | Назва | Ціна |
| :-------------: |:-------------------------------------------|:--------:|:----------:|:-----------:|
| <a href="{{ url_product($product->name_slug, $language) }}"><img height="65px" src="{{ url('/') }}/{{ $product->images[0]->small }}" alt=""></a> | <a href="{{ url_product($product->name_slug, $language) }}">{{ $product->name }}</a> | {{ $fastOrder->price }} грн |
@endcomponent

<table>
    <tr>
        <td>Замовник:</td>
        <td>{{ $fastOrder->name }}</td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td>{{ $fastOrder->phone_number }}</td>
    </tr>
</table>

<br>
Інтернет-магазин {{ config('app.name') }}
@endcomponent