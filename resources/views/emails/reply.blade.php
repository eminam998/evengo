@component('mail::message')
Zdravo, {{$mailData['name']}}

{{$mailData['message']}}

{{-- Salutation --}}
Lijep pozdrav,
{{ config('app.name') }}




@endcomponent

