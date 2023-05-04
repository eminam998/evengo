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
Ako imate problema s klikom na gumb "Prijava", kopirajte i zalijepite donji URL
u vaš web preglednik: [{{ $url }}]({{ $url }})
@endcomponent
@endcomponent