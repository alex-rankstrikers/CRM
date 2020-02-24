<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Venue;
use App\Models\User;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\UserSetting;
use App\Models\Templates;
use App\Models\SegmentProposal;
use App\Models\ProposalTemplate;
use App\Models\Hotelleads;
use App\Models\Proposal;
use Excel;
use Calendar;
use Image;
use Session;
use PDF;
use Mail;
use Validator;
class ProposalController  extends Controller
{

    public function ajaxtempadd(Request $request){

    $user_id = (auth()->check()) ? auth()->user()->id : null;

    if($request->temp_id!=''){
        $UserSetting=DB::table('templates')
        ->where('temp_id', $request->temp_id)
        ->update(['temp_name' =>$request->temp_name,'solution_type' =>$request->solution_type,'monthly_fees' =>$request->monthly_fees,'content' =>$request->content]); 
        $Template_id = 'updated'; 
    }else{
        $Temp = new Templates;
        $Temp->temp_name=$request->temp_name;
        $Temp->user_id=$user_id;
        $Temp->solution_type=$request->solution_type;
        $Temp->monthly_fees=$request->monthly_fees;
        $Temp->content=$request->content;
        $Temp->temp_status=1;
        $Temp->save();
        $Template_id = $Temp->id; 
      }
    return response()->json($Template_id);
  }
  public function fetchtempdetail(Request $request){

     $temp_detail=DB::table('templates')
        ->where(['temp_id'=>$request->temp_id])
        ->get();
    
    return response()->json($temp_detail);
  }
  public function deletetempdetail(Request $request){
        $temp_detail=DB::table('templates')
        ->where('temp_id', $request->temp_id)
        ->update(['temp_status' =>2]); 
        return response()->json($temp_detail);
  }

	public function get_template(Request $request)
	{
	      //DB::enableQueryLog();
	      // $data['individual_val']=$request->individual_val;
	       $tempdetail=DB::table('templates')
	        ->select('*')
	        ->where(['temp_name'=>$request->temp_name,'temp_status'=>1])
	       // ->whereIn('solution_type',$request->sol_type)
	        ->where('solution_type',$request->sol_type)
	        ->get(); 
	        //dd(DB::getQueryLog());
	        return '{"view_details": ' . json_encode($tempdetail) . '}';
	  
	}
public function addProposal(Request $request){

        $hotels = Hotelleads::get();
        $country= Country::all()->where('status',1);
        $editstates = DB::table('states')      
        ->get();
        $editcities = DB::table('cities')      
        ->get();
        $user_id = (auth()->check()) ? auth()->user()->id : null;

        $Proposal = new Proposal;
        $Proposal->hotel_id=$request->hotel_id;
        $Proposal->user_id=$user_id;
        $Proposal->pro_name=$request->proposal_name;
        $Proposal->save();
        $insertedId = $Proposal->id;

		if($request->solutiontype!=''){
		  $solutiontype=implode(',', $request->solutiontype);
		}else{
		  $solutiontype="";
		}      
		$ProTemp=new ProposalTemplate; 
        $ProTemp->pro_id= $insertedId;
        $ProTemp->solution_type=$solutiontype;
        $ProTemp->template_name=$request->template_name;
        $ProTemp->currency_type=$request->currency_type;
        $ProTemp->monthly_fees=$request->monthly_fees;
        $ProTemp->content=$request->content;
        $ProTemp->template_name1=$request->template_name1;
        $ProTemp->currency_type1=$request->currency_type1;
        $ProTemp->monthly_fees1=$request->monthly_fees1;
        $ProTemp->content1=$request->content1;
        $ProTemp->template_name2=$request->template_name2;
        $ProTemp->currency_type2=$request->currency_type2;
        $ProTemp->monthly_fees2=$request->monthly_fees2;
        $ProTemp->content2=$request->content2;
        $ProTemp->template_name3=$request->template_name3;
        $ProTemp->currency_type3=$request->currency_type3;
        $ProTemp->monthly_fees3=$request->monthly_fees3;
        $ProTemp->content3=$request->content3;
        $ProTemp->save();
     
        $tot=count($request->hid_val);
        for ($i=0; $i < $tot; $i++) 
        { 
        $dat="business_segment_".$i;
        if($request->$dat!=''){
        $business_segment=implode(',', $request->$dat);
        }else{
        $business_segment="";
        }
        $regio="region_".$i;
        if($request->$regio!=''){
        $region=implode(',', $request->$regio);
        }else{
        $region="";
        }

        $Guests=new SegmentProposal; 
        $Guests->prop_id= $insertedId;
        $Guests->business_segment= $business_segment;
        $Guests->region= $region;
        $Guests->segment_status= 1;
        $Guests->save();
        }


        return view('panels.crm.edit_hotel',['hotels'=>$hotels,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
}
  public function editProposal($id)
  {
    $user_id = (auth()->check()) ? auth()->user()->id : null;
    $regionals =  DB::table('hl_master_regional') ->where([['hl_regional_name','!=',''],['hl_regional_status',1]])->get();
    $templates= DB::table('templates')->where('temp_status',1)->groupBy('temp_name')->get();
    $currency= DB::table('currency')->get();
    $segment= DB::table('hl_proposal_segment')->where(['prop_id'=>$id,'segment_status'=>1])->get();
    $proposal = DB::table('hl_proposal_template')
    ->leftJoin('hl_proposal', 'hl_proposal.pro_id', '=', 'hl_proposal_template.pro_id')
    ->leftJoin('users', 'hl_proposal.user_id', '=', 'users.id')
    ->select('hl_proposal_template.*','hl_proposal.pro_name', 'users.first_name', 'users.last_name')
    ->where(['user_id'=>$user_id,'hl_proposal_template.pro_id'=>$id])
    ->first();

      return view('panels.crm.edit_proposal',['currency' => $currency,'templates' => $templates,'regionals' => $regionals,'proposal' => $proposal,'segment' => $segment]);

  }
  public function updateProposal(Request $request)
  {

//dd($request->all());
            $hotels = Hotelleads::get();
        $country= Country::all()->where('status',1);
        $editstates = DB::table('states')      
        ->get();
        $editcities = DB::table('cities')      
        ->get();
        if($request->solutiontype!=''){
        $solutiontype=implode(',', $request->solutiontype);
        }else{
          $solutiontype="";
        }
       

      $Hotell = Proposal::where('pro_id',$request->pro_id)   
      ->update([               
      'pro_name'=>$request->pro_name,
      'template_name'=>$request->template_name,          
      'solution_type'=>$solutiontype,
      'currency_type'=>$request->currency_type,
      'monthly_fee'=>$request->monthly_fees,
      'content'=>$request->content,   
      ]);  

     return back()->with('message','Proposal updated successfully');
      //return view('panels.crm.edit_hotel',['hotels'=>$hotels,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

	}


}?>