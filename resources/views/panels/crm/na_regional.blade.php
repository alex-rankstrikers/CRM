@foreach($na_regional as $na_regional)
<option value="{{ $na_regional->id }}">{{$na_regional->first_name}}</option>
@endforeach