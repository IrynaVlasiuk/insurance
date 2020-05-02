<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Carbon\Carbon;
use Spatie\CalendarLinks\Link;

class CalendarController extends Controller
{
   protected $description = "";
   private $survey;
   private $manager;
   private $contract;
   private $customer;
   private $agent;

    public function __construct(Survey $survey)
   {
       $this->survey = $survey;
       $this->manager = $this->survey->claim->managerAssessor ? $this->survey->claim->managerAssessor : null;
       $this->contract = $this->survey->claim->contract ? $this->survey->claim->contract : null;
       $this->customer = ($this->contract && $this->contract->customer) ? $this->contract->customer : null;
       $this->agent = ($this->contract && $this->contract->agent) ? $this->contract->agent : null;
       $this->description = $this->createDescription();
   }

    private function createDescription()
   {
       if ($this->manager) {
           $this->description .= "Expert : " . $this->manager->full_name ."  \\n";
           if ($this->manager->phone) {
               $this->description .= "Tel : " .$this->manager->phone ."  \\n";
           }
           if ($this->manager->email) {
               $this->description .= "Email : " . $this->manager->email ."  \\n\\n";
           }
       }
       if ($this->contract) {
           if($this->customer) {
               if($this->customer->full_name) {
                   $this->description .= "\\nClient : " . $this->customer->full_name ."   \\n";
               }
               if ($this->customer->address1) {
                   $this->description .= $this->customer->address1 ."   \\n";
               }
               if ($this->customer->address2) {
                   $this->description .= $this->customer->address2 ."   \\n";
               }
               if ($this->customer->landline) {
                   $this->description .= "Tel : " . $this->customer->landline ."   \\n";
               }
               if ($this->customer->mobile) {
                   $this->description .= "Portable : " . $this->customer->mobile ."   \\n";
               }
               if ($this->customer->fax) {
                   $this->description .= "Fax : " . $this->customer->fax ."   \\n";
               }
               if ($this->customer->email) {
                   $this->description .= "Email : " . $this->customer->email ."   \\n";
               }
           }
           if ($this->agent) {
               if ($this->agent->full_name) {
                   $this->description .= "\\nAgent : " . $this->agent->full_name ."   \\n";
               }
               if ($this->agent->address1) {
                   $this->description .=  $this->agent->address1 ."   \\n";
               }
               if ($this->agent->address2) {
                   $this->description .= $this->agent->address2 ."   \\n";
               }
               if ($this->agent->zipcode) {
                   $this->description .= $this->agent->zipcode ."   \\n";
               }
               if ($this->agent->city) {
                   $this->description .= $this->agent->city ."   \\n";
               }
               if ($this->agent->landline) {
                   $this->description .= "Tel : " . $this->agent->landline ."   \\n";
               }
               if ($this->agent->mobile) {
                   $this->description .= "Portable : " . $this->agent->mobile ."   \\n";
               }
               if ($this->agent->fax) {
                   $this->description .= "Fax : " . $this->agent->fax ."   \\n";
               }
               if ($this->agent->email) {
                   $this->description .= "Email : " . $this->agent->email ."   \\n";
               }
           }
       }
       return $this->description;
   }
    public function getEventsCalObject()
    {
        $event = [
            'name' => 'survey',
            'starts' => $this->survey->datetime_scheduled,
            'ends' => date('Y-m-d H:i:s', strtotime('+2 hours',strtotime($this->survey->datetime_scheduled))),
            'status' => 'CONFIRMED',
            'summary' => $this->survey->claim ? 'Rendez-vous d\'expertise du sinistre '.$this->survey->claim->external_id.' - Contrat '.$this->survey->claim->contract_number : '',
            'description' => $this->description,
            'location' => $this->survey->claim->contract ? $this->survey->claim->contract->customer->zipcode." ".$this->survey->claim->contract->customer->city : "",
            'created_at' => date('Y-m-d H:i:s', strtotime($this->survey->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->survey->updated_at)),
           ]
        ;

        if(!defined('ICAL_FORMAT'))define('ICAL_FORMAT', 'Ymd\THis\Z');

        $icalObject = "BEGIN:VCALENDAR"."\r\n"
            . "PRODID;X-RICAL-TZSOURCE=TZINFO:"."-//Airbnb Inc//Hosting Calendar 0.8.8//EN"."\r\n"
            . "CALSCALE:GREGORIAN"."\r\n"
            . "VERSION:2.0"."\n";
        $icalObject .=
            "BEGIN:VEVENT\r\n"
            . "UID:".env('APP_FRONTEND')."\r\n"
            . "DTSTART:".date(ICAL_FORMAT, strtotime($event['starts']))."\r\n"
            . "DTEND:".date(ICAL_FORMAT, strtotime($event['ends']))."\r\n"
            . "DTSTAMP:".date(ICAL_FORMAT, strtotime($event['created_at']))."\r\n"
            . "DESCRIPTION:".$event["description"]."\r\n"
            . "LOCATION:".$event["location"]."\r\n"
            . "SUMMARY:".$event['summary']."\r\n"
            . "SEQUENCE:2\r\n"
            . "STATUS:".strtoupper($event['status'])."\r\n"
            . "LAST-MODIFIED:" . date(ICAL_FORMAT, strtotime($event['updated_at']))."\r\n"
            . "TRANSP:OPAQUE\r\n";
        $icalObject .=  "END:VEVENT\n";

        // close calendar
        $icalObject .= "END:VCALENDAR";

        // Set the headers
        header('Content-type: text/HTML; charset=utf-8');
        header('Content-Disposition: attachment; filename="cal.ics"');

        $icalObject = str_replace(' ', ' ', $icalObject); // Replacing space on &#8192;(ASCII code) because there is issue with .ics file when it includes spaces
        $icalObject = strtr($icalObject, array(
            "\r\n" => "\r\n",
            "\r" => "\r\n",
            "\n" => "\r\n",
        ));

        return $icalObject;
    }

    public function generateLink()
    {
        $from =  Carbon::createFromFormat('Y-m-d H:i:s', $this->survey->datetime_scheduled);
        $to =  Carbon::createFromFormat('Y-m-d H:i:s', $this->survey->datetime_scheduled)->addHours(2);

        $link = Link::create($this->survey->claim ? 'Rendez-vous d\'expertise du sinistre '.$this->survey->claim->external_id.' - Contrat '.$this->survey->claim->contract_number : '', $from, $to)
            ->description($this->survey->note ? $this->survey->note : '')
            ->address($this->survey->claim->contract ? $this->survey->claim->contract->customer->zipcode." ".$this->survey->claim->contract->customer->city : "");

        return $link;
    }
}

