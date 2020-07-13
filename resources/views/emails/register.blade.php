@component('mail::message')
## Activation de compte
Merci pour votre inscription {{ $user->name }} sur la plateforme Aidons nous
Clique sur le boutton ci dessous pour valider ton compte

@component('mail::button', ['url' => ''])
Valider mon Compte
@endcomponent

Merci,<br>
AidNov™
@endcomponent
