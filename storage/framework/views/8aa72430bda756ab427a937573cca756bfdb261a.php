<?php $__currentLoopData = $master_lead_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_lead_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($master_lead_type->hl_mt_lt_id); ?>"><?php echo e($master_lead_type->hl_lead_type_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>