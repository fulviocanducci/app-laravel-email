@component('mail::message')
# E-mail

Teste de E-mail

<img src="{{ asset('images/email.png') }}" alt="{{ config('app.name') }} Logo" />

@component('mail::button', ['url' => $url])
Recuperar Senha
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
