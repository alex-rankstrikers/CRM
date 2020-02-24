@foreach($master_regional as $master_regional)
<option value="{{ $master_regional->hl_ms_r_id }}">{{$master_regional->hl_regional_name}}</option>
@endforeach