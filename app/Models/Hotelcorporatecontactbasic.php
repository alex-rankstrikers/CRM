<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotelcorporatecontactbasic extends Model
{
     protected $table = 'hl_corporate_contact_basic';

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

      public function getHotelCorpRegional()
     {
		// return HotelAgentRegional::select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','cities.name as cities')
		// ->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
		// ->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
  //       ->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
  //       ->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
  //       ->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')
  //       ->leftJoin('users', 'users.id', '=', 'hl_agent_regional_locations.created_by')
  //       ->where('hl_agent_regional_locations.hl_agent_basic_id',$this->hl_agentcont_id)
  //       ->get();

return Hotelregional::select('*','hl_regional_locations.hl_email as remail','hl_corporate_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')      
    ->leftJoin('hl_corporate_contacts', 'hl_corporate_contacts.hl_reg_loc_id', '=', 'hl_regional_locations.hl_regl_id')      
    ->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
    ->leftJoin('states', 'states.id', '=', 'hl_regional_locations.hl_state')
    ->leftJoin('cities', 'cities.id', '=', 'hl_regional_locations.hl_city')
    ->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
    ->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_corporate_contacts.hl_cont_design')
    ->leftJoin('users', 'users.id', '=', 'hl_corporate_contacts.created_by') 
    ->where('hl_regional_locations.hl_cor_basic_id',$this->hl_ccb_id)
    ->get();

     } 
}
