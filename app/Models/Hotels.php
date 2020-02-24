<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
     protected $table = 'hotels';

     public function getCity()
     {
		return Cities::where('id',$this->city)->first();

     }

     public function getCountry()
     {
		return Country::where('id',$this->country)->first();

     }     

     public function getHotelContact()
     {
		return HotelAdditionalContacts::where('hl_id',$this->hl_id)->where('cotact_purpose','Main Contact')->first();

     }
     
}
