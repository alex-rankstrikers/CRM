<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotelleads extends Model
{
     protected $table = 'hotel_leads';


     public function getCity()
     {
		return Cities::where('id',$this->hl_city)->first();

     }

     public function getCountry()
     {
		return Country::where('id',$this->hl_country)->first();

     }     

     public function getHotelContact()
     {
		return Hotelleadscontacts::where('hl_id',$this->hl_id)->first();

     }

     public function getSales()
     {
		return User::where('id',$this->hl_created_by)->first();

     }

     public function getNotes()
     {
		return Hotelleadsnotes::where('hl_id',$this->hl_id)->get();

     }
}
