<table class="table table-bordered"  width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<th>&nbsp;</th>
								<th>Office Address</th>                               
								<th>Country</th>
                             					
								
							
								
							  </tr>
							</thead>

@foreach ($regionalLocationsDirectAdd as $DirectAdd)
							
								<tr>
									<td><input type='checkbox' name='subsidy_ofz2[]' value="{{$DirectAdd->hl_regl_id }}" ></input></td>
									<td >{{$DirectAdd->hl_ofz_address }}</td>                                  								
									<td>{{$DirectAdd->name}} </td>                            		
													
									
								</tr>
							
							@endforeach	
                            </table>