<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegister extends Model
{
     protected $table = 'hl_event_register';

         public function Hotelnameget()
     {
          return Hotels::where(['user_id'=>$this->uid])->first();

     }

     public function getNotes()
     {
		return Eventleadsnotes::where('et_id',$this->hl_reg_id)->get();
     }    
}
