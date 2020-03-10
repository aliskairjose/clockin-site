@component('mail::message')
# Bienvenido

Has sido agregado a la empresa {{ $company }}<br><br>
Te invitamos a descargar nuestra app

Gracias,<br>
{{ config('app.name') }}
@endcomponent
