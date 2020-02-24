@foreach($users as $users)
<option value="{{ $users->id }}">{{$users->first_name}}</option>
@endforeach