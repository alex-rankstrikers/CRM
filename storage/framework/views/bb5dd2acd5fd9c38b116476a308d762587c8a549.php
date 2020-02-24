<table class="table table-bordered"  width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<th>&nbsp;</th>
								<th>Office Address</th>                               
								<th>Country</th>
                             					
								
							
								
							  </tr>
							</thead>

<?php $__currentLoopData = $regionalLocationsDirectAdd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DirectAdd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
								<tr>
									<td><input type='checkbox' name='subsidy_ofz2[]' value="<?php echo e($DirectAdd->hl_regl_id); ?>" ></input></td>
									<td ><?php echo e($DirectAdd->hl_ofz_address); ?></td>                                  								
									<td><?php echo e($DirectAdd->name); ?> </td>                            		
													
									
								</tr>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                            </table>