@component('mail::message')
Hello,

We regret to inform you that your application has been denied.

{{-- Salutation --}}
Regards,
{{ config('app.name') }}




@endcomponent