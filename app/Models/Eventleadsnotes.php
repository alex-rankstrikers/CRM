<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventleadsnotes extends Model
{
   protected $table = 'event_leads_notes';


    public function getAddedName()
    {
		$user = User::find($this->et_n_added_by);

		return $user->first_name;
    } 
}
