@component('mail::message')
Hello,

Your application has been approved, please press the button below to log in!



@component('mail::button', ['url' => $url, 'color' => 'blue'])
Log in
@endcomponent

{{-- Salutation --}}
Regards,
{{ config('app.name') }}


{{-- Subcopy --}}

@component('mail::subcopy')
If you’re having trouble clicking the "Log in" button, copy and paste the URL below
into your web browser: [{{ $url }}]({{ $url }})
@endcomponent
@endcomponent