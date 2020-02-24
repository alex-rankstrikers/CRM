<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Venue;
use App\Models\User;
use App\Models\MultiLanguage;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Category;
use App\Models\CategorySlug;
use App\Models\VenueType;
use App\Models\VenueCapacity;
use App\Models\VenueFeatures;
use App\Models\VenueFoodDrink;
use App\Models\VenueLicensing;
use App\Models\VenueRestrictions;
use App\Models\UserVenueCapacity;
use App\Models\UserVenueFeatures;
use App\Models\UserVenueFooddrink;
use App\Models\UserVenueLicensing;
use App\Models\UserVenueRestrictions;
use App\Models\UserPaymentType;
use App\Models\UserVenueType;
use App\Models\VenueContact;
use App\Models\Payment;
use App\Models\Benefits;
use App\Models\VenueBusiness;
use App\Models\Amenities;
use App\Models\Hotels;
use App\Models\UserVenueBenefits;
use App\Models\UserVenueAmenities;
use App\Models\UserVenueBusiness;
use App\Models\Rooms;
use App\Models\Hotelleads;
use App\Models\Hotelleadscontacts;
use App\Models\Hotelleadsnotes;
use App\Models\Events;
use App\Models\Registerportal;
use App\Models\Event;
use App\Models\EventRegister;

use App\Models\HodelAddress;
use App\Models\HotelMainContacts;
use App\Models\HotelAdditionalContacts;
use App\Models\HotelAirportInfo;
use App\Models\HotelOtherInfo;
use App\Models\HotelPropertyAttributes;
use App\Models\HotelAreaInfo;
use App\Models\HotelDiningEntertainmentRestaurant;
use App\Models\HotelDiningEntertainmentResOpenTime;
use App\Models\HotelDiningEntertainmentBreakOpenTime;
use App\Models\HotelDiningEntertainmentLunchOpenTime;
use App\Models\HotelDiningEntertainmentDinnerOpenTime;
use App\Models\HotelDiningEntertainmentBar;
use App\Models\HotelDiningEntertainmentGuestOpenTime;
use App\Models\HotelDiningEntertainmentPublicOpenTime;
use App\Models\HotelMealPlan;
use App\Models\HotelPolices;
use App\Models\HotelProperty;
use App\Models\HotelGdsCodes;
use App\Models\HotelGdsCodesOther;
use App\Models\HotelRoomsAttributes;
use App\Models\HotelRoomsBedType;
use App\Models\HotelRoomsOccupancy;
use App\Models\HotelRoomsPriceAdjustment;
use App\Models\HotelTaxConfiguration;
use App\Models\CategoryPropertyType;
use App\Models\CategoryLocationType;
use App\Models\CategoryMealPlan;
use App\Models\CategoryTaxType;
use App\Models\Hotelsynxiscrs;
use App\Models\Airports;
use App\Models\Currencylist;
use App\Models\Timezone;
use App\Models\Zone;
use App\Models\RoomsCategory;
use App\Models\RoomClass;
use App\Models\RoomBedType;
use App\Models\HotelLocalPolices;


use Mail;
use Excel;
use Calendar;
use App\Http\Controllers\Controller;
use Image;
use Session;
use PDF;
//use App\Exports\ExportExcel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
// use Cartalyst\Stripe\Laravel\Facades\Stripe;
// use Stripe\Error\Card;
use Validator;
use Exporter;


class HotelierController extends Controller
{
/*
public function downloadExcel($type,$id)
    {
        $data = Hotels::where('id',$id)->get();
        return Excel::create('Hotel-Information', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }*/
 public function downloadHotelInformation($type,$id)
    {
    	//$data = Hotels::where('id',$id)->get();
    	$data['hotels'] = DB::table('hotels')
			->select('*','hotels.id as hotel_id','cities.name as cities','countries.name as countries','states.name as states')
			->leftJoin('hodel_address', 'hodel_address.hl_id', '=', 'hotels.id')
			->leftJoin('hotel_main_contacts', 'hotel_main_contacts.hl_id', '=', 'hotels.id')
			->leftJoin('hotel_additional_contacts', 'hotel_additional_contacts.hl_id', '=', 'hotels.id')
			->leftJoin('hotel_other_info', 'hotel_other_info.hl_id', '=', 'hotels.id')
            ->leftJoin('cities', 'cities.id', '=', 'hodel_address.city')
            ->leftJoin('countries', 'countries.id', '=', 'hodel_address.country')
            ->leftJoin('states', 'states.id', '=', 'hodel_address.state')
			->where('hotels.id', $id)
			->first();

		$data['airport'] = DB::table('hotels')
			->select('*','hotels.id as hotel_id')
			->leftJoin('hotel_airport_info', 'hotel_airport_info.hl_id', '=', 'hotels.id')
			->where('hotels.id', $id)
			->get();
            //dd($data['airport']);

return Excel::create('Hotel-Information', function($excel) use ($data) {
            $excel->sheet('Hotel Info', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Hotel ID');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Hotel Code');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Hotel Name');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Hotel Pms Code');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Hotel Short Name');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Address 1');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Address 2');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Address 3');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('City');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('State');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Zip');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Country');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Main Phone');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Second Phone');   });
                $sheet->cell('O1', function($cell) {$cell->setValue('Fax');   });
                $sheet->cell('P1', function($cell) {$cell->setValue('Email');   });
                $sheet->cell('Q1', function($cell) {$cell->setValue('Url');   });
                $sheet->cell('R1', function($cell) {$cell->setValue('Default Currency');   });
                $sheet->cell('S1', function($cell) {$cell->setValue('Time Zone Country');   });
                $sheet->cell('T1', function($cell) {$cell->setValue('Time Zone Location');   });
                $sheet->cell('U1', function($cell) {$cell->setValue('Time Zone Offset');   });
                $sheet->cell('V1', function($cell) {$cell->setValue('Res Delivery Email Address');   });
                $sheet->cell('W1', function($cell) {$cell->setValue('Closest Airport');   });
                $sheet->cell('X1', function($cell) {$cell->setValue('Latitude');   });
                $sheet->cell('Y1', function($cell) {$cell->setValue('Longitude');   });
                $sheet->cell('AA1', function($cell) {$cell->setValue('Reservation Delivery CC Retrieval'); });
                $sheet->cell('AB1', function($cell) {$cell->setValue('Reservation Delivery Email'); });
                $sheet->cell('AC1', function($cell) {$cell->setValue('Depleted Inventory Notification'); }); 
                if (!empty($data['hotels'])) {
                	$i=2;
						$sheet->cell('A'.$i, $data['hotels']->hotel_id); 
                		$sheet->cell('B'.$i, $data['hotels']->hotel_code); 
                        $sheet->cell('C'.$i, $data['hotels']->hotel_name); 
                        $sheet->cell('D'.$i, $data['hotels']->pms_code);
                        $sheet->cell('E'.$i, $data['hotels']->hotel_short_name);
                        $sheet->cell('F'.$i, $data['hotels']->address_1);
                        $sheet->cell('G'.$i, $data['hotels']->address_2);
                        $sheet->cell('H'.$i, $data['hotels']->address_3);
                        $sheet->cell('I'.$i, $data['hotels']->cities);
                        $sheet->cell('J'.$i, $data['hotels']->states);
                        $sheet->cell('K'.$i, $data['hotels']->postcode);
                        $sheet->cell('L'.$i, $data['hotels']->countries);
                        $sheet->cell('M'.$i, $data['hotels']->main_phone);
                        $sheet->cell('N'.$i, $data['hotels']->second_phone);
                        $sheet->cell('O'.$i, $data['hotels']->fax);
                        $sheet->cell('P'.$i, $data['hotels']->email);
                        $sheet->cell('Q'.$i, $data['hotels']->url);
                        $sheet->cell('R'.$i, $data['hotels']->currency);
                        $sheet->cell('S'.$i, $data['hotels']->t_zone_country);
                        $sheet->cell('T'.$i, $data['hotels']->t_zone_location);
                        $sheet->cell('U'.$i, $data['hotels']->t_zone_offset);
                        $sheet->cell('V'.$i, $data['hotels']->r_d_email);
                        $sheet->cell('W'.$i, $data['hotels']->id);
                        $sheet->cell('X'.$i, $data['hotels']->latitude);
                        $sheet->cell('Y'.$i, $data['hotels']->longitude);
                        $sheet->cell('AA'.$i, $data['hotels']->reservation_email);
                        $sheet->cell('AB'.$i, $data['hotels']->cc_retrieval);
                        $sheet->cell('AC'.$i, $data['hotels']->inventory_notification); 

                    //foreach ($data as $key => $value) {
                        //$i= $key+2;
                        // $sheet->cell('A2', $data->hotel_id); 
                        // $sheet->cell('B2', $data->hotel_name); 
                        // $sheet->cell('C2', $data->pms_code); 
                    //}
                }
            });

				$excel->sheet('Airport-Information', function($sheet) use ($data)
				{
				    $sheet->cell('A1', function($cell) {$cell->setValue('Hotel ID');   });
				    $sheet->cell('B1', function($cell) {$cell->setValue('Airport name');   });
				    $sheet->cell('C1', function($cell) {$cell->setValue('Airport code');   });
				    $sheet->cell('D1', function($cell) {$cell->setValue('Airport km');   });
				    $sheet->cell('E1', function($cell) {$cell->setValue('Airport miles');   });
				 
				    if (!empty($data['airport'])) {

				    	foreach ($data['airport'] as $key => $value) {
                            if(!empty($value)){
				            $i= $key+2;
							$sheet->cell('A'.$i, $value->hl_id); 
				    		$sheet->cell('B'.$i, $value->airport_name); 
				            $sheet->cell('C'.$i, $value->airport_code); 
				            $sheet->cell('D'.$i, $value->airport_km);
				            $sheet->cell('E'.$i, $value->airport_miles);
                        }
							}
				    }
				});
        })->download($type);
    }   


 public function downloadTaxConfiguration($type,$id)
    {
    	//$data = Hotels::where('id',$id)->get();
    	$data = DB::table('hotel_tax_configuration')
			->select('*','hotel_tax_configuration.id as hotel_tax_config_id')
			->where('hotel_tax_configuration.hl_id', $id)
			->first();

return Excel::create('Tax-Configuration', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Hotel ID');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Tax Level');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Tax Type');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Code');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Name');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Default Description');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Start Date');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('No End Date');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('End Date');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Amount');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Adjustment Type');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Tax Frequency');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Charge Type');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Always Calculate from External Rate');   });
                $sheet->cell('O1', function($cell) {$cell->setValue('Is Inclusive');   });
                $sheet->cell('P1', function($cell) {$cell->setValue('Calculate from Room Price');   });
                $sheet->cell('Q1', function($cell) {$cell->setValue('Calculate from Package Price');   });
                $sheet->cell('R1', function($cell) {$cell->setValue('Apply to Free Nights');   });
                $sheet->cell('S1', function($cell) {$cell->setValue('Tax By LOS');   });
                if (!empty($data)) {
                	$i=2;
						$sheet->cell('A'.$i, $data->hl_id); 
                		$sheet->cell('B'.$i, $data->tax_level); 
                        $sheet->cell('C'.$i, $data->tax_type); 
                        $sheet->cell('D'.$i, $data->tax_code);
                        $sheet->cell('E'.$i, $data->tax_name);
                        $sheet->cell('F'.$i, $data->tax_desc);
                        $sheet->cell('G'.$i, $data->start_date);
                        $sheet->cell('H'.$i, $data->no_end_date);
                        $sheet->cell('I'.$i, $data->end_date);
                        $sheet->cell('J'.$i, $data->tax_type_price);
                        $sheet->cell('K'.$i, '');
                        $sheet->cell('L'.$i, $data->tax_frequency);
                        $sheet->cell('M'.$i, $data->charge_per);
                        $sheet->cell('N'.$i, '');
                        $sheet->cell('O'.$i, $data->tax_inclusive);
                        $sheet->cell('P'.$i, $data->cal_room_price);
                        $sheet->cell('Q'.$i, '');
                        $sheet->cell('R'.$i, $data->apply_free_night);
                        $sheet->cell('S'.$i, $data->tax_by_los);

                    //foreach ($data as $key => $value) {
                        //$i= $key+2;
                        // $sheet->cell('A2', $data->hotel_id); 
                        // $sheet->cell('B2', $data->hotel_name); 
                        // $sheet->cell('C2', $data->pms_code); 
                    //}
                }
            });
        })->download($type);
    }   



 public function downloadRoomConfiguration($type,$id)
    {
    	//$data = Hotels::where('id',$id)->get();
    	$data['hotels'] = DB::table('hotels')
			->select('*','hotels.hotel_id as hid')
			->leftJoin('rooms', 'rooms.hotel_id', '=', 'hotels.id')	
			->leftJoin('hotel_rooms_attributes', 'hotel_rooms_attributes.hl_room_id', '=', 'rooms.id')
			->leftJoin('hotel_rooms_occupancy', 'hotel_rooms_occupancy.hl_room_id', '=', 'rooms.id')
			->leftJoin('hotel_rooms_price_adjustment', 'hotel_rooms_price_adjustment.hl_room_id', '=', 'rooms.id')		
			->where('hotels.id', $id)
			->get();

		$data['bed'] = DB::table('hotels')
			->select('*','hotels.hotel_id as hid')
			->leftJoin('rooms', 'rooms.hotel_id', '=', 'hotels.id')	
			->leftJoin('hotel_rooms_bed_type', 'hotel_rooms_bed_type.hl_room_id', '=', 'rooms.id')		
			->where('hotels.id', $id)
			->get();

return Excel::create('Room-Configuration', function($excel) use ($data) {
			
            $excel->sheet('Room Details', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Hotel ID');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Room Code');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Room Name');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Total Rooms');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('PMS Code');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Default Short Description');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Default Long Description');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('ADA Compliant');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Total Guests Per Room');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Adult Occupancy');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Child Occupancy');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Child Age Range 1');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Allow Extra Bed');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Price Adjustment Type');   });
                $sheet->cell('O1', function($cell) {$cell->setValue('Default Adjustment');   });
              
                if (!empty($data['hotels'])) {

                	foreach ($data['hotels'] as $key => $value) {
                        $i= $key+2;
						$sheet->cell('A'.$i, $value->hid); 
                		$sheet->cell('B'.$i, $value->room_code); 
                        $sheet->cell('C'.$i, $value->title); 
                        $sheet->cell('D'.$i, $value->total_room);
                        $sheet->cell('E'.$i, $value->room_pms_code);
                        $sheet->cell('F'.$i, $value->room_short_desc);
                        $sheet->cell('G'.$i, $value->description);
                        $sheet->cell('H'.$i, $value->ada_compliant);
                        if($value->total_guest_per_room_un == 'Yes'){ $sheet->cell('I'.$i, 'Unlimited');}else{ $sheet->cell('I'.$i, $value->total_guest_per_room_un);}
                        if($value->adult_occupancy == 'Yes'){ $sheet->cell('J'.$i, 'Unlimited');}else{ $sheet->cell('J'.$i, $value->adult_occupancy_un);}
                        if($value->child_occupancy == 'Yes'){ $sheet->cell('K'.$i, 'Unlimited');}else{ $sheet->cell('K'.$i, $value->child_occupancy_un);}                       
                        $sheet->cell('L'.$i, $value->child_age_limit);
                        $sheet->cell('M'.$i, $value->allow_extra_bed);
                        $sheet->cell('N'.$i, $value->price_adjustment_type);
                        $sheet->cell('O'.$i, $value->default_adjustment);
						}
                    //foreach ($data as $key => $value) {
                        //$i= $key+2;
                        // $sheet->cell('A2', $data->hotel_id); 
                        // $sheet->cell('B2', $data->hotel_name); 
                        // $sheet->cell('C2', $data->pms_code); 
                    //}
                }
            });

            $excel->sheet('Bed Type', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Room ID');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Bed type');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Bed quantity');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Bed primary');   });
              
                if (!empty($data['bed'])) {

                	foreach ($data['bed'] as $key => $value) {
                        $i= $key+2;
						$sheet->cell('A'.$i, $value->hl_room_id); 
                		$sheet->cell('B'.$i, $value->bed_type); 
                        $sheet->cell('C'.$i, $value->bed_quantity); 
                        $sheet->cell('D'.$i, $value->bed_primary);
						}
                }
            });
             
        })->download($type);

// $returndata['room-config-bed'] = Excel::create('Room-Configuration-Bed', function($excel) use ($data) {


// $excel->sheet('mySheet1', function($sheet) use ($data)
//             {
//                 $sheet->cell('A1', function($cell) {$cell->setValue('Room ID');   });
//                 $sheet->cell('B1', function($cell) {$cell->setValue('Bed type');   });
//                 $sheet->cell('C1', function($cell) {$cell->setValue('Bed quantity');   });
//                 $sheet->cell('D1', function($cell) {$cell->setValue('Bed primary');   });
              
//                 if (!empty($data['bed'])) {

//                 	foreach ($data['bed'] as $key => $value) {
//                         $i= $key+2;
// 						$sheet->cell('A'.$i, $value->hl_room_id); 
//                 		$sheet->cell('B'.$i, $value->bed_type); 
//                         $sheet->cell('C'.$i, $value->bed_quantity); 
//                         $sheet->cell('D'.$i, $value->bed_primary);
// 						}
//                 }
//             });


//})->download($type);

//print_r(array_values($returndata));

    }   
  

public function downloadPropertyInformation($type,$id)
    {
    	//$data = Hotels::where('id',$id)->get();
    	$data['hotels'] = DB::table('hotels')
			->select('*','hotels.hotel_id as hid')			
			->leftJoin('hotel_gds_codes', 'hotel_gds_codes.hl_id', '=', 'hotels.id')
			->leftJoin('hotel_property', 'hotel_property.hl_id', '=', 'hotels.id')
			->leftJoin('hotel_polices', 'hotel_polices.hl_id', '=', 'hotels.id')	
			->leftJoin('hotel_meal_plan', 'hotel_meal_plan.hl_id', '=', 'hotels.id')
			->leftJoin('hotel_area_info', 'hotel_area_info.hl_id', '=', 'hotels.id')
			->leftJoin('hotel_property_attributes', 'hotel_property_attributes.hl_id', '=', 'hotels.id')		
			->where('hotels.id', $id)
			->get();

		$data['restaurant'] = DB::table('hotels')
			->select('*','hotels.hotel_id as hid')
			->leftJoin('hotel_dining_entertainment_restaurant', 'hotel_dining_entertainment_restaurant.hl_id', '=', 'hotels.id')		
			->where('hotels.id', $id)
			->get();

		$data['res-open-time'] = DB::table('hotels')
			->select('*','hotels.hotel_id as hid')
			->leftJoin('hotel_dining_entertainment_break_open_time', 'hotel_dining_entertainment_break_open_time.hl_id', '=', 'hotels.id')		
			->where('hotels.id', $id)
			->get();


			

		$data['bar'] = DB::table('hotels')
			->select('*','hotels.hotel_id as hid')
			->leftJoin('hotel_dining_entertainment_bar', 'hotel_dining_entertainment_bar.hl_id', '=', 'hotels.id')		
			->where('hotels.id', $id)
			->get();
		$data['bar-open-time'] = DB::table('hotels')
			->select('*','hotels.hotel_id as hid')
			->leftJoin('hotel_dining_entertainment_public_open_time', 'hotel_dining_entertainment_public_open_time.hl_id', '=', 'hotels.id')		
			->where('hotels.id', $id)
			->get();


return Excel::create('Property-Information', function($excel) use ($data) {
			
            $excel->sheet('Property info', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Hotel ID');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Property type 1');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Property type 2');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Property type 3');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Location Type');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Alerts Email Address');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Property Email From Address');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Guest Email From Address');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Res Delivery Email Address');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Res Delivery Fax Number');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Hotel Uses Promotional Pricing');   });

                $sheet->cell('L1', function($cell) {$cell->setValue('Area Attractions');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Corporate Locations');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Hotel Location Description');   });

                $sheet->cell('O1', function($cell) {$cell->setValue('Off Site Entertainment');   });
                $sheet->cell('P1', function($cell) {$cell->setValue('Off Site Restaurants');   });
                $sheet->cell('Q1', function($cell) {$cell->setValue('On Site Entertainment');   });
                $sheet->cell('R1', function($cell) {$cell->setValue('Special Events');   });

                $sheet->cell('S1', function($cell) {$cell->setValue('Cancellation/No Show');   });
                $sheet->cell('T1', function($cell) {$cell->setValue('Extended Stay');   });
                $sheet->cell('U1', function($cell) {$cell->setValue('Extra Charges');   });
                $sheet->cell('V1', function($cell) {$cell->setValue('Family Plan');   });
                $sheet->cell('W1', function($cell) {$cell->setValue('General Policies');   });
                $sheet->cell('X1', function($cell) {$cell->setValue('Group Policy');   });
                $sheet->cell('Y1', function($cell) {$cell->setValue('Guarantee/Deposit');   });
                $sheet->cell('Z1', function($cell) {$cell->setValue('Pet Policy');   });
                $sheet->cell('AA1', function($cell) {$cell->setValue('Taxes');   });


                $sheet->cell('AB1', function($cell) {$cell->setValue('Check-In/Check-Out');   });
                $sheet->cell('AC1', function($cell) {$cell->setValue('Property Description Long');   });
                $sheet->cell('AD1', function($cell) {$cell->setValue('Property Detail');   });
                $sheet->cell('AE1', function($cell) {$cell->setValue('Seasonal Closure');   });
                $sheet->cell('AF1', function($cell) {$cell->setValue('Selling Feature 1');   });
                $sheet->cell('AG1', function($cell) {$cell->setValue('Selling Feature 2');   });
                $sheet->cell('AH1', function($cell) {$cell->setValue('Selling Feature 3');   });

                $sheet->cell('AI1', function($cell) {$cell->setValue('Amadues');   });
                $sheet->cell('AJ1', function($cell) {$cell->setValue('Galileo/ Apollo');   });
                $sheet->cell('AK1', function($cell) {$cell->setValue('Sabre');   });
                $sheet->cell('AK1', function($cell) {$cell->setValue('Worldspan');   });
                $sheet->cell('AM1', function($cell) {$cell->setValue('Lanyon');   });
                $sheet->cell('AN1', function($cell) {$cell->setValue('Pegasus');   });

                
              
                if (!empty($data['hotels'])) {

                	foreach ($data['hotels'] as $key => $value) {
                        $i= $key+2;
						$sheet->cell('A'.$i, $value->hid); 
                		$sheet->cell('B'.$i, $value->property_type); 
                        $sheet->cell('C'.$i, $value->property_type2); 
                        $sheet->cell('D'.$i, $value->property_type3);
                        $sheet->cell('E'.$i, $value->location_type);
                        $sheet->cell('F'.$i, $value->alert_email);
                        $sheet->cell('G'.$i, $value->property_email);
                        $sheet->cell('H'.$i, $value->guest_email);
                        $sheet->cell('I'.$i, $value->res_del_email);
                        $sheet->cell('J'.$i, $value->res_del_fax);
                        $sheet->cell('K'.$i, $value->price);                        
                        $sheet->cell('L'.$i, $value->area_attractions);
                        $sheet->cell('M'.$i, $value->corporate_locations);
                        $sheet->cell('N'.$i, $value->h_loc_desc);
                        $sheet->cell('O'.$i, $value->off_site_entertainment);
                        $sheet->cell('P'.$i, $value->off_site_restaurants);
                        $sheet->cell('Q'.$i, $value->on_site_entertainment);
                        $sheet->cell('R'.$i, $value->special_events);
                        $sheet->cell('S'.$i, $value->cancellation_policy);
                        $sheet->cell('T'.$i, $value->extended_stay_policy);
                        $sheet->cell('U'.$i, $value->extra_charge_policy);
                        $sheet->cell('V'.$i, $value->family_plan_policy);
                        $sheet->cell('W'.$i, $value->general_policy);
                        $sheet->cell('X'.$i, $value->group_policy);
                        $sheet->cell('Y'.$i, $value->guarantee_policy);
                        $sheet->cell('Z'.$i, $value->pet_policy);
                        $sheet->cell('AA'.$i, $value->taxs_policy);
                        $sheet->cell('AB'.$i, $value->property_check_in_out_desc);
                        $sheet->cell('AC'.$i, $value->property_description);
                        $sheet->cell('AD'.$i, $value->property_detail);
                        $sheet->cell('AE'.$i, $value->seasonal_closure);
                        $sheet->cell('AF'.$i, $value->selling_feature_1);
                        $sheet->cell('AG'.$i, $value->selling_feature_2);
                        $sheet->cell('AH'.$i, $value->selling_feature_3);
                        $sheet->cell('AI'.$i, $value->amadues);
                        $sheet->cell('AJ'.$i, $value->galileo);
                        $sheet->cell('AK'.$i, $value->sabre);
                        $sheet->cell('AL'.$i, $value->worldspan);
                        $sheet->cell('AM'.$i, $value->lanyon);
                        $sheet->cell('AN'.$i, $value->pegasus);

                       
                    //foreach ($data as $key => $value) {
                        //$i= $key+2;
                        // $sheet->cell('A2', $data->hotel_id); 
                        // $sheet->cell('B2', $data->hotel_name); 
                        // $sheet->cell('C2', $data->pms_code); 
                    //}
                    }
                }
            });

            $excel->sheet('Restaurant', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Name');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Meal Plan');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Description');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Breakfast');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Lunch');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Dinner');   });
              
                if (!empty($data['restaurant'])) {

                	foreach ($data['restaurant'] as $key => $value) {
                        $i= $key+2;
						$sheet->cell('A'.$i, $value->title); 
                		$sheet->cell('B'.$i, $value->meal_plan); 
                        $sheet->cell('C'.$i, $value->res_description); 
                        $sheet->cell('D'.$i, $value->res_breakfast);
                        $sheet->cell('E'.$i, $value->res_lunch);
                        $sheet->cell('F'.$i, $value->res_dinner);                       
                        
						}
                }
            });

            $excel->sheet('Restaurant Opening Time', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Monday Open Time');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Monday Closing Time');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Tuesday Open Time');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Tuesday Closing Time');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Wednesday Open Time');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Wednesday Closing Time');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Thursday Open Time');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Thursday Closing Time');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Friday Open Time');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Friday Closing Time');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Saturday Open Time');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Saturday Closing Time');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Saturday Open Time');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Saturday Closing Time');   });
              
                if (!empty($data['res-open-time'])) {

                	foreach ($data['res-open-time'] as $key => $value) {
                        $i= $key+2;
						$sheet->cell('A'.$i, $value->break_open_monday); 
                		$sheet->cell('B'.$i, $value->break_close_monday);
                		$sheet->cell('C'.$i, $value->break_open_tuesday); 
                		$sheet->cell('D'.$i, $value->break_close_tuesday); 
                		$sheet->cell('E'.$i, $value->break_open_wednesday); 
                		$sheet->cell('F'.$i, $value->break_close_wednesday); 
                		$sheet->cell('G'.$i, $value->break_open_thursday); 
                		$sheet->cell('H'.$i, $value->break_close_thursday); 
                		$sheet->cell('I'.$i, $value->break_open_friday); 
                		$sheet->cell('J'.$i, $value->break_close_friday); 
                		$sheet->cell('K'.$i, $value->break_open_saturday); 
                		$sheet->cell('L'.$i, $value->break_close_saturday); 
                		$sheet->cell('M'.$i, $value->break_open_sunday); 
                		$sheet->cell('N'.$i, $value->break_open_sunday);                                             
                        
						}
                }
            });

             $excel->sheet('Bar', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Bar Name');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Child friendly');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Description');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Public');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Guest');   });
              
                if (!empty($data['bar'])) {

                	foreach ($data['bar'] as $key => $value) {
                        $i= $key+2;
						$sheet->cell('A'.$i, $value->bar_name); 
                		$sheet->cell('B'.$i, $value->child_friendly); 
                        $sheet->cell('C'.$i, $value->bar_description); 
                        $sheet->cell('D'.$i, $value->bar_public);
                        $sheet->cell('E'.$i, $value->bar_guest);                    
                        
						}
                }
            });

                         $excel->sheet('Bar Opening Time', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Monday Open Time');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Monday Closing Time');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Tuesday Open Time');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Tuesday Closing Time');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Wednesday Open Time');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Wednesday Closing Time');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Thursday Open Time');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Thursday Closing Time');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Friday Open Time');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Friday Closing Time');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Saturday Open Time');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Saturday Closing Time');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Saturday Open Time');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Saturday Closing Time');   });
              
                if (!empty($data['bar-open-time'])) {

                	foreach ($data['bar-open-time'] as $key => $value) {
                        $i= $key+2;
						$sheet->cell('A'.$i, $value->public_open_monday); 
                		$sheet->cell('B'.$i, $value->public_close_monday);
                		$sheet->cell('C'.$i, $value->public_open_tuesday); 
                		$sheet->cell('D'.$i, $value->public_close_tuesday); 
                		$sheet->cell('E'.$i, $value->public_open_wednesday); 
                		$sheet->cell('F'.$i, $value->public_close_wednesday); 
                		$sheet->cell('G'.$i, $value->public_open_thursday); 
                		$sheet->cell('H'.$i, $value->public_close_thursday); 
                		$sheet->cell('I'.$i, $value->public_open_friday); 
                		$sheet->cell('J'.$i, $value->public_close_friday); 
                		$sheet->cell('K'.$i, $value->public_open_saturday); 
                		$sheet->cell('L'.$i, $value->public_close_saturday); 
                		$sheet->cell('M'.$i, $value->public_open_sunday); 
                		$sheet->cell('N'.$i, $value->public_open_sunday);                                             
                        
						}
                }
            });
             
        })->download($type);



    }   


public function getDashboard()
    {
//DB::enableQueryLog();
    	$user_id = (auth()->check()) ? auth()->user()->id : null;

		$hotels = DB::table('hotel_leads')
			 ->get(); 
			
		//dd(DB::getQueryLog());
	    $country= Country::all()->where('status',1);
	  
	   
		
		$contacts = DB::table('hotel_leads_contacts')
			->select('*', 'hotel_leads_contacts.hl_id as hid')
			->leftJoin('hotel_leads', 'hotel_leads_contacts.hl_id', '=', 'hotel_leads.hl_id')
			->where('hotel_leads_contacts.hl_c_main_contact', '=', 1)
			->get();
			//dd($contacts);
		
			
		if(count($contacts)>0)
		{
			for($i = 0; $i<count($contacts);$i++)
			{
				$contacts_list[$i]['cnt'] = count($contacts) ;
				$contacts_list[$i]['hl_id'] = $contacts[$i]->hl_id ;
				$contacts_list[$i]['hl_name'] = $contacts[$i]->hl_name ;
				$contacts_list[$i]['hl_grp_name'] = $contacts[$i]->hl_grp_name ;
				$contacts_list[$i]['hl_address'] = $contacts[$i]->hl_address ;
				$city= DB::table('cities')
				->select('name')->where('id',$contacts[$i]->hl_city)->first();

				$contacts_list[$i]['hl_city'] = '';
				if(!empty($city))
				{
				$contacts_list[$i]['hl_city'] = $city->name;	
				}
				
				$country = ($contacts[$i]->hl_country=='230'?'United Kingdom':'');
				$contacts_list[$i]['hl_country'] = $country;

				$contacts_list[$i]['hl_c_person'] = $contacts[$i]->hl_c_firstname ;

				$contacts_list[$i]['hl_c_no'] = $contacts[$i]->hl_c_no ;
				$contacts_list[$i]['hl_c_email'] = $contacts[$i]->hl_c_email ;
				$contacts_list[$i]['hl_c_status'] = $contacts[$i]->hl_c_status ;
				$user = DB::table('users')
						->select('*', 'users.id as uid')
						->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
						->where('users.id', '=', $contacts[$i]->hl_created_by)
						->get();
				$contacts_list[$i]['user_name'] = strtoupper($user[0]->first_name);
				
				$hotel_notes = DB::table('hotel_leads_notes')
				->select('*')
				->where('hl_id', '=', $contacts[$i]->hl_id)
				->orderBy('updated_at','DESC')
				->get();
				$hotel_notes_cnt = count($hotel_notes);
				$notes_list = array();
				if($hotel_notes_cnt>0)
				{
					for($ii = 0; $ii<$hotel_notes_cnt;$ii++)
					{
						$notes_list[$ii]['hl_n_notes'] = $hotel_notes[$ii]->hl_n_notes;
						$notes_list[$ii]['updated_at'] = $hotel_notes[$ii]->updated_at;
						$notes_list[$ii]['hl_n_added_by'] = $hotel_notes[$ii]->hl_n_added_by;
						$notes_list[$ii]['hl_c_status'] = $hotel_notes[$ii]->hl_c_status;
						$users = DB::table('users')
						->select('*', 'users.id as uid')
						->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
						->where('users.id', '=', $hotel_notes[$ii]->hl_n_added_by)
						->get();
						$notes_list[$ii]['hl_n_added_by_name'] = strtoupper($users[0]->first_name);
					}
					
					$contacts_list[$i]['notes'] = $notes_list;
				}
				
			}
			
		}
		else
		{
			$contacts_list[0]['cnt'] = count($contacts);
		}
		
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.hotelier.home',['hotels'=>$hotels,'contacts'=>$contacts_list,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
 //    	$user_id = (auth()->check()) ? auth()->user()->id : null;
 //    	$venue = DB::table('venue')
	// 		->select('*', DB::raw('count(leads.venue_id) as total'))
	// 		->selectRaw('sum(bph) as worth')			
	// 		->leftJoin('leads', 'leads.venue_id', '=', 'venue.v_id')
	// 		->where('venue.user_id', '=', $user_id)
	// 		->groupBy('v_id')
	// 		->get();
	// 	 $country= Country::all()->where('id',230);
	// 	$editstates = DB::table('states')			 
	// 		 ->get();
	// 	$editcities = DB::table('cities')			 
	// 		 ->get();
	// return view('panels.crm.home',['venue'=>$venue,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
    public function getHome()
    {
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		
		$venue_contact = DB::table('venue_contact')
			 ->where('user_id', $user_id)	 
			 ->first();
			 
		if(!$venue_contact){
		 return redirect('merchant/add-venue');	
		}
		/*$venue = DB::table('venue')
			 ->where('user_id', $user_id)	 
			 ->get();
			 */
			 $user_payment_type = DB::table('user_payment_type')
			 ->where('u_id', $user_id)	 
			 ->first();
			 if(!$user_payment_type)
			 {
				$upt = new UserPaymentType;				
				$upt->u_id=$user_id;
				$upt->type=1;				
				$upt->save();	
				
			 }
			 
		$venue = DB::table('venue')
			->select('*', DB::raw('count(leads.venue_id) as total'))
			->selectRaw('sum(bph) as worth')			
			->leftJoin('leads', 'leads.venue_id', '=', 'venue.v_id')
			->where('venue.user_id', '=', $user_id)
			->groupBy('v_id')
			->get();	 
			 
			 
	    $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
	  // $language= MultiLanguage::all();
	   $country= Country::all()->where('status',1);
	   //$category= Category::all();
	 //  $category = DB::table('category')
	//		 ->where('parent_id', '0')	 
	//		 ->get();
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
	//	$subcategory = DB::table('category')
	//		 ->where('parent_id','!=', '0')
	//		 ->get();
	//'language' => $language,'editlanguage' => $language,
	//'category' => $category,'editcategory' => $category,'editsubcategory' => $subcategory,
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.hotelier.home',['venue'=>$venue,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	 public function getVenueType()
    {

      return view('panels.hotelier.venue_type');

    }
	public function updatedVenueType(Request $request)
	{
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		DB::table('users')
		->where('id', $user_id)
		->update(['venue_type' => $request->type,]);
		
		return redirect('merchant');
	}
	
	 public function orders()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		
		$order = DB::table('payment_details')				
			->where('user_id', '=', $user_id)
			->get();		
		 return view('panels.hotelier.order',['order'=>$order,]);
	}
	
	 public function events()
	{
		//$tasks = Events::all()->where('hle_status','<>', 3);
		$tasks = DB::table('hotel_leads_events')
			->select('*', 'users.first_name as assignee')
			->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->get();
		$task_types = DB::table('hl_master_tasks')->get();	
		$task_types1 = DB::table('hl_master_tasks')->get();	
		$task_for = DB::table('hl_master_services')->get();	
		$users = DB::table('users')->get();	
			
		return view('panels.hotelier.events', ['tasks'=>$tasks, 'task_types'=>$task_types, 'task_types1'=>$task_types1, 'task_for'=>$task_for, 'users'=>$users]);
	}

	public function create()
	{
		$task_types = DB::table('hl_master_tasks')->get();	
		$task_for = DB::table('hl_master_services')->get();	
		$applicable_to = DB::table('hl_master_applicable_to')->get();	
		$applicable_to1 = DB::table('hl_master_applicable_to')->get();	
		return view('panels.hotelier.createevents', ['task_types'=>$task_types, 'task_for'=>$task_for, 'applicable_to'=>$applicable_to, 'applicable_to1'=>$applicable_to1]);
	}

	public function settings()
	{
		$master_tasks = DB::table('hl_master_automation_tasks')->get();	
		$users = DB::table('users')->get();	
		return view('panels.hotelier.settings', ['users'=>$users, 'master_tasks'=>$master_tasks]);
	}

	public function store(Request $request)
	{
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$Events = new Events;
		$Events->hle_title=$request->hle_title;
		$Events->hle_description=$request->hle_description;
		$Events->hle_start_date=date("Y-m-d",strtotime($request->hle_start_date)).' '.$request->hle_start_hour.':'.$request->hle_start_min.':00';
		
		$Events->hle_end_date=date("Y-m-d",strtotime($request->hle_end_date)).' '.$request->hle_end_hour.':'.$request->hle_end_min.':00';
		$Events->hle_status=$request->hle_status;
		$Events->hle_assigned_to=$request->hle_assigned_to;
		$Events->hle_category=$request->hle_category;
		$start  = strpos($request->searchbar, '[');
		$end    = strpos($request->searchbar, ']', $start + 1);
		$length = $end - $start;
		$exactval = substr($request->searchbar, $start + 1, $length - 1);
		$Events->hl_lead=$request->searchbar;
		$Events->hl_id=$exactval;
		$Events->hle_task_type=$request->hle_task_type;
		$Events->hle_recurr_status=$request->hle_recurr_status;
		$Events->hle_recurr_cnt=$request->hle_recurr_cnt;
		$Events->hle_recurr_duration=$request->hle_recurr_duration;
		$Events->hle_timezone=$request->hle_timezone;
		$Events->hle_allday_status=$request->hle_allday_status;
		$Events->hle_location=$request->hle_location;
		$Events->hle_outcome=$request->hle_outcome;
		$Events->hle_next_step=$request->hle_next_step;
		$Events->hle_assigned_to = $user_id;
		$Events->uid= $user_id;
		
		$Events->save();	
		
		return redirect('hotelier/events');
	}
	
	
	
	
	public function eventsupdate(Request $request)
	{
		
		DB::table('hotel_leads_events')
				->where('hle_id', $request->hle_id)
				->update([							
				'hle_title' =>$request->hle_title,
				'hle_description' =>$request->hle_description,
				'hle_start_date' =>date("Y-m-d",strtotime($request->hle_start_date)).' '.$request->hle_start_hour.':'.$request->hle_start_min.':00',
				'hle_end_date' =>date("Y-m-d",strtotime($request->hle_end_date)).' '.$request->hle_end_hour.':'.$request->hle_end_min.':00',
				'hle_recurr_status' =>$request->hle_recurr_status,
				'hle_recurr_cnt' =>$request->hle_recurr_cnt,
				'hle_task_type' =>$request->hle_task_type,
				'hle_category' =>$request->hle_category,
				'hle_assigned_to' =>$request->hle_assigned_to,
				'hle_timezone' =>$request->hle_timezone,
				'hle_allday_status' =>$request->hle_allday_status,
				'hle_location' =>$request->hle_location,
				'hle_outcome' =>$request->hle_outcome,
				'hle_next_step' =>$request->hle_next_step,
				'hl_lead' =>$request->searchbar ,
								
				]);
				return redirect('hotelier/events');
	}
	
	public function completevent($hle_id=null)
	{
		DB::table('hotel_leads_events')
				->where('hle_id', $hle_id)
				->update([			
				'hle_status' =>'2',
								
				]);
				return redirect('hotelier/events');
	}
	
	public function deletevent($hle_id=null)
	{
		DB::table('hotel_leads_events')
				->where('hle_id', $hle_id)
				->update([			
				'hle_status' =>'3',
								
				]);
				return redirect('hotelier/events');
	}
	
	public function ajaxcomplete(Request $request)
    {
          $search = $request->get('search');
		  $type = $request->get('type');
		  
		 // if($type == 'Hotel Development')
			$result = Hotelleads::where('hl_name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    } 
	
	public function edit()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
//$VenueContact= VenueContact::all()->where('user_id',$user_id);
/* $venue = DB::table('venue')
			 ->where('user_id', $user_id)	 
			 ->get(); */
		$venue= VenueContact::all()->where('user_id',$user_id)->first(); 
		$VenueType= VenueType::all();
    
	
	 
	   $country= Country::all()->where('id',230);
	   $Category= Category::all();
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
	
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.crm.edit',['Category'=>$Category,'VenueType'=>$VenueType,'venue'=>$venue,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
    }
		
	public function getvenue(Request $request)
		{
			 $id=$request->id; 
			 
			 $venue = DB::table('venue_contact')
			 ->where('v_c_id', $id)	 
			 ->first();   
			//$category_id['cid']=$venue->category_id;
			$user_venue_type = DB::table('user_venue_type')
			 ->where('venue_id', $id)	 
			 ->get();			
			 
		 return '{"view_details": ' . json_encode(array("venue"=>$venue,"user_venue_type"=>$user_venue_type)) . '}';
	}
		
	public function addedVenueContact(Request $request)
	{
		
		
		  $this->validate($request,
			 [		 
		
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'contact_no'			=> 'required',			
			'nearest_transport_link'	=> 'required',		
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',
			'contact_no.required'			=> 'Contact no is required',			
			'nearest_transport_link.required'	=> 'Nearest transport link is required',
                     ]);
			
		
			
				$Venue = new VenueContact;				
				$Venue->user_id=auth()->user()->id;
				$Venue->title=$request->title;
				$Venue->c_id=$request->country;
				$Venue->state=$request->states;
				$Venue->city=$request->cities;
				$Venue->address1=$request->address1;
				$Venue->address2=$request->address2;
				$Venue->postcode=$request->postcode;
				$Venue->contact_no=$request->contact_no;
				$Venue->description=$request->description;
				$Venue->nearest_transport_link=$request->nearest_transport_link;
				$Venue->save();	
				$vid=$Venue->id;				
				//dd(DB::getQueryLog());
				$venuetype=implode(',',$request->venuetype);
				foreach(explode(',',$venuetype) as $val)
				{
					$venuetype = new UserVenueType;					
					$venuetype->venuetype_id=$val;
					$venuetype->venue_id=$vid;							
					$venuetype->save();				
				}
				
			return redirect('merchant/add-venue')->with('message','Venue contact added successfully');
	}
	public function updatedVenueContact(Request $request)
	{	 
  $this->validate($request,
			 [		 
		
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'contact_no'			=> 'required',			
			'nearest_transport_link'	=> 'required',		
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',
			'contact_no.required'			=> 'Contact number is required',
			
			'nearest_transport_link.required'	=> 'Nearest transport link is required',
                     ]);
			
			    $vid=$request->id;
				
				DB::table('venue_contact')
				->where('v_c_id', $request->id)
				->update([							
				'title' =>$request->title,
				'c_id' =>$request->country,
				'state' =>$request->states,
				'city' =>$request->cities,
				'address1' =>$request->address1,
				'address2' =>$request->address2,
				'postcode' =>$request->postcode,
				'contact_no' =>$request->contact_no,
				'description'=>$request->description,
                 'nearest_transport_link' =>$request->nearest_transport_link,				
				]);
				$vid=$request->id;
				 $affected = DB::table('user_venue_type')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
				
						$venuetype=implode(',',$request->venuetype);
						foreach(explode(',',$venuetype) as $val)
						{
							$venuetype = new UserVenueType;					
							$venuetype->venuetype_id=$val;
							$venuetype->venue_id=$vid;							
							$venuetype->save();				
						}
					} 		
			
return redirect('merchant/edit-venue')->with('message','Venue contact updated successfully');

	}
	
	// Venue Contact End
	
	

	
	public function getEnquiry($id=null)
    {
		
		
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)			
			->first();
			
		//	$payment_details = DB::table('payment_details')			
		//	->where('status', '=', 'Active')
		//	->where('user_id', '=', $user_id)			
		//	->first();			
			//$time = strtotime($payment_details->created_at);
			//$exp_date = date("Y-m-d H:i:s", strtotime("+1 month", $time));
			//'created_date'=>$created_date,'exp_date'=>$exp_date,


		if($id != null)
		{
		
			$leads = DB::table('leads')
			->select('*', 'leads.status as enq_status')			
			->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')
			//->where('leads.assign_status', '=', 2)			
			->where('leads.venue_id', '=', $id)
			->get();
		}else{
			$leads = DB::table('leads')
			->select('*', 'leads.status as enq_status')	
			->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')
			//->where('leads.assign_status', '=', 2)
			->where('venue.user_id', '=', $user_id)
			->get();
			}
	
			//dd(DB::getQueryLog());
	
      return view('panels.hotelier.enquiry',['leads'=>$leads,'user_payment_type'=>$user_payment_type,]);

    }
		public function getleadDetails($id=null)
    {
		
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)
			->where('type', '=', 2)
			->where('status', '=', 'Active')
			->first();
		$payment_details = DB::table('payment_details')			
			->where('subcription_status', 'Active')
			->where('user_id', $user_id)			
			->first();	
			
			//$time = strtotime($payment_details->created_at);
			//$exp_date = date("Y-m-d H:i:s", strtotime("+1 month", $time));
			//'created_date'=>$created_date,'exp_date'=>$exp_date,
	if(!$user_payment_type)
		{
				
		echo $leads='Invalid Payment Type';
		}else{
			
				if($id)
				{
				
					$leads = DB::table('leads')							
					->where('id', '=', $id)
					->first();
				}
		}
			
	
      return view('panels.hotelier.leaddetails',['leads'=>$leads,'payment_details'=>$payment_details,]);

    }
	
	public function getUserPaymentType()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;		
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)
			->first();		
      return view('panels.hotelier.payment_type',['user_payment_type'=>$user_payment_type,]);

    }
	public function updatedUserPayment(Request $request)
	{
		$id=$request->id;  
		DB::table('user_payment_type')
		->where('u_id', $id)
		->update(['type' => $request->type,]);
		
		$status='Your payment type update successfully';
		 return '{"status": ' . json_encode($status) . '}'; 
		 
		
	//	return redirect('merchant/payment-plan')->with('message','Payment model updated successfully');
	}
	
	public function edit_profile()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;
$users = DB::table('users')		
		->where('id', '=', $user_id)
		->first();
		
      return view('panels.hotelier.edit_profile',['users'=>$users]);
    }
	public function update_password()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

      return view('panels.hotelier.update_password');
    }

	public function getstates(Request $request)
		{
			 $id=$request->id;  
			 $states = DB::table('states')
			 ->where('country_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($states) . '}';
	}
	
	public function getcities(Request $request)
		{
			 $id=$request->id;  
			 $cities = DB::table('cities')
			 ->where('state_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($cities) . '}';
	}
	 
    public function viewHotels()
    {
	$user_id = (auth()->check()) ? auth()->user()->id : null;
    $hotels = DB::table('hotels')
       ->get(); 
     
    return view('panels.hotelier.view_hotelportal',['hotels'=>$hotels]);

    }


	// Venue Space Start
	 public function addHotelConfiguration($id)
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//$venue= Venue::all();
		

		$VenueContact= VenueContact::all()->where('id',$id);
		$Hotels= Hotels::where('id',$id)->first();
		
	  
		$country= Country::all();
		$Category= Category::all();
		
	    $view_users = DB::table('users')
        ->where('business_id',$id)
        ->get();
	    
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();

	    $hl_id=$Hotels->id;


	   $Rooms = Rooms::
			select('*','rooms.id as rid')
			->leftJoin('hotel_rooms_attributes', 'rooms.id', '=', 'hotel_rooms_attributes.hl_room_id')
			->leftJoin('hotel_rooms_bed_type', 'rooms.id', '=', 'hotel_rooms_bed_type.hl_room_id')
			->leftJoin('hotel_rooms_occupancy', 'rooms.id', '=', 'hotel_rooms_occupancy.hl_room_id')
			->leftJoin('hotel_rooms_price_adjustment', 'rooms.id', '=', 'hotel_rooms_price_adjustment.hl_room_id')
			->where('rooms.hotel_id', '=',$hl_id)
            ->orderBy('rooms.id', 'desc')
			->get();
//dd($Rooms);
// $Rooms = Rooms::where('hotel_id', '=',$hl_id)->get();

$CategoryPropertyType= CategoryPropertyType::all();
$CategoryLocationType= CategoryLocationType::all();
$CategoryMealPlan= CategoryMealPlan::all();
$CategoryTaxType= CategoryTaxType::all();
$RoomsCategory= RoomsCategory::all();
$RoomClass= RoomClass::all();
$RoomBedType=RoomBedType::all();

//dd($CategoryPropertyType);
	   
	   $HodelAddress= HodelAddress::where('hl_id',$hl_id)->first();
	   $HotelMainContacts= HotelMainContacts::where('hl_id',$hl_id)->first();
	   $HotelAdditionalContacts= HotelAdditionalContacts::where('hl_id',$hl_id)->first();
	   $HotelAirportInfo= HotelAirportInfo::where('hl_id',$hl_id)->get();
	   $HotelOtherInfo= HotelOtherInfo::where('hl_id',$hl_id)->first();
	   $HotelPropertyAttributes= HotelPropertyAttributes::where('hl_id',$hl_id)->first();
	   $HotelAreaInfo= HotelAreaInfo::where('hl_id',$hl_id)->first();
	   $HotelDiningEntertainmentRestaurant= HotelDiningEntertainmentRestaurant::where('hl_id',$hl_id)->get();
	   $HotelDiningEntertainmentResOpenTime= HotelDiningEntertainmentResOpenTime::where('hl_id',$hl_id)->first();
	   $HotelDiningEntertainmentBreakOpenTime= HotelDiningEntertainmentBreakOpenTime::where('hl_id',$hl_id)->first();
	   $HotelDiningEntertainmentLunchOpenTime= HotelDiningEntertainmentLunchOpenTime::where('hl_id',$hl_id)->first();
	   $HotelDiningEntertainmentDinnerOpenTime= HotelDiningEntertainmentDinnerOpenTime::where('hl_id',$hl_id)->first();
	   $HotelDiningEntertainmentBar= HotelDiningEntertainmentBar::where('hl_id',$hl_id)->get();	  
	   $HotelDiningEntertainmentGuestOpenTime= HotelDiningEntertainmentGuestOpenTime::where('hl_id',$hl_id)->get();
	   $HotelDiningEntertainmentPublicOpenTime= HotelDiningEntertainmentPublicOpenTime::where('hl_id',$hl_id)->get();
	   $HotelMealPlan= HotelMealPlan::where('hl_id',$hl_id)->first();	   
	   $HotelPolices= HotelPolices::where('hl_id',$hl_id)->first();
	   $HotelProperty= HotelProperty::where('hl_id',$hl_id)->first();
	   $HotelGdsCodes= HotelGdsCodes::where('hl_id',$hl_id)->first();
	   $HotelGdsCodesOther= HotelGdsCodesOther::where('hl_id',$hl_id)->get();
	   $HotelRoomsAttributes= HotelRoomsAttributes::where('hl_id',$hl_id)->first();
	   $HotelRoomsBedType= HotelRoomsBedType::where('hl_id',$hl_id)->first();
	   $HotelRoomsOccupancy= HotelRoomsOccupancy::where('hl_id',$hl_id)->first();
	   $HotelRoomsPriceAdjustment= HotelRoomsPriceAdjustment::where('hl_id',$hl_id)->first();
	   $HotelTaxConfiguration= HotelTaxConfiguration::where('hl_id',$hl_id)->first();
       $HotelLocalPolices= HotelLocalPolices::where('hl_id',$hl_id)->first();

		//$UserVenueCapacity= UserVenueCapacity::where('venue_id',$hl_id)->get();
		$VenueCapacity = DB::table('venue_capacity')
			->select('*', 'venue_capacity.id as vcid','user_venue_capacity.id as uvcid')
			->leftJoin('user_venue_capacity', 'user_venue_capacity.capacity_id', '=', 'venue_capacity.id')
			->where('user_venue_capacity.venue_id', $hl_id)
			->get();


		$Benefits = DB::table('benefits')
			->select('*', 'benefits.id as bid','user_venue_benefits.id as uvbid')
			->join('user_venue_benefits', 'user_venue_benefits.benefits_id', '=', 'benefits.id')
			->orwhere('user_venue_benefits.venue_id', $hl_id)
			->get();

			$Amenities = DB::table('amenities')
			->select('*', 'amenities.id as aid','user_venue_amenities.id as uvaid')
			->leftJoin('user_venue_amenities', 'user_venue_amenities.amenities_id', '=', 'amenities.id')
			->where('user_venue_amenities.venue_id', $hl_id)
			->get();

		$Business = DB::table('business')
			->select('*', 'business.id as bsid','user_venue_business.id as uvbsid')
			->leftJoin('user_venue_business', 'user_venue_business.business_id', '=', 'business.id')
			->where('user_venue_business.venue_id', $hl_id)
			->get();

		

		$VenueFeatures = DB::table('venue_features')
			->select('*', 'venue_features.id as fid','user_venue_features.id as uvfid')
			->leftJoin('user_venue_features', 'user_venue_features.features_id', '=', 'venue_features.id')
			->where('user_venue_features.venue_id', $hl_id)
			->get();

		$VenueFoodDrink = DB::table('Venue_fooddrink')
			->select('*', 'venue_fooddrink.id as fdid','user_venue_fooddrink.id as uvfdid')
			->leftJoin('user_venue_fooddrink', 'user_venue_fooddrink.fooddrink_id', '=', 'venue_fooddrink.id')
			->where('user_venue_fooddrink.venue_id', $hl_id)
			->get();

		$VenueLicensing = DB::table('venue_licensing')
			->select('*', 'venue_licensing.id as lid','user_venue_licensing.id as uvlid')
			->leftJoin('user_venue_licensing', 'user_venue_licensing.licensing_id', '=', 'venue_licensing.id')
			->where('user_venue_licensing.venue_id', $hl_id)
			->get();

		$VenueRestrictions = DB::table('venue_restrictions')
			->select('*', 'venue_restrictions.id as rid','user_venue_restrictions.id as uvrlid')
			->leftJoin('user_venue_restrictions', 'user_venue_restrictions.restrictions_id', '=', 'venue_restrictions.id')
			->where('user_venue_restrictions.venue_id', $hl_id)
			->get();

		$VenueType= VenueType::all();
		//$Benefits= Benefits::all();
		//$Amenities= Amenities::all();
		//$Business= VenueBusiness::all();
		//$VenueType= VenueType::all();
	    //$VenueCapacity= VenueCapacity::all();
		//$VenueFeatures= VenueFeatures::all();
		//$VenueFoodDrink= VenueFoodDrink::all();
		//$VenueLicensing= VenueLicensing::all();
		//$VenueRestrictions= VenueRestrictions::all();


		$UserVenueBenefits= UserVenueBenefits::where('venue_id',$hl_id)->get();
		$UserVenueAmenities= UserVenueAmenities::where('venue_id',$hl_id)->get();
		$UserVenueBusiness= UserVenueBusiness::where('venue_id',$hl_id)->get();
		$UserVenueFeatures= UserVenueFeatures::where('venue_id',$hl_id)->get();
		$UserVenueFooddrink= UserVenueFooddrink::where('venue_id',$hl_id)->get();
		$UserVenueLicensing= UserVenueLicensing::where('venue_id',$hl_id)->get();

		

	    $Airports= Airports::get();
	    $Currencylist= Currencylist::get();

        $Hotelsynxiscrs=Hotelsynxiscrs::where('hl_id',$hl_id)->first();
	   
	    $Zone= Zone::get();
//dd($Currencylist);
	    $states='';
	    $cities='';
	   if($HodelAddress){
			$states = DB::table('states')->where('country_id',$HodelAddress->country)->get();
			$cities = DB::table('cities')->where('state_id',$HodelAddress->state)->get();
	   }
	

      return view('panels.hotelier.add_hotel_configuration',compact('Hotelsynxiscrs','HotelLocalPolices','HotelPolices','UserVenueBenefits','UserVenueAmenities','UserVenueBusiness','UserVenueFeatures','UserVenueFooddrink','UserVenueLicensing','HotelGdsCodesOther','states','cities','RoomClass','RoomBedType','RoomsCategory','Currencylist','country','Zone','Airports','CategoryTaxType','CategoryMealPlan','CategoryPropertyType','CategoryLocationType','Rooms','HodelAddress','HotelMainContacts','HotelAdditionalContacts','HotelAirportInfo','HotelOtherInfo','HotelPropertyAttributes','HotelAreaInfo','HotelDiningEntertainmentRestaurant','HotelDiningEntertainmentResOpenTime','HotelDiningEntertainmentBreakOpenTime','HotelDiningEntertainmentLunchOpenTime','HotelDiningEntertainmentDinnerOpenTime','HotelDiningEntertainmentBar','HotelDiningEntertainmentGuestOpenTime','HotelDiningEntertainmentPublicOpenTime','HotelMealPlan','HotelPolices','HotelProperty','HotelGdsCodes','HotelRoomsAttributes','HotelRoomsBedType','HotelRoomsOccupancy','HotelRoomsPriceAdjustment','HotelTaxConfiguration','VenueCapacity','view_users','id'),['Hotels'=>$Hotels,'Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueContact'=>$VenueContact,'VenueType'=>$VenueType,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'editusers' => $users,'editcountry' => $country,'editstates' => $states,'editcities' => $cities]);

    }



// public function downloadExcel($type,$id){
// 	$yourFileName='hotels.'.$type;
// 	$query = DB::table('hotels')->select('hotel_name','grp_name')->where('id',$id);
// 	$excel = Exporter::make('Excel');
// 	$excel->loadQuery($query);	
// 	$excel->setChunk(1000);
// 	return $excel->stream($yourFileName);   
//     }
  public function addedUser(Request $request)

    {

            $this->validate($request,

             [

                'firstname'             => 'required',

                'lastname'              => 'required',

                'email'                 => 'required|email|unique:users',

                'password'              => 'required|min:6|max:20',

               

               

            ],

            [

                'firstname.required'    => 'First Name is required',

                'lastname.required'     => 'Last Name is required',

                'email.required'        => 'Email is required',

                'email.email'           => 'Email is invalid',

                'password.required'     => 'Password is required',

                'password.min'          => 'Password needs to have at least 6 characters',

                'password.max'          => 'Password maximum length is 20 characters',

            


               

            ]);

            
$business=User::where('business_id',$request->hotel)->count();
if($business >= 3){
    return back()->with('message','3 Users only allowed this Business name');
}else{



            

            $photo = $request->file('photo');

             if($photo){

                $photo = $request->file('photo');

                $imagename = time().'.'.$photo->getClientOriginalExtension();   

                $destinationPath = public_path('/../uploads/thumbnail');

                $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);

                $thumb_img->save($destinationPath.'/'.$imagename,80);                    

                $destinationPath = public_path('/../uploads/original');

                $photo->move($destinationPath, $imagename);

             }else{

                $imagename="";               

             }

                $user = new User;

                $user->first_name=$request->firstname;

                $user->last_name=$request->lastname;

                $user->email=$request->email;

                $user->business_id=$request->hotel_id;                  

                $user->image=$imagename;

                $user->password=bcrypt($request->password);

                $user->token=str_random(64);

                $user->activated=!config('settings.activation');                

                $user->save();  

                $data1 = ['email' => $request->email,'firstname' => $request->firstname,'lastname' => $request->lastname,'password' =>$request->password];

                 
        Mail::send('emails.createuser', $data1, function ($message) use ($data1)
        {
          //dd($data['email_add']);
        $message->from('info@ap-lbc.com', 'ap-lbc.com');
        $message->to($data1['email']);
        //$message->cc('linda@ap-lbc.com');
       // $message->bcc('admin@ap-lbc.com');
        $message->subject("User Registrartion");

        });
      

                $role = Role::whereName('crm')->first();                

                $user->assignRole($role);   

                                 

                $user_access_modules = new UserAccessModules;

                $user_access_modules->user_id=$user->id;

                $user_access_modules->modules='';           

                $user_access_modules->save();

                

               // $user_access_modules = DB::table('user_access_modules')

                

               // $user_access_modules->save();             

                //$this->initiateEmailActivation($user);



            return back()->with('message','Users added successfully');
            }

    }

  public function getuserdetail(Request $request){

    $user_detail = User::where('id', $request->id)
    ->first();

    return '{"view_details": ' . json_encode($user_detail) . '}';
  }
  public function userpw_updated(Request $request)
  {

     //dd($request->first_name);
  
        
        if($request->email_id!=''){
        $password = bcrypt($request->password);
       // DB::enableQueryLog();
        DB::table('users')
        ->where('id', $request->user_id)
        ->update([              
        'first_name' =>$request->first_name,'last_name' =>$request->last_name,'password' =>$password,
        ]);

        $re_id=$request->edit_id;

        $data1 = ['first_name' => $request->first_name,'last_name' => $request->last_name,'password' => $request->password,'email' =>$request->email_id,'user_id' =>$request->user_id];
          Mail::send('emails.updateuser', $data1, function ($message) use ($data1)
        {
        $message->from('info@ap-lbc.com', 'ap-lbc.com');
        $message->to($data1['email']);
        //$message->cc('linda@ap-lbc.com');
       // $message->bcc('admin@ap-lbc.com');
        $message->subject("Reset Password");

        });
        }
        return back()->with('message','Password updated successfully');

        
  }

    public function airportList(Request $request)
		{	 
		$id=$request->id;  

				$status['data'] = Airports::where('id', '=',$id)
				->first();
				$status['rid']=$request->rid;			
				//$status['status']='success';		
		 return '{"details": ' . json_encode($status) . '}'; 
		
		}

		public function zoneOffset(Request $request)
		{	 
		$id=$request->id;  

				$status= Timezone::where('zone_id', '=',$id)
				->get();
						
				//$status['status']='success';		
		 return '{"details": ' . json_encode($status) . '}'; 
		
		}

	public function timezoneloc(Request $request)
		{	 
		$id=$request->id;  

				$status['data'] = Airports::where('id', '=',$id)
				->first();
				$status['rid']=$request->rid;			
				//$status['status']='success';		
		 return '{"details": ' . json_encode($status) . '}'; 
		
		}

    public function addRoom(Request $request)
		{	 
		$id=$request->id;  
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		



			   $Rooms = new Rooms;				
				$Rooms->user_id=auth()->user()->id;
				$Rooms->hotel_id=$id;
				$Rooms->status=$request->active;					
				$Rooms->title=$request->room_name;
				$Rooms->room_category=$request->room_category;					
				$Rooms->room_code=$request->room_code;
				$Rooms->total_room=$request->total_room;
				$Rooms->rolling_invetry=$request->rolling_invetry;
				$Rooms->room_pms_code=$request->room_pms_code;
				$Rooms->room_short_desc=$request->room_short_desc;				
				$Rooms->description=$request->room_long_desc;							
				$Rooms->save();				
			    $hlid = $Rooms->id;

                $uploadFile = $request->file('uploadFile');
 
                     if($uploadFile){                
                        $fd_uploadFile = time().'-1.'.$uploadFile->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile->move($destinationPath, $fd_uploadFile);
                        DB::table('rooms')
                        ->where('id', $hlid)
                        ->update(['image_1' => $fd_uploadFile,]);
                     }

                     $uploadFile1 = $request->file('uploadFile1');
 
                     if($uploadFile1){                
                        $fd_uploadFile1 = time().'-2.'.$uploadFile1->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile1->move($destinationPath, $fd_uploadFile1);
                        DB::table('rooms')
                        ->where('id', $hlid)
                        ->update(['image_2' => $fd_uploadFile1,]);
                     }

                      $uploadFile2 = $request->file('uploadFile2');
 
                     if($uploadFile2){                
                        $fd_uploadFile2 = time().'-3.'.$uploadFile2->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile2->move($destinationPath, $fd_uploadFile2);
                        DB::table('rooms')
                        ->where('id', $hlid)
                        ->update(['image_3' => $fd_uploadFile2,]);
                     }

                      $uploadFile3 = $request->file('uploadFile3');
 
                     if($uploadFile3){                
                        $fd_uploadFile3 = time().'-4.'.$uploadFile3->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile3->move($destinationPath, $fd_uploadFile3);
                        DB::table('rooms')
                        ->where('id', $hlid)
                        ->update(['image_4' => $fd_uploadFile3,]);
                     }

    $HotelRoomsAttributes = new HotelRoomsAttributes;				
	$HotelRoomsAttributes->hl_room_id=$hlid;				
	$HotelRoomsAttributes->hl_id=$id;
	$HotelRoomsAttributes->room_class=$request->room_class;					
	$HotelRoomsAttributes->room_size=$request->room_size;
	$HotelRoomsAttributes->ada_compliant=$request->ada_compliant;
    $HotelRoomsAttributes->room_min_size=$request->room_min_size;				
    $HotelRoomsAttributes->room_max_size=$request->room_max_size;
    $HotelRoomsAttributes->room_size_units=$request->room_size_units;
	$HotelRoomsAttributes->save();	

	$HotelRoomsAttributesid = $HotelRoomsAttributes->id;
$tot=count($request->bed_type);
    for ($i=0; $i < $tot ; $i++) {      
    $HotelRoomsBedType = new HotelRoomsBedType;				
	$HotelRoomsBedType->hl_room_id=$hlid;				
	$HotelRoomsBedType->hl_id=$id;
	$HotelRoomsBedType->bed_type=$request->bed_type[$i];					
	$HotelRoomsBedType->bed_quantity=$request->bed_quantity[$i];
	$HotelRoomsBedType->bed_primary=$request->bed_primary[$i];						
	$HotelRoomsBedType->save();	

    $HotelRoomsBedTypeid = $HotelRoomsBedType->id;
    }

    $HotelRoomsOccupancy = new HotelRoomsOccupancy;				
	$HotelRoomsOccupancy->hl_room_id=$hlid;				
	$HotelRoomsOccupancy->hl_id=$id;
	$HotelRoomsOccupancy->total_guest_per_room=$request->total_guest_per_room;	
	$HotelRoomsOccupancy->total_guest_per_room_un=$request->total_guest_per_room_un;
	$HotelRoomsOccupancy->adult_occupancy=$request->adult_occupancy;
	$HotelRoomsOccupancy->adult_occupancy_un=$request->adult_occupancy_un;
	$HotelRoomsOccupancy->child_occupancy=$request->child_occupancy;
	$HotelRoomsOccupancy->child_occupancy_un=$request->child_occupancy_un;
	$HotelRoomsOccupancy->child_age_limit=$request->child_age_limit;
	$HotelRoomsOccupancy->allow_extra_bed=$request->allow_extra_bed;			
	$HotelRoomsOccupancy->save();

    $HotelRoomsOccupancysid = $HotelRoomsOccupancy->id;

    $HotelRoomsPriceAdjustment = new HotelRoomsPriceAdjustment;				
	$HotelRoomsPriceAdjustment->hl_room_id=$hlid;				
	$HotelRoomsPriceAdjustment->hl_id=$id;
	$HotelRoomsPriceAdjustment->price_adjustment_type=$request->price_adjustment_type;					
	$HotelRoomsPriceAdjustment->default_adjustment=$request->default_adjustment;
	$HotelRoomsPriceAdjustment->save();

	$HotelRoomsPriceAdjustmentid = $HotelRoomsPriceAdjustment->id;

    $EditRooms = DB::table('rooms')
	->select('*','rooms.id as rid, hotel_rooms_attributes as aid,hotel_rooms_bed_type as btid, hotel_rooms_occupancy as oid, hotel_rooms_price_adjustment as paid')
	->leftJoin('hotel_rooms_attributes', 'rooms.id', '=', 'hotel_rooms_attributes.hl_room_id')
	->leftJoin('hotel_rooms_bed_type', 'rooms.id', '=', 'hotel_rooms_bed_type.hl_room_id')
	->leftJoin('hotel_rooms_occupancy', 'rooms.id', '=', 'hotel_rooms_occupancy.hl_room_id')
	->leftJoin('hotel_rooms_price_adjustment', 'rooms.id', '=', 'hotel_rooms_price_adjustment.hl_room_id')
	->where('rooms.id', '=',$hlid)
	->get();
	$status['EditRooms']=$EditRooms;
	$status['status']='success';		

	return '{"details": ' . json_encode($status) . '}'; 		
}



public function updateRoom(Request $request)
{   
//DB::enableQueryLog(); 
    $id=$request->id;  
    $user_id = (auth()->check()) ? auth()->user()->id : null;

    $Rooms = Rooms::find($request->roomId); 
    $Rooms->hotel_id = $id;            
    $Rooms->user_id = auth()->user()->id;
    $Rooms->title = $request->room_name;
    $Rooms->room_category = $request->room_category;
    $Rooms->room_code = $request->room_code;
    $Rooms->total_room = $request->total_room;
    $Rooms->rolling_invetry = $request->rolling_invetry;
    $Rooms->room_pms_code = $request->room_pms_code;
    $Rooms->status = $request->active;                    
    $Rooms->room_short_desc = $request->room_short_desc;            
    $Rooms->description = $request->room_long_desc;                
    $Rooms->save();

    $HotelRoomsAttributes = HotelRoomsAttributes::where('hl_room_id',$request->roomId)->first();    
    $HotelRoomsAttributes->hl_room_id=$request->roomId;                
    $HotelRoomsAttributes->hl_id=$id;
    $HotelRoomsAttributes->room_class=$request->room_class;                 
    $HotelRoomsAttributes->room_size=$request->room_size;
    $HotelRoomsAttributes->ada_compliant=$request->ada_compliant;
    $HotelRoomsAttributes->room_min_size=$request->room_min_size;      
    $HotelRoomsAttributes->room_max_size=$request->room_max_size;
    $HotelRoomsAttributes->room_size_units=$request->room_size_units;
    $HotelRoomsAttributes->save();


    $HotelRoomsOccupancy = HotelRoomsOccupancy::where('hl_room_id',$request->roomId)->first();             
    $HotelRoomsOccupancy->hl_room_id=$request->roomId;             
    $HotelRoomsOccupancy->hl_id=$id;
    $HotelRoomsOccupancy->total_guest_per_room=$request->total_guest_per_room;                  
    $HotelRoomsOccupancy->total_guest_per_room_un=$request->total_guest_per_room_un;
    $HotelRoomsOccupancy->adult_occupancy=$request->adult_occupancy;
    $HotelRoomsOccupancy->adult_occupancy_un=$request->adult_occupancy_un;
    $HotelRoomsOccupancy->child_occupancy=$request->child_occupancy;
    $HotelRoomsOccupancy->child_occupancy_un=$request->child_occupancy_un;
    $HotelRoomsOccupancy->child_age_limit=$request->child_age_limit;
    $HotelRoomsOccupancy->allow_extra_bed=$request->allow_extra_bed;       
    $HotelRoomsOccupancy->save();

    $HotelRoomsBedType = HotelRoomsBedType::where('hl_room_id',$request->roomId)->first();             
    $HotelRoomsBedType->hl_room_id=$request->roomId;                
    $HotelRoomsBedType->hl_id=$id;
    $HotelRoomsBedType->bed_type=$request->bed_type;                    
    $HotelRoomsBedType->bed_quantity=$request->bed_quantity;
    $HotelRoomsBedType->bed_primary=$request->bed_primary;                  
    $HotelRoomsBedType->save();

    $HotelRoomsPriceAdjustment = HotelRoomsPriceAdjustment::where('hl_room_id',$request->roomId)->first();             
    $HotelRoomsPriceAdjustment->hl_room_id=$request->roomId;               
    $HotelRoomsPriceAdjustment->hl_id=$id;
    $HotelRoomsPriceAdjustment->price_adjustment_type=$request->price_adjustment_type;                  
    $HotelRoomsPriceAdjustment->default_adjustment=$request->default_adjustment;
    $HotelRoomsPriceAdjustment->save();                         
//dd(DB::getQueryLog());
    return '{"details": ' . json_encode($request->all()) . '}'; 
}



		public function addRestaurant(Request $request)
		{	 
		$id=$request->id;  
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		

//dd($request->res_open_monday);
			$Restaurant = new HotelDiningEntertainmentRestaurant;				
				$Restaurant->user_id=auth()->user()->id;
				$Restaurant->hl_id=$id;
				$Restaurant->title=$request->dinning;					
				$Restaurant->meal_plan=$request->meal_plan;
				$Restaurant->res_description=$request->res_description;					
				$Restaurant->res_breakfast=$request->res_breakfast;
				$Restaurant->res_lunch=$request->res_lunch;
				$Restaurant->res_dinner=$request->res_dinner;											
				$Restaurant->save();				
			    $hlid = $Restaurant->id;

			   
				$HotelRoomsAttributes = new HotelDiningEntertainmentBreakOpenTime;					
				$HotelRoomsAttributes->res_id=$hlid;				
				$HotelRoomsAttributes->hl_id=$id;
				$HotelRoomsAttributes->break_open_monday=implode(",",$request->res_open_monday);				
				$HotelRoomsAttributes->break_close_monday=implode(",",$request->res_close_monday);
				$HotelRoomsAttributes->break_open_tuesday=implode(",",$request->res_open_tuesday);
				$HotelRoomsAttributes->break_close_tuesday=implode(",",$request->res_close_tuesday);
				$HotelRoomsAttributes->break_open_wednesday=implode(",",$request->res_open_wednesday);
				$HotelRoomsAttributes->break_close_wednesday=implode(",",$request->res_close_wednesday);
				$HotelRoomsAttributes->break_open_thursday=implode(",",$request->res_open_thursday);
				$HotelRoomsAttributes->break_close_thursday=implode(",",$request->res_close_thursday);
				$HotelRoomsAttributes->break_open_friday=implode(",",$request->res_open_friday);
				$HotelRoomsAttributes->break_close_friday=implode(",",$request->res_close_friday);
				$HotelRoomsAttributes->break_open_saturday=implode(",",$request->res_open_saturday);
				$HotelRoomsAttributes->break_close_saturday=implode(",",$request->res_close_saturday);
				$HotelRoomsAttributes->break_open_sunday=implode(",",$request->res_open_sunday);
				$HotelRoomsAttributes->break_close_sunday=implode(",",$request->res_close_sunday);
				$HotelRoomsAttributes->save();
			   

				// $EditRooms = DB::table('rooms')
				// ->select('*','rooms.id as rid, hotel_rooms_attributes as aid,hotel_rooms_bed_type as btid, hotel_rooms_occupancy as oid, hotel_rooms_price_adjustment as paid')
				// ->leftJoin('hotel_rooms_attributes', 'rooms.id', '=', 'hotel_rooms_attributes.hl_room_id')
				// ->leftJoin('hotel_rooms_bed_type', 'rooms.id', '=', 'hotel_rooms_bed_type.hl_room_id')
				// ->leftJoin('hotel_rooms_occupancy', 'rooms.id', '=', 'hotel_rooms_occupancy.hl_room_id')
				// ->leftJoin('hotel_rooms_price_adjustment', 'rooms.id', '=', 'hotel_rooms_price_adjustment.hl_room_id')
				// ->where('rooms.id', '=',$hlid)
				// ->get();
				$EditRooms='';
				$status['EditRooms']=$EditRooms;
				$status['status']='success';		

			 // $blogs = DB::table('hotels')
			 // ->where('id', $id)
			 // ->delete();
			 // $status['deletedid']=$id;
			 // $status['deletedtatus']='Hotel deleted successfully';
		 return '{"details": ' . json_encode($status) . '}'; 
		
		}




public function updateRestaurant(Request $request)
{   

    $id=$request->id;  
    $user_id = (auth()->check()) ? auth()->user()->id : null;

    $Restaurant = HotelDiningEntertainmentRestaurant::find($request->resId);               
    $Restaurant->user_id=auth()->user()->id;
    $Restaurant->hl_id=$id;
    $Restaurant->title=$request->dinning;                   
    $Restaurant->meal_plan=$request->meal_plan;
    $Restaurant->res_description=$request->res_description;                 
    $Restaurant->res_breakfast=$request->res_breakfast;
    $Restaurant->res_lunch=$request->res_lunch;
    $Restaurant->res_dinner=$request->res_dinner;                                           
    $Restaurant->save();

    $HotelRoomsAttributes = HotelDiningEntertainmentBreakOpenTime::where('res_id',$request->resId)->first();                  
    $HotelRoomsAttributes->res_id=$request->resId;                
    $HotelRoomsAttributes->hl_id=$id;
    $HotelRoomsAttributes->break_open_monday=implode(",",$request->res_open_monday);                
    $HotelRoomsAttributes->break_close_monday=implode(",",$request->res_close_monday);
    $HotelRoomsAttributes->break_open_tuesday=implode(",",$request->res_open_tuesday);
    $HotelRoomsAttributes->break_close_tuesday=implode(",",$request->res_close_tuesday);
    $HotelRoomsAttributes->break_open_wednesday=implode(",",$request->res_open_wednesday);
    $HotelRoomsAttributes->break_close_wednesday=implode(",",$request->res_close_wednesday);
    $HotelRoomsAttributes->break_open_thursday=implode(",",$request->res_open_thursday);
    $HotelRoomsAttributes->break_close_thursday=implode(",",$request->res_close_thursday);
    $HotelRoomsAttributes->break_open_friday=implode(",",$request->res_open_friday);
    $HotelRoomsAttributes->break_close_friday=implode(",",$request->res_close_friday);
    $HotelRoomsAttributes->break_open_saturday=implode(",",$request->res_open_saturday);
    $HotelRoomsAttributes->break_close_saturday=implode(",",$request->res_close_saturday);
    $HotelRoomsAttributes->break_open_sunday=implode(",",$request->res_open_sunday);
    $HotelRoomsAttributes->break_close_sunday=implode(",",$request->res_close_sunday);
    $HotelRoomsAttributes->save();

    return '{"details": ' . json_encode($request->all()) . '}'; 
}











public function addBar(Request $request)
		{	 
		$id=$request->id;  
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		

//dd($request->res_open_monday);
				$Bar = new HotelDiningEntertainmentBar;				
				$Bar->user_id=auth()->user()->id;
				$Bar->hl_id=$id;
				$Bar->bar_name=$request->bar_name;					
				$Bar->child_friendly=$request->child_friendly;
				$Bar->bar_description=$request->bar_description;					
				$Bar->bar_public=$request->bar_public;
				$Bar->bar_guest=$request->bar_guest;											
				$Bar->save();				
			    $hlid = $Bar->id;

			   
				$BarTime = new HotelDiningEntertainmentPublicOpenTime;					
				$BarTime->bar_id=$hlid;				
				$BarTime->hl_id=$id;
				$BarTime->public_open_monday=implode(",",$request->res_open_monday);				
				$BarTime->public_close_monday=implode(",",$request->res_close_monday);
				$BarTime->public_open_tuesday=implode(",",$request->res_open_tuesday);
				$BarTime->public_close_tuesday=implode(",",$request->res_close_tuesday);
				$BarTime->public_open_wednesday=implode(",",$request->res_open_wednesday);
				$BarTime->public_close_wednesday=implode(",",$request->res_close_wednesday);
				$BarTime->public_open_thursday=implode(",",$request->res_open_thursday);
				$BarTime->public_close_thursday=implode(",",$request->res_close_thursday);
				$BarTime->public_open_friday=implode(",",$request->res_open_friday);
				$BarTime->public_close_friday=implode(",",$request->res_close_friday);
				$BarTime->public_open_saturday=implode(",",$request->res_open_saturday);
				$BarTime->public_close_saturday=implode(",",$request->res_close_saturday);
				$BarTime->public_open_sunday=implode(",",$request->res_open_sunday);
				$BarTime->public_close_sunday=implode(",",$request->res_close_sunday);
				$BarTime->save();
			   

				// $EditRooms = DB::table('rooms')
				// ->select('*','rooms.id as rid, hotel_rooms_attributes as aid,hotel_rooms_bed_type as btid, hotel_rooms_occupancy as oid, hotel_rooms_price_adjustment as paid')
				// ->leftJoin('hotel_rooms_attributes', 'rooms.id', '=', 'hotel_rooms_attributes.hl_room_id')
				// ->leftJoin('hotel_rooms_bed_type', 'rooms.id', '=', 'hotel_rooms_bed_type.hl_room_id')
				// ->leftJoin('hotel_rooms_occupancy', 'rooms.id', '=', 'hotel_rooms_occupancy.hl_room_id')
				// ->leftJoin('hotel_rooms_price_adjustment', 'rooms.id', '=', 'hotel_rooms_price_adjustment.hl_room_id')
				// ->where('rooms.id', '=',$hlid)
				// ->get();
				$EditBar='';
				$status['EditRooms']=$EditBar;
				$status['status']='success';		

			 // $blogs = DB::table('hotels')
			 // ->where('id', $id)
			 // ->delete();
			 // $status['deletedid']=$id;
			 // $status['deletedtatus']='Hotel deleted successfully';
		 return '{"details": ' . json_encode($status) . '}'; 
		
		}



public function addSynXis(Request $request)
        {    
        $id=$request->id;  
        $user_id = (auth()->check()) ? auth()->user()->id : null;


        $validator = Validator::make($request->all(), [
            'chain_name' => 'required',
            'chain_id' => 'required',
            'syn_property_name_all' =>'required',
            'syn_property_code' =>'required',
            'syn_phy_address1' =>'required',
            'syn_phy_address2' =>'required',
            'syn_phy_country' =>'required',
            'syn_phy_postcode' =>'required',
            'syn_invertry_amt' =>'required',
        ],[
           'chain_name.required'         => 'Chain name is required',
            'chain_id.required'           => 'Chain id is required',
            'syn_property_name_all' =>'Property Name is required',
            'syn_property_code' =>'Property Code is required',
            'syn_phy_address1' =>'Street Address line 1 is required',
            'syn_phy_address2' =>'Street Address line 2 is required',
            'syn_phy_country' =>'Country is required',
            'syn_phy_state' =>'State is required',
            'syn_phy_postcode' =>'Post code is required',
            'syn_invertry_amt' =>'Rolling Inventory Amount is required', 
        ]);


        if ($validator->passes()) {  
        
                $Hotelsynxiscrs = new Hotelsynxiscrs;             
                $Hotelsynxiscrs->created_by=auth()->user()->id;
                $Hotelsynxiscrs->hl_id=$id;                  
                $Hotelsynxiscrs->chain_name=$request->chain_name;
                $Hotelsynxiscrs->chain_id= $request->chain_id;
                $Hotelsynxiscrs->syn_property_name= $request->syn_property_name;
                $Hotelsynxiscrs->syn_property_name_all= $request->syn_property_name_all;
                $Hotelsynxiscrs->syn_property_code= $request->syn_property_code;
                $Hotelsynxiscrs->syn_phy_address1= $request->syn_phy_address1;
                $Hotelsynxiscrs->syn_phy_address2= $request->syn_phy_address2;
                $Hotelsynxiscrs->syn_phy_city= $request->syn_phy_city;
                $Hotelsynxiscrs->syn_phy_postcode= $request->syn_phy_postcode;
                $Hotelsynxiscrs->syn_phy_country= $request->syn_phy_country;
                $Hotelsynxiscrs->syn_invertry_amt= $request->syn_invertry_amt;
                $Hotelsynxiscrs->syn_main_phone= $request->syn_main_phone;
                $Hotelsynxiscrs->syn_main_fax= $request->syn_main_fax;
                $Hotelsynxiscrs->syn_latitude= $request->syn_latitude;
                $Hotelsynxiscrs->syn_longitude= $request->syn_longitude;
                $Hotelsynxiscrs->syn_gen_enq_email= $request->syn_gen_enq_email;
                $Hotelsynxiscrs->syn_web= $request->syn_web;
                $Hotelsynxiscrs->syn_default_lang= $request->syn_default_lang;
                $Hotelsynxiscrs->syn_op2_lang= $request->syn_op2_lang;
                $Hotelsynxiscrs->syn_op3_lang= $request->syn_op3_lang;
                $Hotelsynxiscrs->syn_op4_lang= $request->syn_op4_lang;
                $Hotelsynxiscrs->syn_op5_lang= $request->syn_op5_lang;
                $Hotelsynxiscrs->syn_op6_lang= $request->syn_op6_lang;
                $Hotelsynxiscrs->syn_currency= $request->syn_currency;
                $Hotelsynxiscrs->syn_time_zone= $request->syn_time_zone;
                $Hotelsynxiscrs->syn_airport= $request->syn_airport;
                $Hotelsynxiscrs->syn_via_email= $request->syn_via_email;
                $Hotelsynxiscrs->syn_via_email_add= $request->syn_via_email_add;
                $Hotelsynxiscrs->syn_via_fax= $request->syn_via_fax;
                $Hotelsynxiscrs->syn_via_fax_no= $request->syn_via_fax_no;
                $Hotelsynxiscrs->syn_channel_1= $request->syn_channel_1;
                $Hotelsynxiscrs->syn_channel_desc_1= $request->syn_channel_desc_1;
                $Hotelsynxiscrs->syn_channel_2= $request->syn_channel_2;
                $Hotelsynxiscrs->syn_channel_desc_2= $request->syn_channel_desc_2;
                $Hotelsynxiscrs->syn_channel_3= $request->syn_channel_3;
                $Hotelsynxiscrs->syn_channel_desc_3= $request->syn_channel_desc_3;
                $Hotelsynxiscrs->syn_channel_4= $request->syn_channel_4;
                $Hotelsynxiscrs->syn_channel_desc_4= $request->syn_channel_desc_4;
                $Hotelsynxiscrs->syn_channel_5= $request->syn_channel_5;
                $Hotelsynxiscrs->syn_channel_desc_5= $request->syn_channel_desc_5;
                $Hotelsynxiscrs->syn_channel_6= $request->syn_channel_6;
                $Hotelsynxiscrs->syn_channel_desc_6= $request->syn_channel_desc_6;
                $Hotelsynxiscrs->syn_pri_name= $request->syn_pri_name;
                $Hotelsynxiscrs->syn_pri_title= $request->syn_pri_title;
                $Hotelsynxiscrs->syn_pri_phone= $request->syn_pri_phone;
                $Hotelsynxiscrs->syn_pri_email= $request->syn_pri_email;
                $Hotelsynxiscrs->syn_add1_name= $request->syn_add1_name;
                $Hotelsynxiscrs->syn_add1_title= $request->syn_add1_title;
                $Hotelsynxiscrs->syn_add1_phone= $request->syn_add1_phone;
                $Hotelsynxiscrs->syn_add1_email= $request->syn_add1_email;
                $Hotelsynxiscrs->syn_add2_name= $request->syn_add2_name;
                $Hotelsynxiscrs->syn_add2_title= $request->syn_add2_title;
                $Hotelsynxiscrs->syn_add2_phone= $request->syn_add2_phone;
                $Hotelsynxiscrs->syn_add2_email= $request->syn_add2_email;
                $Hotelsynxiscrs->syn_tec_name= $request->syn_tec_name;
                $Hotelsynxiscrs->syn_tec_title= $request->syn_tec_title;
                $Hotelsynxiscrs->syn_tec_phone= $request->syn_tec_phone;
                $Hotelsynxiscrs->syn_tec_email= $request->syn_tec_email;
                $Hotelsynxiscrs->syn_already_rep= $request->syn_already_rep;
                $Hotelsynxiscrs->syn_gds_comp_name= $request->syn_gds_comp_name;
                $Hotelsynxiscrs->syn_chain_code= $request->syn_chain_code;
                $Hotelsynxiscrs->syn_property_code_sabre= $request->syn_property_code_sabre;
                $Hotelsynxiscrs->syn_property_code_apollo= $request->syn_property_code_apollo;
                $Hotelsynxiscrs->syn_property_code_worldspan= $request->syn_property_code_worldspan;
                $Hotelsynxiscrs->syn_property_code_amadeus= $request->syn_property_code_amadeus;
                $Hotelsynxiscrs->save();               
                $hlid = $Hotelsynxiscrs->id;

                $SynXis='';
                $status['SynXis']=$SynXis;
                $status['status']='success';
                  return response()->json(['success'=>'Added new records.']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
           
        // return '{"details": ' . json_encode($status) . '}'; 
        
        }

    public function importSynXis(Request $request){



        if($request->hasFile('synxis_file')){

            $path = $request->file('synxis_file')->getRealPath();

            $data = Excel::load($path)->get();


$created_by=auth()->user()->id;
$hl_id=$request->mhotel_id;


            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr = ['created_by' => $created_by,
                    'hl_id' => $hl_id,
                    'chain_name'=> $value->chain_name,
                    'chain_id'=> $value->chain_id,
                    'syn_property_name'=> $value->syn_property_name,
                    'syn_property_name_all'=> $value->syn_property_name_all,
                    'syn_property_code'=> $value->syn_property_code,
                    'syn_phy_address1'=> $value->syn_phy_address1,
                    'syn_phy_address2'=> $value->syn_phy_address2,
                    'syn_phy_city'=> $value->syn_phy_city,
                    'syn_phy_postcode'=> $value->syn_phy_postcode,
                    'syn_phy_country'=> $value->syn_phy_country,
                    'syn_invertry_amt'=> $value->syn_invertry_amt,
                    'syn_main_phone'=> $value->syn_main_phone,
                    'syn_main_fax'=> $value->syn_main_fax,
                    'syn_latitude'=> $value->syn_latitude,
                    'syn_longitude'=> $value->syn_longitude,
                    'syn_gen_enq_email'=> $value->syn_gen_enq_email,
                    'syn_web'=> $value->syn_web,
                    'syn_default_lang'=> $value->syn_default_lang,
                    'syn_op2_lang'=> $value->syn_op2_lang,
                    'syn_op3_lang'=> $value->syn_op3_lang,
                    'syn_op4_lang'=> $value->syn_op4_lang,
                    'syn_op5_lang'=> $value->syn_op5_lang,
                    'syn_op6_lang'=> $value->syn_op6_lang,
                    'syn_currency'=> $value->syn_currency,
                    'syn_time_zone'=> $value->syn_time_zone,
                    'syn_airport'=> $value->syn_airport,
                    'syn_via_email'=> $value->syn_via_email,
                    'syn_via_email_add'=> $value->syn_via_email_add,
                    'syn_via_fax'=> $value->syn_via_fax,
                    'syn_via_fax_no'=> $value->syn_via_fax_no,
                    'syn_channel_1'=> $value->syn_channel_1,
                    'syn_channel_desc_1'=> $value->syn_channel_desc_1,
                    'syn_channel_2'=> $value->syn_channel_2,
                    'syn_channel_desc_2'=> $value->syn_channel_desc_2,
                    'syn_channel_3'=> $value->syn_channel_3,
                    'syn_channel_desc_3'=> $value->syn_channel_desc_3,
                    'syn_channel_4'=> $value->syn_channel_4,
                    'syn_channel_desc_4'=> $value->syn_channel_desc_4,
                    'syn_channel_5'=> $value->syn_channel_5,
                    'syn_channel_desc_5'=> $value->syn_channel_desc_5,
                    'syn_channel_6'=> $value->syn_channel_6,
                    'syn_channel_desc_6'=> $value->syn_channel_desc_6,
                    'syn_pri_name'=> $value->syn_pri_name,
                    'syn_pri_title'=> $value->syn_pri_title,
                    'syn_pri_phone'=> $value->syn_pri_phone,
                    'syn_pri_email'=> $value->syn_pri_email,
                    'syn_add1_name'=> $value->syn_add1_name,
                    'syn_add1_title'=> $value->syn_add1_title,
                    'syn_add1_phone'=> $value->syn_add1_phone,
                    'syn_add1_email'=> $value->syn_add1_email,
                    'syn_add2_name'=> $value->syn_add2_name,
                    'syn_add2_title'=> $value->syn_add2_title,
                    'syn_add2_phone'=> $value->syn_add2_phone,
                    'syn_add2_email'=> $value->syn_add2_email,
                    'syn_tec_name'=> $value->syn_tec_name,
                    'syn_tec_title'=> $value->syn_tec_title,
                    'syn_tec_phone'=> $value->syn_tec_phone,
                    'syn_tec_email'=> $value->syn_tec_email,
                    'syn_already_rep'=> $value->syn_already_rep,
                    'syn_gds_comp_name'=> $value->syn_gds_comp_name,
                    'syn_chain_code'=> $value->syn_chain_code,
                    'syn_property_code_sabre'=> $value->syn_property_code_sabre,
                    'syn_property_code_apollo'=> $value->syn_property_code_apollo,
                    'syn_property_code_worldspan'=> $value->syn_property_code_worldspan,
                    'syn_property_code_amadeus'=> $value->syn_property_code_amadeus];

                }

                if(!empty($arr)){
                $hotel_synxis_crs=DB::table('hotel_synxis_crs')->where('hl_id',$hl_id)->first();
                    if($hotel_synxis_crs)
                    {
                        DB::table('hotel_synxis_crs')->where('hl_id',$hl_id)->update($arr);
                    }else{
                        DB::table('hotel_synxis_crs')->insert($arr);  
                    }
                    

                    return back()->with('message','Insert Recorded successfully');

                   // dd('Insert Recorded successfully.');

                }

            }

        }
 return back()->with('message','Request data does not have any files to import.');
      //  dd('Request data does not have any files to import.');      

    } 



     public function importTaxConfiguration(Request $request){



        if($request->hasFile('tax_file')){

            $path = $request->file('tax_file')->getRealPath();

            $data = Excel::load($path)->get();


$created_by=auth()->user()->id;
$hl_id=$request->mhotel_id;


            if($data->count()){

                foreach ($data as $key => $value) {    

                    $arr = [
                    'hl_id' => $value->hotel_id,
                    'tax_level'=> $value->tax_level,
                    'tax_type'=> $value->tax_type,
                    'tax_code'=> $value->code,
                    'tax_name'=> $value->name,
                    'tax_desc'=> $value->default_description,
                    'start_date'=> $value->start_year.'-'.$value->start_month.'-'.$value->start_day,
                    'end_date'=> $value->end_year.'-'.$value->end_month.'-'.$value->end_day,
                    'no_end_date'=> $value->no_end_date,
                    'tax'=> $value->amount,
                    'tax_type_price'=> $value->adjustment_type,
                    'tax_frequency'=> $value->tax_frequency,
                    'charge_per'=> $value->charge_type,
                    'cal_ext_rate'=> $value->always_calculate_from_external_rate,
                    'tax_inclusive'=> $value->is_inclusive,
                    'cal_room_price'=> $value->calculate_from_room_price,
                    'cal_package_price'=> $value->calculate_from_package_price,
                    'apply_free_night'=> $value->apply_to_free_nights,
                    'tax_by_los'=> $value->tax_by_los];

                     if(!empty($arr)){
                    
                   
                    if($hl_id==$value->hotel_id)
                         { 

                            DB::table('hotel_tax_configuration')->where('hl_id',$hl_id)->update($arr);
                           // dd(DB::getQueryLog());
                    }else{
                        DB::table('hotel_tax_configuration')->insert($arr);
                        //dd(DB::getQueryLog());
                         }

                    

                   

                   // dd('Insert Recorded successfully.');

                }

                }
               //dd($arr);
//DB::connection()->enableQueryLog();
                 return back()->with('message','Tax Configuration Updated successfully');
               

            }

        }
 return back()->with('message','Request data does not have any files to import.');
      //  dd('Request data does not have any files to import.');      

    } 


    public function importRoomConfiguration(Request $request){



        if($request->hasFile('room_file')){

            $path = $request->file('room_file')->getRealPath();

            $data = Excel::load($path)->get();


$created_by=auth()->user()->id;
$hl_id=$request->mhotel_id;


            if($data->count()){

                foreach ($data as $key => $value) {    

                    // hotel_id    room_code   room_name   total_rooms pms_code    default_short_description   default_long_description    ada_compliant   room_min_size   room_max_size   size_units  total_guests_per_room   adult_occupancy child_occupancy child_age_range_1   child_age_range_2   child_age_range_3

                    $rooms = [
                    'hotel_id' => $value->hotel_id,
                    'room_code'=> $value->room_code,
                    'title'=> $value->room_name,
                    'total_room'=> $value->total_rooms,
                    'room_pms_code'=> $value->pms_code,
                    'room_short_desc'=> $value->default_short_description,
                    'description'=> $value->default_long_description
                ];
                // hl_room_id hl_id room_class room_size ada_compliant room_min_size room_max_size room_size_units 
                /* hl_room_id  hl_id  bed_type bed_quantity bed_primary*/               

                $hotel_rooms_attributes = [
                    'hl_id' => $value->hotel_id,                                        
                    'ada_compliant'=> $value->ada_compliant,
                    'room_min_size'=> $value->room_min_size,
                    'room_max_size'=> $value->room_max_size,
                    'room_size_units'=> $value->size_units                    
                ];
                //hl_room_id hl_id total_guest_per_room total_guest_per_room_un adult_occupancy adult_occupancy_un child_occupancy
                //child_occupancy_un child_age_limit allow_extra_bed 
 $hotel_rooms_occupancy = [
                    'hl_id' => $value->hotel_id,                   
                    'total_guest_per_room'=> $value->total_guests_per_room,
                    'adult_occupancy'=> $value->adult_occupancy,
                    'child_occupancy'=> $value->child_occupancy,
                    'child_age_limit'=> $value->child_age_range_1
                ];




                     if(!empty($rooms)){
                    
                   
                    if($hl_id==$value->hotel_id)
                         {                           
                           $rm = DB::table('rooms')->where('hotel_id',$hl_id)->where('room_code',$value->room_code)->first();
                            if($rm){
                                    DB::table('rooms')->where('hotel_id',$hl_id)->update($roomms);                                 
                                    if($rm->id){
                                    //hotel_rooms_attributes                                   
                                            $rm_att = DB::table('hotel_rooms_attributes')->where('hl_id',$hl_id)->where('hl_room_id',$rm->id)->first();
                                            if($rm_att){
                                            DB::table('hotel_rooms_attributes')->where('id',$rm_att->id)->update($hotel_rooms_attributes);
                                            }else{
                                                 array_merge($hotel_rooms_attributes, array("hl_room_id"=>$rm->id));
                                                 $id=DB::table('hotel_rooms_attributes')->insert($hotel_rooms_attributes);
                                            }

                                    //hotel_rooms_occupancy                                   
                                            $rm_occ = DB::table('hotel_rooms_occupancy')->where('hl_id',$hl_id)->where('hl_room_id',$rm->id)->first();
                                            if($rm_occ){
                                                DB::table('hotel_rooms_occupancy')->where('id',$rm_occ->id)->update($hotel_rooms_occupancy);
                                            }else{
                                                 array_merge($hotel_rooms_occupancy, array("hl_room_id"=>$rm->id));
                                                 $id=DB::table('hotel_rooms_occupancy')->insert($hotel_rooms_occupancy);
                                            }
                                    }
                            }else{

                                $id=DB::table('rooms')->insert($rooms);
                                array_merge($hotel_rooms_attributes, array("hl_room_id"=>$id));
                                DB::table('hotel_rooms_attributes')->insert($hotel_rooms_attributes);
                                array_merge($hotel_rooms_occupancy, array("hl_room_id"=>$id));
                                DB::table('hotel_rooms_occupancy')->insert($hotel_rooms_occupancy);
                            }
                           
                           // dd(DB::getQueryLog());
                    }

                    // else{
                    //     DB::table('hotel_tax_configuration')->insert($arr);
                    //     dd(DB::getQueryLog());
                    //      }

                    

                   

                   // dd('Insert Recorded successfully.');

                }

                }
               //dd($arr);
//DB::connection()->enableQueryLog();
                 return back()->with('message','Tax Configuration Updated successfully');
               

            }

        }
 return back()->with('message','Request data does not have any files to import.');
      //  dd('Request data does not have any files to import.');      

    } 


      public function importPropertyInfo(Request $request){



        if($request->hasFile('property_file')){

            $path = $request->file('property_file')->getRealPath();

            $data = Excel::load($path)->get();


$created_by=auth()->user()->id;
$hl_id=$request->mhotel_id;


            if($data->count()){

                foreach ($data as $key => $value) {  
              
                    $hotel_area_info = [
                    'hl_id' => $value->hotel_id,
                    'area_attractions'=> $value->area_attractions,
                    'corporate_locations'=> $value->corporate_locations,
                    'h_loc_desc'=> $value->location];

                    $hotel_meal_plan = [
                    'hl_id' => $value->hotel_id,
                    'off_site_entertainment'=> $value->off_site_entertainment,
                    'off_site_restaurants'=> $value->off_site_restaurants_and_lounges,
                    'on_site_entertainment'=> $value->on_site_entertainment,
                    'special_events'=> $value->special_events,
                    'weddings'=> $value->weddings,
                    'alternate_hotels'=> $value->alternate_hotels,
                    'awards'=> $value->awards,
                    'frequent_guest_information'=> $value->frequent_guest_information,
                    'gds_data'=> $value->gds_data,
                    'handicap_facilities'=> $value->handicap_facilities,
                    'key_selling_points'=> $value->key_selling_points,
                    'miscellaneous'=> $value->miscellaneous,
                    'safety'=> $value->safety,
                    'tour_operators'=> $value->tour_operators,
                    'travel_agent_commission'=> $value->travel_agent_commission,
                    'chef'=> $value->chef,
                    'director_of_sales_and_management'=> $value->director_of_sales_and_management,
                    'fb_director'=> $value->fb_director,
                    'general_manager'=> $value->general_manager,
                    'managing_director'=> $value->managing_director,
                    'reservations_manager'=> $value->reservations_manager,
                    'rooms_division'=> $value->rooms_division
                    ];

                    $hotel_property = [
                    'hl_id' => $value->hotel_id,
                    'property_check_in_out_desc'=> $value->check_in_check_out,
                    'property_description'=> $value->property_description_long,
                    'property_description_typical'=> $value->property_description_typical,
                    'property_detail'=> $value->property_detail,
                    'seasonal_closure'=> $value->seasonal_closure,
                    'selling_feature_1'=> $value->selling_feature_1,
                    'selling_feature_2'=> $value->selling_feature_2,
                    'selling_feature_3'=> $value->selling_feature_3,
                    'arrival_room_service'=> $value->arrival_room_service,
                    'business_service'=> $value->business_service,
                    'facilities'=> $value->facilities,
                    'health_club_or_fitness'=> $value->health_club_or_fitness,
                    'local_information'=> $value->local_information,
                    'meeting_facilities'=> $value->meeting_facilities,
                    'recreation'=> $value->recreation,
                    'room_amenities'=> $value->room_amenities,
                    'services'=> $value->services,
                    'shopping_local_attraction'=> $value->shopping_local_attraction,
                    'spa'=> $value->spa,
                    'directions'=> $value->directions,
                    'parking'=> $value->parking,
                    'tourist_information'=> $value->tourist_information,
                    'transfer_information'=> $value->transfer_information,
                    'transportation'=> $value->transportation,
                    'weather_information'=> $value->weather_information,
                    ];

                    $hotel_polices = [
                    'hl_id' => $value->hotel_id,
                    'cancellation_policy'=> $value->cancellation_no_show,
                    'extended_stay_policy'=> $value->extended_stay,
                    'extra_charge_policy'=> $value->extra_charges,
                    'family_plan_policy'=> $value->family_plan,
                    'general_policy'=> $value->general_policies,
                    'group_policy'=> $value->group_policy,
                    'guarantee_policy'=> $value->guarantee_deposit,
                    'pet_policy'=> $value->pet_policy,
                    'taxs_policy'=> $value->taxes                
                    ];

                    $hotel_local_polices =[
                    'hl_id' => $value->hotel_id,
                    'adults_only_hotel_no_kids_allowed'=> $value->adults_only_hotel_no_kids_allowed,
                    'early_checkout'=> $value->early_checkout,
                    'late_checkout'=> $value->late_checkout,
                    'pet_policy'=> $value->pet_policy,
                    'pets_allowed'=> $value->pets_allowed,
                    'Pets_free'=> $value->pets_free,
                    'extra_person_fee'=> $value->extra_person_fee,
                    'extra_child_fee'=> $value->extra_child_fee,
                    'crib_charge'=> $value->crib_charge,
                    'check_in_hour'=> $value->check_in_hour,
                    'check_in_minute'=> $value->check_in_minute,
                    'check_out_hour'=> $value->check_out_hour,
                    'check_out_minute'=> $value->check_out_minute,
                    'family_policy'=> $value->family_policy,
                    'kids_stay_free'=> $value->kids_stay_free,
                    'commission_policy'=>  $value->commission_policy,
                    'commission_percentage'=> $value->commission_percentage,
                    'deposit_policy'=> $value->deposit_policy,
                    'cancellation_policy'=> $value->cancellation_policy,                                   
                    ];

                    

                     if(!empty($hotel_area_info)){
                    
                   
                    if($hl_id==$value->hotel_id)
                         { 
                        DB::table('hotel_area_info')->where('hl_id',$hl_id)->update($hotel_area_info);
                        DB::table('hotel_meal_plan')->where('hl_id',$hl_id)->update($hotel_meal_plan);
                        DB::table('hotel_polices')->where('hl_id',$hl_id)->update($hotel_polices);
                        DB::table('hotel_local_polices')->where('hl_id',$hl_id)->update($hotel_local_polices);
                        DB::table('hotel_property')->where('hl_id',$hl_id)->update($hotel_property);

                        
                           // dd(DB::getQueryLog());
                    }else{
                        DB::table('hotel_area_info')->insert($hotel_area_info);
                        DB::table('hotel_meal_plan')->insert($hotel_meal_plan);
                        DB::table('hotel_polices')->insert($hotel_polices);
                        DB::table('hotel_local_polices')->insert($hotel_local_polices);
                        DB::table('hotel_property')->insert($hotel_property);
                        //dd(DB::getQueryLog());
                         }

                    

                   

                   // dd('Insert Recorded successfully.');

                }

                }
               //dd($arr);
//DB::connection()->enableQueryLog();
                 return back()->with('message','Property Information Updated successfully');
               

            }

        }
 return back()->with('message','Request data does not have any files to import.');
      //  dd('Request data does not have any files to import.');      

    } 


    public function importHotelConfiguration(Request $request){



        if($request->hasFile('hotel_file')){

            $path = $request->file('hotel_file')->getRealPath();

            $data = Excel::load($path)->get();


$created_by=auth()->user()->id;
$hl_id=$request->mhotel_id;


            if($data->count()){

                foreach ($data as $key => $value) {
 //          

            $arr = ['user_id' => $created_by,'hotel_id'=> $value->hotel_id,'hotel_code'=> $value->hotel_code,'hotel_name'=> $value->hotel_name,'pms_code'=> $value->hotel_pms_code,'hotel_short_name'=> $value->hotel_short_name];

            $arr_hotel_other = [
            'hl_id'=>$hl_id,
            'currency'=> $value->default_currency,
            't_zone_country'=> $value->time_zone_country,
            't_zone_location'=> $value->time_zone_location,
            't_zone_offset'=> $value->time_zone_offset                    
            ];

            $arr_hotel_add = [
            'hl_id'=>$hl_id,
            'address_1'=> $value->address_1,
            'address_2'=> $value->address_2,
            'address_3'=> $value->address_3 ,
            'city'=> $value->city,
            'state'=> $value->state,
            'postcode'=> $value->zip,
            'country'=> $value->country,
            'latitude'=> $value->latitude,
            'longitude'=> $value->longitude
        ];

            $arr_hotel_main = [
            'hl_id'=>$hl_id,
            'main_phone'=> $value->main_phone,
            'second_phone'=> $value->second_phone ,
            'fax'=> $value->fax,
            'email'=> $value->email,                    
            'url'=> $value->url,
            'r_d_email'=> $value->res_delivery_email_address,
            'cc_retrieval'=> $value->reservation_delivery_cc_retrieval,
            'reservation_email'=> $value->reservation_delivery_email,
            'inventory_notification'=> $value->depleted_inventory_notification
            ];


              if(!empty($arr)){                   

                    DB::table('hotels')->where('id',$hl_id)->update($arr);
                     
                      $hotels_add=DB::table('hodel_address')->where('hl_id',$hl_id)->first();

                      if($hotels_add){
                        DB::table('hodel_address')->where('hl_id',$hl_id)->update($arr_hotel_add);
                      }else{                      
                        DB::table('hodel_address')->insert($arr_hotel_add);
                      }
                     
                     $hotel_main_contacts=DB::table('hotel_main_contacts')->where('hl_id',$hl_id)->first();
                      if($hotel_main_contacts){
                        DB::table('hotel_main_contacts')->where('hl_id',$hl_id)->update($arr_hotel_main);
                      }else{ 
                            DB::table('hotel_main_contacts')->insert($arr_hotel_main);
                      }
                       $hotel_other_info=DB::table('hotel_other_info')->where('hl_id',$hl_id)->first();
                      if($hotel_other_info){
                        DB::table('hotel_other_info')->where('hl_id',$hl_id)->update($arr_hotel_other);
                      }else{     
                            DB::table('hotel_other_info')->insert($arr_hotel_other);
                      }
                      
            }



                }

              
                    return back()->with('message','Recorded Updated successfully');

                   // dd('Insert Recorded successfully.');

                

            }

        }
 return back()->with('message','Request data does not have any files to import.');
      //  dd('Request data does not have any files to import.');      

    } 
		public function updated(Request $request)
	{	 
    $this->validate($request,
			 [			 
		
			'grp_name'			=> 'required',
			'hotel_name'			=> 'required',
			'hotel_id'=> 'required',
			'hotel_code'			=> 'required',
			'pms_code'			=> 'required',
			'hotel_short_name'			=> 'required',
			'address_1'=> 'required',
			'country'=> 'required',
			'state'=> 'required',
			'city'			=> 'required',
			'zip_code'=> 'required',
			
			//'postcode'			=> 'required',
			// 'contact_no'			=> 'required',
			// 'price'			=> 'required',
			// 'web'			=> 'required',
			// 'description'			=> 'required'
               
            ],
            [
			
			'grp_name.required'			=> 'Group name is required',
			'hotel_name.required'			=> 'Hotel name is required',
			'hotel_id.required'			=> 'Hotel id is required',	
			'hotel_code.required'			=> 'Hotel code is required',
			'pms_code.required'			=> 'Hotel pms code is required',
			'hotel_short_name.required'			=> 'Hotel short name required',
			'address_1.required'			=> 'Address 1 is required',
			'country.required'			=> 'Country is required',
			'state.required'			=> 'State is required',
			'city.required'			=> 'Cities is required',		
			'zip_code.required'			=> 'Postcode is required',		
			// 'contact_no.required'			=> 'Contact no is required',		
			// 'price.required'			=> 'Price is required',		
			// 'web.required'			=> 'Web site url is required',		
			// 'description.required'			=> 'Description is required',					
                     ]);
			
			    $vid=$request->hotel_mid;
			    $hl_id=$request->hotel_mid;

                $uploadFile = $request->file('hotel_img_1');
 
                     if($uploadFile){                
                        $fd_uploadFile = time().'-1.'.$uploadFile->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile->move($destinationPath, $fd_uploadFile);
                        DB::table('hotels')
                        ->where('id', $vid)
                        ->update(['image_1' => $fd_uploadFile,]);
                     }

                     $uploadFile1 = $request->file('hotel_img_2');
 
                     if($uploadFile1){                
                        $fd_uploadFile1 = time().'-2.'.$uploadFile1->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile1->move($destinationPath, $fd_uploadFile1);
                        DB::table('hotels')
                        ->where('id', $vid)
                        ->update(['image_2' => $fd_uploadFile1,]);
                     }

                      $uploadFile2 = $request->file('hotel_img_3');
 
                     if($uploadFile2){                
                        $fd_uploadFile2 = time().'-3.'.$uploadFile2->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile2->move($destinationPath, $fd_uploadFile2);
                        DB::table('hotels')
                        ->where('id', $vid)
                        ->update(['image_3' => $fd_uploadFile2,]);
                     }

                      $uploadFile3 = $request->file('hotel_img_4'); 
                     if($uploadFile3){                
                        $fd_uploadFile3 = time().'-4.'.$uploadFile3->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile3->move($destinationPath, $fd_uploadFile3);
                        DB::table('hotels')
                        ->where('id', $vid)
                        ->update(['image_4' => $fd_uploadFile3,]);
                     }

                      $uploadFile4 = $request->file('hotel_img_5'); 
                     if($uploadFile4){                
                        $fd_uploadFile4 = time().'-5.'.$uploadFile4->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile4->move($destinationPath, $fd_uploadFile4);
                        DB::table('hotels')
                        ->where('id', $vid)
                        ->update(['image_5' => $fd_uploadFile3,]);
                     }

                      $uploadFile5 = $request->file('hotel_img_6'); 
                     if($uploadFile5){                
                        $fd_uploadFile5 = time().'-5.'.$uploadFile5->getClientOriginalExtension();
                        $destinationPath = public_path().'/uploads/venue/thumbnail';
                        $uploadFile5->move($destinationPath, $fd_uploadFile5);
                        DB::table('hotels')
                        ->where('id', $vid)
                        ->update(['image_6' => $fd_uploadFile3,]);
                     }
				// if(Session::get('session_images'))
				// {
				// $session_images = Session::get('session_images');
				
				// 	foreach($session_images as $image) {
				// 		$venue = DB::table('hotels')
				// 		 ->where('id', $vid)	 
				// 		 ->first(); 					
												
				// 		if($venue->image_1=== NULL){
							
				// 	 DB::table('hotels')
				// 		->where('id', $vid)
				// 		->update(['image_1' => $image,]);
				// 		}elseif($venue->image_2=== NULL){
				// 	 DB::table('hotels')
				// 		->where('id', $vid)
				// 		->update(['image_2' => $image,]);
				// 		}
				// 		elseif($venue->image_3=== NULL){
				// 	 DB::table('hotels')
				// 		->where('id', $vid)
				// 		->update(['image_3' => $image,]);
				// 		}elseif($venue->image_4=== NULL){
							
				// 	 DB::table('hotels')
				// 		->where('id', $vid)
				// 		->update(['image_4' => $image,]);
				// 		}elseif($venue->image_5=== NULL){
				// 	 DB::table('hotels')
				// 		->where('id', $vid)
				// 		->update(['image_5' => $image,]);
				// 		}
				// 		elseif($venue->image_6=== NULL){
				// 	 DB::table('hotels')
				// 		->where('id', $vid)
				// 		->update(['image_6' => $image,]);
				// 	//	dd(DB::getQueryLog());
				// 		}else{
							
				// 		}
										
				// 	}
					
				// 	//Session::flush();
				// 	Session::forget('session_images');
				// }
				
				
					 
					 $fd_menu_pdf_4 = $request->file('pdf4');
					 if($fd_menu_pdf_4){				
						$fd_menu_pdf_name4 = time().'-1.'.$fd_menu_pdf_4->getClientOriginalExtension();
						$destinationPath = public_path().'/uploads/meeting';
						$fd_menu_pdf_4->move($destinationPath, $fd_menu_pdf_name4);
						DB::table('hotels')
						->where('id', $vid)
						->update(['meeting_image' => $fd_menu_pdf_name4,]);
					 }


					 $fd_menu_pdf_3 = $request->file('pdf5');
				 	 if($fd_menu_pdf_3){				
				 		$fd_menu_pdf_name3 = time().'-1.'.$fd_menu_pdf_3->getClientOriginalExtension();
				 		$destinationPath = public_path().'/uploads/pdf';
				 		$fd_menu_pdf_3->move($destinationPath, $fd_menu_pdf_name3);
				 		DB::table('hotels')
				 		->where('id', $vid)
				 		->update(['meeting_fact_sheet' => $fd_menu_pdf_name3,]);
				 	 }
				 
					
				DB::table('hotels')
				->where('id', $vid)
				->update([							
				'hotel_name' =>$request->hotel_name,	
				'grp_name' =>$request->grp_name,							
				'hotel_id' =>$request->hotel_id,
				'hotel_code' =>$request->hotel_code,
				'pms_code' =>$request->pms_code,
				'hotel_short_name' =>$request->hotel_short_name,
				'seasonal_rates'=>$request->seasonal_rates,
				'meeting_description'=>$request->meet_event_desc,
				]);

				// 'nature_day_light'=>$request->nature_day_light,
				// 'country'=>$request->country,
				// 'state'=>$request->states,
				// 'city'=>$request->cities,
				// 'address1'=>$request->address1,
				// 'address2'=>$request->address2,
				// 'postcode'=>$request->postcode,
				// 'website'=>$request->web,
				// 'contact'=>$request->contact_no		
DB::enableQueryLog();
				$HodelAddress= HodelAddress::where('hl_id',$hl_id)->first();
					if(empty($HodelAddress)){
					$HodelAddress= new HodelAddress;
					$HodelAddress->hl_id=$hl_id;
					$HodelAddress->save();	
					}
                    
					$HotelMainContacts= HotelMainContacts::where('hl_id',$hl_id)->first();
					if(empty($HotelMainContacts)){
					$HotelMainContacts= new HotelMainContacts;
					$HotelMainContacts->hl_id=$hl_id;
					$HotelMainContacts->save();
                   
					}
                   
					$HotelAdditionalContacts= HotelAdditionalContacts::where('hl_id',$hl_id)->first();
					if(empty($HotelAdditionalContacts)){
					$HotelAdditionalContacts= new HotelAdditionalContacts;
					$HotelAdditionalContacts->hl_id=$hl_id;
					$HotelAdditionalContacts->save();
					}
                    
					$Hotelsynxiscrs= Hotelsynxiscrs::where('hl_id',$hl_id)->first();
					if(empty($Hotelsynxiscrs)){
					$Hotelsynxiscrs= new Hotelsynxiscrs;
					$Hotelsynxiscrs->hl_id=$hl_id;
					$Hotelsynxiscrs->save();
					}

					$HotelPropertyAttributes= HotelPropertyAttributes::where('hl_id',$hl_id)->first();
					if(empty($HotelPropertyAttributes)){
					$HotelPropertyAttributes= new HotelPropertyAttributes;
					$HotelPropertyAttributes->hl_id=$hl_id;
					$HotelPropertyAttributes->save();
					}

					$HotelAreaInfo= HotelAreaInfo::where('hl_id',$hl_id)->first();
					if(empty($HotelAreaInfo)){
					$HotelAreaInfo= new HotelAreaInfo;
					$HotelAreaInfo->hl_id=$hl_id;
					$HotelAreaInfo->save();
					}
////
					$HotelDiningEntertainmentRestaurant= HotelDiningEntertainmentRestaurant::where('hl_id',$hl_id)->first();					
					if(empty($HotelDiningEntertainmentRestaurant)){
					$HotelDiningEntertainmentRestaurant= new HotelDiningEntertainmentRestaurant;
					$HotelDiningEntertainmentRestaurant->hl_id=$hl_id;
					$HotelDiningEntertainmentRestaurant->save();
					}
					$HotelDiningEntertainmentResOpenTime= HotelDiningEntertainmentResOpenTime::where('hl_id',$hl_id)->first();					
					if(empty($HotelDiningEntertainmentResOpenTime)){
					$HotelDiningEntertainmentResOpenTime= new HotelDiningEntertainmentResOpenTime;
					$HotelDiningEntertainmentResOpenTime->hl_id=$hl_id;
					$HotelDiningEntertainmentResOpenTime->save();
					}
					$HotelDiningEntertainmentBreakOpenTime= HotelDiningEntertainmentBreakOpenTime::where('hl_id',$hl_id)->first();					
					if(empty($HotelDiningEntertainmentBreakOpenTime)){
					$HotelDiningEntertainmentBreakOpenTime= new HotelAreaInfo;
					$HotelDiningEntertainmentBreakOpenTime->hl_id=$hl_id;
					$HotelDiningEntertainmentBreakOpenTime->save();
					}
					$HotelDiningEntertainmentLunchOpenTime= HotelDiningEntertainmentLunchOpenTime::where('hl_id',$hl_id)->first();
					if(empty($HotelDiningEntertainmentLunchOpenTime)){
					$HotelDiningEntertainmentLunchOpenTime= new HotelDiningEntertainmentLunchOpenTime;
					$HotelDiningEntertainmentLunchOpenTime->hl_id=$hl_id;
					$HotelDiningEntertainmentLunchOpenTime->save();
					}

					$HotelDiningEntertainmentDinnerOpenTime= HotelDiningEntertainmentDinnerOpenTime::where('hl_id',$hl_id)->first();
					if(empty($HotelDiningEntertainmentDinnerOpenTime)){
					$HotelDiningEntertainmentDinnerOpenTime= new HotelDiningEntertainmentDinnerOpenTime;
					$HotelDiningEntertainmentDinnerOpenTime->hl_id=$hl_id;
					$HotelDiningEntertainmentDinnerOpenTime->save();
					}
					$HotelDiningEntertainmentBar= HotelDiningEntertainmentBar::where('hl_id',$hl_id)->first();				
					if(empty($HotelDiningEntertainmentBar)){
					$HotelDiningEntertainmentBar= new HotelDiningEntertainmentBar;
					$HotelDiningEntertainmentBar->hl_id=$hl_id;
					$HotelDiningEntertainmentBar->save();
					}
					$HotelDiningEntertainmentGuestOpenTime= HotelDiningEntertainmentGuestOpenTime::where('hl_id',$hl_id)->first();					
					if(empty($HotelDiningEntertainmentGuestOpenTime)){
					$HotelDiningEntertainmentGuestOpenTime= new HotelDiningEntertainmentGuestOpenTime;
					$HotelDiningEntertainmentGuestOpenTime->hl_id=$hl_id;
					$HotelDiningEntertainmentGuestOpenTime->save();
					}
					$HotelDiningEntertainmentPublicOpenTime= HotelDiningEntertainmentPublicOpenTime::where('hl_id',$hl_id)->first();					
					if(empty($HotelDiningEntertainmentPublicOpenTime)){
					$HotelDiningEntertainmentPublicOpenTime= new HotelDiningEntertainmentPublicOpenTime;
					$HotelDiningEntertainmentPublicOpenTime->hl_id=$hl_id;
					$HotelDiningEntertainmentPublicOpenTime->save();
					}
					$HotelMealPlan= HotelMealPlan::where('hl_id',$hl_id)->first();					
					if(empty($HotelMealPlan)){
					$HotelMealPlan= new HotelMealPlan;
					$HotelMealPlan->hl_id=$hl_id;
					$HotelMealPlan->save();
					}
					$HotelPolices= HotelPolices::where('hl_id',$hl_id)->first();					
					if(empty($HotelPolices)){
					$HotelPolices= new HotelPolices;
					$HotelPolices->hl_id=$hl_id;
					$HotelPolices->save();
					}
					$HotelProperty= HotelProperty::where('hl_id',$hl_id)->first();					
					if(empty($HotelProperty)){
					$HotelProperty= new HotelProperty;
					$HotelProperty->hl_id=$hl_id;
					$HotelProperty->save();
					}
					$HotelGdsCodes= HotelGdsCodes::where('hl_id',$hl_id)->first();					
					if(empty($HotelGdsCodes)){
					$HotelGdsCodes= new HotelGdsCodes;
					$HotelGdsCodes->hl_id=$hl_id;
					$HotelGdsCodes->save();
					}
					$HotelGdsCodesOther= HotelGdsCodesOther::where('hl_id',$hl_id)->first();					
					if(empty($HotelGdsCodesOther)){
					$HotelGdsCodesOther= new HotelGdsCodesOther;
					$HotelGdsCodesOther->hl_id=$hl_id;
					$HotelGdsCodesOther->save();
					}

					$HotelTaxConfiguration= HotelTaxConfiguration::where('hl_id',$hl_id)->first();					
					if(empty($HotelTaxConfiguration)){
					$HotelTaxConfiguration= new HotelTaxConfiguration;
					$HotelTaxConfiguration->hl_id=$hl_id;
					$HotelTaxConfiguration->save();
					}
                    $HotelTaxConfiguration= HotelTaxConfiguration::where('hl_id',$hl_id)->first();                  
                    if(empty($HotelTaxConfiguration)){
                    $HotelTaxConfiguration= new HotelTaxConfiguration;
                    $HotelTaxConfiguration->hl_id=$hl_id;
                    $HotelTaxConfiguration->save();
                    }

                    $HotelLocalPolices= HotelLocalPolices::where('hl_id',$hl_id)->first();
                    if(empty($HotelLocalPolices)){
                    $HotelLocalPolices= new HotelLocalPolices;
                    $HotelLocalPolices->hl_id=$hl_id;
                    $HotelLocalPolices->save();
                    }



                    $hotel_local_polices =[
                    'adults_only_hotel_no_kids_allowed'=> $request->adults_only_hotel_no_kids_allowed,
                    'early_checkout'=> $request->early_checkout,
                    'late_checkout'=> $request->late_checkout,
                    'pet_policy'=> $request->pet_policy,
                    'pets_allowed'=> $request->pets_allowed,
                    'Pets_free'=> $request->Pets_free,
                    'extra_person_fee'=> $request->extra_person_fee,
                    'extra_child_fee'=> $request->extra_child_fee,
                    'crib_charge'=> $request->crib_charge,
                    'check_in_hour'=> $request->check_in_hour,
                    'check_in_minute'=> $request->check_in_minute,
                    'check_out_hour'=> $request->check_out_hour,
                    'check_out_minute'=> $request->check_out_minute,
                    'family_policy'=> $request->family_policy,
                    'kids_stay_free'=> $request->kids_stay_free,
                    'commission_policy'=>  $request->commission_policy,
                    'commission_percentage'=> $request->commission_percentage,
                    'deposit_policy'=> $request->deposit_policy,
                    'cancellation_policy'=> $request->cancellation_policy                                   
                    ];

                    $HotelLocalPolices= HotelLocalPolices::where('hl_id',$hl_id)->update($hotel_local_polices);


					$HodelAddress= HodelAddress::where('hl_id',$hl_id)->update(['address_1' => $request->address_1,'address_2' => $request->address_2,'address_3' => $request->address_3,'city' => $request->city,'state' => $request->state,'postcode' => $request->zip_code,'country' => $request->country,'latitude' => $request->latitude,'longitude' => $request->longitude,]);


					$HotelMainContacts= HotelMainContacts::where('hl_id',$hl_id)->update(['main_phone' => $request->main_phone,'second_phone' => $request->second_phone,'fax' => $request->fax,'email' => $request->email,'url' => $request->url,'r_d_email' => $request->r_d_email,'reservation_email' => $request->reservation_email,'cc_retrieval' => $request->cc_retrieval,'inventory_notification' => $request->inventory_notification,'main_phone' => $request->main_phone,]);
    
					$HotelAdditionalContacts= HotelAdditionalContacts::where('hl_id',$hl_id)->update(['c_title' => $request->c_title,'f_name' => $request->f_name,'l_name' => $request->l_name,'job_title' => $request->job_title,'email_add' => $request->email_add,'c_number' => $request->c_number,'m_number' => $request->m_number,'cotact_purpose' => $request->cotact_purpose,'login_req' => $request->login_req,]);
                    $tot=count($request->airport_name);

					for($i=0;$i<$tot; $i++)
					{
                        //dd($request->airport_id[$i]);
						if(empty($request->airport_id[$i])){

						
                            if($request->airport_name[$i]!=''){
                        $HotelAirportInfo= new HotelAirportInfo;
                            $HotelAirportInfo->hl_id=$hl_id;
                            $HotelAirportInfo->airport_name = $request->airport_name[$i];
                            $HotelAirportInfo->airport_code = $request->airport_code[$i];
                            $HotelAirportInfo->airport_km = $request->airport_km[$i];
                            $HotelAirportInfo->airport_miles = $request->airport_miles[$i];
                            $HotelAirportInfo->save();
                        }

					}else{
							$HotelAirportInfo= HotelAirportInfo::where('id',$request->airport_id[$i])->update(['airport_name' => $request->airport_name[$i],'airport_code' => $request->airport_code[$i],'airport_km' => $request->airport_km[$i],'airport_miles' => $request->airport_miles[$i]]);
                           // dd(DB::getQueryLog());
					}
					}

  //$HotelAirportInfo= HotelAirportInfo::where('hl_id',$hl_id)->get();

					//$HotelAirportInfo= HotelAirportInfo::where('hl_id',$hl_id)->get();

                    $Hotelsynxiscrs= Hotelsynxiscrs::where('hl_id',$hl_id)->first();
                    if(empty($Hotelsynxiscrs)){
                    $Hotelsynxiscrs= new Hotelsynxiscrs;
                    $Hotelsynxiscrs->hl_id=$hl_id;
                    $Hotelsynxiscrs->save();
                    }

					$Hotelsynxiscrs= Hotelsynxiscrs::where('hl_id',$hl_id)->update([	   		
					'chain_name' => $request->chain_name,
					'chain_id' => $request->chain_id,
					'syn_property_name' => $request->syn_property_name,
					'syn_property_name_all' => $request->syn_property_name_all,
					'syn_property_code' => $request->syn_property_code,
					'syn_phy_address1' => $request->syn_phy_address1,
					'syn_phy_address2' => $request->syn_phy_address2,
					'syn_phy_city' => $request->syn_phy_city,
					'syn_phy_postcode' => $request->syn_phy_postcode,
					'syn_phy_country' => $request->syn_phy_country,
                    'syn_phy_state' => $request->syn_phy_state,
					'syn_invertry_amt' => $request->syn_invertry_amt,
					'syn_main_phone' => $request->syn_main_phone,
					'syn_main_fax' => $request->syn_main_fax,
					'syn_latitude' => $request->syn_latitude,
					'syn_longitude' => $request->syn_longitude,
					'syn_gen_enq_email' => $request->syn_gen_enq_email,
					'syn_web' => $request->syn_web,
					'syn_default_lang' => $request->syn_default_lang,
					'syn_op2_lang' => $request->syn_op2_lang,
					'syn_op3_lang' => $request->syn_op3_lang,
					'syn_op4_lang' => $request->syn_op4_lang,
					'syn_op5_lang' => $request->syn_op5_lang,
					'syn_op6_lang' => $request->syn_op6_lang,
					'syn_currency' => $request->syn_currency,
					'syn_time_zone' => $request->syn_time_zone,
					'syn_airport' => $request->syn_airport,
					'syn_via_email' => $request->syn_via_email,
					'syn_via_email_add' => $request->syn_via_email_add,
					'syn_via_fax' => $request->syn_via_fax,
					'syn_via_fax_no' => $request->syn_via_fax_no,
					'syn_channel_1' => $request->syn_channel_1,
					'syn_channel_desc_1' => $request->syn_channel_desc_1,
					'syn_channel_2' => $request->syn_channel_2,
					'syn_channel_desc_2' => $request->syn_channel_desc_2,
					'syn_channel_3' => $request->syn_channel_3,
					'syn_channel_desc_3' => $request->syn_channel_desc_3,
					'syn_channel_4' => $request->syn_channel_4,
					'syn_channel_desc_4' => $request->syn_channel_desc_4,
					'syn_channel_5' => $request->syn_channel_5,
					'syn_channel_desc_5' => $request->syn_channel_desc_5,
					'syn_channel_6' => $request->syn_channel_6,
					'syn_channel_desc_6' => $request->syn_channel_desc_6,
					'syn_pri_name' => $request->syn_pri_name,
					'syn_pri_title' => $request->syn_pri_title,
					'syn_pri_phone' => $request->syn_pri_phone,
					'syn_pri_email' => $request->syn_pri_email,
					'syn_add1_name' => $request->syn_add1_name,
					'syn_add1_title' => $request->syn_add1_title,
					'syn_add1_phone' => $request->syn_add1_phone,
					'syn_add1_email' => $request->syn_add1_email,
					'syn_add2_name' => $request->syn_add2_name,
					'syn_add2_title' => $request->syn_add2_title,
					'syn_add2_phone' => $request->syn_add2_phone,
					'syn_add2_email' => $request->syn_add2_email,
					'syn_tec_name' => $request->syn_tec_name,
					'syn_tec_title' => $request->syn_tec_title,
					'syn_tec_phone' => $request->syn_tec_phone,
					'syn_tec_email' => $request->syn_tec_email,
					'syn_already_rep' => $request->syn_already_rep,
					'syn_gds_comp_name' => $request->syn_gds_comp_name,
					'syn_chain_code' => $request->syn_chain_code,
					'syn_property_code_sabre' => $request->syn_property_code_sabre,
					'syn_property_code_apollo' => $request->syn_property_code_apollo,
					'syn_property_code_worldspan' => $request->syn_property_code_worldspan,
					'syn_property_code_amadeus' => $request->syn_property_code_amadeus,
                    'pms_type' => $request->pms_type,
                    'pms_version' => $request->pms_version
					]);

//dd(DB::getQueryLog());

					$HotelPropertyAttributes= HotelPropertyAttributes::where('hl_id',$hl_id)->update(['property_type' => $request->property_type,'property_type2' => $request->property_type2,'property_type3' => $request->property_type3,'location_type' => $request->location_type,'alert_email' => $request->alert_email,'property_email' => $request->property_email,'guest_email' => $request->guest_email,'res_del_email' => $request->res_del_email,'res_del_fax' => $request->res_del_fax,'price' => $request->pprice,]);


					$HotelAreaInfo= HotelAreaInfo::where('hl_id',$hl_id)->update(['area_attractions' => $request->area_attractions,'corporate_locations' => $request->corporate_locations,'h_loc_desc' => $request->h_loc_desc,]);

					/*$HotelDiningEntertainmentRestaurant= HotelDiningEntertainmentRestaurant::where('hl_id',$hl_id)->update(['dinning' => $request->dinning,'meal_plan' => $request->meal_plan,'res_description' => $request->res_description,]);
					$HotelDiningEntertainmentResOpenTime= HotelDiningEntertainmentResOpenTime::where('hl_id',$hl_id)->update(['res_open_monday' => $request->res_open_monday,'res_close_monday' => $request->res_close_monday,'res_open_tuesday' => $request->res_open_tuesday,'res_close_tuesday' => $request->res_close_tuesday,'res_open_wednesday' => $request->res_open_wednesday,'res_close_wednesday' => $request->res_close_wednesday,'res_open_thursday' => $request->res_open_thursday,'res_close_thursday' => $request->res_close_thursday,'res_open_friday' => $request->res_open_friday,'res_close_friday' => $request->res_close_friday,'res_open_saturday' => $request->res_open_saturday,'res_close_saturday' => $request->res_close_saturday,'res_open_sunday' => $request->res_open_sunday,'res_close_sunday' => $request->res_close_sunday,]);
					$HotelDiningEntertainmentBreakOpenTime= HotelDiningEntertainmentBreakOpenTime::where('hl_id',$hl_id)->update(['break_open_monday' => $request->break_open_monday,'break_close_monday' => $request->break_close_monday,'break_open_tuesday' => $request->break_open_tuesday,'break_close_tuesday' => $request->break_close_tuesday,'break_open_wednesday' => $request->break_open_wednesday,'break_close_wednesday' => $request->break_close_wednesday,'break_open_thursday' => $request->break_open_thursday,'break_close_thursday' => $request->break_close_thursday,'break_open_friday' => $request->break_open_friday,'break_close_friday' => $request->break_close_friday,'break_open_saturday' => $request->break_open_saturday,'break_close_saturday' => $request->break_close_saturday,'break_open_sunday' => $request->break_open_sunday,'break_close_sunday' => $request->break_close_sunday,]);
					$HotelDiningEntertainmentLunchOpenTime= HotelDiningEntertainmentLunchOpenTime::where('hl_id',$hl_id)->update(['lunch_open_monday' => $request->lunch_open_monday,'lunch_close_monday' => $request->lunch_close_monday,'lunch_open_tuesday' => $request->lunch_open_tuesday,'lunch_close_tuesday' => $request->lunch_close_tuesday,'lunch_open_wednesday' => $request->lunch_open_wednesday,'lunch_close_wednesday' => $request->lunch_close_wednesday,'lunch_open_thursday' => $request->lunch_open_thursday,'lunch_close_thursday' => $request->lunch_close_thursday,'lunch_open_friday' => $request->lunch_open_friday,'lunch_close_friday' => $request->lunch_close_friday,'lunch_open_saturday' => $request->lunch_open_saturday,'lunch_close_saturday' => $request->lunch_close_saturday,'lunch_open_sunday' => $request->lunch_open_sunday,'lunch_close_sunday' => $request->lunch_close_sunday,]);
					$HotelDiningEntertainmentDinnerOpenTime= HotelDiningEntertainmentDinnerOpenTime::where('hl_id',$hl_id)->update(['dinner_open_monday' => $request->dinner_open_monday,'dinner_close_monday' => $request->dinner_close_monday,'dinner_open_tuesday' => $request->dinner_open_tuesday,'dinner_close_tuesday' => $request->dinner_close_tuesday,'dinner_open_wednesday' => $request->dinner_open_wednesday,'dinner_close_wednesday' => $request->dinner_close_wednesday,'dinner_open_thursday' => $request->dinner_open_thursday,'dinner_close_thursday' => $request->dinner_close_thursday,'dinner_open_friday' => $request->dinner_open_friday,'dinner_close_friday' => $request->dinner_close_friday,'dinner_open_saturday' => $request->dinner_open_saturday,'dinner_close_saturday' => $request->dinner_close_saturday,'dinner_open_sunday' => $request->dinner_open_sunday,'dinner_close_sunday' => $request->dinner_close_sunday,]);
					$HotelDiningEntertainmentBar= HotelDiningEntertainmentBar::where('hl_id',$hl_id)->update(['bar_name' => $request->bar_name,'child_friendly' => $request->child_friendly,'bar_description' => $request->bar_description,]);



					$HotelDiningEntertainmentGuestOpenTime= HotelDiningEntertainmentGuestOpenTime::where('hl_id',$hl_id)->update(['guest_open_monday' => $request->guest_open_monday,'guest_close_monday' => $request->guest_close_monday,'guest_open_tuesday' => $request->guest_open_tuesday,'guest_close_tuesday' => $request->guest_close_tuesday,'guest_open_wednesday' => $request->guest_open_wednesday,'guest_close_wednesday' => $request->guest_close_wednesday,'guest_open_thursday' => $request->guest_open_thursday,'guest_close_thursday' => $request->guest_close_thursday,'guest_open_friday' => $request->guest_open_friday,'guest_close_friday' => $request->guest_close_friday,'guest_open_saturday' => $request->guest_open_saturday,'guest_close_saturday' => $request->guest_close_saturday,'guest_open_sunday' => $request->guest_open_sunday,'guest_close_sunday' => $request->guest_close_sunday,]);
					$HotelDiningEntertainmentPublicOpenTime= HotelDiningEntertainmentPublicOpenTime::where('hl_id',$hl_id)->update(['public_open_monday' => $request->public_open_monday,'public_close_monday' => $request->public_close_monday,'public_open_tuesday' => $request->public_open_tuesday,'public_close_tuesday' => $request->public_close_tuesday,'public_open_wednesday' => $request->public_open_wednesday,'public_close_wednesday' => $request->public_close_wednesday,'public_open_thursday' => $request->public_open_thursday,'public_close_thursday' => $request->public_close_thursday,'public_open_friday' => $request->public_open_friday,'public_close_friday' => $request->public_close_friday,'public_open_saturday' => $request->public_open_saturday,'public_close_saturday' => $request->public_close_saturday,'public_open_sunday' => $request->public_open_sunday,'public_close_sunday' => $request->public_close_sunday,]);
					*/


					$HotelMealPlan= HotelMealPlan::where('hl_id',$hl_id)->update(['off_site_entertainment' => $request->off_site_entertainment,'off_site_restaurants' => $request->off_site_restaurants,'on_site_entertainment' => $request->on_site_entertainment,'special_events' => $request->special_events,'weddings'=> $request->weddings,'alternate_hotels'=> $request->alternate_hotels,
                    'awards'=> $request->awards,'frequent_guest_information'=> $request->frequent_guest_information,'gds_data'=> $request->gds_data,'handicap_facilities'=> $request->handicap_facilities,'key_selling_points'=> $request->key_selling_points,'miscellaneous'=> $request->miscellaneous,'safety'=> $request->safety,'tour_operators'=> $request->tour_operators,'travel_agent_commission'=> $request->travel_agent_commission,'chef'=> $request->chef,'director_of_sales_and_management'=> $request->director_of_sales_and_management,'fb_director'=> $request->fb_director,'general_manager'=> $request->general_manager,'managing_director'=> $request->managing_director,
                    'reservations_manager'=> $request->reservations_manager,'rooms_division'=> $request->rooms_division]);	
 //dd(DB::getQueryLog());

					$HotelPolices= HotelPolices::where('hl_id',$hl_id)->update(['cancellation_policy' => $request->cancellation_policy,'extended_stay_policy' => $request->extended_stay_policy,'extra_charge_policy' => $request->extra_charge_policy,'family_plan_policy' => $request->family_plan_policy,'general_policy' => $request->general_policy,'group_policy' => $request->group_policy,'guarantee_policy' => $request->guarantee_policy,'pet_policy' => $request->pet_policy,'taxs_policy' => $request->taxs_policy,]);

					$HotelProperty= HotelProperty::where('hl_id',$hl_id)->update(['property_check_in_out_desc' => $request->property_check_in_out_desc,'property_description_typical' => $request->property_description_typical,'property_description' => $request->property_description,'property_detail' => $request->property_detail,'seasonal_closure' => $request->seasonal_closure,'selling_feature_1' => $request->selling_feature_1,'selling_feature_2' => $request->selling_feature_2,'selling_feature_3' => $request->selling_feature_3,'arrival_room_service' => $request->arrival_room_service,'business_service' => $request->business_service,'facilities' => $request->facilities,'health_club_or_fitness' => $request->health_club_or_fitness,'local_information' => $request->local_information,'meeting_facilities' => $request->meeting_facilities,'recreation' => $request->recreation,'room_amenities' => $request->room_amenities,'services' => $request->services,'shopping_local_attraction' => $request->shopping_local_attraction,'spa' => $request->spa,'directions' => $request->directions,'parking' => $request->parking,'tourist_information' => $request->tourist_information,'transfer_information' => $request->transfer_information,'transportation' => $request->transportation,'weather_information' => $request->weather_information,]);

					$HotelGdsCodes= HotelGdsCodes::where('hl_id',$hl_id)->update(['amadues' => $request->amadues,'galileo' => $request->galileo,'sabre' => $request->sabre,'worldspan' => $request->worldspan,'lanyon' => $request->lanyon,'pegasus' => $request->pegasus]);

                   
                    if(is_array($request->gdsother)){
					for($i=0; $i < count($request->gdsother); $i++){
						if($request->gds_code_id[$i]){
							$HotelGdsCodesOther= HotelGdsCodesOther::where('hl_id',$hl_id)->update(['title' => $request->gdsother[$i]]);
						}else{
							$HotelGdsCodesOther= HotelGdsCodesOther::where('id',$request->gds_code_id[$i])->update(['title' => $request->gdsother[$i]]);
						}
						
					}

                    }else{
                        if($request->gds_code_id){
                            $HotelGdsCodesOther= HotelGdsCodesOther::where('hl_id',$hl_id)->update(['title' => $request->gdsother]);
                        }else{
                            $HotelGdsCodesOther= HotelGdsCodesOther::where('id',$request->gds_code_id)->update(['title' => $request->gdsothe]);
                        }
                    }
					
					

					$HotelTaxConfiguration= HotelTaxConfiguration::where('hl_id',$hl_id)->update(['tax_level' => $request->tax_level,'tax_frequency' => $request->tax_frequency,'tax_type' => $request->tax_type,'tax_code' => $request->tax_code,'tax_name' => $request->tax_name,'tax_desc' => $request->tax_desc,'start_date' => date('Y-m-d',strtotime($request->start_date)),'end_date' => date('Y-m-d',strtotime($request->end_date)),'no_end_date' => $request->no_end_date,'tax' => $request->tax,'tax_type_price' => $request->tax_type_price,'charge_per' => $request->charge_per,'cal_package_price'=> $request->cal_package_price,'cal_ext_rate'=> $request->cal_ext_rate,'cal_room_price' => $request->cal_room_price,'elg_dis_exclusion' => $request->elg_dis_exclusion,'tax_inclusive' => $request->tax_inclusive,'apply_free_night' => $request->apply_free_night,'tax_by_price_range' => $request->tax_by_price_range,'tax_by_los' => $request->tax_by_los,]);


					//$affected = DB::table('user_venue_capacity')->where('venue_id', $vid)->delete();
							$capacity=$request->capacity;
							$tot=count($request->capacity);

							for ($i=0; $i < $tot; $i++) {
								if($request->capacity_mid[$i])
								{
									$HotelGdsCodesOther= UserVenueCapacity::where('id',$request->capacity_mid[$i])->update([
										'capacity_value' => $request->capacity_value[$i],
										'total_sq_fit' => $request->total_sq_fit[$i],
										'room_size' => $request->room_size[$i],
										'celing_height' => $request->celing_height[$i],
										'class_room' => $request->class_room[$i],
										'theater_1' => $request->theater_1[$i],
										'theater_2' => $request->theater_2[$i],
										'reception' => $request->reception[$i],
										'conference' => $request->conference[$i],
										'u_shape' => $request->u_shape[$i],
										'h_shape' => $request->h_shape[$i],	
									]);

								}else{

									$capacity = new UserVenueCapacity;					
									$capacity->capacity_id=$request->capacity[$i];
									$capacity->capacity_value=$request->capacity_value[$i];
									$capacity->total_sq_fit=$request->total_sq_fit[$i];
									$capacity->room_size=$request->room_size[$i];
									$capacity->celing_height=$request->celing_height[$i];
									$capacity->class_room=$request->class_room[$i];
									$capacity->theater_1=$request->theater_1[$i];
									$capacity->theater_2=$request->theater_2[$i];
									$capacity->reception=$request->reception[$i];
									$capacity->conference=$request->conference[$i];
									$capacity->u_shape=$request->u_shape[$i];
									$capacity->h_shape=$request->h_shape[$i];					
									$capacity->venue_id=$hl_id;							
									$capacity->save();

								}
							
							}
				
						// $affected = DB::table('user_venue_capacity')->where('venue_id', $vid)->delete();
						// if($affected==0 || $affected > 0)
						// {
						// $c = array_combine($request->capacity, $request->capacity_value);

						// 	foreach($c as $key => $val)
						// 	{

						// 	$capacity = new UserVenueCapacity;					
						// 	$capacity->capacity_id=$key;
						// 	$capacity->capacity_value=$val;					
						// 	$capacity->venue_id=$vid;							
						// 	$capacity->save();	

						// 	}					

						// }	

						$benefits=$request->benefits;				
						if (!empty($benefits)) {

						$affected = DB::table('user_venue_benefits')->where('venue_id', $hl_id)->delete();
						if($affected==0 || $affected > 0)
						{
						$benefits=implode(',',$request->benefits);
						foreach(explode(',',$benefits) as $val)
						{	
						$benefits = new UserVenueBenefits;						
						$benefits->benefits_id=$val;
						$benefits->venue_id=$hl_id;							
						$benefits->save();				
						}
						}
						}

						$amenities=$request->amenities;				
						if (!empty($amenities)) {

						$affected = DB::table('user_venue_amenities')->where('venue_id', $hl_id)->delete();
						if($affected==0 || $affected > 0)
						{
						$amenities=implode(',',$request->amenities);
						foreach(explode(',',$amenities) as $val)
						{	
						$amenities = new UserVenueAmenities;						
						$amenities->amenities_id=$val;
						$amenities->venue_id=$hl_id;							
						$amenities->save();				
						}
						}
						}

						$business=$request->business;				
						if (!empty($business)) {

						$affected = DB::table('user_venue_business')->where('venue_id', $hl_id)->delete();
						if($affected==0 || $affected > 0)
						{
						$business=implode(',',$request->business);
						foreach(explode(',',$business) as $val)
						{	
						$business = new UserVenueBusiness;						
						$business->business_id=$val;
						$business->venue_id=$hl_id;							
						$business->save();				
						}
						}
						}


						$features=$request->features;				
						if (!empty($features)) {	

						$affected = DB::table('user_venue_features')->where('venue_id', $hl_id)->delete();
						if($affected==0 || $affected > 0)
						{

						$features=implode(',',$request->features);
						foreach(explode(',',$features) as $val)
						{
						$features = new UserVenueFeatures;					
						$features->features_id=$val;
						$features->venue_id=$hl_id;							
						$features->save();				
						}
						}
						}

						$fooddrink=$request->fooddrink;				
						if (!empty($fooddrink)) {

						$affected = DB::table('user_venue_fooddrink')->where('venue_id', $hl_id)->delete();
						if($affected==0 || $affected > 0)
						{
						$fooddrink=implode(',',$request->fooddrink);
						foreach(explode(',',$fooddrink) as $val)
						{
						$fooddrink = new UserVenueFooddrink;
						$fooddrink->fooddrink_id=$val;
						$fooddrink->venue_id=$hl_id;							
						$fooddrink->save();				
						}
						}
						}

						$licensing=$request->licensing;				
						if (!empty($licensing)) {

						$affected = DB::table('user_venue_licensing')->where('venue_id', $hl_id)->delete();
						if($affected==0 || $affected > 0)
						{
						$licensing=implode(',',$request->licensing);
						foreach(explode(',',$licensing) as $val)
						{	
						$licensing = new UserVenueLicensing;						
						$licensing->licensing_id=$val;
						$licensing->venue_id=$hl_id;							
						$licensing->save();				
						}
						}
						}
				
				
return back()->with('message','Hotel updated successfully');

	}
	
	public function editHotel()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
//$VenueContact= VenueContact::all()->where('user_id',$user_id);
 $hotels = DB::table('hotels')
			 ->where('user_id', $user_id)	 
			 ->get(); 
		//$venue= VenueContact::all()->where('user_id',$user_id); 
		$VenueType= VenueType::all();
        $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
		$Benefits= Benefits::all();
		$Amenities= Amenities::all();
		$Business= VenueBusiness::all();
	
	 
	   $country= Country::all()->where('id',230);
	   $Category= Category::all();
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
	
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.hotelier.edit_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueType'=>$VenueType,'hotels'=>$hotels,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
    }
	
	public function getHotel(Request $request)
		{
			 $id=$request->id; 
			 
			 $venue = DB::table('hotels')
			 ->where('id', $id)	 
			 ->first();


 			$countries = DB::table('countries')			 
			 	  ->get();
			 $states = DB::table('states')
				 ->where('country_id',$venue->country)			 
				 ->get();
			$cities = DB::table('cities')
				 ->where('state_id',$venue->state)			 
				 ->get();   
		
			 $Benefits= UserVenueBenefits::where('venue_id', $id)->get();
			 $Amenities= UserVenueAmenities::where('venue_id', $id)->get();
			 $Business= UserVenueBusiness::where('venue_id', $id)->get();

			 $user_venue_capacity = DB::table('user_venue_capacity')
			 ->where('venue_id', $id)	 
			 ->get();
			 
			  $user_venue_features = DB::table('user_venue_features')		
			 ->where('venue_id', $id)	 
			 ->get();

			 $user_venue_fooddrink = DB::table('user_venue_fooddrink')
			 ->where('venue_id', $id)	 
			 ->get();
			 
			 $user_venue_licensing = DB::table('user_venue_licensing')	
			 ->where('venue_id', $id)	 
			 ->get();
			 
			  $user_venue_restrictions = DB::table('user_venue_restrictions')	
			 ->where('venue_id', $id)	 
			 ->get();
			 
		 return '{"view_details": ' . json_encode(array("venue"=>$venue,"Benefits"=>$Benefits,"Amenities"=>$Amenities,"Business"=>$Business,"user_venue_capacity"=>$user_venue_capacity,"user_venue_features"=>$user_venue_features,"user_venue_fooddrink"=>$user_venue_fooddrink,"user_venue_licensing"=>$user_venue_licensing,"user_venue_restrictions"=>$user_venue_restrictions, "countries"=>$countries,"states"=>$states,"cities"=>$cities)) . '}';
	}


	// Venue Added
	public function added(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
			'hotel_type'			=> 'required',
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'website'			=> 'required',
			'contact_no'			=> 'required',
			'no_of_room'			=> 'required',
			'no_of_m_room'			=> 'required',
			'star_rate'			=> 'required',
			'lead_type'			=> 'required'
               
            ],
            [
			
			'hotel_type.required'			=> 'Hostel Type is required',
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'Cities is required',		
			'postcode.required'			=> 'Postcode is required',		
			'website.required'			=> 'Website is required',		
			'contact_no.required'			=> 'Contact No is required',		
			'no_of_room.required'			=> 'No of room is required',		
			'no_of_m_room.required'			=> 'No of meeting room is required',		
			'star_rate.required'			=> 'Star Rate is required',		
			'lead_type.required'			=> 'Lead Type is required',					
                     ]);
					 
									 
										  
					 
				$Hotell = new Hotelleads;				
				$Hotell->hl_created_by=auth()->user()->id;				
				$Hotell->hl_type=$request->hotel_type;
				$Hotell->hl_grp_name=$request->grp_name;					
				$Hotell->hl_name=$request->title;
				$Hotell->hl_address=$request->address1;
				$Hotell->hl_country=$request->country;
				$Hotell->hl_state=$request->states;
				$Hotell->hl_city=$request->cities;
				$Hotell->hl_postcode=$request->postcode;
				$Hotell->hl_website=$request->website;
				$Hotell->hl_contact_no=$request->contact_no;						
				$Hotell->hl_no_room=$request->no_of_room;						
				$Hotell->hl_no_m_room=$request->no_of_m_room;						
				$Hotell->hl_star_rate=$request->star_rate;						
				$Hotell->hl_lead_type=$request->lead_type;				
				$Hotell->save();				
			    $hlid = $Hotell->id;				
				
								
				$contact_person=$request->contact_person;
				$contact_status_hidden=$request->contact_status_hidden;
				
				$contact_status_hiddenval = explode(",",$contact_status_hidden);
				
				$tot=count($request->contact_person);

				for ($i=0; $i < $tot; $i++) { 

					    $hlcontacts = new Hotelleadscontacts;					
						$hlcontacts->hl_c_person=$request->contact_person[$i];
						$hlcontacts->hl_c_designation=$request->contact_designation[$i];
						$hlcontacts->hl_c_no=$request->contact_number[$i];
						$hlcontacts->hl_c_email=$request->contact_email[$i];
						$hlcontacts->hl_c_linked_contact=$request->linked_in[$i];
						$hlcontacts->hl_c_main_contact=$contact_status_hiddenval[$i];
						$hlcontacts->hl_c_status=0;
						$hlcontacts->hl_c_created_by=auth()->user()->id;
							
						$hlcontacts->hl_id=$hlid;							
						$hlcontacts->save();	

				} 
								
				$Hotelln = new Hotelleadsnotes;				
				$Hotelln->hl_n_added_by=auth()->user()->id;				
				$Hotelln->hl_id=$hlid;
				$Hotelln->hl_c_status=$request->action;					
				$Hotelln->hl_n_notes=$request->lead_notes;					
							
				$Hotelln->save();				
			    
			
				
			return back()->with('message','success');
				
	}
	
	public function profileupdated(Request $request)
	{
		 
		 $this->validate($request,
			 [		 
		
		'firstname'			=> 'required',
		'lastname'			=> 'required',
		'email'			=> 'required|email|unique:users'		
		       
            ],
            [
			
			'firstname.required'			=> 'FirstName is required',
			'lastname.required'			=> 'Lastname is required',
			'email.required'        => 'Email is required',

            'email.email'           => 'Email is invalid'		
			          ]);
			
				DB::table('users')
				->where('id', $request->id)
				->update([							
				'first_name' =>$request->firstname,
				'last_name' =>$request->lastname,				
				'email' =>$request->email,
				]);
				
				return redirect('/hotelier/edit-profile')->with('message','Profile Details updated successfully');

				
	}
	
	public function passupdated(Request $request)
	{
		 
		 $this->validate($request,
			 [		 
		
		 'password'              => 'required|min:6|max:20',

          'cpassword' 			=> 'required|same:password'
		       
            ],
            [
			
			'password.required'     => 'Password is required',

			'password.min'          => 'Password needs to have at least 6 characters',

			'password.max'          => 'Password maximum length is 20 characters',

			'cpassword.required'    => 'Confirm password is required'
			          ]);
				
				$password = bcrypt($request->password);
				
				DB::table('users')
				->where('id', $request->id)
				->update([							
				'password' =>$password
				]);
				
				return redirect('/hotelier/update-password')->with('message','Password updated successfully');

				
	}
	// public function updated(Request $request)
	// {	 
 //    		    $hid=$request->hotel_id;
				
	// 			DB::table('hotel_leads_contacts')
	// 			->where('hl_id', $hid)
	// 			->update([							
	// 			'hl_c_status'=>$request->action
	// 			]);
				
	// 			$Hotelln = new Hotelleadsnotes;				
	// 			$Hotelln->hl_n_added_by=auth()->user()->id;				
	// 			$Hotelln->hl_id=$hid;
	// 			$Hotelln->hl_c_status=$request->action;					
	// 			$Hotelln->hl_n_notes=$request->lead_notes;					
							
	// 			$Hotelln->save();
					
				
				
	// 	return redirect('/hotelier')->with('message','Hotel Lead updated successfully');

	// }
	public function remove(Request $request)
		{	
		
		$id=$request->id;
		$val=explode(',',$request->id);
		$vid=$val[0];
		$img=$val[1];
		$field=$val[2];
		
		DB::table('hotels')
		->where('id', $vid)
		->update(['image_'.$field => null,]);
		$status['deletedid']=$field;
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
		public function deleted(Request $request)
		{	 
		$id=$request->id;  
			 $blogs = DB::table('hotels')
			 ->where('id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Hotel deleted successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
		public function deletedVenueContact(Request $request)
		{	 
		$id=$request->id;  
			 $blogs = DB::table('venue_contact')
			 ->where('v_c_id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Venue contact deleted successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}












	// Rooms Details

	 // public function addRoom($hid=null)
  //   {
  //   	Session::forget('session_images');
		// $user_id = (auth()->check()) ? auth()->user()->id : null;	
	
	 //    $users = DB::table('users')
		// 	->select('*', 'users.id as uid')
		// 	->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
		// 	->where('role_user.role_id', '=', 3)
		// 	->get();		
  //     return view('panels.hotelier.add_room',['users' => $users,'hid' => $hid]);

  //   }
	
	public function ViewRooms($hid=null)
	{	

		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$Rooms= Rooms::where('hotel_id',$hid)->get();
		$users = DB::table('users')
		->select('*', 'users.id as uid')
		->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
		->where('role_user.role_id', '=', 3)
		->get();
	return view('panels.hotelier.view_rooms',['Rooms'=>$Rooms,'users' => $users,'hid' => $hid]);
	}



	// Room Added
	public function addedRoom(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'guest'			=> 'required',
			'bed'			=> 'required',
			'feet'			=> 'required',
			'deposit'			=> 'required',
			'breakfast'			=> 'required',
			'cancellation'			=> 'required',			
			'web_link'			=> 'required',
			'price'			=> 'required',
			'description'			=> 'required'
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'guest.required'			=> 'Number of guest is required',
			'bed.required'			=> 'Number of bed is required',
			'feet.required'			=> 'Room feet is required',
			'deposit.required'			=> 'Deposit is required',		
			'breakfast.required'			=> 'Breakfast is required',		
			'cancellation.required'			=> 'Cancellation no is required',
			'web_link.required'			=> 'Web link no is required',					
			'price.required'			=> 'Price is required',				
			'description.required'			=> 'Description is required',					
                     ]);
					 
					
									  
					 
				$Rooms = new Rooms;				
				$Rooms->user_id=auth()->user()->id;				
				$Rooms->hotel_id=$request->hotel_id;					
				$Rooms->title=$request->title;
				$Rooms->guest=$request->guest;
				$Rooms->bed=$request->bed;
				$Rooms->feet=$request->feet;
				$Rooms->price=$request->price;
				$Rooms->description=$request->description;
				$Rooms->deposit=$request->deposit;
				$Rooms->breakfast=$request->breakfast;
				$Rooms->cancellation=$request->cancellation;				
				$Rooms->web_link=$request->web_link;							
				$Rooms->save();				
			    $id = $Rooms->id;				
				$session_images = Session::get('session_images');
				if($session_images){
					foreach($session_images as $key=>$image) {
						DB::table('rooms')
						->where('id', $id)
						->update(['image_'.$key => $image,]);						
					}
					
					//Session::flush();
					Session::forget('session_images');
				}							
				
				
			return back()->with('message','success');
				
	}
	
	public function updatedRoom(Request $request)
	{	 
     $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'guest'			=> 'required',
			'bed'			=> 'required',
			'feet'			=> 'required',
			'deposit'			=> 'required',
			'breakfast'			=> 'required',
			'cancellation'			=> 'required',			
			'web_link'			=> 'required',
			'price'			=> 'required',
			'description'			=> 'required'
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'guest.required'			=> 'Number of guest is required',
			'bed.required'			=> 'Number of bed is required',
			'feet.required'			=> 'Room feet is required',
			'deposit.required'			=> 'Deposit is required',		
			'breakfast.required'			=> 'Breakfast is required',		
			'cancellation.required'			=> 'Cancellation no is required',
			'web_link.required'			=> 'Web link no is required',					
			'price.required'			=> 'Price is required',				
			'description.required'			=> 'Description is required',					
                     ]);
			
			    $vid=$request->id;
				if(Session::get('session_images'))
				{
				$session_images = Session::get('session_images');
				
					foreach($session_images as $image) {
						$venue = DB::table('rooms')
						 ->where('id', $vid)	 
						 ->first(); 					
												
						if($venue->image_1=== NULL){
							
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_1' => $image,]);
						}elseif($venue->image_2=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_2' => $image,]);
						}
						elseif($venue->image_3=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_3' => $image,]);
						}elseif($venue->image_4=== NULL){
							
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_4' => $image,]);
						}elseif($venue->image_5=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_5' => $image,]);
						}
						elseif($venue->image_6=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_6' => $image,]);
					//	dd(DB::getQueryLog());
						}else{
							
						}
										
					}
					
					//Session::flush();
					Session::forget('session_images');
				}
				
					
				DB::table('rooms')
				->where('id', $vid)
				->update([							
				'title' =>$request->title,								
				'guest' =>$request->guest,
				'bed' =>$request->bed,
				'feet' =>$request->feet,
				'price' =>$request->price,
				'description'=>$request->description,
				'deposit'=>$request->deposit,
				'breakfast'=>$request->breakfast,
				'cancellation'=>$request->cancellation,
				'web_link'=>$request->web_link														
				]);
				
return back()->with('message','Room updated successfully');

	}

	public function getRoom(Request $request)
		{
			 $id=$request->id;			 
			 $rooms = DB::table('rooms')
			 ->where('id', $id)	 
			 ->first();
 			
		 return '{"view_details": ' . json_encode(array("rooms"=>$rooms)) . '}';
	}

	public function updateOffer(Request $request)
		{
			 $id=$request->id;	
			 $myString=$request->daterange;
			 $date=explode('-', $myString);

			 DB::table('hotels')
				->where('id', $id)
				->update([							
				'offer' =>$request->offer,								
				'offer_start_date' =>date('Y-m-d', strtotime($date[0])),
				'offer_end_date' =>date('Y-m-d', strtotime($date[1])),	

				]);

				$status='Offer updated successfully';
 			
		 return '{"view_details": ' . json_encode(array("status"=>$status)) . '}';
	}



    public function getProtected()
    {
      
        return view('panels.hotelier.protected');

    }

    //events 
     public function hotelevents()
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      $hotels = DB::table('hotel_leads')
       ->get(); 
    //dd($master_business );
      $country= Country::all()->where('status',1);
      $hlevents = Event::leftJoin('hl_master_regional','hl_master_regional.hl_ms_r_id','=','hl_events.hl_events_id')
                  ->leftJoin('hl_master_tasks','hl_master_tasks.hl_mt_id','=','hl_events.activity_type')
                  ->leftJoin('users','users.id','=','hl_events.uid')
                  ->get();
     // $hlevents = Event::where('uid',$user_id)->get();
      $regionalLocations = DB::table('hl_regional_locations')
        ->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
        ->where('created_by',$user_id)
        ->get();
        
    return view('panels.hotelier.view_events',compact('hlevents'),['hotels'=>$hotels,'country' => $country]);

    }

      public function eventregister($id)
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
    //   $hotels = DB::table('hotel_leads')
    //    ->get(); 
    // //dd($master_business );
    //   $country= Country::all()->where('status',1);
    //   $hlevents = Event::leftJoin('hl_master_regional','hl_master_regional.hl_ms_r_id','=','hl_events.hl_events_id')
    //               ->leftJoin('hl_master_tasks','hl_master_tasks.hl_mt_id','=','hl_events.activity_type')
    //               ->leftJoin('users','users.id','=','hl_events.uid')
    //               ->get();
    //  // $hlevents = Event::where('uid',$user_id)->get();
    //   $regionalLocations = DB::table('hl_regional_locations')
    //     ->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
    //     ->where('created_by',$user_id)
    //     ->get();
        
    return view('panels.hotelier.register_events',compact('id'));

    }
    public function portalregister(Request $request)
    {
        $user_id = (auth()->check()) ? auth()->user()->id : null;
        $events_id=$request->hl_events_id;
        $Events = new Registerportal;
        $Events->title=$request->title;
        $Events->first_name=$request->first_name;
        $Events->last_name=$request->last_name;
        $Events->designation=$request->designation;
        $Events->contact_num=$request->contact_num;
        $Events->email=$request->email;
        $Events->hl_events_id=$request->hl_events_id;
        $Events->comments=$request->comments;
        $Events->payment_status=1;
        $Events->uid=$user_id;
        $Events->save();    
         $hleventssreg = DB::table('hl_event_register')
         ->where('hl_events_id',$events_id)
         ->get();
        $hleventss = DB::table('hl_events')
        ->select('if_limited')
         ->where('hl_events_id',$events_id)
         ->first();
        $space_left=$hleventss->if_limited-count($hleventssreg);
         // dd($space_left);

        DB::table('hl_events')
        ->where('hl_events_id', $events_id)
        ->update(['space_left' => $space_left,]);

        $hlevents = DB::table('hl_events')
                  ->leftJoin('hl_master_regional','hl_master_regional.hl_ms_r_id','=','hl_events.hl_events_id')
                  ->leftJoin('hl_master_tasks','hl_master_tasks.hl_mt_id','=','hl_events.activity_type')
                  ->leftJoin('users','users.id','=','hl_events.uid')
                  ->where('hl_events_id',$events_id)
                  ->get();

        $data = ['event_name' => $hlevents[0]->event_name,'event_location' => $hlevents[0]->event_location,'event_start_date' => $hlevents[0]->event_start_date,'event_end_date' =>$hlevents[0]->event_end_date,'email' =>$request->email];

                 
        Mail::send('emails.registerevent', $data, function ($message) use ($data)
        {
        //  dd($data['email']);
        $message->from('info@ap-lbc.com', 'ap-lbc.com');
        ///$message->to('alexander.mca08@gmail.com');
        $message->to($data['email']);
        $message->cc('linda@ap-lbc.com');
        $message->bcc('admin@ap-lbc.com');
        $message->subject('Registration Completed');

        });
        return redirect('hotelier/hotel-events')->with('message','Thank you for registering.
Our accounts team will be in touch to take the payments. Meanwhile, if you have any questions about the events, please do get in touch with admin@ap-lbc.com');
    }


public function downloadEventDetails($type)
     {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      $data = DB::table('hl_events')
      //->select('*','hl_events.id as hl_eventsid')
     // ->where('uid', $user_id)
      ->get();

return Excel::create('Event-Details', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Regions');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('APLBC DOS Name');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Event/ Activity Name');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Event location');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Event Start Date');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Event End Date');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Activity Type');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Target Segment');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Participation Fee');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Number of hotels can participate');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('If Limited');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Deadline');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Descriptions');   });
                if (!empty($data)) {
                  foreach ($data as $key => $value) {
                  $i=$key+2;
                  $user= DB::table('users')
                    ->where('id',$value->dos_name)
                    ->first();
                    if($user){
                    $dos_name=$user->first_name.' '.$user->last_name ;
                    }else{
                      $dos_name=" ";
                    }
                    $region= DB::table('hl_master_regional')
                    ->where('hl_ms_r_id', $value->hl_region)
                    ->first(); 
                    $activity= DB::table('hl_master_tasks')
                    ->where('hl_mt_id', $value->activity_type)
                    ->first();
                    if($activity){
                    $activity_type=$activity->task_name;
                    }else{
                      $activity_type=" ";
                    } 
                    $fee= DB::table('currency_list')
                    ->where('id', $value->participation_fee)
                    ->first();
                     if($fee){
                    $participation_fee=$fee->name;
                    }else{
                    $participation_fee=" ";
                    }   
                        $sheet->cell('A'.$i, $region->hl_regional_name); 
                        $sheet->cell('B'.$i, $dos_name); 
                        $sheet->cell('C'.$i, $value->event_name); 
                        $sheet->cell('D'.$i, $value->event_location);
                        $sheet->cell('E'.$i, date("d-m-Y",strtotime($value->event_start_date)));
                        $sheet->cell('F'.$i, date("d-m-Y",strtotime($value->event_end_date)));
                        $sheet->cell('G'.$i, $activity_type);
                        $sheet->cell('H'.$i, $value->target_segment);
                        $sheet->cell('I'.$i, $participation_fee);
                        $sheet->cell('J'.$i, $value->hotel_participate);
                        $sheet->cell('K'.$i, $value->if_limited);
                        $sheet->cell('L'.$i, date("d-m-Y",strtotime($value->deadline)));
                        $sheet->cell('M'.$i, $value->description);

                    //foreach ($data as $key => $value) {
                        //$i= $key+2;
                        // $sheet->cell('A2', $data->hotel_id); 
                        // $sheet->cell('B2', $data->hotel_name); 
                        // $sheet->cell('C2', $data->pms_code); 
                    //}
                }
              }
            });
        })->download($type);
    }
}

