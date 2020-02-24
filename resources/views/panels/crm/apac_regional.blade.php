@foreach($apac_regional as $apac_regional)
<option value="{{ $apac_regional->id }}">{{$apac_regional->first_name}}</option>
@endforeach