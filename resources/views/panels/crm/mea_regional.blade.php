@foreach($mea_regional as $mea_regional)
<option value="{{ $mea_regional->id }}">{{$mea_regional->first_name}}</option>
@endforeach