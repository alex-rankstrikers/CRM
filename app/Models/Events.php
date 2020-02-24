<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
     protected $table = 'hotel_leads_events';

      public function Guestsinvite()
     {
		return Guests::where(['hle_id'=>$this->hle_id,'hle_status'=>1])->get();

     }	
     public function Getoutcomesns(){
     	 return Outcome::where(['hle_id'=>$this->hle_id,'hl_ocns_status'=>1])->get();
     }
}
