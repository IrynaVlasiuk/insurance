@extends('emails.layout.default-email-layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Hi, <b>{{$recipient['full_name']}}</b></p>
                    <p>Survey is scheduled for {{$survey->datetime_scheduled}}</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td>
                                        <h4>Survey Details: </h4>
                                        <table class="content-table">

                                            <thead>
                                            <tr>
                                                <td>Survey</td>
                                                <td>Contract</td>
                                                <td>Claim</td>
                                                <td>Acting Roles</td>
                                            </tr>
                                            </thead>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <label>Survey №</label>
                                                        {{$survey->id}}
                                                    </p>
                                                    <p><label>DateTime Scheduled</label>
                                                        {{$survey->datetime_scheduled}}
                                                    </p>
                                                    <p>
                                                        <label>Note</label>
                                                        {{$survey->note}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <label>Contract №</label>
                                                        {{$survey->claim->contract->contract_number}}
                                                    </p>
                                                    <p>
                                                        <label>Product</label>
                                                        {{$survey->claim->contract->product}}
                                                    </p>
                                                    <p>
                                                        <label>Note </label>
                                                        {{$survey->claim->contract->note}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <label>Claim №</label>
                                                        {{$survey->claim->external_id}}
                                                    </p>
                                                    <p>
                                                        <label>Damage type</label>
                                                        {{$survey->claim->damage_type}}
                                                    </p>
                                                    <p><label>Happened at</label>
                                                        {{$survey->claim->happened_at}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p><label>Customer</label> {{$customer->full_name}}</p>
                                                    <p><label>Agent</label> {{$agent->full_name}}</p>
                                                    <p><label>Manager</label> {{$manager->full_name}}</p>
                                                    @foreach($assistants as $key => $assistant)
                                                        <p><label>Assistant №{{$key+1}}</label> {{$assistant->full_name}}
                                                        </p>
                                                    @endforeach

                                                </td>
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
