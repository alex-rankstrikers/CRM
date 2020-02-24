@foreach($sa_regional as $sa_regional)
<option value="{{ $sa_regional->id }}">{{$sa_regional->first_name}}</option>
@endforeach