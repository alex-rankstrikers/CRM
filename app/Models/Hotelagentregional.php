<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hlagentcontact;
class Hotelagentregional extends Model
{
     protected $table = 'hl_agent_regional_locations';

			public function getAgentContact()
			{
			dd( $this->hasMany('App\Models\Hlagentcontact', 'hl_agentcont_id'));
			}
}
