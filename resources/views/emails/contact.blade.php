@component('mail::message')
# {{ trans('email.new_message') }} {{ trans('email.from') }} {{ $name }}.

E-mail: {{ $email }}

{{ trans('email.message') }}:
<p>{{ $message }}</p>

<br>
{{ trans('email.shop') }} {{ config('app.name') }}
@endcomponent