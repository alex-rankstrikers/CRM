<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $table = 'hl_events';
     public function RegisteredList()
     {
		return EventRegister::where(['hl_events_id'=>$this->hl_events_id])->get();

     }	
 
     public function Regionget()
     {
		return Hlmasterregional::where(['hl_ms_r_id'=>$this->hl_region])->first();

     }	
     public function Eventtypeget()
     {
		return Hlmastertask::where(['hl_mt_id'=>$this->activity_type])->first();

     }	
     public function GetFee()
     {
          return CurrencyList::where(['id'=>$this->participation_fee])->first();

     }    

     public function Eventfeetype()
     {
          return Currencylist::where(['id'=>$this->currency_type])->first();
     } 

     public function Countreg()
     {
          return EventRegister::where(['hl_events_id'=>$this->hl_events_id])->get();
     } 
       public function getNotes()
     {
          return Eventleadsnotes::where('et_id',$this->hl_events_id)->get();

     }     
}
