@extends('emails.layout.default-email-layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Destinataire : <b>{{$recipient['full_name']}}</b> ({{$recipient['email']}})</p>
                <p>Contrat {{$claim->contract->contract_number}} - Sinistre {{$claim->external_id}}</p>
                <p>Bonjour,</p>
                <p>Par la présente, nous vous délégons la gestion du dossier en référence.</p>
                <p>Veuillez trouver :</p>
                <p> - L’ordre de Mission<br>
                    - Un récapitulatif du contrat AXA 2019<br>
                <p>Vous devez maintenant affecter ce sinistre à un gestionnaire dans l'outil <a href="http://gedosin.suissegrele.com">GEDOSIN</a>.</p>

                <p>Nous restons à votre disposition pour tout renseignement complémentaire.</p>

                <p>Cordialement</p>

                <p>SERVICE SINISTRE<br>
                    Tél : 03 80 60 07 70 – 06 38 96 04 83<br>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td>
                                        <table class="content-table">

                                            <tr><td colspan="3"><b><label>Contrat</label></b></td></tr>
                                            <tr>
                                                <td>
                                                    <b>Num Contrat</b>
                                                    {{$claim->contract->contract_number}}
                                                </td>
                                                <td>
                                                    <b>Produit</b>
                                                    {{$claim->contract->product}}
                                                </td>
                                                <td>
                                                    <b>Note </b>
                                                    {{$claim->note}}
                                                </td>
                                            </tr>
                                            <tr><td colspan="3"><b><label>Sinitre</label></b></td></tr>
                                            <tr>
                                                <td>
                                                    <b>Num sinistre</b>
                                                    {{$claim->external_id}}
                                                </td>
                                                <td>
                                                    <b>Type de dommage</b>
                                                    {{$claim->damage_type}}
                                                </td>
                                                <td><b>Date du sinistre</b>
                                                    {{$claim->happened_at->format('d/m/Y')}}
                                                </td>
                                            </tr>
                                            <tr><td colspan="3"><b><label>Contacts</label></b></td></tr>
                                            <tr>
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
                                                <td><b>Gestionnaire :</b> {{$manager->full_name}}</td>
                                                @foreach($assistants as $key => $assistant)
                                                    <p><b>Assistant №{{$key+1}}</b> {{$assistant->full_name}}
                                                    </p>
                                                @endforeach

                                            </tr>

                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p></p>
            </td>
        </tr>
    </table>
@endsection
