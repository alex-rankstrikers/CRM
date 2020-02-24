<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelDiningEntertainmentPublicOpenTime extends Model
{
     protected $table = 'hotel_dining_entertainment_public_open_time';

     public function bar()
     {
		return HotelDiningEntertainmentBar::where('id',$this->bar_id)->first();

     }
}
