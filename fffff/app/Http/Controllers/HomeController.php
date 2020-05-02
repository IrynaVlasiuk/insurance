<?php

namespace App\Http\Controllers;


use App\Mail\Claim\ClaimAssignedMail;
use App\Mail\Claim\ClaimDelegatedMail;
use App\Mail\Survey\SurveyCreatedMail;
use App\Models\Claims\Claim;
use App\Models\Oracle;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function test()
    {
        dd(Oracle::all());
         //  dd(DB::connection('oracle')->select('SELECT * FROM SHFRI.VW_GEDO_CLAIMS'));
    }

    public function surveyEmailPreview()
    {
        $survey = Survey::first();
        $recipient = ['email' => 'creox@icloud.com', 'full_name' => 'Johnny Gedosin Doe'];

        return (new SurveyCreatedMail($recipient, $survey))->render();
    }

    public function claimAssignedEmailPreview()
    {
        $claim = Claim::first();
        $recipient = ['email' => 'creox@icloud.com', 'full_name' => 'Johnny GedosinTestUser Doe'];

        return (new ClaimAssignedMail($recipient, $claim))->render();
    }

    public function claimDelegatedEmailPreview()
    {
        $claim = Claim::first();
        $recipient = ['email' => 'creox@icloud.com', 'full_name' => 'Johnny GedosinTestUser Doe'];

        return (new ClaimDelegatedMail($recipient, $claim))->render();
    }
}
