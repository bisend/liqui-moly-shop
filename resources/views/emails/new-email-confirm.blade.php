@component('mail::message')
# Підтвердження нового e-mail

Вітаємо Вас, {{ $user->name }}.

Для підтвердження нового e-mail натисніть кнопку або перейдіть за посиланням.
@component('mail::button', ['url' => $confirmationUrl])
Підтвердити новий e-mail
@endcomponent
<a href="{{ $confirmationUrl }}">{{ $confirmationUrl }}</a>

Дякуємо,<br>
Інтернет-магазин {{ config('app.name') }}
@endcomponent