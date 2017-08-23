@component('mail::message')
# Підтвердження e-mail

Вітаємо Вас, {{ $user->name }}.

Для підтвердження e-mail натисніть кнопку або перейдіть за посиланням.
@component('mail::button', ['url' => $confirmationUrl])
Підтвердити e-mail
@endcomponent
<a href="{{ $confirmationUrl }}">{{ $confirmationUrl }}</a>

Дякуємо,<br>
Інтернет-магазин {{ config('app.name') }}
@endcomponent
