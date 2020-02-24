<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelDiningEntertainmentBar extends Model
{
     protected $table = 'hotel_dining_entertainment_bar';

     
     public function getBarTime()
     {
		return HotelDiningEntertainmentPublicOpenTime::where('bar_id',$this->id)->get();

     }
}
