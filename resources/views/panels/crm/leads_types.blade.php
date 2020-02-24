@foreach($master_lead_type as $master_lead_type)
<option value="{{$master_lead_type->hl_mt_lt_id}}">{{$master_lead_type->hl_lead_type_name}}</option>
@endforeach