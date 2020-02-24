<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\Models\Events;


class OutlookController extends Controller
{
    private static $client;
    private static function generateRandomResourceId(){
        return md5(uniqid(mt_rand(), true));
    }

    public function testCreateCalendar($name = null){
        if(empty($name)) $name = self::generateRandomResourceId();
        $res = self::$client->createCalendar(new CalendarVO($name));
        $id = $res->getId();
        $this->assertTrue(!empty($id));
        echo printf("new calendar id %s", $id).PHP_EOL;
        return $id;
    }


    public function testAddNewEvent(){
        $id  = $this->testCreateCalendar();

        $res = self::$client->createEvent($id, new EventVO(
            "test event",
            "test event body",
            new DateTime('2019-11-15 09:00:00'),
            new DateTime('2019-11-15 10:30:00'),
            new DateTimeZone('Australia/Sydney'),
            new LocationVO(
                "Boston Marriott Copley Place",
                new AddressVO(
                    "110 Huntington Av",
                    "Boston",
                    "MA",
                    "USA",
                    "02116"
                ),
                "42.3471832",
                "-71.0778024"
            )
        ));

        $this->assertTrue($res instanceof \OutlookRestClient\Facade\Responses\EventResponse);
        $this->assertTrue(!empty($res->getId()));

        return $res->getId();
    }







public function mail()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  $messageQueryParams = array (
    // Only return Subject, ReceivedDateTime, and From fields
    "\$select" => "subject,receivedDateTime,from",
    // Sort by ReceivedDateTime, newest first
    "\$orderby" => "receivedDateTime DESC",
    // Return at most 10 results
    "\$top" => "10"
  );

  $getMessagesUrl = '/me/mailfolders/inbox/messages?'.http_build_query($messageQueryParams);
  $messages = $graph->createRequest('GET', $getMessagesUrl)
                    ->setReturnType(Model\Message::class)
                    ->execute();

  return view('panels.crm.mail', array(
    'username' => $user->getDisplayName(),
    'messages' => $messages
  ));
}

public function calendar()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  $eventsQueryParams = array (
    // // Only return Subject, Start, and End fields
    "\$select" => "*",
    // Sort by Start, oldest first
    "\$orderby" => "Start/DateTime",
    // Return at most 10 results
    "\$top" => "10"
  );

  $getEventsUrl = '/me/events?'.http_build_query($eventsQueryParams);
  $events = $graph->createRequest('GET', $getEventsUrl)
                  ->setReturnType(Model\Event::class)
                  ->execute();
// print_r($events);


foreach($events as $event) {

  $st_date= $event->getStart()->getDateTime();
  $crt_st_date=substr(str_replace('T', ' ', $st_date),0,19);
  $end_date= $event->getEnd()->getDateTime();
  $crt_end_date=substr(str_replace('T', ' ', $end_date),0,19);
  $title=$event->getSubject();
  $basic_id_val = DB::table('hotel_leads_events')->where(['hle_start_date' => $crt_st_date, 'hle_end_date' => $crt_end_date, 'hle_title' => $title])->get();
if(count($basic_id_val)==0){

  //dd($event->getLocation()->getDisplayName());
        $user_id = (auth()->check()) ? auth()->user()->id : null;
        $Events1 = new Events;
        $Events1->hle_title=$title;
        $Events1->hle_description=$event->getBodyPreview();
        $Events1->hle_location=$event->getLocation()->getDisplayName();
    
        $Events1->hle_start_date = $crt_st_date;
        $Events1->hle_end_date = $crt_end_date;
        $Events1->hle_status=1;

    // $Events1->hle_recurr_status=$request->hle_recurr_status;
    // $Events1->hle_recurr_duration=$request->hle_recurr_duration;
       $Events1->hle_timezone=$event->getOriginalStartTimeZone();
    // $Events1->hle_allday_status=$request->hle_allday_status;
     $Events1->hle_assigned_to = $user_id;
    
     $Events1->uid= $user_id;
    
     $Events1->save();

}
}
    // $insertedId = $Events1->id;

    // $tot=count($request->searchbar_agents);
    // //dd($tot);

    // for ($i=0; $i < $tot; $i++) 
    // { 
    // $Guests=new Guests;
    // $Guests->uid= $user_id;   
    // $Guests->hle_id= $insertedId;
    // $Guests->searchbar_agents= $request->searchbar_agents[$i];
    // $Guests->hle_guests= $request->hle_guests[$i];
    // $Guests->hle_status= 1;
    // $Guests->save();
    // }

// print_r($events);
  return view('panels.crm.calendar', array(
    'username' => $user->getDisplayName(),
    'events' => $events
  ));
}

public function contacts()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  $contactsQueryParams = array (
    // // Only return givenName, surname, and emailAddresses fields
    "\$select" => "givenName,surname,emailAddresses",
    // Sort by given name
    "\$orderby" => "givenName ASC",
    // Return at most 10 results
    "\$top" => "10"
  );

  $getContactsUrl = '/me/contacts?'.http_build_query($contactsQueryParams);
  $contacts = $graph->createRequest('GET', $getContactsUrl)
                    ->setReturnType(Model\Contact::class)
                    ->execute();

  return view('panels.crm.contacts', array(
    'username' => $user->getDisplayName(),
    'contacts' => $contacts
  ));
}

}