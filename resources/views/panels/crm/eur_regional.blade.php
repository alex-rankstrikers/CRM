@foreach($eur_regional as $eur_regional)
<option value="{{ $eur_regional->id }}">{{$eur_regional->first_name}}</option>
@endforeach