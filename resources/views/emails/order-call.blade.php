@component('mail::message')
# Замовлення дзвінка

Нове замовлення дзвінка від користувача: "{{ $userName }}".

Номер телефону:

# {{ $phoneNumber }}

Інтернет-магазин {{ config('app.name') }}
@endcomponent
