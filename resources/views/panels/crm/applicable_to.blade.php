
<select name="applicable_{{str_replace(' ', '_', $applicable_to->hl_ap_name)}}[]" multiple="multiple" id="{{$loop->iteration}}" class="2col active">
	
@for ($ee=0;$ee<count($sleads);$ee++)
	<optgroup label="{{$sleads[$ee]['region']}}">
		@if(count($sleads[$ee]['dataval']) > 0)
			@foreach($sleads[$ee]['dataval'] as $datav)
				<option value="{{$datav->hl_id}}">{{$datav->hl_name}}</option>
			@endforeach
		@endif
@endfor

</select>		
<?php //print_r($sleads);	?>
	