@component('mail::message')
Zdravo,

Vaša prijava na događaj {{$mailData['name']}} je odobrena. Molimo Vas pokažite ovaj mail na ulazu na događaj.


Ugodan provod.

{{-- Salutation --}}
Omogućio {{ config('app.name') }}




@endcomponent