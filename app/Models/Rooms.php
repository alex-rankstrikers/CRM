<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
     protected $table = 'rooms';

      public function getRoomAtt()
     {
		return HotelRoomsAttributes::where('hl_room_id',$this->id)->first();

     }
     public function getRoomBedType()
     {
		return HotelRoomsBedType::where('hl_room_id',$this->id)->get();

     }
     public function getRoomOcc()
     {
		return HotelRoomsOccupancy::where('hl_room_id',$this->id)->first();

     }

     public function getRoomPrice()
     {
		return HotelRoomsPriceAdjustment::where('hl_room_id',$this->id)->first();

     }

     public function getRoomKeyFeatures()
     {
          return HotelRoomsKeyFeatures::where('hl_room_id',$this->rid)->get();

     }

     public function getRoomView()
     {
          return HotelRoomsView::where('hl_room_id',$this->rid)->get();

     }
}
