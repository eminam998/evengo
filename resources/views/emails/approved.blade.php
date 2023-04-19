@component('mail::message')
Zdravo,

Vaša prijava je odobrena, pritisnite donji gumb za prijavu!



@component('mail::button', ['url' => $url, 'color' => 'blue'])
Log in
@endcomponent

{{-- Salutation --}}
Lijep pozdrav,
{{ config('app.name') }}


{{-- Subcopy --}}

@component('mail::subcopy')
If you’re having trouble clicking the "Log in" button, copy and paste the URL below
into your web browser: [{{ $url }}]({{ $url }})
@endcomponent
@endcomponent