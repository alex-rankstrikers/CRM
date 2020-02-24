<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelDiningEntertainmentRestaurant extends Model
{
     protected $table = 'hotel_dining_entertainment_restaurant';

     public function getResTime()
     {
		return HotelDiningEntertainmentBreakOpenTime::where('res_id',$this->id)->get();

     }
}
