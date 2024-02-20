@component('mail::message')
# Contact

Er is een contactverzoek ingediend via de website. Lees hieronder de details en gebruikt de reageer functie van uw
e-mail programma om in contact te komen.

<hr>

**Naam**:<br>
{{ $data['name'] }}

**E-mailadres**:<br>
{{ $data['email'] }}

**Onderwerp**:<br>
{{ $data['subject'] }}

**Content**:<br>
{{ $data['message'] }}

<hr>

Met vriendelijke groet,<br>
{{ config('app.name') }}
@endcomponent