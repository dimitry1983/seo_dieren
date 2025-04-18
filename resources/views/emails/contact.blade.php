@component('mail::message')
# {{ devTranslate('inbox.Contact via sex-advertenties.com', 'Contact via sex-advertenties.com') }}

{!! nl2br(e($messageContent)) !!}

{{ devTranslate('inbox.Bedankt', 'Bedankt') }},<br>
{{ config('app.name') }}
@endcomponent
