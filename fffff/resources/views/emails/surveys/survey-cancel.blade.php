@extends('emails.layout.default-email-layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Bonjour,</p>
                <p>Suite à notre entretien téléphonique, nous vous confirmons <u>l’annulation du rendez-vous d’expertise</u> du
                    {{ date('d/m/Y \à H\hi', strtotime($survey->datetime_scheduled)) }} pour votre dommage de {{strtolower($survey->claim->damage_type)}} n°{{$survey->claim->external_id}} (contrat {{$survey->claim->contract->contract_number}}).</p>
                <p>Votre agent est en copie de ce message.</p>
                <p></p>
            </td>
        </tr>
    </table>
@endsection
