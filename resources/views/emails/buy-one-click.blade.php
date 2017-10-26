@component('mail::message')
# {{ trans('email.fast_order') }} № {{ $fastOrder->number }}

{{ trans('email.new_fast_order_from') }} {{ $fastOrder->name }}.

@component('mail::table')
| Фото | {{ trans('email.product_name') }} | {{ trans('email.price') }} |
| :-------------: |:-------------------------------------------|:--------:|:----------:|:-----------:|
| <a href="{{ url_product($product->name_slug, $language) }}"><img height="65px" src="{{ url('/') }}/{{ $product->images[0]->small }}" alt=""></a> | <a href="{{ url_product($product->name_slug, $language) }}">{{ $product->name }}</a> | {{ $fastOrder->price }} грн |
@endcomponent

<table>
    <tr>
        <td>{{ trans('email.customer') }}:</td>
        <td>{{ $fastOrder->name }}</td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td>{{ $fastOrder->phone_number }}</td>
    </tr>
</table>

<br>
{{ trans('email.shop') }} {{ config('app.name') }}
@endcomponent