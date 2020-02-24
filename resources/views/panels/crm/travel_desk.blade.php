@foreach($travel_desk as $travel_desk)
<option value="{{ $travel_desk->hl_mt_desk_id }}">{{$travel_desk->hl_master_travel_name}}</option>
@endforeach