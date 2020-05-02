@extends('emails.layout.default-email-layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Bonjour,</p>

                <p>Suite à notre entretien téléphonique, nous vous confirmons la modification de la date du rendez-vous d'expertise pour votre dommage de {{strtolower($survey->claim->damage_type)}} n°{{$survey->claim->external_id}} (contrat {{$survey->claim->contract->contract_number}}).</p>
                <p>La nouvelle date est le {{ date('d/m/Y \à H\hi', strtotime($survey->datetime_scheduled)) }}.</p>
                {{-- survenu le {{$survey->claim->happened_at->format('d/m/Y')}} --}}
                <p>Nous vous prions d'avoir à disposition vos documents PAC 2019.</p>
                <p>Votre agent est en copie de ce message.</p>
                <a href="{{$linkGoogleCalendar->google()}}">{{$linkGoogleCalendar->google()}}</a>
                <p></p>
                <p>Cordialement,</p>
                @if($manager)
                <p>{{$manager->full_name}}
                    @if(!is_null($manager->phone))
                        <br>Tel :  {{$manager->phone}}
                    @endif

                    @if(!is_null($manager->email))
                        <br>Email :  {{$manager->email}}
                    @endif
                </p>
                @endif

                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td>
                                        <h4></h4>
                                        <table class="content-table">
                                            <tr>
                                                @if($customer)
                                                <td><b>Client :</b> {{$customer->full_name}}<br>
                                                    {{$customer->address1}}<br>
                                                    @if(!is_null($customer->address2))
                                                        {{$customer->address2}}<br>
                                                    @endif
                                                    {{$customer->zipcode}} {{$customer->city}}<br>
                                                    <br>
                                                    @if(!is_null($customer->landline))
                                                        Tel :  {{$customer->landline}}<br>
                                                    @endif
                                                    @if(!is_null($customer->mobile))
                                                        Portable :  {{$customer->mobile}}<br>
                                                    @endif
                                                    @if(!is_null($customer->fax))
                                                        Fax :  {{$customer->fax}}<br>
                                                    @endif
                                                    @if(!is_null($customer->email))
                                                        Email :  {{$customer->email}}<br>
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($agent)
                                                <td><b>Agent :</b> {{$agent->full_name}}<br>
                                                    {{$agent->address1}}<br>
                                                    @if(!is_null($agent->address2))
                                                        {{$agent->address2}}<br>
                                                    @endif
                                                    {{$agent->zipcode}} {{$agent->city}}<br>
                                                    <br>
                                                    @if(!is_null($agent->landline))
                                                        Tel :  {{$agent->landline}}<br>
                                                    @endif
                                                    @if(!is_null($agent->mobile))
                                                        Portable :  {{$agent->mobile}}<br>
                                                    @endif
                                                    @if(!is_null($agent->fax))
                                                        Fax :  {{$agent->fax}}<br>
                                                    @endif
                                                    @if(!is_null($agent->email))
                                                        Email :  {{$agent->email}}<br>
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p></p>
            </td>
        </tr>
    </table>
@endsection
