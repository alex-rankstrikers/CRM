<table class="table table-bordered"  width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<th>&nbsp;</th>
								<th>Business</th>
                                <th>Head Office Address</th>
								<th>Country</th>
                                <th>State</th>
								<th>City</th>							
								
							
								
							  </tr>
							</thead>

@foreach ($Hotellccontact as $Hotellccontacts)
							
								<tr>
									<td><input type='checkbox' name='subsidy_ofz2[]' value="{{$Hotellccontacts->hl_ccb_id }}" ></input></td>
									<td >{{$Hotellccontacts->hl_business_name }}</td>
                                    <td >{{$Hotellccontacts->hl_head_office_address }}</td>										
									<td>{{$Hotellccontacts->country}} </td>
                                    <td>{{$Hotellccontacts->states}} </td>
									<td>{{$Hotellccontacts->cities}}</td>								
													
									
								</tr>
							
							@endforeach	
                            </table>