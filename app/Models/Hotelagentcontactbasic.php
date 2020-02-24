<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotelagentcontactbasic extends Model
{
     protected $table = 'hl_agents_contacts_basic';

      public function getCity()
     {
		return Cities::where('id',$this->hl_city)->first();

     }

     public function getCountry()
     {
		return Country::where('id',$this->hl_country)->first();

     }  

     public function getSales()
     {
		return User::where('id',$this->created_by)->first();

     } 

     public function getRegion()
     {

		return Country::leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')->where('countries.id',$this->hl_country)->first();

     } 

     public function getDes()
     {

		return Contactdesignation::where('hl_contact_designation.hl_cd_id',$this->m_con_contact_designation)->first();

     } 

      public function getHotelAgentRegional()
     {
		return HotelAgentRegional::select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','cities.name as cities')
		->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
		->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
        ->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
        ->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
        ->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')
        ->leftJoin('users', 'users.id', '=', 'hl_agent_regional_locations.created_by')
        ->where('hl_agent_regional_locations.hl_agent_basic_id',$this->hl_agentcont_id)
        ->get();

     }  
    public function getAgenttype()
     {
        return Hotelbusinessagenttype::where('h_main_id',$this->hl_agentcont_id)->get();

     } 

}
