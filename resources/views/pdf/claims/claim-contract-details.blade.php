@extends('emails.layout.default-email-layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
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
                                                    <b>Offre</b>
                                                    {{$claim->contract->offer}}
                                                </td>
                                                <td>
                                                    <b>Produit</b>
                                                    {{$claim->contract->product}}
                                                </td>
                                            </tr>
                                            <tr>
                                                @if($claim->contract->offer==='MRC')
                                                    <td>
                                                        <b>Franchise aleas</b>
                                                        {{$claim->contract->deductible_hazards_option}}
                                                    </td>
                                                    <td>
                                                        <b>Franchise grêle</b>
                                                        {{$claim->contract->deductible_hail_option}}
                                                    </td>
                                                    <td></td>
                                                @else
                                                    <td>
                                                        <b>Franchise grêle</b>
                                                        {{$claim->contract->deductible_hail_option}}
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($claim->contract->offer==='MRC')
                                                    <td>
                                                        <b>Frais de resemis</b>
                                                        @if($claim->contract->option1==='ja')
                                                            Oui
                                                            @else
                                                            Non
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>Frais de récolte supplémentaires</b>
                                                        @if($claim->contract->option2==='ja')
                                                            Oui
                                                        @else
                                                            Non
                                                        @endif
                                                    </td>
                                                    <td></td>
                                                @else
                                                    <td>
                                                        <b>Gel</b>
                                                        @if($claim->contract->option1==='ja')
                                                            Oui
                                                        @else
                                                            Non
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>Qualité</b>
                                                        @if($claim->contract->option2==='ja')
                                                            Oui
                                                        @else
                                                            Non
                                                        @endif
                                                    </td>
                                                    <td></td>
                                                @endif
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
                                            <tr>
                                                <td colspan="3">
                                                    <b>Année de récolte</b>
                                                    {{$claim->harvest_year}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Note</b>
                                                    {{$claim->note}}
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
                                                <td><p> <b>Gestionnaire :</b> {{$manager->full_name}}</p>
                                                    <p>  <b>Assistant(s) :</b></p>
                                                @foreach($assistants as $key => $assistant)
                                                    <p> - {{$assistant->full_name}}
                                                    </p>
                                                @endforeach
                                                </td>

                                            </tr>
                                            <tr><td colspan="3"><b><label>Clauses</label></b></td></tr>
                                            <tr><td colspan="3">{{$claim->contract->clauses}}</td></tr>
                                            <tr><td colspan="3"><b><label>Positions</label></b></td></tr>
                                            <tr><td colspan="3"><table class="content-table">

                                                        <thead>
                                                        <tr>
                                                            <td>Pos.</td>
                                                            <td>Parcelle</td>
                                                            <td>Culture</td>
                                                            <td>Variété</td>
                                                            <td>Superficie</td>
                                                            <td>Rdt. assuré</td>
                                                            <td>Prix unitaire</td>
                                                            <td>Capital</td>
                                                            <td>Franchise Grêle</td>
                                                            <td>Option Tempête</td>
                                                            <td>Franchise Tempête</td>
                                                            <td>Qualité</td>
                                                            <td>Vent de sable</td>
                                                            <td>Sinistrée</td>
                                                            <td>Récolte</td>
                                                        </tr>
                                                        </thead>

                                                        @foreach($plots as $key => $plot)
                                                            @if($plot->plot_number!=0))
                                                            <tr>
                                                                <td>{{$plot->object_number}}</td>
                                                                <td>{{$plot->plot_name}}</td>
                                                                <td>{{$plot->crop_name}}</td>
                                                                <td>{{$plot->crop_variety}}</td>
                                                                <td>{{$plot->plot_surface}} ha</td>
                                                                <td>{{$plot->yield_increase === 0 ? $plot->yield : number_format($plot->yield + $plot->yield*$plot->yield_increase/100, 2, '.', '')}}</td>
                                                                <td>{{$plot->unit_price}}</td>
                                                                <td>{{$plot->capital_sum_estimation}}</td>
                                                                <td>{{$plot->deductible_hail_plot}} %</td>
                                                                <td>{{$plot->storm_plot === "ja" ? "OUI" : "NON"}}</td>
                                                                <td>{{$plot->deductible_storm_plot}} %</td>
                                                                <td>{{$plot->quality === "ja" ? "OUI" : "NON"}}</td>
                                                                <td>{{$plot->sandstorm === "ja" ? "OUI" : "NON"}}</td>
                                                                @if($plot->damaged)
                                                                    <td><b>OUI</b></td>
                                                                    @else
                                                                    <td>NON</td>
                                                                @endif
                                                                @switch($plot->harvest_in)
                                                                    @case('001')
                                                                    <td>en récolte</td>
                                                                    @break
                                                                    @case('005')
                                                                    <td>dans 5 jours</td>
                                                                    @break
                                                                    @case('010')
                                                                    <td>dans 10 jours</td>
                                                                    @break
                                                                    @case('030')
                                                                    <td>dans 30 jours</td>
                                                                    @break
                                                                    @case('999')
                                                                    <td>inconnue</td>
                                                                    @break
                                                                    @default
                                                                    <td></td>
                                                                    @break
                                                                @endswitch
                                                            </tr>
                                                            @endif
                                                        @endforeach

                                                    </table></td></tr>

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
