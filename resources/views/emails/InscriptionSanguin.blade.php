@component('mail::message')
## Bonjour 
@if($data['sex'] == 'M')
M. {{ $data['name'] }} {{ $data['first_name'] }}
@else
Mme {{ $data['name'] }} {{ $data['first_name'] }}
@endif

Bienvenue à {{ config('app.name') }}  votre Inscription a bien été éfectué.
Nous sommes Heureux de vous compter parmi nous.

@component('mail::button', ['url' => url("/")])
Retour sur la plateforme
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
