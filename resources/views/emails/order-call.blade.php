@component('mail::message')
# {{ trans('email.call_order') }}

{{ trans('email.new_order_call') }}: "{{ $userName }}".

Телефон:

# {{ $phoneNumber }}

{{ trans('email.shop') }} {{ config('app.name') }}
@endcomponent
