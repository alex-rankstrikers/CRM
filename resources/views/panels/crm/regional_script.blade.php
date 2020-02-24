
@foreach($regional as $regional)
	{title:"{{$regional->hl_regional_name}}",href:"#{{$loop->iteration}}",dataAttrs:[{title:"dataattr7",data:"value7"},{title:"dataattr8",data:"value8"},{title:"dataattr9",data:subData{{$regional->hl_ms_r_id}}}]},
	

	
@endforeach