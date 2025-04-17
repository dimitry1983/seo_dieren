@component('mail::message')
# New Support Message from {{ $user->name }}

**Email:** {{ $user->email }}  
**User ID:** {{ $user->id }}

---

{!! nl2br($messageContent) !!}

Thanks,  
{{ config('app.name') }}
@endcomponent