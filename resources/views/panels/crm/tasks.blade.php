@foreach($master_tasks as $master_tasks)
<option value="{{ $master_tasks->hl_mt_id }}">{{$master_tasks->task_name}}</option>
@endforeach